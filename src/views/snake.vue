<template>
    <layout>
        <template #section-right-content>
            <main class="snake">
                <canvas id="canvas" ref="canvas" width="300" height="300" class="snake_canvas"></canvas>

                <div class="score-section">
                    <p>最高分數: 10</p>
                    <p>遊戲分數:{{ score }}</p> <button @click="startGame">{{ gameInProgress ? 'RESTART' : 'START' }}</button>
                </div>

            </main>
        </template>
    </layout>
</template>

<script>
import layout from '@/components/layout.vue';

export default {
    components: {
        layout
    },
    data() {
        return {
            ctx: null,
            interval: null,
            snakeData: [],
            count: 0,
            pointList: [{ 'x': 36, 'y': 18 }],
            direction: 'd',
            controll: new AbortController(),
            controll2: new AbortController(),
            speedCount: 0,
            speed: 8,
            score: 0,
            heightscore: 0,
            gameInProgress: false,
        };
    },
    methods: {
        // 開始遊戲
        startGame() {
            if (this.gameInProgress) { // 注意這裡修正為 `this.gameInProgress`
                // 如果遊戲進行中，重新初始化遊戲狀態
                this.resetGame();
            } else {
                // 如果遊戲未開始，開始遊戲
                this.initializeGame();
            }
        },
        initializeGame() {
            this.gameInProgress = true;
            this.score = 0;
            this.highScore = 0;

            // 重置蛇和食物的位置
            const initialSnake = [];
            for (let i = 0; i < 2; i++) {
                initialSnake.push({
                    x: 0 + i * 6,
                    y: 0,
                    type: 'right'
                });
            }
            this.snakeData = initialSnake;
            this.setView(initialSnake);

            // 重新生成初始食物
            this.generateFood();

            // 開始遊戲循環
            this.interval = requestAnimationFrame(this.intervalFun);
        },

        generateFood() {
            const x = Math.floor(Math.random() * Math.round(300 / 6)) * 6;
            const y = Math.floor(Math.random() * Math.round(300 / 6)) * 6;
            this.pointList.push({
                x,
                y
            });
            this.setView(this.pointList);
        },

        resetGame() {
            this.gameInProgress = false;
            // 重置蛇和食物的位置
            this.snakeData = [];
            this.pointList = [];

            // 取消遊戲循環
            this.interval && cancelAnimationFrame(this.interval);

            // 重新初始化遊戲
            this.initializeGame();
        },


        intervalFun() {
            this.count++;
            this.speedCount++;

            if (this.count > 5000) {
                cancelAnimationFrame(this.interval);
            } else {
                if (this.speedCount % this.speed == 0) {
                    const w = this.$refs.canvas.width;
                    const h = this.$refs.canvas.height;
                    this.ctx.clearRect(0, 0, w, h);
                    this.goForward(this.snakeData);
                }
            }

            this.interval = requestAnimationFrame(this.intervalFun);
        },
        goForward(list) {
            const option = { ...list[list.length - 1] };

            if (this.direction === 'd') {
                option.x = Number(option.x) + 6;
            } else if (this.direction === 'a') {
                option.x = Number(option.x) - 6;
            } else if (this.direction === 'w') {
                option.y = Number(option.y) - 6;
            } else if (this.direction === 's') {
                option.y = Number(option.y) + 6;
            }
            // 檢查頭部是否碰撞到牆壁或蛇的身體
            if (this.checkCollision(option)) {
                this.gameOver();
                return;
            }


            if (this.checkCollisionWithFood(option)) {
                // 蛇吃到食物，增加分數並重新生成食物
                this.score += 10;
                if (this.score > this.highScore) {
                    this.highScore = this.score;
                }

            }

            list.push(option);

            let flag = false;

            this.pointList = this.pointList.filter((i) => {
                if (option.x === i.x && option.y === i.y) {
                    flag = true;
                }
                return i.x !== option.x || i.y !== option.y;
            });

            if (!flag) {
                list.shift();
            } else {
                // 重新生成點
                const x = Math.floor(Math.random() * Math.round(300 / 6)) * 6;
                const y = Math.floor(Math.random() * Math.round(300 / 6)) * 6;
                this.pointList.push({
                    x,
                    y
                });
            }

            this.snakeData = list;
            // 畫蛇
            this.setView(this.snakeData);
            // 畫點
            this.setView(this.pointList);
        },
        setView(list) {
            this.ctx.beginPath();
            for (let i = 0; i < list.length; i++) {
                // 繪製矩形
                this.ctx.rect(list[i].x, list[i].y, 6, 6);
            }
            this.ctx.fill();
            // 描邊一個輪廓矩形
        }, checkCollision(head) {
            const canvasWidth = this.$refs.canvas.width;
            const canvasHeight = this.$refs.canvas.height;

            // 檢查是否碰撞到牆壁
            if (head.x < 0 || head.x >= canvasWidth || head.y < 0 || head.y >= canvasHeight) {
                return true;
            }

            // 檢查是否碰撞到蛇的身體
            for (let i = 0; i < this.snakeData.length - 1; i++) {
                if (head.x === this.snakeData[i].x && head.y === this.snakeData[i].y) {
                    return true;
                }
            }

            return false;
        },// 食物碰撞檢測方法
        checkCollisionWithFood(head) {
            for (let i = 0; i < this.pointList.length; i++) {
                if (head.x === this.pointList[i].x && head.y === this.pointList[i].y) {
                    // 如果頭部碰到食物，返回 true
                    return true;
                }
            }
            return false;
        },

        // 遊戲結束方法
        gameOver() {
            // 顯示遊戲結束訊息，可以加入相應的 UI 元素和效果
            console.log("Game Over!");
            // 可以觸發其他遊戲結束相關的邏輯或動作
            // 例如：停止計時器、顯示分數、重新開始選項等
        }
    },
    mounted() {
        this.$nextTick(() => {
            const canvas = this.$refs.canvas;
            this.ctx = canvas.getContext('2d');
            const list = [];
            for (let i = 0; i < 2; i++) {
                list.push({
                    x: 0 + i * 6,
                    y: 0,
                    type: 'right'
                });
            }
            this.snakeData = list;
            this.setView(list);
            this.interval = requestAnimationFrame(this.intervalFun);

            window.addEventListener('keydown', (val) => {
                if (val.key == 'w' || val.key == 'a' || val.key == 's' || val.key == 'd') {
                    // 方向不能相反
                    switch (val.key) {
                        case 'w':
                            if (this.direction !== 's') {
                                this.direction = 'w';
                                this.speed = 4;
                            }
                            break;
                        case 'a':
                            if (this.direction !== 'd') {
                                this.direction = 'a';
                                this.speed = 4;
                            }
                            break;
                        case 's':
                            if (this.direction !== 'w') {
                                this.direction = 's';
                                this.speed = 4;
                            }
                            break;
                        case 'd':
                            if (this.direction !== 'a') {
                                this.direction = 'd';
                                this.speed = 4;
                            }
                            break;
                        default:
                            console.log("方向不合法按鍵無效");
                            break;
                    }
                }
            }, { signal: this.controll.signal });

            window.addEventListener('keyup', val => {
                if (val.key == 'w' || val.key == 'a' || val.key == 's' || val.key == 'd') {
                    this.speed = 8;
                }
            }, { signal: this.controll2.signal });
        });
    },
    beforeDestroy() {
        this.count = 0;
        this.interval && cancelAnimationFrame(this.interval);
        this.controll.abort();
        this.controll2.abort();
    }
}
</script>