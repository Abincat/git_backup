<template>
    <layout>
        <template #section-right-content>
            <div class="friends">
                <div class="friends-title">
                    <h3>好友列表</h3>
                    <div class="friends-tab">
                        <div v-for="tab in tabs" :key="tab.id" :class="['tab', { 'active': currentTab == tab.id }]"
                            :id="tab.id" @click="currentTab = tab.id">{{ tab.name }}</div>
                        <span class="glider"></span>
                    </div>
                </div>
                <component :is="currentTabComponent"></component>
            </div>
        </template>
    </layout>
</template>
<script>
//import 這頁需要的元件
import layout from '@/components/layout.vue'
import tab1 from '@/components/friendsList.vue'
import tab2 from '@/components/friendInvitation.vue'
import tab3 from '@/components/friendBlackList.vue'

export default {
    components: {
        layout,
        tab1,
        tab2,
        tab3
    },
    data() {
        return {
            currentTab: "tab1",
            tabs: [
                {
                    id: "tab1",
                    name: "所有好友"
                },
                {
                    id: "tab2",
                    name: "好友邀請"
                },
                {
                    id: "tab3",
                    name: "黑名單"
                },
            ],
        }

    },
    computed: {
        currentTabComponent() {
            return `${this.currentTab}`;
        }
    }
}
</script>