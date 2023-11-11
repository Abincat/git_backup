<template>
    <main class="main-block">
        <div class="main">
            <section class="section section-left">
                <navbar :show="navBarShow"></navbar>
                <div class="left-expand" ref="leftExpand">
                    <p class="statement">
                        ©本網站為緯育TibaMe第87期前端工程師專業技術養成班學員作品,僅供學習、展示之用途。
                        <router-link :to="{ name: 'b_index' }">
                            <img src="../assets/images/icon/Crown.svg" alt="">
                            Staff-only
                        </router-link>
                    </p>
                    <button class="arrowBtn" @click="clickShow">
                        <img src="../assets/images/icon/right-arrow.svg" alt="">
                    </button>
                </div>
            </section>
            <section class="section-right">
                <userinfo></userinfo>
                <div class="slot-content">
                    <slot name="section-right-content"></slot>
                </div>
            </section>
        </div>
    </main>
</template>
<script>
//import 這頁需要的元件
import navbar from '@/components/navBar.vue'
import userinfo from '@/components/userInfo.vue'

export default {
    components: {
        navbar,
        userinfo
    },
    data() {
        return {
            navBarShow: true,
        };
    },
    mounted() {

        this.localShow();
        window.addEventListener('resize', this.localShow());

    },
    methods: {
        clickShow() {
            this.$refs.leftExpand.classList.toggle("left-expand-off");
            this.navBarShow = !this.navBarShow;
            localStorage.setItem('navBarShow', this.navBarShow);
        },

        localShow() {
            let localShow = localStorage.getItem('navBarShow');
            if (localShow != null) {
                if (window.innerWidth < 767.98 && localShow == 'false') {
                    this.navBarShow = true;
                    this.$refs.leftExpand.classList.remove("left-expand-off")
                } else if (localShow == 'false') {
                    // console.log(localShow)
                    this.$refs.leftExpand.classList.add("left-expand-off")
                    this.navBarShow = false
                }
            }
        }
    }
}
</script>