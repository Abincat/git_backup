<template>
    <layout>
        <template #section-right-content>
            <div class="about-us">

<!------ 關於我們 ------>

<div class="about_grid">
    <div class="about_left">
        <h1>關於我們</h1>
        <p>這是文字這是文字這是文字這是文字這是文字這是文字這是文字這是文字這是文字這是文字這是文字這是文字這是文字</p>
    </div>
    <div class="about_right">
        <img src="../assets/images/about-us/about.png" alt="about_pic">
    </div>
</div>

<!------ 主打功能 ------>

<div class="subtitle">
    <h2>主打功能</h2>
</div>

<!------ 聊天大廳 ------>

<div class="subtitle_container">
    <div class="chatroom">
        <div class="room_left">
            <img src="../assets/images/about-us/chatting.png" alt="chatting_pic">
        </div>
        <div class="room_right">
            <h2>聊天大廳</h2>
            <p>我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字</p>
        </div>
    </div>
    
<!------ 遊樂場 ------>

    <div class="playground">
        <div class="play_left">
            <h2>遊樂場</h2>
            <p>我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文字我是文</p>
        </div>
        <div class="play_right">
            <img src="../assets/images/about-us/playground.png" alt="playground_pic">
        </div>
    </div>
</div>

<!------ 團隊介紹 ------>

<div class="introduce">
    <h2>團隊介紹</h2>
</div>

<div class="team_grid">
    <div class="item">
        <img src="../assets/images/about-us/Huang.png" alt="huang">
        <h3>組長 黃郁珊</h3>
    </div>

    <div class="item">
        <img src="../assets/images/about-us/jian.png" alt="jian">
        <h3>副組長 簡彣庭</h3>
    </div>

    <div class="item">
        <img src="../assets/images/about-us/wu.png" alt="wu">
        <h3>吳勁霖</h3>
    </div>

    <div class="item">
        <img src="../assets/images/about-us/lee.png" alt="lee">
        <h3>李育緯</h3>
    </div>

    <div class="item">
        <img src="../assets/images/about-us/shi.png" alt="shi">
        <h3>施妤靜</h3>
    </div>

    <div class="item">
        <img src="../assets/images/about-us/chen.png" alt="chen">
        <h3>陳冠廷</h3>
    </div>

    <div class="item">
        <img src="../assets/images/about-us/peng.png" alt="peng">
        <h3>彭筱茜</h3>
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
    },
}
</script>