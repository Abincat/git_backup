<template>
    <layout>
        <template #section-right-content>
            <div class="qa">
                <div class="qa-grid">
                    <div class="qa-left">
                        <h1>Categories</h1>
                        <ul>
                            <li>會員常見問題</li>
                            <li>會員常見問題</li>
                            <li>會員常見問題</li>
                            <li>會員常見問題</li>
                            <li>會員常見問題</li>
                        </ul>
                    </div>
                    <div class="qa-right">
                        <h1>常見問題</h1>
                        <div class="list" v-for="(l, i) in lists" :key="i">
                            <div class="title" @click="toggle(i)">
                                {{ l.title }}
                            </div>
                                <ul class="item" v-show="l.show">
                                <li v-for="(item, index) in l.items" :key="index">{{ item }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </layout>
</template>
  
<script>
import layout from '@/components/layout.vue';

export default {
    components: {
        layout,
    },
    data() {
        return {
            lists: [
                {
                    title: '常見問題常見問題常見問題常見問題',
                    items: ['qa1', 'qa2', 'qa3'],
                },

                {
                    title: '常見問題常見問題常見問題常見問題',
                    items: ['qa1', 'qa2', 'qa3'],
                },
                {
                    title: '常見問題常見問題常見問題常見問題',
                    items: ['qa1', 'qa2', 'qa3'],
                },
                {
                    title: '常見問題常見問題常見問題常見問題',
                    items: ['qa1', 'qa2', 'qa3'],
                },
                {
                    title: '常見問題常見問題常見問題常見問題',
                    items: ['qa1', 'qa2', 'qa3'],
                },
                {
                    title: '常見問題常見問題常見問題常見問題',
                    items: ['qa1', 'qa2', 'qa3'],
                },
            ],
        }
    },
    methods: {

        toggle: function(index) {
    if (this.lists[index].show) {
        this.lists[index].show = false; // 如果已展开，则关闭
    } else {
        this.lists.forEach((list, i) => (list.show = i === index)); // 展开当前项，关闭其他项
    }
},

    },
};
</script>

  