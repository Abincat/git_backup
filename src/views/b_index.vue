<template>
    <div class="b_index">
        <div class="b_index_login">
            <router-link :to="{ name: 'home' }" class="nav-brandlogo">
                <img src="../assets/images/logo/logo_desk.svg" alt="logo" />
            </router-link>
            <h1>管理員登入</h1>
            <div class="login-section">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">使用者名稱</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        v-model="username">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">使用者密碼</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" v-model="password">
                </div>

                <button @click="getData" type="submit" class="btn btn-warning">送出
                </button>
            </div>

        </div>

    </div>
</template>

<script>

export default {
    data() {
        return {
            username: '',
            password: ''
        }
    },
    methods: {
        getData() {
            fetch("http://localhost/b_login.php", {
                method: 'POST',
                mode: 'cors',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username: this.username,
                    password: this.password
                })
            })
                .then((res) => {
                    return res.json();
                })
                .then((data) => {
                    console.log(data.success);
                    if (data.success == true) {
                        this.$router.push('/backend/member_management');
                    } else {
                        alert("請重新檢查帳號密碼")
                    }
                })
            // 在.then()方法鏈中處理伺服器回應
            // .then((data) => {
            //     if (data.success) {
            //         // 登入成功，導向到另一個頁面
            //         // 使用路由（如果使用 Vue Router）：
            //         this.$router.push('/dashboard'); // 假設 '/dashboard' 是您想要導向的路徑

            //         // 或者直接使用 JavaScript 跳轉：
            //         // window.location.href = '/dashboard';
            //     } else {
            //         // 登入失敗，可能顯示錯誤訊息或採取其他操作
            //         console.log('登入失敗');
            //     }
            // })
        }
    },
    mounted() {

    }
}
</script>

<style lang="scss" scoped></style>