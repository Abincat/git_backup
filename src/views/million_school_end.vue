<template>
    <layout>
        <template #section-right-content>
            <div class="million_school_end">

                <div class="top">
                    <div class="bg_img"></div>

                    <!-- <div class="top_cloth">
                        <img src="../assets/images/million_school/cloth.svg" alt="cloth">
                    </div>

                    <div class="top_fireworks_left">
                        <img src="../assets/images/million_school/fireworks.svg" alt="fireworks">
                    </div>

                    <div class="top_fireworks_right">
                        <img src="../assets/images/million_school/fireworks.svg" alt="fireworks">
                    </div> -->
                    <div class="member">
                    <div class="playerimg">
                        <img src="../assets/images/playground/player.jpeg" alt="player">
                        <div class="banner">
                            <p>遊戲結束</p>
                            
                        </div>
                    </div>

                    <p class="username">Wendy</p>

                    <div class="bottom">
                        <div class="score">

                            <p>最高紀錄</p>
                            <p>98題</p>

                        </div>

                        <div class="rank">
                            <p>排名</p>
                            <p>1</p>
                        </div>
                    </div>

                </div>

                <div class="button">
                    <router-link class="mil-link" :to="{ name: 'million_school_start' }">再來一局</router-link>

                    <router-link class="mil-link" :to="{ name: 'million_school_start' }">遊戲首頁</router-link>
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
    }
}
</script>