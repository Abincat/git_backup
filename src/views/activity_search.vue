<template>
    <layout>
        <template #section-right-content>
            <userinfo></userinfo>
            <div class="activity-search">
                <div class="search-container">

                    <div class="search-result">
                        <div class="result">
                            <img src="../assets/images/icon/search.svg" alt="">
                            <span>搜尋結果</span>
                        </div>
                        <div class="key-word">
                            <span>關鍵字：</span>
                             <span>攀岩</span>

                        </div>
                    </div>
                    <div class="result-cards">
                       
                        <div class="result-card">
                            <div class="result-pic">
                                <img src="../assets/images/activity/climb-1.jpg" alt="">
                                <div class="info">
                                    <img src="../assets/images/activity/location.svg" alt="">
                                    <div>北台灣，宜蘭</div>
                                </div>
                            </div>
                            <div class="result-details">
                                <div class="result-text">
                                    <h3>攀岩好好玩</h3>
                                    <div class="detail">
                                        <img src="../assets/images/activity/calendar-dk.svg" alt="">
                                        <div>2023/12/25</div>
                                    </div>
                                    <div class="detail">
                                        <img src="../assets/images/activity/group-dk.svg" alt="">
                                        <div>名額20人</div>
                                    </div>
                                    <div class="detail">
                                        <img src="../assets/images/activity/dollar.svg" alt="">
                                        <div>1人 $1200 /人</div>
                                    </div>
                                    <div class="detail">
                                        <img src="" alt=" ">
                                        <div>3人 $1000 /人</div>
                                        
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="result-card">
                            <div class="result-pic">
                                <img src="../assets/images/activity/climb-1.jpg" alt="">
                                <div class="info">
                                    <img src="../assets/images/activity/location.svg" alt="">
                                    <div>北台灣，宜蘭</div>
                                </div>
                            </div>
                            <div class="result-details">
                                <div class="result-text">
                                    <h3>攀岩好好玩</h3>
                                    <div class="detail">
                                        <img src="../assets/images/activity/calendar-dk.svg" alt="">
                                        <div>2023/12/25</div>
                                    </div>
                                    <div class="detail">
                                        <img src="../assets/images/activity/group-dk.svg" alt="">
                                        <div>名額20人</div>
                                    </div>
                                    <div class="detail">
                                        <img src="../assets/images/activity/dollar.svg" alt="">
                                        <div>1人 $1200 /人</div>
                                    </div>
                                    <div class="detail">
                                        <img src="" alt=" ">
                                        <div>3人 $1000 /人</div>
                                        
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="result-card">
                            <div class="result-pic">
                                <img src="../assets/images/activity/climb-1.jpg" alt="">
                                <div class="info">
                                    <img src="../assets/images/activity/location.svg" alt="">
                                    <div>北台灣，宜蘭</div>
                                </div>
                            </div>
                            <div class="result-details">
                                <div class="result-text">
                                    <h3>攀岩好好玩</h3>
                                    <div class="detail">
                                        <img src="../assets/images/activity/calendar-dk.svg" alt="">
                                        <div>2023/12/25</div>
                                    </div>
                                    <div class="detail">
                                        <img src="../assets/images/activity/group-dk.svg" alt="">
                                        <div>名額20人</div>
                                    </div>
                                    <div class="detail">
                                        <img src="../assets/images/activity/dollar.svg" alt="">
                                        <div>1人 $1200 /人</div>
                                    </div>
                                    <div class="detail">
                                        <img src="" alt=" ">
                                        <div>3人 $1000 /人</div>
                                        
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
import userinfo from '@/components/userInfo.vue'

export default {
    components: {
        layout,
        userinfo
    }
}
</script>