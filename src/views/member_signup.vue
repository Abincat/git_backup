<template>
    <main class="main-block">
        <div class="login-main">
            <div class="left-form">
                <router-link :to="{ name: 'member_login' }">
                    <img src="../assets/images/logo/logo_desk.svg" alt="">
                </router-link>
                <h2 class="title">歡迎加入</h2>
                <form class="form">
                    <div class="input-effect">
                        <input v-model="signUpData.userAccount" type="text" class="inputCommon" id="account" required
                            @input="verifyAccount">
                        <label for="account">帳號(Email)</label>
                        <p class="error-msg">{{ accountError }}</p>
                    </div>
                    <div class="input-effect">
                        <input v-model="signUpData.userPassword" type="password" class="inputCommon" id="password" required
                            @input="verifyPassword">
                        <label for="password">密碼(至少6碼英數字)</label>
                        <p class="error-msg">{{ passwordError }}</p>
                    </div>
                    <div class="input-effect">
                        <input ref="checkPassword" type="password" class="inputCommon" id="checkPassword" required
                            @input="verifyPassword">
                        <label for="checkPassword">確認密碼</label>
                        <p class="error-msg">{{ ckPasswordError }}</p>
                    </div>
                    <div class="sign-up-form">
                        <div class="input-effect">
                            <input v-model="signUpData.lastName" type="text" class="inputCommon" id="last-name" required
                                @input="clearErrorMsg">
                            <label for="last-name">姓氏</label>
                            <p class="error-msg">{{ lastNameError }}</p>
                        </div>
                        <div class="input-effect">
                            <input v-model="signUpData.firstName" type="text" class="inputCommon" id="first-name" required
                                @input="clearErrorMsg">
                            <label for="first-name">名字</label>
                            <p class="error-msg">{{ firstNameError }}</p>
                        </div>
                    </div>
                    <div class="base-img">
                        <div ref="baseBImg" class="boy select" @click="imgBSelect($event)">
                            <img src="../assets/images/login/boy-base.png" alt="">
                        </div>
                        <div ref="baseGImg" class="girl" @click="imgGSelect">
                            <img src="../assets/images/login/girl-base.png" alt="">
                        </div>
                    </div>
                    <button type="button" class="Btn Btn-dark" @click="doSignUp">註冊</button>
                </form>
            </div>
            <div class="right-intro">
                <p>如果你想交朋友 卻又不敢自己獨自面對... <br>
                    如果你喜歡在虛擬網路世界與各種人們暢談遊玩...</p>
                <h3>不要遲疑了！ 快跟上！</h3>
                <img src="../assets/images/login/sign-up.png" alt="">
            </div>
        </div>
    </main>
</template>

<script>

export default {
    data() {
        return {
            signUpData: {
                userAccount: '',
                userPassword: '',
                lastName: '',
                firstName: '',
                img: '',
            },
            accountError: '',
            passwordError: '',
            ckPasswordError: '',
            lastNameError: '',
            firstNameError: '',
            accountPass: false,
            passwordPass: false,
            bBaseImg: '',
            gBaseImg: '',
        }
    },
    mounted() {
        // console.log(this.$refs.baseBImg.firstChild.src);
        this.bBaseImg = this.$refs.baseBImg.firstChild.src;
    },
    methods: {
        imgGSelect(e) {
            if (this.$refs.baseBImg.classList.contains('select')) {
                this.$refs.baseBImg.classList.remove('select');
                this.$refs.baseGImg.classList.add('select');
            }
            this.gBaseImg = e.target.src;
            // console.log(this.gBaseImg);
        },
        imgBSelect(e) {

            if (this.$refs.baseGImg.classList.contains('select')) {
                this.$refs.baseGImg.classList.remove('select');
                this.$refs.baseBImg.classList.add('select');
            }
            this.bBaseImg = e.target.src;
            // console.log(this.bBaseImg);
        },
        doSignUp() {

            this.checkField();

            if (this.accountPass && this.passwordPass) {

                if (this.$refs.baseBImg.classList.contains('select')) {
                    this.signUpData.img = this.bBaseImg;
                } else {
                    this.signUpData.img = this.gBaseImg;
                }

                // console.log(this.signUpData);

                //進行註冊
                axios
                    .post('api/signUp.php', JSON.stringify(this.signUpData))
                    .then(response => {
                        console.log(response.data);
                        if (response.data == '1') {
                            alert("註冊成功");
                            this.$router.push({ name: 'member_login' })
                        }

                    })
                    .catch(error => {
                        console.log(error);
                    });
            }

        },
        checkField() {
            //驗證各種欄位未填寫的排列組合
            if (this.signUpData.userAccount == '' && this.signUpData.userPassword == '' && this.signUpData.lastName == '' && this.signUpData.firstName == '') {
                this.accountError = '請輸入帳號!';
                this.passwordError = '請輸入密碼!';
                this.lastNameError = '請輸入姓氏!';
                this.firstNameError = '請輸入名字!';
            } else if (this.signUpData.userPassword == '' && this.signUpData.lastName == '' && this.signUpData.firstName == '') {
                this.passwordError = '請輸入密碼!';
                this.lastNameError = '請輸入姓氏!';
                this.firstNameError = '請輸入名字!';
                this.verifyAccount();
            } else if (this.signUpData.userAccount == '' && this.signUpData.lastName == '' && this.signUpData.firstName == '') {
                this.accountError = '請輸入帳號!';
                this.lastNameError = '請輸入姓氏!';
                this.firstNameError = '請輸入名字!';
                this.verifyPassword();
            } else if (this.signUpData.userAccount == '' && this.signUpData.userPassword == '' && this.signUpData.lastName == '') {
                this.accountError = '請輸入帳號!';
                this.passwordError = '請輸入密碼!';
                this.lastNameError = '請輸入姓氏!';
            } else if (this.signUpData.userAccount == '' && this.signUpData.userPassword == '' && this.signUpData.firstName == '') {
                this.accountError = '請輸入帳號!';
                this.passwordError = '請輸入密碼!';
                this.firstNameError = '請輸入名字!';
            } else if (this.signUpData.lastName == '' && this.signUpData.firstName == '') {
                this.lastNameError = '請輸入姓氏!';
                this.firstNameError = '請輸入名字!';
                this.verifyAccount();
                this.verifyPassword();
            } else if (this.signUpData.userAccount == '' && this.signUpData.userPassword == '') {
                this.accountError = '請輸入帳號!';
                this.passwordError = '請輸入密碼!';
            } else if (this.signUpData.userAccount == '') {
                this.accountError = '請輸入帳號!';
                this.verifyPassword();
            } else if (this.signUpData.userPassword == '') {
                this.passwordError = '請輸入密碼!';
                this.verifyAccount();
            } else if (this.signUpData.lastName == '') {
                this.lastNameError = '請輸入姓氏!';
                this.verifyAccount();
                this.verifyPassword();
            } else if (this.signUpData.firstName == '') {
                this.firstNameError = '請輸入名字!';
                this.verifyAccount();
                this.verifyPassword();
            } else {
                this.verifyAccount();
                this.verifyPassword();
            }
        },
        verifyPassword() {
            const passwordRegex = /^(?=.*[a-z])(?=.*\d)[a-z\d]{6,}$/i; // 不區分英文大小寫+數字，至少6碼
            if (this.signUpData.userPassword == '') {
                this.passwordError = '請輸入密碼!';
            } else if (!passwordRegex.test(this.signUpData.userPassword)) {
                this.passwordError = '密碼格式不正確(至少6碼英數字)';
            } else if (this.signUpData.userPassword != '' && this.$refs.checkPassword.value == '') {
                this.passwordError = '';
                this.ckPasswordError = '請再次輸入密碼!';
            } else if (this.signUpData.userPassword != '' && this.signUpData.userPassword != this.$refs.checkPassword.value) {
                this.passwordError = '';
                this.ckPasswordError = '輸入密碼不相符!';
            } else if (this.signUpData.userPassword == '') {
                this.ckPasswordError = '請先輸入密碼!';
            } else {
                this.ckPasswordError = '';
                this.passwordPass = true;
            }
        },
        verifyAccount() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.signUpData.userAccount == '') {
                this.accountError = '請輸入帳號!';
            } else if (!emailRegex.test(this.signUpData.userAccount)) {
                this.accountError = 'Email格式不正確'
            } else {
                this.accountError = '';

                //檢查帳號是否重複
                axios
                    .post('api/checkAccount.php', JSON.stringify(this.signUpData))
                    .then(response => {
                        // console.log(response.data);
                        if (response.data == '1') {
                            this.accountError = '此帳號曾經被註冊過!';
                        } else {
                            this.accountPass = true;
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }


        },
        clearErrorMsg() {
            // if (this.signUpData.userAccount != '') {
            //     this.accountError = '';
            // }
            // if (this.signUpData.userPassword != '') {
            //     this.passwordError = '';
            // }
            if (this.signUpData.lastName != '') {
                this.lastNameError = '';
            }
            if (this.signUpData.firstName != '') {
                this.firstNameError = '';
            }
        }
    }
}
</script>