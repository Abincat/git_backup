<template>
    <layout>
        <template #section-right-content>

            <main class="million_school_start" v-if="!gameEnd">
                <div class="top">
                    <div class="left">
                        <img src="../assets/images/million_school/qapalytime.svg" alt="leftPic">
                        <!-- 下方時間條 -->
                        <div class="down">
                            <div class="text">
                                {{ number }} of 30
                            </div>
                            <div class="bar">
                                <div class="bar-color" ref="barColor"></div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="right_top">
                            <span :class="{ 'active': change }">時間：{{ timercount }}</span>
                            <span>分數：{{ this.score }}分</span>
                            <!-- <span v-for="i in heart">
                                <p>剩餘次數:</p>
                                <p class="heart">{{ i.first }}{{ i.second }}{{ i.third }}</p>
                            </span> -->

                        </div>
                        <div class="right_down" v-for="(i, key) in qa" :key="i.id">
                            <div v-if="current_question === key">
                                <h3>{{ i.topic_id }}:{{ i.topic }}</h3>
                                <div class="ans">
                                    <span @click="addScore(key, 'A')">(A){{ i.option_A }}</span>
                                    <span @click="addScore(key, 'B')">(B){{ i.option_B }}</span>
                                    <span @click="addScore(key, 'C')">(C){{ i.option_C }}</span>
                                    <span @click="addScore(key, 'D')">(D){{ i.option_D }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>





                <!-- <router-link class="mil-link" :to="{ name: 'million_school_start' }"> start</router-link> -->

            </main>

            <div class="million_school_end" v-else>
                <div class="top">

                    <div class="top_cloth">
                        <img src="../assets/images/million_school/cloth.svg" alt="cloth">
                    </div>

                    <div class="top_fireworks_left">
                        <img src="../assets/images/million_school/fireworks.svg" alt="fireworks">
                    </div>

                    <div class="top_fireworks_right">
                        <img src="../assets/images/million_school/fireworks.svg" alt="fireworks">
                    </div>

                </div>

                <div class="down">


                    <div class="down_bolloon_left">
                        <img src="../assets/images/million_school/balloon.svg" alt="balloon">
                    </div>


                    <div class="member">


                        <div class="playerimg">
                            <img src="../assets/images/playground/player.jpeg" alt="player">
                        </div>

                        <div class="banner">
                            <img src="../assets/images/million_school/banner.svg" alt="">
                        </div>

                        <p class="banner_text">遊戲結束</p>

                        <p class="username">Wendy</p>

                        <div class="bottom">
                            <div class="score">
                                <div>
                                    <p>遊戲分數</p>
                                    <p>{{ score }}題</p>
                                </div>

                            </div>

                            <div class="rank">
                                <p>最高紀錄</p>
                                <p>98題</p>
                            </div>
                        </div>

                    </div>

                    <div class="down_bolloon_right">
                        <img src="../assets/images/million_school/balloon.svg" alt="balloon">
                    </div>

                </div>

                <div class="button">
                    <router-link @click="reStart" class="mil-link" :to="{ name: 'million_school_start' }">再來一局</router-link>

                    <router-link class="mil-link" :to="{ name: 'million_school' }">遊戲首頁</router-link>
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
            timercount: 10,
            score: 0,
            timer: '',
            qa: [],
            current_question: 0,
            showAlert: false, // 追蹤是否已經顯示過警告
            gameEnd: false,
            number: 1,
            change: false,
            barColorElement: '',
            totalQuestions: 30
        }
    },
    methods: {
        setTime(key, answer) {
            this.timer = setInterval(() => {
                this.timercount--;

                if (this.timercount == 0) {
                    this.timercount = 10;
                    this.current_question++;
                    this.number++

                    let widthToAdd = 15; // 计算要增加的宽度（父元素宽度的20%）
                    let currentWidth = parseFloat(window.getComputedStyle(this.barColorElement).width);

                    if (currentWidth + widthToAdd >= this.$refs.barColor.parentNode.offsetWidth) {
                        this.barColorElement.style.width = '100%';
                    } else {
                        this.barColorElement.style.width = (currentWidth + widthToAdd) + 'px';
                    }

                    this.change = false;
                    this.gameEnd = false
                }
                if (this.timercount <= 5) {
                    this.change = true
                }
                if (this.current_question == this.qa.length) {
                    if (!this.showAlert) {
                        this.showAlert = true;
                        // alert(`遊戲結束您獲得${this.score}分`);
                        clearInterval(this.setTime);

                    }
                }


            }, 1000)
        },
        addScore(key, answer) {
            console.log(key);
            console.log(this.qa[key]);
            console.log(answer);

            if (this.qa[key].answer == answer) {
                this.score++;

                clearInterval(this.setTime);
                // alert("答對喽");
                this.number++
                this.change = false

            } else {
                clearInterval(this.setTime);
                // alert("答錯喽");
                this.number++
                this.change = false
            }


            let widthToAdd = 15;
            let currentWidth = parseFloat(window.getComputedStyle(this.barColorElement).width);

            if (currentWidth + widthToAdd >= this.$refs.barColor.parentNode.offsetWidth) {
                this.barColorElement.style.width = '100%'; // 如果宽度超出父元素宽度，则设为100%
            } else {
                this.barColorElement.style.width = (currentWidth + widthToAdd) + 'px'; // 否则增加20%的宽度
            }

            this.timercount = 10;
            this.current_question++
            if (this.current_question === this.qa.length) {
                if (!this.showAlert) {
                    this.showAlert = true;
                    // alert(`遊戲結束，您獲得 ${this.score} 分`);
                    clearInterval(this.timer);
                    this.gameEnd = !this.gameEnd;
                }
            }
        },
        reStart() {
            window.location.reload()
        }


    },
    mounted() {
        console.log(this.change)
        this.barColorElement = this.$refs.barColor;
        this.$nextTick(() => {
            console.log(this.barColorElement.offsetWidth); // 使用 offsetWidth 取得元素寬度
        });
        this.setTime();
        fetch("http://localhost/million_school.php"
        )
            .then((res) => {
                return res.json();
            })
            .then((data) => {
                this.qa = data
                console.log(data);
            })
    }
}
</script>