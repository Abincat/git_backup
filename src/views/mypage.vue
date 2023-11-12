<template>
    <layout>
        <template #section-right-content>
            <div class="mypage">
                <div class="introduction_guided_tour">
                    <div class="property">
                        <router-link :to="{ name: buy_coin }">
                            <button class="mypage_button">購買金幣</button>
                        </router-link>
                        <div>
                            <img src="../assets/images/mypage/gold_coin.png">
                            <p>持有金幣${{ "99999" }}</p>
                            <!-- <p>持有金幣${{ "HoldCoins" }}</p> --> <!--金幣值最大五位數-->
                        </div>
                    </div>
                    <div class="my_introduction">
                        <div>
                            <button class="new_post_button Btn">發表新貼文</button>
                        </div>
                        <div class="head_sticker">
                            <!-- <img :class="head_sticker" src="{{ headSticker }}" id="head_sticker" alt="head_sticker"> -->
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
                        </div>
                    </div>
                </div>

                <div class="mypage_info">
                    <label class="mypage_button Btn">
                        <span>更換大頭貼</span>
                        <input type="file" class="upload_photos_input">
                    </label>
                    <!-- <p>{{ self_introduction }}</p> -->
                    <p>嗨！我是工程師。工作中喜歡挑戰技術極限，<br>
                        業餘時間熱衷極限運動，喜歡攀岩和跳傘。期待在技術和生活中不斷挑戰自己！</p>
                </div>


                <!----------------蒐藏品彈窗---------------->
                <div class="collection_window_blur">
                    <div class="collection_window">
                        <div class="collection_window_title">
                            <h4>編輯蒐藏品</h4>
                            <img src="../assets/images/mypage/X.png" alt="x">
                        </div>
                        <div class="collection_window_list">
                            <div class="collection_window_Classification">
                                <h2>SSR</h2>
                                <div class="collection_list">
                                    <img @click="select('SSR_git')" src="../assets/images/mypage/SSR_git.png" alt="">
                                    <img @click="select('SSR_My_SQL')" src="../assets/images/mypage/SSR_MySQL.png" alt="">
                                    <img @click="select('SSR_vue')" src="../assets/images/mypage/SSR_vue.png" alt="">
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>SR</h2>
                                <div>
                                    <img src="../assets/images/mypage/SR_html.png" alt="">
                                    <img src="../assets/images/mypage/SR_CSS.png" alt="">
                                    <img src="../assets/images/mypage/SR_js.png" alt="">
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>R</h2>
                                <div>
                                    <img src="../assets/images/mypage/R_game.png" alt="">
                                    <img src="../assets/images/mypage/R_unicorn.png" alt="">
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>N</h2>
                                <div>
                                    <img src="../assets/images/mypage/N_OK.png" alt="">
                                    <img src="../assets/images/mypage/N_cion.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collection_window_summit">
                            <button class="mypage_button Btn">確定</button>
                        </div>
                    </div>
                </div>
                <!----------------蒐藏品彈窗---------------->


                <div class="tag">
                    <!-- <span>{{ hobby1 }}</span>
                    <span>{{ hobby2 }}</span>
                    <span>{{ hobby3 }}</span>
                    <span>{{ hobby4 }}</span>
                    <span>{{ hobby5 }}</span> -->
                    <span> hobby1 </span>
                    <span> hobby2 </span>
                    <span> hobby3 </span>
                    <span> hobby4 </span>
                    <span> hobby5 </span>
                </div>
                <div class="custom_display">
                    <div class="show_role">
                        <!-- <div class="face">{{ face }}</div>
                        <div class="hair">{{ hair }}</div>
                        <div class="cloth">{{ cloth }}</div>
                        <div class="accessories">{{ accessories }}</div> -->
                        <div class="face character_parts"></div>
                        <div class="hair character_parts"></div>
                        <div class="cloth character_parts"></div>
                        <div class="accessories character_parts"></div>
                        <div class="base_plate"></div>
                    </div>
                    <div class="my_collect">
                        <button class="mypage_button">編輯收藏品</button>
                        <div class="my_collect_title">
                            <span>我的收藏</span>
                            <hr>
                        </div>
                        <div class="collect">
                            <!-- <div class="collectA">{{ collectA }}</div>
                            <div class="collectB">{{ collectB }}</div>
                            <div class="collectC">{{ collectC }}</div> -->
                            <div class="collectA"></div>
                            <div class="collectB"></div>
                            <div class="collectC"></div>
                        </div>
                    </div>
                </div>

                <!----------------任務與活動區塊---------------->

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
                                <li>
                                    <p>活動名稱</p>
                                    <button class="mypage_button score">評分</button>
                                </li>
                                <li>
                                    <p>活動名稱</p>
                                    <button class="mypage_button">待評分</button>
                                </li>
                                <li class="cancel_activity">
                                    <p>活動名稱</p>
                                    <button class="mypage_button">已取消報名</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mission_board">
                        <ul class="mission_list">
                            <!--用v-for迴圈跑item-->
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
                                    <p>每日登入獎勵</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+10</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!----------------貼文區塊---------------->
                <div class="page-post">
                    <div class="post-items">
                        <div class="post-item">
                            <div class="post-user-info">
                                <div class="post-user-image">
                                    <img src="../assets/images/user/userimage-g.png" alt="">
                                </div>
                                <div class="post-user-time">
                                    <p class="user-name">林小美</p>
                                    <p class="user-post-time">2023/10/25</p>
                                </div>
                            </div>
                            <div class="post-content">
                                <p>
                                    今天天氣真好
                                </p>
                            </div>
                            <div class="post-images"></div>
                            <div class="post-feedback">
                                <div class="good-block">
                                    <img src="../assets/images/icon/good-line.svg" alt="">
                                    <p class="good-nums">123</p>
                                    <p>人</p>
                                </div>
                                <div class="reply-block">
                                    <img src="../assets/images/icon/message.svg" alt="">
                                    <p class="reply-nums">123</p>
                                    <p>則</p>
                                </div>
                            </div>
                            <div class="post-reply">
                                <div class="replied">
                                    <div class="user-image">
                                        <img src="../assets/images/user/userimage.png" alt="">
                                    </div>
                                    <div class="replied-message">
                                        <div class="user-name">王小明</div>
                                        <div class="content">
                                            <div class="text">好棒的天氣啊啊啊</div>
                                            <div class="replied-time">2023/10/10 23:59:59</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="reply-message">
                                    <div class="user-image">
                                        <img src="../assets/images/user/userimage.png" alt="">
                                    </div>
                                    <div class="reply-input">
                                        <input type="text">
                                        <button type="button"><img src="../assets/images/icon/submit.svg" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="post-user-info">
                                <div class="post-user-image">
                                    <img src="../assets/images/user/userimage-g.png" alt="">
                                </div>
                                <div class="post-user-time">
                                    <p class="user-name">林小美</p>
                                    <p class="user-post-time">2023/10/25</p>
                                </div>
                            </div>
                            <div class="post-content">
                                <p>
                                    今天天氣真好
                                </p>
                            </div>
                            <div class="post-images"></div>
                            <div class="post-feedback">
                                <div class="good-block">
                                    <img src="../assets/images/icon/good-line.svg" alt="">
                                    <p class="good-nums">123</p>
                                    <p>人</p>
                                </div>
                                <div class="reply-block">
                                    <img src="../assets/images/icon/message.svg" alt="">
                                    <p class="reply-nums">123</p>
                                    <p>則</p>
                                </div>
                            </div>
                            <div class="post-reply">
                                <div class="replied">
                                    <div class="user-image">
                                        <img src="../assets/images/user/userimage.png" alt="">
                                    </div>
                                    <div class="replied-message">
                                        <div class="user-name">王小明</div>
                                        <div class="content">
                                            <div class="text">好棒的天氣啊啊啊</div>
                                            <div class="replied-time">2023/10/10 23:59:59</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="reply-message">
                                    <div class="user-image">
                                        <img src="../assets/images/user/userimage.png" alt="">
                                    </div>
                                    <div class="reply-input">
                                        <input type="text">
                                        <button type="button"><img src="../assets/images/icon/submit.svg" alt=""></button>
                                    </div>
                                </div>
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

export default {
    components: {
        layout
    },
    data() {
        return {
            selectImg: {}
        };
    },

    methods: {
        select(imageName) {
            console.log(`Selected image: ${imageName}`);
        }
    }
}
</script>

