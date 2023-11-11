<template>
    <layout>
        <template #section-right-content>
            <userinfo></userinfo>
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

               <!-- topic card -->
               <div class="topic-container">
                <div class="cards">
                    <div class="arrow">
                        <img src="../assets/images/activity/icon_leftarrow.svg" alt="">
                    </div>

                    <a href="" class="card">
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
                    </a>
                    <a href="" class="card">
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
                    </a>
                    <a href="" class="card">
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
                    </a>

                    <div class="arrow">
                        <img src="../assets/images/activity/icon_rightarrow.svg" alt="">
                    </div>
                </div>

               </div>

               <!-- activity region bar -->
               <div class="sub-bar">
                    <div>活動地區</div>

               </div>

               <!-- region card -->
               <div class="region-cards">
                <!-- region-card -->
                    <div class="region">
                        <a href="" class="">
                            <div class="region-pic">
                                <img src="../assets/images/activity/101.jpeg" alt="">
                            </div>
                            <div class="region-text">北區</div>
                                
                        </a>
                    </div>
                    <div class="region">
                        <a href="" class="">
                            <div class="region-pic">
                                <img src="../assets/images/activity/mid-opera.jpeg" alt="">
                            </div>
                            <div class="region-text">中區</div>
                                
                        </a>
                    </div>
                    <div class="region">
                        <a href="" class="">
                            <div class="region-pic">
                                <img src="../assets/images/activity/mid-opera.jpeg" alt="">
                            </div>
                            <div class="region-text">南區</div>
                                
                        </a>
                    </div>
                    <div class="region">
                        <a href="" class="">
                            <div class="region-pic">
                                <img src="../assets/images/activity/mid-opera.jpeg" alt="">
                            </div>
                            <div class="region-text">離島</div>
                                
                        </a>
                    </div>
                    

               </div>

               <!-- upcoming bar -->
               <div class="sub-bar">
                    <div>即將開始</div>

               </div>

               <!-- upcoming card -->
               <div class="upcoming-cards">
                    <div class="upcoming-card">
                        <div class="card-pic">
                        
                            <img src="../assets/images/activity/upcoming-min.png" alt="">
                        </div>
                        <div class="card-detail">
                            <div class="title">賞櫻季</div>
                            <div class="date">活動日期：
                                <span>2024/01/01</span>
                            </div>
                            <button>提醒我</button>
                            

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
                            <button>提醒我</button>
                        </div>
                    
                    </div>
                    <!-- <div class="upcoming-card">
                        <div class="card-pic">
                            <img src="../assets/images/activity/upcoming-min.png" alt="">
                        </div>    
                        <div class="card-detail">
                            <div class="title">賞櫻季</div>
                            <div class="date">活動日期：
                                <span>2024/01/01</span>
                            </div>
                            <button>提醒我</button>
                        </div>
                    </div> -->
                    <!-- <div class="upcoming-card">
                        <div class="card-pic">
                            <img src="../assets/images/activity/upcoming-min.png" alt="">
                        </div>    
                        <div class="card-detail">
                            <div class="title">賞櫻季</div>
                            <div class="date">活動日期：
                                <span>2024/01/01</span>
                            </div>
                            <button class="bgc">提醒我</button>
                        </div>
                    
                    </div> -->
                    
               </div>

               <!-- <div class="wish">
                    許願池
               </div> -->
               <div class="contact">
                <div class="img-container">

                    <img src="../assets/images/activity/icon_question.svg" alt="">
                </div>
               </div>
                
            </div>
        </template>
    </layout>
</template>
<script>
//import 這頁需要的元件

import layout from '@/components/layout.vue'
import userinfo from '@/components/userInfo.vue'

export default {
    components: {
        layout,
        userinfo
    }
}
</script>