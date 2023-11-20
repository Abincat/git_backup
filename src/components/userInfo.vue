<template>
    <div :class="['info-block', { 'hide': hide }]">
        <div class="logo-block">
            <router-link :to="{ name: 'home' }" class="logo-mobile">
                <img src="../assets/images/logo/logo_mobile.svg" alt="logo" />
            </router-link>
        </div>
        <div class="user-info">
            <div class="user-search">
                <img src="../assets/images/icon/search.svg" alt="">
                <input ref="searchFriend" type="search" placeholder="搜尋好友" @keyup.enter="search">
            </div>
            <div class="user-detail-info">
                <router-link :to="{ name: 'mypage' }">
                    <div class="user-image"><img src="../assets/images/user/userimage.png" alt=""></div>
                    <h3>王小明</h3>
                </router-link>
            </div>
            <div class="login-out">
                <img src="../assets/images/icon/logout.svg" alt="">
            </div>
        </div>
    </div>
</template>

<script>

export default {
    inject: ['hide'],

    methods: {
        search() {
            if (this.$refs.searchFriend.value == '') {
                alert('請輸入搜尋好友關鍵字');
            } else {

                const keyword = this.$refs.searchFriend.value;
                this.$router.push({ name: 'search_friends', params: { keyword: keyword } })
            }
        }
    }
}

</script>