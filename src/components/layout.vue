<template>
    <main class="main-block">
        <div class="main">
            <section class="section section-left">
                <navbar :show="navBarSow"></navbar>
                <div class="left-expand" ref="leftExpand">
                    <p class="statement">
                        ©本網站為緯育TibaMe第87期前端工程師專業技術養成班學員作品,僅供學習、展示之用途。
                    </p>
                    <button class="arrowBtn" @click="show">
                        <img src="../assets/images/icon/right-arrow.svg" alt="">
                    </button>
                </div>
            </section>
            <section class="section-right">
                <slot name="section-right-content"></slot>
            </section>
        </div>
    </main>
</template>
<script>
//import 這頁需要的元件
import navbar from '@/components/navBar.vue'

export default {
    components: {
        navbar
    },
    data() {
        return {
            navBarSow: true,
        };
    },
    methods: {
        show() {
            this.$refs.leftExpand.classList.toggle("left-expand-off")
            this.navBarSow = !this.navBarSow;
        }
    }
}
</script>