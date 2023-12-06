<template>
    <div class="add-post-block">
        <div class="add-block-title">
            <h5 class="post-edit-title">發表貼文</h5>
            <div class="post-view-setting">
                <img ref="friendView" src="../assets/images/icon/friend-view-select.svg" alt=""
                    :class="{ select: friendSelect }" value="friend" @click="friendViewSetting($event)">
                <img ref="globalView" src="../assets/images/icon/global-view-2.svg" alt="" :class="{ select: globalSelect }"
                    value="global" @click="globalViewSetting($event)">
                <img ref="privateView" src="../assets/images/icon/private-view.svg" alt=""
                    :class="{ select: privateSelect }" value="private" @click="privateViewSetting($event)">
            </div>
        </div>
        <textarea name="" id="post-content" rows="10" placeholder="輸入想說的話" ref="addPostContent"></textarea>
        <div class="add-images-block" v-if="addImages">
            <div class="add-post-images" v-for="(image, index) in addImages" :key="index">
                <img src="../assets/images/icon/reject.svg" alt="delete icon" class="delete-img" @click="deleteImg(index)">
                <img :src="image.src" alt="">
            </div>
        </div>
        <label for="postImg" class="postImg">
            <span>
                新增照片
            </span>
            <img src="../assets/images/icon/image.svg" alt="">
            <input type="file" name="postImg" id="postImg" @change="previewImage" multiple>
        </label>
        <div class="btn-block">
            <button class="Btn Btn-light" @click="clearPostContent()">取消</button>
            <button class="Btn Btn-dark" @click="addPost">發布</button>
        </div>
    </div>
</template>

<script>
import friendViewIcon from '@/assets/images/icon/friend-view.svg';
import friendViewIconS from '@/assets/images/icon/friend-view-select.svg';
import globalViewIcon from '@/assets/images/icon/global-view-2.svg';
import globalViewIconS from '@/assets/images/icon/global-view-select-2.svg';
import privateViewIcon from '@/assets/images/icon/private-view.svg';
import privateViewIconS from '@/assets/images/icon/private-view-select.svg';

import { useUserStore } from '@/store/user';
import axios from 'axios';
export default {
    emits: ["addPost", "keepPostBlock"],
    data() {
        return {
            addImages: [],
            keepBlock: false,
            friendSelect: true,
            globalSelect: false,
            privateSelect: false,
        }
    },
    methods: {
        deleteImg(index) {
            let r = confirm("確定移除這個項目嗎？");

            if (r) {
                this.addImages.splice(index, 1);
            }
        },
        clearPostContent() {

            if (this.$refs.addPostContent.value !== '' || this.addImages.length !== 0) {

                let r = confirm("確定捨棄編輯嗎？");

                if (r) {
                    // console.log(this.$refs.addPostContent.value);
                    this.addImages = [];
                    this.$refs.addPostContent.value = '';
                    this.keepBlock = false;
                } else {
                    this.keepBlock = true;
                }
            }

            this.$emit('keepPostBlock', this.keepBlock);
        },
        previewImage(event) {
            const files = event.target.files; //取得File物件

            if (files) {
                Array.from(files).forEach((file) => {
                    // 使用FileReader讀取圖片
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        // 添加圖片的數據URL到imageUrls數組中
                        let imgInfo = {
                            id: Date.now(),
                            fileName: file.name,
                            src: e.target.result
                        }
                        this.addImages.push(imgInfo);
                    };

                    reader.readAsDataURL(file);
                });
            }
        },
        addPost() {
            //取得會員資料
            const userStore = useUserStore();
            //取得po文內容
            const postContent = this.$refs.addPostContent.value;
            //宣告日期變數
            const today = new Date();

            if (postContent == '' && this.addImages.length == 0) {

                alert('請輸入內容或新增圖片');

            } else {

                //設定post資料
                const post = {
                    id: Date.now(),
                    userId: userStore.userID,
                    userName: userStore.userName,
                    userImg: userStore.userImg,
                    content: postContent,
                    status: '', //設定狀態(公開 0/ 好友 1/私人 2)
                    likes: 0,
                    createTime: today.toLocaleString("zh-tw", { hour12: false }).replaceAll('/', '-'),
                    postImages: this.addImages,
                    replieds: [],
                }

                if (this.friendSelect) {
                    post.status = 1;
                } else if (this.globalSelect) {
                    post.status = 0;
                } else {
                    post.status = 2;
                }

                // 新增post資料至DB
                axios
                    .post('api/addPost.php', JSON.stringify(post))
                    .then(response => {

                        if (response.data != 0) {
                            console.log(response.data);
                            //新增成功後，將id更換成db的id
                            post.id = response.data[0]['POST_ID'];

                            //將資料拋到父層(home)
                            console.log(post);
                            this.$emit('addPost', post);

                            console.log(post);
                            if (post.postImages.length > 0) {
                                //將圖片存入DB
                                this.saveImgToDb(post);
                            }

                            //清空文字框內容及圖片並關閉新增區塊
                            this.$refs.addPostContent.value = '';
                            this.addImages = [];
                            this.keepBlock = false;
                            this.$emit('keepPostBlock', this.keepBlock);
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });

            }

        },
        saveImgToDb(post) {

            const imgData = {
                postId: post.id,
                imgList: [],
            }

            post.postImages.forEach((item) => {
                // 把src組成陣列傳給php存進資料庫
                const image = item.src;
                imgData.imgList.push(image);
            })

            axios
                .post('api/addPostImgs.php', JSON.stringify(imgData))
                .then(response => {
                    // console.log(response.data);
                    if (response.data != 1) {
                        alert('saveImgToDb Error');
                    }
                })
                .catch(error => {
                    console.log(error);
                });

        },
        friendViewSetting(e) {
            e.target.src = friendViewIconS;
            this.$refs.globalView.src = globalViewIcon;
            this.$refs.privateView.src = privateViewIcon;
            this.friendSelect = true;
            this.globalSelect = false;
            this.privateSelect = false;
            console.log(e.target.value);
        },
        globalViewSetting(e) {
            e.target.src = globalViewIconS;
            this.$refs.friendView.src = friendViewIcon;
            this.$refs.privateView.src = privateViewIcon;
            this.friendSelect = false;
            this.globalSelect = true;
            this.privateSelect = false;
        },
        privateViewSetting(e) {
            e.target.src = privateViewIconS;
            this.$refs.friendView.src = friendViewIcon;
            this.$refs.globalView.src = globalViewIcon;
            this.friendSelect = false;
            this.globalSelect = false;
            this.privateSelect = true;

        }
    },
}
</script>
