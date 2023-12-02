<template>
    <div :class="['info-block', { 'hide': hide }]">
        <div class="logo-block">
            <router-link :to="{ name: 'home' }" class="logo-mobile">
                <img src="../assets/images/logo/logo_mobile.svg" alt="logo" />
            </router-link>
        </div>
        <div class="user-info">
            <div class="user-search">
                <img src="../assets/images/icon/search.svg" alt="" @click="expandSearch">
                <input ref="searchFriend" type="search" placeholder="搜尋好友" @keyup.enter="search" @blur="closeSearch">
            </div>
            <div class="user-detail-info">
                <router-link :to="{ name: 'mypage' }">
                    <div class="user-image"><img :src="userData.userImg" alt=""></div>
                    <h3>{{ userData.userName }}</h3>
                </router-link>
            </div>
            <div class="login-out" @click="doLogout">
                <img src="../assets/images/icon/logout.svg" alt="">
            </div>
        </div>
    </div>
</template>

<script>
import { useUserStore } from '@/store/user';

export default {
    inject: ['hide'],

    data() {
        return {
            userData: {
                userID: '',
                userName: '',
                userImg: ''
            },
        }
    },
    beforeMount() {
        //將資料存到pinia
        const userStore = useUserStore();

        let cookies = document.cookie.split("; "); //['userID=1', 'userName=王小明']

        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i].split("="); // ['userID', '1']、['userName', '王小明']
            if (cookie[0] == 'userName') {
                this.userData.userName = cookie[1];
                userStore.userName = this.userData.userName;
            } else if (cookie[0] == 'userID') {
                this.userData.userID = cookie[1];
                userStore.userID = this.userData.userID;
            }
        }

        axios
            .post('api/queryMember.php', JSON.stringify(this.userData))
            .then(response => {
                // console.log(response.data);
                if (response.data != '0') {
                    this.userData.userImg = 'data:image/png;base64,' + response.data['img'];
                    userStore.userImg = response.data['img'];
                }
            })

    },
    mounted() {

    },
    methods: {
        search() {
            if (this.$refs.searchFriend.value == '') {
                alert('請輸入搜尋好友關鍵字');
            } else {

                const keyword = this.$refs.searchFriend.value;
                this.$router.push({ name: 'search_friends', params: { keyword: keyword } })
            }
        },
        expandSearch() {
            this.$refs.searchFriend.classList.toggle("expand");
        },
        closeSearch() {
            this.$refs.searchFriend.classList.remove("expand");
        },
        doLogout() {

            let r = confirm("確定要登出嗎？");

            if (r) {

                // 將 cookie 字串分割成每個 cookie
                let cookies = document.cookie.split("; ");

                axios
                    .post('api/logout.php', JSON.stringify(this.userData))
                    .then(response => {
                        // console.log(response.data);
                        if (response.data == '1') {

                            //更新狀態成功在清除cookie
                            let exdate = new Date();
                            exdate.setTime(exdate.getTime() - (1 * 24 * 60 * 60 * 1000)); //取得昨天的日期

                            // 迭代 cookies，將每個 cookie 都設置過期時間為過去的日期，使其被刪除
                            for (let i = 0; i < cookies.length; i++) {
                                let cookie = cookies[i].split("=");
                                document.cookie = `${cookie[0]}=;expires=${exdate.toGMTString()}`;
                            }

                            this.$router.push({ name: 'member_login' });
                        }
                    })

                const store = useUserStore();
                store.$reset()
            }
        }
    }
}

</script>