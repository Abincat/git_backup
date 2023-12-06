<template>
    <layout>
        <template #section-right-content>
            <main class="snake">
                <canvas class="snake_canvas" width="300" height="300" ref="canvas"></canvas>
                <div class="score-section">
                    <p>最高分數: {{ score }}</p>
                    <p>遊戲分數:{{ score }}</p>
                    <div>
                        <span class="left" @click="left"></span>
                        <span class="right" @click="right"></span>
                    </div>
                    <button @click="gameStart">{{ gameInProgress ? 'RESTART' : 'START'
                    }}</button>
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
            score: 0,
            block_count: 20,
            block_size: 20,
            gameInterval: null,
            snake: {
                body: [{
                    x: 10,
                    y: 10
                }],
                size: 5,
                direction: {
                    x: 0, y: -1
                }
            },
            newBlock: {},
            apple: {
                x: null,
                y: null
            },
            gameRunning: false,
            score: 0
        }
    },
    methods: {
        gameStart() {
            if (!this.gameRunning) {
                this.gameRunning = true;
                this.resetGame();
                this.gameInterval = setInterval(this.gameRoutine, 100);
                this.putApple();
                this.updateCanvas();
            }
        },
        gameRoutine() {
            this.moveSnake();
            if (this.snakeIsDead()) {
                this.ggler();
                return;
            }
            this.updateCanvas();
        },
        updateCanvas() {
            const context = this.$refs.canvas.getContext('2d');
            context.fillStyle = 'white';
            context.strokeRect(0, 0, this.$refs.canvas.width, this.$refs.canvas.height);
            context.fillRect(0, 0, this.$refs.canvas.width, this.$refs.canvas.height);
            context.fillStyle = 'lime';
            for (let i = 0; i < this.snake.body.length; i++) {
                context.fillRect(
                    this.snake.body[i].x * this.block_size + 1,
                    this.snake.body[i].y * this.block_size + 1,
                    this.block_size - 1,
                    this.block_size - 1
                );
            }
            context.fillStyle = 'red';
            context.fillRect(this.apple.x * this.block_size + 1, this.apple.y * this.block_size + 1, this.block_size - 1, this.block_size - 1);
        },
        moveSnake() {
            this.newBlock = {
                x: this.snake.body[0].x + this.snake.direction.x,
                y: this.snake.body[0].y + this.snake.direction.y
            };
            this.snake.body.unshift(this.newBlock);
            while (this.snake.body.length > this.snake.size) {
                this.snake.body.pop();
            }
            if (this.apple.x === this.snake.body[0].x && this.apple.y === this.snake.body[0].y) {
                this.eatApple();
            }
        },
        snakeIsDead() {
            if (this.snake.body[0].x < 0) this.snake.body[0].x = this.block_count - 1;
            if (this.snake.body[0].x >= this.block_count) this.snake.body[0].x = 0;
            if (this.snake.body[0].y < 0) this.snake.body[0].y = this.block_count - 1;
            if (this.snake.body[0].y >= this.block_count) this.snake.body[0].y = 0;
            // if (this.snake.body[0].x < 0 || this.snake.body[0].x >= this.block_count || this.snake.body[0].y < 0 || this.snake.body[0].y >= this.block_count) {
            //     return true;
            // }
            for (let i = 1; i < this.snake.body.length; i++) {
                if (this.snake.body[0].x === this.snake.body[i].x && this.snake.body[0].y === this.snake.body[i].y) {
                    return true;
                }
            }
            return false;
        },
        ggler() {
            clearInterval(this.gameInterval);
            this.gameRunning = false;
        },
        resetGame() {
            this.snake = {
                body: [{
                    x: 10,
                    y: 10
                }],
                size: 5,
                direction: {
                    x: 0, y: -1
                }
            };
            this.newBlock = {};
            this.putApple();
            this.score = 0
        },
        putApple() {
            this.apple.x = Math.floor(Math.random() * this.block_count / 2);
            this.apple.y = Math.floor(Math.random() * this.block_count / 2);
            for (let i = 0; i < this.snake.body.length; i++) {
                if (this.snake.body[i].x === this.apple.x && this.snake.body[i].y === this.apple.y) {
                    this.putApple();
                    break;
                }
            }
        },
        eatApple() {
            this.snake.size += 1;
            this.putApple();
            this.score++
        },
        left() {
            let originX = this.snake.direction.x;
            let originY = this.snake.direction.y;
            this.snake.direction.x = originY;
            this.snake.direction.y = originX;
        },
        right() {
            let originX = this.snake.direction.x;
            let originY = this.snake.direction.y;
            this.snake.direction.x = -originY;
            this.snake.direction.y = originX;
        }
    },
    mounted() {
        console.log(this.$refs.canvas.width, this.$refs.canvas.height)
        document.addEventListener("keydown", (e) => {
            let originX = this.snake.direction.x;
            let originY = this.snake.direction.y;
            if (e.keyCode === 37) {
                this.snake.direction.x = originY;
                this.snake.direction.y = originX;
            } else if (e.keyCode === 39) {
                this.snake.direction.x = -originY;
                this.snake.direction.y = originX;
            }
        })
    }
}
</script>