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
                        <router-link :to="{ name: buy_coin }">
                            <button class="mypage_button">購買金幣</button>
                        </router-link>
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
                            <img :class="head_sticker_img" src="../assets/images/mypage/TibameCAT.jpg" alt="head_sticker">
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

                            <button class="Btn">＋加朋友</button>

                            <div>
                                <button @click="postShow = !postShow" class="new_post_button_RWD Btn">發表新貼文</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mypage_info">
                    <label class="mypage_button Btn">
                        <span>更換大頭貼</span>
                        <input type="file" class="upload_photos_input">
                    </label>
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
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('SSR_git') }"
                                            @click="toggleSelection('SSR_git')" src="../assets/images/mypage/SSR_git.png"
                                            alt="">
                                        <h6>Git王</h6>
                                    </div>
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('SSR_MySQL') }"
                                            @click="toggleSelection('SSR_MySQL')"
                                            src="../assets/images/mypage/SSR_MySQL.png" alt="">
                                        <h6>DBA大哥</h6>
                                    </div>
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('SSR_vue') }"
                                            @click="toggleSelection('SSR_vue')" src="../assets/images/mypage/SSR_vue.png"
                                            alt="">
                                        <h6>YYDS</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>SR</h2>
                                <div class="collection_list">
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('SR_html') }"
                                            @click="toggleSelection('SR_html')" src="../assets/images/mypage/SR_html.png"
                                            alt="">
                                        <h6>建築師</h6>
                                    </div>
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('SR_CSS') }"
                                            @click="toggleSelection('SR_CSS')" src="../assets/images/mypage/SR_CSS.png"
                                            alt="">
                                        <h6>裝潢師</h6>
                                    </div>
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('SR_js') }"
                                            @click="toggleSelection('SR_js')" src="../assets/images/mypage/SR_js.png"
                                            alt="">
                                        <h6>邏輯大師</h6>
                                    </div>
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('SR_gasp') }"
                                            @click="toggleSelection('SR_gasp')" src="../assets/images/mypage/SR_gasp.png"
                                            alt="">
                                        <h6>動畫超人</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>R</h2>
                                <div class="collection_list">
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('R_game') }"
                                            @click="toggleSelection('R_game')" src="../assets/images/mypage/R_game.png"
                                            alt="">
                                        <h6>遊戲王</h6>
                                    </div>
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('R_unicorn') }"
                                            @click="toggleSelection('R_unicorn')"
                                            src="../assets/images/mypage/R_unicorn.png" alt="">
                                        <h6>白日夢</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>N</h2>
                                <div class="collection_list">
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('N_OK') }"
                                            @click="toggleSelection('N_OK')" src="../assets/images/mypage/N_OK.png" alt="">
                                        <h6>職場小尖兵</h6>
                                    </div>
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('N_TropicalFish') }"
                                            @click="toggleSelection('N_TropicalFish')"
                                            src="../assets/images/mypage/N_TropicalFish.png" alt="">
                                        <h6>熱帶魚</h6>
                                    </div>
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('N_saltedFish') }"
                                            @click="toggleSelection('N_saltedFish')"
                                            src="../assets/images/mypage/N_saltedFish.png" alt="">
                                        <h6>鹹魚</h6>
                                    </div>
                                    <div class="collection_detailed">
                                        <img :class="{ 'selected-box': isSelected('N_tilapiaFish') }"
                                            @click="toggleSelection('N_tilapiaFish')"
                                            src="../assets/images/mypage/N_tilapiaFish.png" alt="">
                                        <h6>吳郭魚</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collection_window_summit">
                            <button @click="collectionShow = !collectionShow" class="mypage_button Btn">確定</button>
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
                        <button @click="collectionShow = !collectionShow" class="mypage_button">編輯收藏品</button>
                        <div class="my_collect_title">
                            <span>我的收藏</span>
                            <hr>
                        </div>
                        <div class="collect">
                            <div class="collectA"></div>
                            <div class="collectB"></div>
                            <div class="collectC"></div>
                        </div>
                    </div>
                </div>

                <!-------------------------------活動區塊------------------------------->
                <!-- <editActivityScore></editActivityScore> -->
                <div class="life">
                    <div class="activity">
                        <div class="activity_list">
                            <h4>即將開始的活動</h4>
                            <!-- <span>{{ activity_name }}</span>
                            <p>{{ activity_day }}</p> -->
                            <span>活動名稱</span>
                            <p>日期</p>
                        </div>
                        <div class="past_activity">
                            <div class="past_activity_title">
                                <span>歷史活動</span>
                            </div>
                            <ul class="past_activity_list">

                                <li v-for="(activityItem, index) in activityItems">
                                    <p>{{ activityItem.name }}</p>
                                    <div class="score_box">
                                        <div class="score">
                                            <div class="star_box">
                                                <div v-for="(score, dIndex) in scores" :key="index">
                                                    <svg class="star" :class="{ 'light': dIndex < activityItem.star }"
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
                                <!-- <li>
                                    <p>活動名稱</p>
                                    <button class="mypage_button">待評分</button>
                                </li>
                                <li class="cancel_activity">
                                    <p>活動名稱</p>
                                    <button class="mypage_button">已取消報名</button>
                                </li> -->
                            </ul>
                        </div>
                    </div>


                    <!-------------------------------任務區塊------------------------------->

                    <div class="mission_board">
                        <ul class="mission_list">
                            <h4>今日任務</h4>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img src="../assets/images/mypage/Finish_icon.png">
                                    </div>
                                    <p>每日登入獎勵</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+10</p>
                                </div>
                            </li>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img src="../assets/images/mypage/unFinish_icon.png">
                                    </div>
                                    <p>流浪一次</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+10</p>
                                </div>
                            </li>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img src="../assets/images/mypage/unFinish_icon.png">
                                    </div>
                                    <p>貪食蛇或百萬小學堂遊玩一次</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+10</p>
                                </div>
                            </li>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img src="../assets/images/mypage/unFinish_icon.png">
                                    </div>
                                    <p>大廳聊天一次</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+10</p>
                                </div>
                            </li>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img src="../assets/images/mypage/unFinish_icon.png">
                                    </div>
                                    <p>發表公開新貼文</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+10</p>
                                </div>
                            </li>
                        </ul>
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

import { useUserStore } from '@/store/user';

export default {
    components: {
        layout,
        postItem,
        addPost,
        editActivityScore
    },

    data() {
        return {
            collectionShow: false,
            postShow: false,
            add_score: false,
            selectedBoxes: [],
            maxSelection: 3,
            id: '11',
            hold_coins: '',
            star: false,
            scores: Array(5).fill(null),
            activityItems: [{
                name: "活動名稱A",
                star: 0,
            }, {
                name: "活動名稱B",
                star: 3,
            }, {
                name: "活動名稱C",
                star: 5,
            }],
            //buttonColor: false,
        };
    },
    created() {
        //載入頁面時先讀取用戶資訊填在input裡
        this.getData();
    },
    methods: {
        async getData() {
            axios.post("api/member_information.php", { id: this.id }).then((resData) => {
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

            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            })
        },
        light() {
            this.star = true;
        },
        addScore(e) {
            console.log(e.target.value)
        },

        // light(e, i, star) {
        //     //alert("ss");
        //     this.activityItem[i].star = star;
        // },


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
    },
    mounted() {
        //取得會員資料
        const userStore = useUserStore();

        this.userData = {
            userId: userStore.userID,
            userName: userStore.userName,
            userImg: userStore.userImg,
        }
        this.getPostItems();
    },
}
</script>
