<template>
    <nav class="b_Nvabar">
        <ul class="bnavbar-nav">
            <router-link :to="{ name: 'home' }" class="nav-brandlogo">
                <img src="../assets/images/logo/logo_desk.svg" alt="logo" />
            </router-link>
            <li class="nav-item">
                <router-link :to="{ name: 'b_member' }" class="nav-link active" aria-current="page"
                    href="#">會員管理</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'b_activity' }" class="nav-link" href="#">活動管理</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'b_service' }" class="nav-link" href="#">客服專區</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'b_mission' }" class="nav-link" href="#">任務管理</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'b_qa' }" class="nav-link" href="#">常見問題</router-link>
            </li>
            <!-- <li class="nav-item dropdown">
                        <router-link class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </router-link>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
        </ul>
    </nav>
</template>

<script>
export default {

}
</script>