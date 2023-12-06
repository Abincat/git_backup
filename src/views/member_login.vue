<template>
    <main class="main-block">
        <div class="login-main">
            <div class="left-form">
                <router-link :to="{ name: 'member_login' }">
                    <img src="../assets/images/logo/logo_desk.svg" alt="">
                </router-link>
                <h2 class="title">歡迎回來</h2>
                <form class="form">
                    <div class="input-effect">
                        <input v-model="loginData.userAccount" type="text" class="inputCommon" id="account" required
                            @input="clearErrorMsg(), verifyAccount()">
                        <label for="account">帳號</label>
                        <p class="error-msg">{{ accountError }}</p>
                    </div>
                    <div class="form-password">
                        <div class="input-effect">
                            <input v-model="loginData.userPassword" type="password" class="inputCommon" id="password"
                                required @input="clearErrorMsg">
                            <label for="password">密碼</label>
                            <p class="error-msg">{{ passwordError }}</p>
                        </div>
                        <router-link :to="{ name: 'member_pwd_reset' }">忘記密碼？</router-link>
                    </div>
                    <button type="button" class="Btn Btn-dark" @click="doSubmit">送出</button>
                </form>
                <router-link :to="{ name: 'member_signup' }">
                    <p>還沒有帳號？ 快立即加入會員</p>
                </router-link>
            </div>
            <div class="right-intro">
                <h3>隨時分享生活中的每一刻 <br>
                    一起擴展好友生活圈</h3>
                <img src="../assets/images/login/login-intro.png" alt="">
            </div>
        </div>
    </main>
</template>

<script>
import { useUserStore } from '@/store/user';
export default {
    data() {
        return {
            loginData: {
                userAccount: '',
                userPassword: ''
            },
            accountError: '',
            passwordError: '',
            accountPass: false,
        }
    },

    methods: {
        doSubmit() {

            // 帳號密碼需驗證不能為空
            if (this.loginData.userAccount == '' && this.loginData.userPassword == '') {
                this.accountError = '請輸入帳號!';
                this.passwordError = '請輸入密碼!';
            } else if (this.loginData.userAccount == '') {
                this.accountError = '請輸入帳號!';
            } else if (this.loginData.userPassword == '') {
                this.passwordError = '請輸入密碼!';
            } else {
                this.verifyAccount();
            }

            if (this.accountPass) {

                axios
                    .post('api/login.php', JSON.stringify(this.loginData))
                    .then((response) => {
                        // console.log(response.data);
                        if (response.data == '0') {
                            alert("登入失敗");
                        }
                        else {
                            alert("登入成功");
                            // console.log(response.data);

                            //將會員ID跟會員名稱 存入cookie
                            let exdate = new Date();
                            exdate.setTime(exdate.getTime() + (1 * 24 * 60 * 60 * 1000)); //過期設定為1日
                            document.cookie = "userID" + "=" + response.data["ID"] + ";path=/;expires=" + exdate.toGMTString();
                            document.cookie = "userName" + "=" + response.data["Fullname"] + ";path=/;expires=" + exdate.toGMTString();

                            this.saveToPinia(response.data["ID"], response.data["Fullname"], response.data["img"]);

                            this.$router.push({ name: 'home' });
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        saveToPinia(id, name, img) {

            //將資料存到pinia
            const userStore = useUserStore();
            userStore.userID = id;
            userStore.userName = name;
            userStore.userImg = 'data:image;base64,' + img;

        },
        clearErrorMsg() {
            if (this.loginData.userAccount != '') {
                this.accountError = '';
            }
            if (this.loginData.userPassword != '') {
                this.passwordError = '';
            }
        },
        verifyAccount() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.loginData.userAccount)) {
                this.accountError = 'Email格式不正確'
            } else {
                this.accountError = '';
                this.accountPass = true;
            }
        },
    }
}
</script>