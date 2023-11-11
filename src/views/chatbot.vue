<template>
    <layout>
        <template #section-right-content>
            <div class="chatbot">
                <div class="container">
                    <div class="title">
                        <h3>客服小幫手</h3>
                    </div>

                    <div class="robot">
                        <div class="avatar">
                            <img src="../assets/images/chatbot/Ellipse 72.svg" alt="avatar">
                        </div>
                        <div class="talk">
                            <p>亲，有任何问题想询问的吗?</p>
                        </div>
                    </div>

                    <div class="box">
                        <h3>帳號問題</h3>
                        <ul>
                            <li>我有問題</li>
                            <li>我有問題</li>
                            <li>我有問題</li>
                            <li>我有問題</li>
                        </ul>
                    </div>

                    <div class="user">
                        <div class="usertalk">
                            <p>我是文字我是文字我是文字我是文字我是文字我是文字</p>
                        </div>
                        <div class="userpic">
                            <img src="../assets/images/chatbot/Ellipse 72.svg" alt="avatar">
                        </div>
                    </div>

                    <div class="chat">
                        <div class="chat-input">
                            <input type="text" placeholder="請輸入訊息...">
                            <div>
                                <img src="../assets/images/chatbot/Vector.svg" alt="">
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

export default {
    components: {
        layout
    }
}
</script>