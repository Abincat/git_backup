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
                            @input="clearErrorMsg">
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

export default {
    data() {
        return {
            loginData: {
                userAccount: '',
                userPassword: ''
            },
            accountError: '',
            passwordError: ''
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
            }
            else {

                //尚未連DB暫時註解起來
                // axios
                //     .post('api/login.php', JSON.stringify(this.loginData))
                //     .then((response) => {
                //         console.log(response.data);
                //         if (response.data == 'Failed') {
                //             alert("登入失敗");
                //         }
                //         else {
                //             alert("登入成功");
                //             // this.$router.push({ name: 'home' })
                //         }
                //     })
                //     .catch(error => {
                //         console.log(error);
                //     });

                this.$router.push({ name: 'home' })
            }
        },
        clearErrorMsg() {
            if (this.loginData.userAccount != '') {
                this.accountError = '';
            }
            if (this.loginData.userPassword != '') {
                this.passwordError = '';
            }
        }
    }
}
</script>