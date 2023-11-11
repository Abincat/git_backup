<template>
    <layout>
        <template #section-right-content>

            <main class="million_school_start">
                <div class="top">
                    <div class="left">
                        <img src="../assets/images/million_school/qapalytime.svg" alt="leftPic">
                    </div>
                    <div class="right">
                        <div class="right_top">
                            <span>時間：10秒</span>
                            <span>分數：3分</span>
                            <span>
                                <p>剩餘次數:</p>
                                <p class="heart">❤️❤️❤️</p>
                            </span>

                        </div>
                        <div class="right_down">
                            <h3>哆拉A夢最喜愛的食物是？</h3>
                            <div class="ans">
                                <span>(A)雕魚燒</span>
                                <span>(B)銅鑼燒</span>
                                <span>(C)豬血糕</span>
                                <span>(D)勞贖</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 下方時間條 -->
                <div class="down">
                    <div class="text">
                        10 of 100
                    </div>
                    <div class="bar">
                        <div class="bar-color"></div>
                    </div>
                </div>



                <!-- <router-link class="mil-link" :to="{ name: 'million_school_start' }"> start</router-link> -->

            </main>
        </template>
    </layout>
</template>
<script>
//import 這頁需要的元件
import layout from '@/components/layout.vue'

export default {
    components: {
        layout
    }
}
</script>