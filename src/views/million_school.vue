<template>
    <layout>
        <template #section-right-content>
            <main class="million_school">

                <div class="member">
                    <div class="playerimg">
                        <img src="../assets/images/playground/player.jpeg" alt="player">
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

                <div class="millionimg">
                    <img src="../assets/images/million_school/qafront.svg" alt="">
                </div>

                <router-link class="mil-link" :to="{ name: 'million_school_start' }">start</router-link>

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