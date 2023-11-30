<template>
    <layout>
        <template #section-right-content>
            <div class="about-us">

<!------ 關於我們 ------>

<div class="about_grid">
    <div class="about_left">
        <h1>關於我們</h1>
        <p>這是一個與世界互動的場所，讓您可以探索各種話題、文化和觀點。無論您是想討論最新的科技趨勢、分享您最喜歡的旅行目的地，還是尋找志同道合的夥伴，這裡都有豐富的討論等待著您。</p>
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
            <p>我們重視每一位使用者，並致力於打造一個尊重、包容的社群環境。這裡歡迎多樣性、尊重差異，讓每個人都感受到安全和自由，在我們的聊天大廳，您可以參與各種活動、主題討論或社群互動。這是一個讓您沉浸於各種有趣話題和精彩內容的地方。</p>
        </div>
    </div>
    
<!------ 遊樂場 ------>

    <div class="playground">
        <div class="play_left">
            <h2>遊樂場</h2>
            <p>您可以與用戶交流、分享您的分數。在這裡評論和分享成果，一同探索懷舊遊戲的魅力，並且擁有排名機制激發玩家間的競爭性，鼓勵他們努力提高自己的排名，挑戰更高的層次或更強的對手。</p>
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
        <h3>李育瑋</h3>
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