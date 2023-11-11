<template>
    <layout>
        <template #section-right-content>
            <userinfo></userinfo>

            <div class="wander">
                <div class="container">
                    <div class="return">
                        <router-link :to="{ name: 'mypage' }">
                            <img src="../assets/images/wander/return_icon.png" alt="return">
                        </router-link>
                    </div>
                    <div class="middle">
                        <!-- <span>流浪倒數 {{ 00:00 }}</span> -->
                        <h4>流浪倒數 00:00</h4>
                        <div class="middle_campervan">
                            <div class="echaust">
                                <img class="echaustA" src="../assets/images/wander/exhaust.png" alt="echaust">
                                <img class="echaustB" src="../assets/images/wander/exhaust.png" alt="echaust">
                            </div>
                            <img class="campervan" src="../assets/images/wander/campervan.png" alt="campervan">
                        </div>
                        <div class="middle_start">
                            <button class="start">Start</button>
                            <!-- <button class="start">{{ 00:00 }}</button> -->
                        </div>
                    </div>
                    <div class="loot">
                        <div class="loot_container">
                            <img src="../assets/images/wander/gift_icon.png" alt="gift">
                            <div class="notification_container">
                                <div class="gift_notify"></div>
                            </div>
                            <img src="../assets/images/wander/letter_icon.png" alt="letter">
                            <div class="notification_container">
                                <div class="letter_notify"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </template>
    </layout>
</template>
<script>
//import 這頁需要的元件
import layout from '@/components/layout.vue'
import userinfo from '@/components/userInfo.vue'

export default {
    components: {
        layout,
        userinfo
    }
}
</script>