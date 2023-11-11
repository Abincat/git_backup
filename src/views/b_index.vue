<template>
    <div class="b_index">
        <div class="b_index_login">
            <img src="../assets/images/logo/logo_desk.svg" alt="">
            <h1>管理員登入</h1>
            <div class="login-section">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">使用者名稱</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">使用者密碼</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-warning">
                    <router-link :to="{ name: 'b_member' }" class="nav-link active" aria-current="page"
                        href="#">送出</router-link></button>


            </div>

        </div>

    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped></style>