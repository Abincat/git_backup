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
                                    <img src="../assets/images/icon/friend-view.svg" alt="" class="" value="friend">
                                    <img src="../assets/images/icon/global-view-select.svg" alt="" class="select"
                                        value="global">
                                    <img src="../assets/images/icon/private-view-select.svg" alt="" class="select"
                                        value="private">
                                </div>
                            </div>
                            <textarea name="" id="post-content" rows="10" placeholder="輸入想說的話"></textarea>
                            <label for="postImg" class="postImg">
                                <span>
                                    新增照片
                                </span>
                                <img src="../assets/images/icon/image.svg" alt="">
                                <input type="file" name="postImg" id="postImg">
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
                            <p>持有金幣${{ "99999" }}</p>
                            <!-- <p>持有金幣${{ "HoldCoins" }}</p> --> <!--金幣值最大五位數-->
                        </div>
                    </div>
                    <div class="my_introduction">
                        <div>
                            <button @click="postShow = !postShow" class="new_post_button Btn">發表新貼文</button>
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
                    <!-- <p>{{ self_introduction }}</p> -->
                    <p>嗨！我是工程師。工作中喜歡挑戰技術極限，<br>
                        業餘時間熱衷極限運動，喜歡攀岩和跳傘。期待在技術和生活中不斷挑戰自己！</p>
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
                    <!-- <span>{{ hobby1 }}</span>
                    <span>{{ hobby2 }}</span>
                    <span>{{ hobby3 }}</span>
                    <span>{{ hobby4 }}</span>
                    <span>{{ hobby5 }}</span> -->
                    <span> constellation </span>
                    <span> job </span>
                    <span> city </span>
                    <span> hobby1 </span>
                    <span> hobby2 </span>
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
                        <button @click="collectionShow = !collectionShow" class="mypage_button">編輯收藏品</button>
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

                <!-------------------------------活動區塊------------------------------->

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
                                    <div class="score_box" :class="add_score ? 'score-box-bg ' : ''">
                                        <div v-if="add_score" class="score">
                                            <div class="star">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button @click="add_score = !add_score" class="mypage_button ">確定</button>
                                        </div>
                                    </div>
                                    <!-- <div class="score">
                                        <div>
                                                <svg :class="{ '-on': task.star >= 1 }"
                                                    @click="$emit('taskStar', $event, index, 1)"
                                                    xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <svg :class="{ '-on': task.star >= 2 }"
                                                    @click="$emit('taskStar', $event, index, 2)"
                                                    xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <svg :class="{ '-on': task.star >= 3 }"
                                                    @click="$emit('taskStar', $event, index, 3)"
                                                    xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <svg :class="{ '-on': task.star >= 4 }"
                                                    @click="$emit('taskStar', $event, index, 4)"
                                                    xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <svg :class="{ '-on': task.star >= 5 }"
                                                    @click="$emit('taskStar', $event, index, 5)"
                                                    xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                        </div> -->


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
                                        <img src="../assets/images/mypage/Finish_icon.png">
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
                                    <img src="../assets/images/icon/good-line.svg" alt="" class="good">
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
                                    <img src="../assets/images/icon/good-line.svg" alt="" class="good">
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
                                    <img src="../assets/images/icon/good-line.svg" alt="" class="good">
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
            collectionShow: false,
            postShow: false,
            add_score: false,
            // taskText: "",
            // tasks: [],
            // selectImg: {}
            selectedBoxes: [],
            maxSelection: 3,
        };
    },

    methods: {
        // taskStar(e, i, star) {
        //     // alert(star);
        //     this.tasks[i].star = star; //取得陣列裡面的物件,改變值
        //     localStorage.setItem("tasks", JSON.stringify(this.tasks)); //把值存入localStorage
        // },

        toggleSelection(index) {
            const selectedIndex = this.selectedBoxes.indexOf(index);

            if (selectedIndex !== -1) {
                // 如果已经选中，取消选择
                this.selectedBoxes.splice(selectedIndex, 1);
            } else {
                // 如果未选中，并且未达到最大选择数，选中
                if (this.selectedBoxes.length < this.maxSelection) {
                    this.selectedBoxes.push(index);
                }
            }
        },
        isSelected(index) {
            return this.selectedBoxes.includes(index);
        },
    }
}
</script>
<style scoped>
.selected-box {
    box-shadow: 0 0 10px #66669A;
}

&svg.-on {
    color: yellow
}
</style>

