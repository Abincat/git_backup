<template>
    <layout>
        <template #section-right-content>

            <div class="activity">
                <!-- activity banner -->
                <div class="banner">
                    <div class="banner-top">
                        <!-- 主頁區 -->
                        <div class="top-text">
                            <div class="title">主題活動</div>
                            <div class="sub-title">Let's join us!</div>
                            <div class="sub-title">與好友線上實體一起玩樂</div>

                        </div>
                    </div>
                    <div class="banner-search">
                        <!-- 搜尋欄 -->
                        <div class="search-container">
                            <form method="" action="" class="form">
                                <button type="submit"><img src="../assets/images/activity/search.svg" alt=""></button>
                                <input type="text" placeholder="輸入活動名稱、日期" name="search">

                            </form>
                        </div>
                        <div class="search-pic">
                            <img src="../assets/images/activity/party friend.png" alt="">

                        </div>
                    </div>
                    <div class="banner-pic">
                        <!-- 圖片 -->
                    </div>

                </div>

                <!-- hot topic bar -->
                <div class="sub-bar">
                    <div>熱門主題</div>
                </div>
                <!-- topic card
                <div class="topic-container">
                    <div class="cards">
                    <div class="arrow" @click="changeCardContent(true)">
                        <img src="../assets/images/activity/icon_leftarrow.svg" alt="">
                    </div>

                    <router-link v-for="(card, index) in topicCards" :key="index" :to="{ name: 'activity_info' }" class="card" v-show="shouldShowCard(index)">
                        <div class="card-pic">
                        <img :src="card.image" alt="">
                        <div class="location">
                            <img src="../assets/images/activity/location.svg" alt="">
                            <div class="text">{{ card.location }}</div>
                        </div>
                        </div>
                        <div class="card-details">
                        <div class="card-details-title">{{ card.title }}</div>
                        <div class="card-details-info">
                            <img src="../assets/images/activity/calendar.svg" alt="">
                            <div>{{ card.date }}</div>
                        </div>
                        <div class="card-details-info">
                            <img src="../assets/images/activity/group.svg" alt="">
                            <div>{{ card.remainingSlots }}</div>
                        </div>
                        </div>
                    </router-link>

                    <div class="arrow" @click="changeCardContent(false)">
                        <img src="../assets/images/activity/icon_rightarrow.svg" alt="">
                    </div>
                    <div class="more">
                        查看更多 +
                    </div>
                    </div>
                </div> -->
                <!-- 原本的topic card -->
                <div class="topic-container">
                    <div class="cards">
                        <div class="arrow">
                            <img src="../assets/images/activity/icon_leftarrow.svg" alt="">
                        </div>

                        <router-link :to="{ name: 'activity_info' }" class="card">
                            <div class="card-pic">
                                <img src="../assets/images/activity/music-fes.jpg" alt="">
                                <div class="location">
                                    <img src="../assets/images/activity/location.svg" alt="">
                                    <div class="text">北台灣，宜蘭</div>
                                </div>
                            </div>
                            <div class="card-details">
                                <div class="card-details-title">
                                    夏日音樂祭
                                </div>
                                <div class="card-details-info">
                                    <img src="../assets/images/activity/calendar.svg" alt="">
                                    <div>2023/12/25</div>
                                </div>
                                <div class="card-details-info">
                                    <img src="../assets/images/activity/group.svg" alt="">
                                    <div>剩餘5位名額</div>
                                </div>

                            </div>
                        </router-link>
                        <router-link :to="{ name: 'activity_info' }" class="card">
                            <div class="card-pic">
                                <img src="../assets/images/activity/music-fes.jpg" alt="">
                                <div class="location">
                                    <img src="../assets/images/activity/location.svg" alt="">
                                    <div class="text">北台灣，宜蘭</div>
                                </div>
                            </div>
                            <div class="card-details">
                                <div class="card-details-title">
                                    夏日音樂祭
                                </div>
                                <div class="card-details-info">
                                    <img src="../assets/images/activity/calendar.svg" alt="">
                                    <div>2023/12/25</div>
                                </div>
                                <div class="card-details-info">
                                    <img src="../assets/images/activity/group.svg" alt="">
                                    <div>剩餘5位名額</div>
                                </div>

                            </div>
                        </router-link>
                        <router-link :to="{ name: 'activity_info' }" class="card">
                            <div class="card-pic">
                                <img src="../assets/images/activity/music-fes.jpg" alt="">
                                <div class="location">
                                    <img src="../assets/images/activity/location.svg" alt="">
                                    <div class="text">北台灣，宜蘭</div>
                                </div>
                            </div>
                            <div class="card-details">
                                <div class="card-details-title">
                                    夏日音樂祭
                                </div>
                                <div class="card-details-info">
                                    <img src="../assets/images/activity/calendar.svg" alt="">
                                    <div>2023/12/25</div>
                                </div>
                                <div class="card-details-info">
                                    <img src="../assets/images/activity/group.svg" alt="">
                                    <div>剩餘5位名額</div>
                                </div>

                            </div>
                        </router-link>

                        <div class="arrow">
                            <img src="../assets/images/activity/icon_rightarrow.svg" alt="">
                        </div>
                        <div class="more">
                            查看更多 +
                        </div>
                    </div>

                </div>
                <!-- 原本結束 -->

                <!-- activity region bar -->
                <div class="sub-bar">
                    <div>活動地區</div>

                </div>

                <!-- region card -->
                <div class="region-cards">
                    <div class="region-container">

                        <div class="region">
                            <router-link :to="{ name: 'activity_search' }" class="">
                                <div class="region-pic">
                                    <img src="../assets/images/activity/mid-opera.jpeg" alt="">
                                </div>
                                <div class="region-text">北區</div>

                            </router-link>
                        </div>
                        <div class="region">
                            <router-link :to="{ name: 'activity_search' }" class="">
                                <div class="region-pic">
                                    <img src="../assets/images/activity/mid-opera.jpeg" alt="">
                                </div>
                                <div class="region-text">中區</div>

                            </router-link>
                        </div>
                        <div class="region">
                            <router-link :to="{ name: 'activity_search' }" class="">
                                <div class="region-pic">
                                    <img src="../assets/images/activity/mid-opera.jpeg" alt="">
                                </div>
                                <div class="region-text">南區</div>

                            </router-link>
                        </div>
                        <div class="region">
                            <router-link :to="{ name: 'activity_search' }" class="">
                                <div class="region-pic">
                                    <img src="../assets/images/activity/mid-opera.jpeg" alt="">
                                </div>
                                <div class="region-text">離島</div>

                            </router-link>
                        </div>
                    </div>


                </div>

                <!-- upcoming bar -->
                <div class="sub-bar">
                    <div>即將開始</div>

                </div>

                <!-- upcoming card -->
                <div class="upcoming-cards">
                    <div class="upcoming-container">

                        <div class="upcoming">

                            <div class="upcoming-card">
                                <div class="card-pic">

                                    <img src="../assets/images/activity/upcoming-min.png" alt="">
                                </div>
                                <div class="card-detail">
                                    <div class="title">賞櫻季</div>
                                    <div class="date">活動日期：
                                        <span>2024/01/01</span>
                                    </div>
                                    <button class="Btn">提醒我</button>


                                </div>



                            </div>
                            <div class="upcoming-card">
                                <div class="card-pic">
                                    <img src="../assets/images/activity/upcoming-min.png" alt="">
                                </div>
                                <div class="card-detail">
                                    <div class="title">賞櫻季</div>
                                    <div class="date">活動日期：
                                        <span>2024/01/01</span>
                                    </div>
                                    <button class="Btn">提醒我</button>
                                </div>

                            </div>
                            <div class="upcoming-card">
                                <div class="card-pic">
                                    <img src="../assets/images/activity/upcoming-min.png" alt="">
                                </div>
                                <div class="card-detail">
                                    <div class="title">賞櫻季</div>
                                    <div class="date">活動日期：
                                        <span>2024/01/01</span>
                                    </div>
                                    <button class="Btn">提醒我</button>
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
    //     data() {
    //     return {
    //       topicCards: [
    //         // Array of objects with card data
    //         {
    //           title: "夏日音樂祭",
    //           image: "../assets/images/activity/music-fes.jpg",
    //           location: "北台灣，宜蘭",
    //           date: "2023/12/25",
    //           remainingSlots: "剩餘5位名額",
    //         },
    //         {
    //           title: "夏日AAA祭",
    //           image: "../assets/images/activity/music-fes.jpg",
    //           location: "北台灣，宜蘭",
    //           date: "2023/12/25",
    //           remainingSlots: "剩餘5位名額",
    //         },
    //         {
    //           title: "夏日BBB祭",
    //           image: "../assets/images/activity/music-fes.jpg",
    //           location: "北台灣，宜蘭",
    //           date: "2023/12/25",
    //           remainingSlots: "剩餘5位名額",
    //         },
    //         {
    //           title: "夏日CCC祭",
    //           image: "../assets/images/activity/music-fes.jpg",
    //           location: "北台灣，宜蘭",
    //           date: "2023/12/25",
    //           remainingSlots: "剩餘5位名額",
    //         },
    //         {
    //           title: "夏日DDD祭",
    //           image: "../assets/images/activity/music-fes.jpg",
    //           location: "北台灣，宜蘭",
    //           date: "2023/12/25",
    //           remainingSlots: "剩餘5位名額",
    //         },
    //         // Add more cards as needed
    //       ],
    //       currentCardIndex: 0,
    //     };
    //   },
    //   methods: {
    //     changeCardContent(isPrevious) {
    //       if (isPrevious) {
    //         // If moving to the previous card:
    //         this.currentCardIndex = (this.currentCardIndex - 1 + this.topicCards.length) % this.topicCards.length;
    //       } else {
    //         // If moving to the next card:
    //         this.currentCardIndex = (this.currentCardIndex + 1) % this.topicCards.length;
    //       }
    //     },
    //     shouldShowCard(index) {
    //     const cardsPerPage = 3;
    //     const start = this.currentCardIndex;
    //     const end = (start + cardsPerPage - 1) % this.topicCards.length;
    //     return index >= start && index <= end;
    //   },
    //   },
};
</script>