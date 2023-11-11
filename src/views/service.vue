<template>
    <layout>
        <template #section-right-content>
            <div class="service">
        <div class="title">
            <h1>聯絡我們</h1>
        </div>

        <div class="menu_grid">
            <router-link :to="{ name: 'contact_us' }" class="question">
                <div class="card">
                    <img src="../assets/images/service/email.png" alt="email">
                    <div class="content">
                        <h2>填寫表單</h2>
                        <p>我是文字我是文字我是文字我是文字
                            我是文字我是文字我是文字我是文字
                            </p>
                    </div>
                </div>
            </router-link>

            <router-link :to="{ name: 'qa' }" class="question">
                <div class="card">
                    <img src="../assets/images/service/question.png" alt="question">
                    <div class="content">
                        <h2>常見問題</h2>
                        <p>我是文字我是文字我是文字我是文字
                            我是文字我是文字我是文字我是文字
                            </p>
                    </div>
                </div>
            </router-link>

            <router-link :to="{ name: 'chatbot' }" class="question">
                <div class="card">
                    <img src="../assets/images/service/robot.png" alt="robot">
                    <div class="content">
                        <h2>客服機器人</h2>
                        <p>我是文字我是文字我是文字我是文字
                            我是文字我是文字我是文字我是文字
                            </p>
                    </div>
                </div>
            </router-link>
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