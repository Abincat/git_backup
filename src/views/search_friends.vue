<template>
    <layout>
        <template #section-right-content>
            <div class="search-friends">
                <div class="friends-title">
                    <h3>搜尋好友</h3>
                    <p>關鍵字：{{ keyword }}</p>
                </div>
                <results :keyword="keyword"></results>
            </div>
        </template>
    </layout>
</template>
<script>
//import 這頁需要的元件
import layout from '@/components/layout.vue'
import results from '@/components/friendSearch.vue'


export default {
    components: {
        layout,
        results
    },
    data() {
        return {
            keyword: this.$route.params.keyword,
        }

    },
    mounted() {
        this.keyword = this.$route.params.keyword;
    },
    watch: {

    },
}
</script>