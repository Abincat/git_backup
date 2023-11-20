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
            <section class="section-right" :style="{ width: rightWidth }">
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
            navBarShow: true, //左側選單是否顯示，預設顯示
            rightWidth: '100%', //右側區塊寬度
        };
    },
    mounted() {

        this.localShow();
        this.setRightWidth();

        //隨著畫面縮放重新設定
        window.addEventListener('resize', () => {
            this.localShow();
            this.setRightWidth();
        });

    },
    methods: {

        clickShow() {
            //控制左側選單收合效果

            //僅作用於畫面大於767.98
            if (window.innerWidth > 767.98) {
                this.$refs.leftExpand.classList.toggle("left-expand-off");
                this.navBarShow = !this.navBarShow;

                //將狀態儲存在local Storage
                localStorage.setItem('navBarShow', this.navBarShow);

                if (this.navBarShow) {
                    this.rightWidth = 'calc(100% - 280px)'
                }
                else {
                    this.rightWidth = 'calc(100% - 100px)'
                }
            }
        },

        localShow() {
            //透過local Storage儲存左側選單收合狀態

            //取出localstorage儲存的值
            let localShow = localStorage.getItem('navBarShow');

            if (localShow != null) {

                //畫面小於767.68之後，選單放置在最底部，沒有收合效果
                if (window.innerWidth < 767.98 && localShow == 'false') {
                    this.navBarShow = true;
                    this.$refs.leftExpand.classList.remove("left-expand-off");
                } else if (localShow == 'false') {
                    // console.log(localShow)
                    this.$refs.leftExpand.classList.add("left-expand-off");
                    this.navBarShow = false;
                }
            }
        },
        setRightWidth() {
            //設定右側寬度

            if (window.innerWidth < 767.98) {
                this.rightWidth = '100%'

            } else if (this.navBarShow) {
                this.rightWidth = 'calc(100% - 280px)'
            }
            else {
                this.rightWidth = 'calc(100% - 100px)'
            }
        }
    },
    provide() {
        const currentPage = this.$router.currentRoute.value.name;

        if (currentPage.includes('wander')) {
            return {
                hide: true
            };
        } else {
            return {
                hide: false
            };
        }
    }
}
</script>