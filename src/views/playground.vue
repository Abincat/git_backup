<template>
    <layout>
        <template #section-right-content>
            <main class="playground">
                <div class="banner">
                    <section class="left">
                        <h1>遊樂場</h1>
                        <p>經典復古小遊戲 免費無限暢玩</p>
                        <p>打敗名人榜 成為小遊戲小天才</p>
                    </section>
                    <section class="right">
                        <img src="../assets/images/playground/player2.svg" alt="">
                    </section>
                </div>
                <div class="intro">
                    <div class="left-img">
                        <img src="../assets/images/playground/5281748 1.svg" alt="">
                    </div>
                    <div class="right-content">
                        <h2>百萬小學堂 Quiz</h2>
                        <p>玩家必須使用球拍反彈球，以打破畫面上的磚塊。當球擊中磚塊時，磚塊通常會消失，玩家得分。最少時間內擊破所有磚塊，得完成遊戲。</p>
                        <router-link class="Btn Btn-dark mil-link" :to="{ name: 'million_school' }"> start</router-link>
                    </div>
                </div>
                <div class="ranking">
                    <section class="left">
                        <h2>排行榜</h2>
                        <div class="rank-list">
                            <div class="ranking-item">
                                <div class="ranking-img"></div>
                                <img class="ranking-img" src="../assets/images/playground/image 11.svg" alt="">
                                <img src="../assets/images/playground/player.jpeg" alt="">
                                <p>王小明</p>
                            </div>
                            <div class="ranking-item">
                                <div class="ranking-img"></div>
                                <img class="ranking-img" src="../assets/images/playground/medal (1).svg" alt="">
                                <img src="../assets/images/playground/player.jpeg" alt="">
                                <p>王小明</p>
                            </div>
                            <div class="ranking-item">
                                <div class="ranking-img"></div>
                                <img class="ranking-img" src="../assets/images/playground/medal.svg" alt="">
                                <img src="../assets/images/playground/player.jpeg" alt="">
                                <p>王小明</p>
                            </div>
                        </div>
                    </section>
                    <section class="right">
                        <img src="../assets/images/playground/Rectangle 30.svg" alt="">
                    </section>
                </div>


                <!-- ------------------下半部------------------ -->

                <div class="intro">
                    <div class="right-content">
                        <h2>貪吃蛇 Sankes</h2>
                        <p>蛇一開始只有一個短小的身體。蛇可以在四個方向（上、下、左、右）上移動，通過控制鍵盤或其他輸入設備。每當蛇吃掉食物時，它會變得稍微變長，玩家必須避免蛇撞到牆壁或自己的身體，否則遊戲將結束。</p>
                        <router-link class="Btn Btn-dark mil-link" :to="{ name: 'snake' }"> start</router-link>
                    </div>
                    <div class="left-img">
                        <img src="../assets/images/playground/snake.svg" alt="">
                    </div>
                </div>
                <div class="ranking">
                    <section class="right">
                        <img src="../assets/images/playground/Rectangle 31.svg" alt="">
                    </section>
                    <section class="left">
                        <h2>排行榜</h2>
                        <div class="rank-list">
                            <div class="ranking-item">
                                <div class="ranking-img"></div>
                                <img class="ranking-img" src="../assets/images/playground/image 11.svg" alt="">
                                <img src="../assets/images/playground/player.jpeg" alt="">
                                <p>王小明</p>
                            </div>
                            <div class="ranking-item">
                                <div class="ranking-img"></div>
                                <img class="ranking-img" src="../assets/images/playground/medal (1).svg" alt="">
                                <img src="../assets/images/playground/player.jpeg" alt="">
                                <p>王小明</p>
                            </div>
                            <div class="ranking-item">
                                <div class="ranking-img"></div>
                                <img class="ranking-img" src="../assets/images/playground/medal.svg" alt="">
                                <img src="../assets/images/playground/player.jpeg" alt="">
                                <p>王小明</p>
                            </div>
                        </div>
                    </section>
                </div>
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
