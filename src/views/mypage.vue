<template>
    <layout>
        <template #section-right-content>
            <div class="mypage">

                <!----------------新增貼文彈窗---------------->
                <div v-if="postShow" class="add-post-blur">
                    <div class="add-post" ref="addPostBlock">
                        <div class="add-post-block">
                            <div class="add-block-title">
                                <h5 class="post-edit-title">發表貼文</h5>
                                <div class="post-view-setting">
                                    <img ref="friendView" src="../assets/images/icon/friend-view-select.svg" alt=""
                                        :class="{ select: friendSelect }" value="friend" @click="friendViewSetting($event)">
                                    <img ref="globalView" src="../assets/images/icon/global-view.svg" alt=""
                                        :class="{ select: globalSelect }" value="global" @click="globalViewSetting($event)">
                                    <img ref="privateView" src="../assets/images/icon/private-view.svg" alt=""
                                        :class="{ select: privateSelect }" value="private"
                                        @click="privateViewSetting($event)">
                                </div>
                            </div>
                            <textarea name="" id="post-content" rows="10" placeholder="輸入想說的話"
                                ref="addPostContent"></textarea>
                            <div class="add-images-block" v-if="addImages">
                                <div class="add-post-images" v-for="(image, index) in addImages" :key="index">
                                    <img src="../assets/images/icon/reject.svg" alt="delete icon" class="delete-img"
                                        @click="deleteImg(index)">
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
                                <button class="Btn Btn-light" @click="postShow = !postShow">取消</button>
                                <button class="Btn Btn-dark" @click="postShow = !postShow">發布</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------新增貼文彈窗end---------------->



                <div class="introduction_guided_tour">
                    <div class="property">
                        <!-- <router-link :to="{ name: buy_coin }">
                            <button class="mypage_button">購買金幣</button>
                        </router-link> -->
                        <div>
                            <img src="../assets/images/mypage/gold_coin.png">
                            <p>持有金幣${{ hold_coins }}</p>
                        </div>
                    </div>
                    <div class="my_introduction">
                        <div>
                            <button @click="postShow = !postShow" class="new_post_button Btn">發表新貼文</button>
                        </div>
                        <div class="head_sticker">
                            <img :src="'data:image;base64,' + userImg" ref="head_sticker" alt="head_sticker">
                        </div>
                        <div class="guide_button">
                            <router-link :to="{ name: 'mypage_edit' }">
                                <button class="Btn">個人資料編輯</button>
                            </router-link>

                            <router-link :to="{ name: 'wander' }">
                                <button class="Btn">我要去流浪</button>
                            </router-link>

                            <router-link :to="{ name: 'friends' }">
                                <button class="Btn">好友清單</button>
                            </router-link>

                            <!-- <button class="Btn">＋加朋友</button> -->

                            <div>
                                <button @click="postShow = !postShow" class="new_post_button_RWD Btn">發表新貼文</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mypage_info">
                    <!-- <label class="mypage_button Btn">
                        <span>更換大頭貼</span>
                        <input type="file" class="upload_photos_input" ref="imgInput" accept=".jpg,.png"
                            @change="uploadImg">
                    </label> -->
                    <p>{{ SelfIntroduction }}</p>
                </div>




                <!----------------蒐藏品彈窗---------------->
                <div v-if="collectionShow" class="collection_window_blur">
                    <div class="collection_window">
                        <div class="collection_window_title">
                            <h4>編輯蒐藏品</h4>
                            <button @click="collectionShow = !collectionShow">
                                <img src="../assets/images/mypage/X.png" alt="x">
                            </button>
                        </div>
                        <div class="collection_window_list">
                            <div class="collection_window_Classification">
                                <h2>SSR</h2>
                                <div class="collection_list">
                                    <div v-for="(collection, index) in collections.SSR" :key="index"
                                        class="collection_detailed">
                                        <img :src="collection.ownedImg"
                                            :class="{ 'selected-box': isSelected(collection.collectionID) }"
                                            @click="toggleSelection(collection.collectionID)" alt="">
                                        <h6>{{ collection.title }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>SR</h2>
                                <div class="collection_list">
                                    <div v-for="(collection, index) in collections.SR" :key="index"
                                        class="collection_detailed">
                                        <img :src="collection.ownedImg"
                                            :class="{ 'selected-box': isSelected(collection.collectionID) }"
                                            @click="toggleSelection(collection.collectionID)" alt="">
                                        <h6>{{ collection.title }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>R</h2>
                                <div class="collection_list">
                                    <div v-for="(collection, index) in collections.R" :key="index"
                                        class="collection_detailed">
                                        <img :src="collection.ownedImg"
                                            :class="{ 'selected-box': isSelected(collection.collectionID) }"
                                            @click="toggleSelection(collection.collectionID)" alt="">
                                        <h6>{{ collection.title }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>N</h2>
                                <div class="collection_list">
                                    <div v-for="(collection, index) in collections.N" :key="index"
                                        class="collection_detailed">
                                        <img :src="collection.ownedImg"
                                            :class="{ 'selected-box': isSelected(collection.collectionID) }"
                                            @click="toggleSelection(collection.collectionID)" alt="">
                                        <h6>{{ collection.title }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collection_window_summit">
                            <button @click="collectionShow = !collectionShow, collectionReturn()"
                                class="mypage_button Btn">確定</button>
                        </div>
                    </div>
                </div>
                <!----------------蒐藏品彈窗end---------------->

                <!-------------------------------蒐藏品區塊------------------------------->
                <div class="tag">
                    <span> {{ constellation }} </span>
                    <span> {{ job }} </span>
                    <span> {{ city }} </span>
                    <span> {{ hobbyA }} </span>
                    <span> {{ hobbyB }} </span>
                </div>
                <div class="custom_display">
                    <div class="show_role">
                        <img :src="faceImageChange" class="face character_parts">
                        <img :src="hairImageChange" class="hair character_parts">
                        <img :src="clothImageChange" class="cloth character_parts">
                        <img :src="accessoriesImageChange" class="accessories character_parts">
                        <div class="base_plate"></div>
                    </div>
                    <div class="my_collect">
                        <button @click="collectionShow = !collectionShow, editCollection()"
                            class="mypage_button">編輯收藏品</button>
                        <div class="my_collect_title">
                            <span>我的收藏</span>
                            <hr>
                        </div>
                        <div class="collect">
                            <div class="collectA">
                                <img :src="'data:image;base64,' + exhibit_collection_A" alt="">
                            </div>
                            <div class="collectB">
                                <img :src="'data:image;base64,' + exhibit_collection_B" alt="">
                            </div>
                            <div class="collectC">
                                <img :src="'data:image;base64,' + exhibit_collection_C" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-------------------------------活動區塊------------------------------->
                <!-- <editActivityScore></editActivityScore> -->
                <div class="life">
                    <div class="activity">
                        <div class="activity_list">
                            <h4>即將開始的活動</h4>
                            <span>{{ activity_name }}</span>
                            <p>{{ '活動日期：' + (activity_date ? activity_date : '無活動報名紀錄') }}</p>

                            <!-- <p>{{ '報名時間' + activity_start + '~' + activity_end }}</p> -->
                        </div>
                        <div class="past_activity">
                            <div class="past_activity_title">
                                <span>歷史活動</span>
                            </div>
                            <ul class="past_activity_list">

                                <li v-for="(activityItem, index) in activityItems" :key="index">
                                    <p>{{ activityItem.ACTIVITY_NAME }}</p>
                                    <div class="score_box">
                                        <div class="score">
                                            <div class="star_box">
                                                <div v-for="(starCount, dIndex) in scores" :key="dIndex">
                                                    <svg class="star" :class="{ 'light': dIndex < starCount }"
                                                        @click="light" xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button :value="index" @click="addScore($event)"
                                                class="mypage_button">修改</button>
                                        </div>
                                    </div>
                                </li>
                                <p v-if="activityItems.length === 0">無歷史紀錄</p>
                            </ul>
                        </div>
                    </div>


                    <!-------------------------------任務區塊------------------------------->

                    <div class="mission_board">
                        <missionList></missionList>
                    </div>
                </div>


                <!-------------------------------貼文區塊------------------------------->
                <div class="page-post">
                    <div class="post-items">
                        <postItem></postItem>
                    </div>
                </div>
            </div>
        </template>
    </layout>
</template>


<script>
//import 這頁需要的元件
import layout from '@/components/layout.vue'
import postItem from '@/components/postItem.vue'
import addPost from '@/components/addPost.vue'
import editActivityScore from '@/components/editActivityScore.vue'
import missionList from '@/components/missionList.vue'

import { useUserStore } from '@/store/user';

export default {
    components: {
        layout,
        postItem,
        addPost,
        editActivityScore,
        missionList
    },

    data() {
        return {
            collectionShow: false,
            postShow: false,
            add_score: false,
            selectedBoxes: [],
            maxSelection: 3,
            id: '',
            hold_coins: '',
            star: false,
            constellation: '',
            job: '',
            city: '',
            hobbyA: '',
            hobbyB: '',
            SelfIntroduction: '',
            faceImageChange: '',
            hairImageChange: '',
            clothImageChange: '',
            accessoriesImageChange: '',
            userImg: '',
            collectionID: '',
            activityId: '',
            activity_name: '',
            ACTIVITY_NAME: '',
            activity_start: '',
            activity_end: '',
            activity_img: '',
            activity_date: '',
            exhibit_collection_A: '',
            exhibit_collection_B: '',
            exhibit_collection_C: '',
            // isUpload: false,
            scores: Array(5).fill(null),
            activityItems: [],
            scores: [],
            //buttonColor: false,
            collections: {
                SSR: [],
                SR: [],
                R: [],
                N: []
            }
        };
    },
    created() {
        //取得會員資料
        const userStore = useUserStore();
        this.id = userStore.userID;

        //載入頁面時先讀取用戶資訊填在input裡
        this.getData();
    },
    methods: {
        async getData() {
            axios.post("api/member_information.php", { id: this.id }).then((resData) => {
                // const member_id = resData.data[0].MEMBER_ID;
                this.constellation = resData.data[0].MEMBER_CONSTELLATION;
                this.job = resData.data[0].MEMBER_JOB;
                this.city = resData.data[0].MEMBER_CITY;
                this.hobbyA = resData.data[0].MEMBER_HOBBY_TEXT_A;
                this.hobbyB = resData.data[0].MEMBER_HOBBY_TEXT_B;
                this.SelfIntroduction = resData.data[0].MEMBER_INTRODUCE;
                this.faceImageChange = resData.data[0].MEMBER_AVATAR_FACE;
                this.hairImageChange = resData.data[0].MEMBER_AVATAR_HAIR;
                this.clothImageChange = resData.data[0].MEMBER_AVATAR_CLOTH;
                this.accessoriesImageChange = resData.data[0].MEMBER_AVATAR_ACCESSORIES;
                this.hold_coins = resData.data[0].MEMBER_COIN;
                this.userImg = resData.data[0].MEMBER_PIC;
            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            });
            axios.post("api/coming_soon_activity.php", { id: this.id }).then((resData) => {
                this.activity_name = resData.data[0].ACTIVITY_NAME;
                this.activity_date = resData.data[0].ACTIVITY_DATE;
                this.activity_start = resData.data[0].ACTIVITY_STARTDATE;
                this.activity_end = resData.data[0].ACTIVITY_ENDDATE;
                this.activity_img = resData.data[0].ACTIVITY_ACTIVITY_IMAGE;
            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            });
            axios.post("api/history_activity.php", { id: this.id }).then((resData) => {
                this.activityItems = resData.data;
                // this.activityItem.name = resData.data.ACTIVITY_NAME;
            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            });
            axios.post("api/member_collection_exhibit.php", { id: this.id }).then((resData) => {

                this.exhibit_collection_A = resData.data[0]['COLLECTION_IMAGE'];
                this.exhibit_collection_B = resData.data[1]['COLLECTION_IMAGE'];
                this.exhibit_collection_C = resData.data[2]['COLLECTION_IMAGE'];
                console.log(resData.data);

            }).catch((e) => {
                console.log(e);
            });
        },
        light() {
            this.star = true;
        },
        addScore(e) {
            console.log(e.target.value)
        },

        //判斷星星是否有更動過,如果有更動過的話按紐更換顏色並改變顯示的字
        //         if(star[i] > 0){
        //     this.buttonColor = true;
        // },

        toggleSelection(index) {
            const selectedIndex = this.selectedBoxes.indexOf(index);

            if (selectedIndex !== -1) {
                // 如果已經選中,取消選擇
                this.selectedBoxes.splice(selectedIndex, 1);
            } else {
                // 如果未選中,並且未達到最大選擇數,選中
                if (this.selectedBoxes.length < this.maxSelection) {
                    this.selectedBoxes.push(index);
                }
            }
        },
        isSelected(index) {
            return this.selectedBoxes.includes(index);

        },

        editCollection() {
            axios.post("api/member_collection.php", { id: this.id }).then((resData) => {
                // 清空舊有資料
                this.collections.SSR = [];
                this.collections.SR = [];
                this.collections.R = [];
                this.collections.N = [];

                // 分類資料
                resData.data.forEach(collection => {
                    const formattedCollection = {
                        title: collection.COLLECTION_NAME,
                        ownedImg: 'data:image;base64,' + collection.COLLECTION_IMAGE,
                        collectionID: collection.COLLECTION_ID
                    };

                    switch (collection.COLLECTION_LEVEL) {
                        case 'SSR':
                            this.collections.SSR.push(formattedCollection);
                            break;
                        case 'SR':
                            this.collections.SR.push(formattedCollection);
                            break;
                        case 'R':
                            this.collections.R.push(formattedCollection);
                            break;
                        case 'N':
                            this.collections.N.push(formattedCollection);
                            break;
                        default:
                            break;
                    }
                });
                console.log(this.collections);
            }).catch((e) => {
                console.log(e);
            });
        },
        async collectionReturn() {
            const collectionIDs = this.selectedBoxes;
            for (let index = 0; index < this.selectedBoxes.length; index++) {
                const id = this.selectedBoxes[index];
                const response = await axios.post("api/member_collection_return.php", {
                    id: this.id,
                    collectionID: id,
                    collectionIDs: collectionIDs,
                });
                console.log(response.data);
            }
            // 在這裡清空selectedBoxes
            this.selectedBoxes = [];

            // 存檔後再次呼叫展示
            axios.post("api/member_collection_exhibit.php", { id: this.id }).then((resData) => {
                this.exhibit_collection_A = resData.data[0]['COLLECTION_IMAGE'];
                this.exhibit_collection_B = resData.data[1]['COLLECTION_IMAGE'];
                this.exhibit_collection_C = resData.data[2]['COLLECTION_IMAGE'];
                console.log(resData.data);
            }).catch((e) => {
                console.log(e);
            });
        }



    }

}



</script>
