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
                        <p>請將您的寶貴意見以填寫表單方式送出，我們將於工作日由專人以郵件回復您的問題。
                            </p>
                    </div>
                </div>
            </router-link>

            <router-link :to="{ name: 'qa' }" class="question">
                <div class="card">
                    <img src="../assets/images/service/question.png" alt="question">
                    <div class="content">
                        <h2>常見問題</h2>
                        <p>這裡收集了許多我們收到的常見問題及相應的解答，希望能幫助您更快地解決疑問或困惑。
                            </p>
                    </div>
                </div>
            </router-link>

            <router-link :to="{ name: 'chatbot' }" class="question">
                <div class="card">
                    <img src="../assets/images/service/robot.png" alt="robot">
                    <div class="content">
                        <h2>客服機器人</h2>
                        <p>我們的機器人為您提供即時幫助和解答問題，讓您更快速地解決疑問或獲得所需信息。
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