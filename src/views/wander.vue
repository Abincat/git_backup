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
                                    <img src="../assets/images/wander/SSR_git.png">
                                </div>
                            </div>
                            <div class="collection_name">
                                <span>恭喜獲得</span>
                                <h4>{{ gift.COLLECTION_NAME }}</h4>
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
                                <img src="../assets/images/wander/morning.png">
                            </div>
                            <div class="post_information">
                                <div class="avatar">
                                    <img src="../assets/images/wander/stranger.png">
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
            post: null,
            gift: null
        }
    },
    methods: {
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
            axios.post("api/gift_card.php").then(response => {
                this.gift = response.data[0];
            })
        },

        async readLetter() {
            if (this.giftLetterDot == true) {
                this.letterShow = true;
                this.giftLetterDot = false;
            } else {
                this.letterShow = false;
            };
            axios.post("api/post_card.php").then(response => {
                this.post = response.data[0];
            })
        },

        addFriend() {
            this.addHim = true;
        },
        like() {
            this.likePost = true;
        },

    }
}
</script>