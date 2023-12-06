<template>
    <layout>
        <template #section-right-content>
            <div class="wander">
                <div :class="{ 'start': animationMove }" class="container">
                    <div class="return">
                        <div>
                            <router-link :to="{ name: 'mypage' }">
                                <img src="../assets/images/wander/return_icon.png" alt="return">
                            </router-link>
                        </div>
                    </div>
                    <div class="middle">
                        <h4>流浪倒數{{ minute }}:{{ second }}</h4>
                        <div class="middle_campervan">
                            <div class="echaust">
                                <img :class="{ 'start': dissipateA }" class="echaustA"
                                    src="../assets/images/wander/exhaust.png" alt="echaust">
                                <img :class="{ 'start': dissipateB }" class="echaustB"
                                    src="../assets/images/wander/exhaust.png" alt="echaust">
                            </div>
                            <img :class="{ 'start': animationDrive }" class="campervan"
                                src="../assets/images/wander/campervan.png" alt="campervan">
                        </div>
                        <div class="middle_start">
                            <button @click="start(); limit()" class="start Btn" :class="{ 'limit': cd }"
                                :disabled="countingDown">Start</button>
                        </div>

                    </div>
                    <!--------------- 禮物彈窗 -------------->
                    <div v-if="giftShow" class="gift_blur">
                        <div class="collection_window">
                            <button @click="giftShow = !giftShow">
                                <img class="close" src="../assets/images/wander/X.png">
                            </button>
                            <div class="collection_bg_window">
                                <div class="collection_bg">
                                    <img :src="'data:image;base64,' + gift_img" ref="gift_img" alt="">
                                </div>
                            </div>
                            <div class=" collection_name">
                                <span>恭喜獲得</span>
                                <h4>{{ giftTitle }}</h4>
                            </div>
                        </div>
                    </div>
                    <!--------------- 禮物彈窗end -------------->
                    <!--------------- 陌生人貼文彈窗 -------------->
                    <div v-if="letterShow" class="letter_blur">
                        <div class="letter_window">
                            <button @click="letterShow = !letterShow" class="close_button">
                                <img class="close" src="../assets/images/wander/X.png">
                            </button>
                            <div class="post_img">
                                <img :src="'data:image;base64,' + postImg">
                            </div>
                            <div class="post_information">
                                <div class="avatar">
                                    <!-- <img src="../assets/images/wander/stranger.png"> -->
                                    <img :src="faceImageChange" id="faceImageChange" alt="" ref="faceImageChange">
                                    <img :src="hairImageChange" id="hairImageChange" alt="" ref="hairImageChange">
                                    <img :src="clothImageChange" id="clothImageChange" alt="" ref="clothImageChange">
                                    <img :src="accessoriesImageChange" id="accessoriesImageChange" alt=""
                                        ref="accessoriesImageChange">
                                </div>
                                <div class="post_text">
                                    <p>{{ post.POST_CONTENT }}</p>
                                    <!-- <p>isBeforeNoon ? 'Breakfast' : 'Lunch'<br>
                                        isBeforeNoon ? 'Breakfast' : 'Lunch'<br>
                                        isBeforeNoon ? 'Breakfast' : 'Lunch'</p> -->
                                    <div class="interactive">
                                        <button @click="like" :class="{ 'like': likePost }">按讚</button>
                                        <button @click="addFriend" :class="{ 'addFriend': addHim }">加好友</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--------------- 陌生人貼文彈窗end -------------->
                    <div class="loot">
                        <div class="loot_container">
                            <img @click="readGift" :class="{ 'have': have }" src="../assets/images/wander/gift_icon.png"
                                alt="gift">
                            <div class="notification_container">
                                <div :class="{ 'start': giftRedDot }" class="gift_notify"></div>
                            </div>
                            <img @click="readLetter" :class="{ 'have': have }" src="../assets/images/wander/letter_icon.png"
                                alt="letter">
                            <div class="notification_container">
                                <div :class="{ 'start': giftLetterDot }" class="letter_notify"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </template>
    </layout>
</template>
<script>
//import 這頁需要的元件
import layout from '@/components/layout.vue'
import axios from 'axios'

import { useUserStore } from '@/store/user';

export default {
    components: {
        layout

    },
    data() {
        return {
            animationDrive: false,
            animationMove: false,
            dissipateA: false,
            dissipateB: false,
            giftRedDot: false,
            giftLetterDot: false,
            countingDown: false,
            countdownInterval: null,
            have: false,
            giftShow: false,
            letterShow: false,
            likePost: false,
            addHim: false,
            minute: 59,
            second: 59,
            countdownInterval: null, //時間暫停
            cd: false,
            id: '',
            giftId: '',
            post: '',
            postMemberId: '',
            giftTitle: '',
            faceImageChange: '',
            hairImageChange: '',
            clothImageChange: '',
            accessoriesImageChange: '',
            gift_img: '',
            postImg: ''
        }
    },
    created() {

        //取得會員資料
        const userStore = useUserStore();
        this.id = userStore.userID;

        //載入頁面時先讀取用戶資訊
        this.getData();
    },
    methods: {
        async getData() {
            axios.post("api/member_information.php", { id: this.id }).then((resData) => {
                const id = resData.data[0].MEMBER_ID;
                this.id = resData.data[0].MEMBER_ID;
            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            });
        },
        start() {
            this.animationDrive = true;
            this.animationMove = true;
            this.dissipateA = true;
            this.dissipateB = true;
            // if (this.countdownInterval) { //倒數結束前重複點擊不會有效果-測試期間先註解掉
            //     return;
            // }
            setTimeout(() => {
                if (!this.giftRedDot) {
                    this.giftRedDot = true;
                    this.have = true; //鼠標手手圖示
                }
                if (!this.giftLetterDot) {
                    this.giftLetterDot = true;
                    this.have = true;
                }
            }, 5000);
            // }, 10000);//獎品獲得時間-測試完改回正確數值


            if (this.countdownInterval) {
                clearInterval(this.countdownInterval);
            }

            // 設定倒數計時
            const totalTimeInSeconds = 3599;

            // 開始倒數計時
            let countdown = totalTimeInSeconds;
            this.countdownInterval = setInterval(() => {
                this.minute = Math.floor(countdown / 60);
                this.second = countdown % 60;
                if (countdown === 0) {
                    clearInterval(this.countdownInterval); //倒數計時結束時停止計時器
                    this.animationDrive = false; //倒數結束全部動畫停止
                    this.animationMove = false;
                    this.dissipateA = false;
                    this.dissipateB = false;
                    this.cd = false; //倒數完成按鈕變回藍色
                } else {
                    countdown -= 1;
                }
            }, 5); //快轉
            // }, 1000); //一秒更新一次-測試完改回正確數值
        },

        limit() {
            this.cd = true; //按鈕變成灰色
        },

        //點選之後紅點消除,判斷有紅點才彈窗
        async readGift() {
            if (this.giftRedDot == true) {
                this.giftShow = true;
                this.giftRedDot = false;
            } else {
                this.giftShow = false;
            };

            axios.post("api/gift_card.php", { giftId: this.giftId }).then((resData) => {
                const giftId = resData.data[0].COLLECTION_ID;
                this.giftTitle = resData.data[0].COLLECTION_NAME;
                this.gift_img = resData.data[0].COLLECTION_IMAGE;

                this.giftId = giftId;

                console.log(this.giftId);
            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            });

            const response = await axios.post("api/gift_card_return.php", {
                id: this.id,
                giftId: this.giftId
            });
            console.log(response.data);
        },

        async readLetter() {
            if (this.giftLetterDot == true) {
                this.letterShow = true;
                this.giftLetterDot = false;
            } else {
                this.letterShow = false;
            };

            axios.post("api/post_card.php").then(response => {
                const postId = response.data.secondQuery[0].POST_ID;
                const postMemberId = response.data.secondQuery[0].MEMBER_ID;
                this.post = response.data.firstQuery[0];
                this.postAvatar = response.data.firstQuery[0];
                this.faceImageChange = response.data.firstQuery[0].MEMBER_AVATAR_FACE;
                this.hairImageChange = response.data.firstQuery[0].MEMBER_AVATAR_HAIR;
                this.clothImageChange = response.data.firstQuery[0].MEMBER_AVATAR_CLOTH;
                this.accessoriesImageChange = response.data.firstQuery[0].MEMBER_AVATAR_ACCESSORIES;
                this.postImg = response.data.secondQuery[0].POST_IMAGE;

                this.postId = postId;
                this.postMemberId = postMemberId;
            }).catch(error => {
                console.error("Error fetching data:", error);
            });

            //在加合併蒐集品的程式php
        },

        async addFriend() {
            this.addHim = true;

            const response = await axios.post("api/add_stranger_friend.php", {
                id: this.id,
                postMemberId: this.postMemberId
            });
            console.log(response.data);
        },
        async like() {
            this.likePost = true;

            const response = await axios.post("api/add_thumbs_up.php", {
                id: this.id,
                postId: this.postId
            });
            console.log(response.data); // 可以根據需要處理後端返回的數據

        }
    }
}

</script>