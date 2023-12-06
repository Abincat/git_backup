<template>
    <main class="main-block">
        <div class="login-main">
            <div class="left-form">
                <router-link :to="{ name: 'member_login' }">
                    <img src="../assets/images/logo/logo_desk.svg" alt="">
                </router-link>
                <h2 class="title">重設密碼</h2>
                <form v-if="!accountPass" class="form">
                    <div class="input-effect">
                        <input v-model="resetData.userAccount" type="text" class="inputCommon" id="account" required
                            @input="verifyAccount">
                        <label for="account">帳號</label>
                        <p class="error-msg">{{ accountError }}</p>
                    </div>
                    <button type="button" @click="accountVerify" class="Btn Btn-dark">下一步</button>
                </form>
                <form v-else class="form">
                    <div class="input-effect">
                        <input v-model="resetData.userPassword" type="password" class="inputCommon" id="password" required
                            @input="clearErrorMsg(), verifyPassword()">
                        <label for="password">密碼</label>
                        <p class="error-msg">{{ passwordError }}</p>
                    </div>
                    <div class="input-effect">
                        <input ref="checkPassword" type="password" class="inputCommon" id="checkPassword" required
                            @input="verifyPassword">
                        <label for="checkPassword">確認密碼</label>
                        <p class="error-msg">{{ ckPasswordError }}</p>
                    </div>
                    <button type="button" class="Btn Btn-dark" @click="doReset">確認</button>
                    <button type="button" @click="accountPass = false, this.passwordError = ''"
                        class="Btn Btn-light">回上一步</button>
                </form>
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
import { Alert } from 'bootstrap';

export default {
    data() {
        return {
            accountPass: false,
            resetData: {
                userId: '',
                userAccount: '',
                userPassword: '',
            },
            accountError: '',
            passwordError: '',
            ckPasswordError: '',
        }
    },

    methods: {
        accountVerify() {
            if (this.resetData.userAccount == '') {
                this.accountError = '請輸入帳號!';
            } else {
                //確認帳號是否存在於資料庫
                axios
                    .post('api/checkAccount.php', JSON.stringify(this.resetData))
                    .then(response => {
                        console.log(response.data);
                        if (response.data != '0') {
                            this.accountPass = true;
                            this.resetData.userId = response.data;

                        } else {
                            this.accountError = '此帳號未註冊過，請重新輸入';
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        doReset() {
            if (this.resetData.userPassword == '') {
                this.passwordError = '請輸入密碼!';
            } else {
                //更新會員資料
                axios
                    .post('api/updateMemberPwd.php', JSON.stringify(this.resetData))
                    .then(response => {
                        if (response.data == '1') {
                            alert('密碼重設成功，請使用新密碼重新登入');
                            this.$router.push({ name: 'member_login' });
                        } else {
                            console.log('reset error');
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        verifyPassword() {
            const passwordRegex = /^(?=.*[a-z])(?=.*\d)[a-z\d]{6,}$/i; // 不區分英文大小寫+數字，至少6碼
            if (!passwordRegex.test(this.resetData.userPassword)) {
                this.passwordError = '密碼格式不正確(至少6碼英數字)';
            } else if (this.resetData.userPassword != '' && this.$refs.checkPassword.value == '') {
                this.ckPasswordError = '請再次輸入密碼!';
            } else if (this.resetData.userPassword != '' && this.resetData.userPassword != this.$refs.checkPassword.value) {
                this.ckPasswordError = '輸入密碼不相符!';
            } else if (this.resetData.userPassword == '') {
                this.ckPasswordError = '請先輸入密碼!';
            } else {
                this.ckPasswordError = '';
            }
        },
        clearErrorMsg() {
            if (this.resetData.userAccount != '') {
                this.accountError = '';
            }
            if (this.resetData.userPassword != '') {
                this.passwordError = '';
            }
        },
        verifyAccount() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.resetData.userAccount == '') {
                this.accountError = '請輸入帳號!';
            } else if (!emailRegex.test(this.resetData.userAccount)) {
                this.accountError = 'Email格式不正確'
            } else {
                this.accountError = '';
            }


        },
    }
}
</script>