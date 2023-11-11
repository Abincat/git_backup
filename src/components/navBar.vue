<template>
    <nav :class="['nav', { 'nav-off': !show }]" ref="navBar">
        <div>
            <router-link :to="{ name: 'home' }" class="nav-brandlogo">
                <img src="../assets/images/logo/logo_desk.svg" alt="logo" />
            </router-link>
        </div>
        <div class="nav-items">
            <router-link :to="{ name: 'chatting_room' }" :class="{ 'current': currentPage.includes('chatting_room') }">
                <img src="../assets/images/icon/chat.svg" alt="chat icon" />
                <h3>聊天大廳</h3>
            </router-link>
            <router-link :to="{ name: 'playground' }" :class="{ 'current': currentPage.includes('playground') }">
                <img src="../assets/images/icon/game.svg" alt="game icon" />
                <h3>遊樂場</h3>
            </router-link>
            <router-link :to="{ name: 'activity' }" :class="{ 'current': currentPage.includes('activity') }">
                <img src="../assets/images/icon/activity.svg" alt="activity icon" />
                <h3>主題活動</h3>
            </router-link>
            <router-link :to="{ name: 'about-us' }" :class="{ 'current': currentPage.includes('about-us') }">
                <img src="../assets/images/icon/about-us.svg" alt="about-us icon" />
                <h3>關於叩叩</h3>
            </router-link>
            <router-link :to="{ name: 'service' }" :class="{ 'current': currentPage.includes('service') }">
                <img src="../assets/images/icon/qa.svg" alt="service icon" />
                <h3>我有問題</h3>
            </router-link>
        </div>
    </nav>
</template>

<script>
export default {
    props: ['show'],

    data() {
        return {
            currentPage: '',
        }
    },
    mounted() {
        console.log(this.$router.currentRoute.value.name);
        this.currentPage = this.$router.currentRoute.value.name;
    }
}
</script>