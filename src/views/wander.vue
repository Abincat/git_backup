<template>
    <layoutFull>
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
                        <!-- <h4>流浪倒數{{ minute }}:{{ second }}</h4> -->
                        <h4>流浪倒數59:59</h4>
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
                            <button @click="start" class="start" :disabled="countingDown">Start</button>
                            <!-- <button class="start">{{ 00:00 }}</button> -->
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
                                <h4>Git王</h4>
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
                                    <p>isBeforeNoon ? 'Breakfast' : 'Lunch'<br>
                                        isBeforeNoon ? 'Breakfast' : 'Lunch'<br>
                                        isBeforeNoon ? 'Breakfast' : 'Lunch'</p>
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
                            <img @click="readGift(), giftShow = !giftShow" :class="{ 'have': have }"
                                src="../assets/images/wander/gift_icon.png" alt="gift">
                            <div class="notification_container">
                                <div :class="{ 'start': giftRedDot }" class="gift_notify"></div>
                            </div>
                            <img @click="readLetter(), letterShow = !letterShow" :class="{ 'have': have }"
                                src="../assets/images/wander/letter_icon.png" alt="letter">
                            <div class="notification_container">
                                <div :class="{ 'start': giftLetterDot }" class="letter_notify"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </template>
    </layoutFull>
</template>
<script>
//import 這頁需要的元件
import layoutFull from '@/components/layoutFull.vue'

export default {
    components: {
        layoutFull

    },
    data() {
        return {
            animationDrive: false,
            animationMove: false,
            dissipateA: false,
            dissipateB: false,
            giftRedDot: false,
            giftLetterDot: false,
            minutes: 0,
            seconds: 0,
            countingDown: false,
            countdownInterval: null,
            have: false,
            giftShow: false,
            letterShow: false,
            likePost: false,
            addHim: false,
        }
    },
    methods: {
        start() {
            this.animationDrive = true;
            this.animationMove = true;
            this.dissipateA = true;
            this.dissipateB = true;
            setTimeout(() => {
                this.animationDrive = false;
                this.animationMove = false;
                this.dissipateA = false;
                this.dissipateB = false;
            }, 15000);
            // }, 60000); //測試完改回正確數值
            setTimeout(() => {
                if (!this.giftRedDot) {
                    this.giftRedDot = true;
                    this.have = true; //鼠標手手圖示
                }
                if (!this.giftLetterDot) {
                    this.giftLetterDot = true;
                    this.have = true;
                }
            }, 1000);
            // }, 10000);//測試完改回正確數值
        },


        //點選之後紅點消除
        readGift() {
            this.giftRedDot = false;
        },
        readLetter() {
            this.giftLetterDot = false;
        },

        //要判斷紅點,紅點在才能觸發click彈窗事件
        // giftShow() {
        //     if (this.giftRedDot == true) {
        //         this.giftShow = true;
        //     } else {
        //         this.giftShow = false;
        //     }
        // },

        addFriend() {
            this.addHim = true;
        },
        like() {
            this.likePost = true;
        },


    },
}
</script>