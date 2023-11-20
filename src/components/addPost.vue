<template>
    <div class="add-post-block">
        <div class="add-block-title">
            <h5 class="post-edit-title">發表貼文</h5>
            <div class="post-view-setting">
                <img ref="friendViewSetting" src="../assets/images/icon/friend-view.svg" alt="" :class="{ select: false }"
                    value="friend" @click="friendViewSetting">
                <img ref="globalViewSetting" src="../assets/images/icon/global-view.svg" alt="" :class="{ select: false }"
                    value="global" @click="globalViewSetting">
                <img ref="privateViewSetting" src="../assets/images/icon/private-view.svg" alt="" :class="{ select: false }"
                    value="private" @click="privateViewSetting">
            </div>
        </div>
        <textarea name="" id="post-content" rows="10" placeholder="輸入想說的話" ref="addPostContent"></textarea>
        <div class="add-images-block" v-if="addImages">
            <div class="add-post-images" v-for="(image, index) in addImages" :key="index">
                <img src="../assets/images/icon/reject.svg" alt="delete icon" class="delete-img" @click="deleteImg(index)">
                <img :src="image.img" alt="">
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
export default {
    data() {
        return {
            addImages: [],
            post: {},
            keepBlock: false,
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
                    console.log(this.$refs.addPostContent.value);
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
                            fileName: file.name,
                            img: e.target.result
                        }
                        this.addImages.push(imgInfo);
                    };

                    reader.readAsDataURL(file);
                });
            }
        },
        addPost() {
            const postContent = this.$refs.addPostContent.value;

            this.post.content = postContent;

            console.log(this.addImages);
            console.log(this.post);


        },
        friendViewSetting() {

        },
        globalViewSetting() {

        },
        privateViewSetting() {

        }
    },
}
</script>
