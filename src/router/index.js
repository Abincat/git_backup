import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/home.vue'


const routes = [
    {
        // 前台 首頁
        path: '/',
        name: 'home',
        component: Home
    },
    {
        // 前台 聊天大廳
        path: '/chatting_room',
        name: 'chatting_room',
        component: () => import('../views/chatting_room.vue')
    },
    {
        // 前台 遊樂場
        path: '/playground',
        name: 'playground',
        component: () => import('../views/playground.vue')
    },
    {
        // 前台 貪食蛇
        path: '/playground/snake',
        name: 'snake',
        component: () => import('../views/snake.vue')
    },
    {
        // 前台 白萬小學堂
        path: '/playground/million_school',
        name: 'million_school',
        component: () => import('../views/million_school.vue')
    },
    {
        // 前台 主題活動
        path: '/activity',
        name: 'activity',
        component: () => import('../views/activity.vue')
    },
    {
        // 前台 活動詳細頁
        path: '/activity/activity_info',
        name: 'activity_info',
        component: () => import('../views/activity_info.vue')
    },
    {
        // 前台 活動搜尋結果
        path: '/activity/activity_search',
        name: 'activity_search',
        component: () => import('../views/activity_search.vue')
    },
    {
        // 前台 關於我們
        path: '/about-us',
        name: 'about-us',
        component: () => import('../views/about_us.vue')
    },
    {
        // 前台 我有問題
        path: '/customer-service',
        name: 'service',
        component: () => import('../views/service.vue')
    },
    {
        // 前台 聯繫我們
        path: '/customer-service/contact_us',
        name: 'contact_us',
        component: () => import('../views/contact_us.vue')
    },
    {
        // 前台 常見問題
        path: '/customer-service/qa',
        name: 'qa',
        component: () => import('../views/qa.vue')
    },
    {
        // 前台 客服小幫手
        path: '/customer-service/chatbot',
        name: 'chatbot',
        component: () => import('../views/chatbot.vue')
    },
    {
        // 前台 個人版面
        path: '/mypage',
        name: 'mypage',
        component: () => import('../views/mypage.vue')
    },
    {
        // 前台 編輯個人版面
        path: '/mypage/mypage_edit',
        name: 'mypage_edit',
        component: () => import('../views/mypage_edit.vue')
    },
    {
        // 前台 我要去流浪
        path: '/mypage/wander',
        name: 'wander',
        component: () => import('../views/wander.vue')
    },
    {
        // 前台 好友清單
        path: '/mypage/friends',
        name: 'friends',
        component: () => import('../views/friends.vue')
    },
    {
        // 前台 會員登入
        path: '/login',
        name: 'member_login',
        component: () => import('../views/member_login.vue')
    },
    {
        // 前台 會員註冊
        path: '/sign_up',
        name: 'member_signup',
        component: () => import('../views/member_signup.vue')
    },

    /*--------------------------  backside --------------------------*/

    {
        // 後台 登入頁
        path: '/back/login',
        name: 'b_index',
        component: () => import('../views/b_index.vue')
    },
    {
        // 後台 會員管理
        path: '/back/member',
        name: 'b_member',
        component: () => import('../views/b_member.vue')
    },
    {
        // 後台 活動管理
        path: '/back/activity',
        name: 'b_activity',
        component: () => import('../views/b_activity.vue')
    },
    {
        // 後台 客服專區
        path: '/back/service',
        name: 'b_service',
        component: () => import('../views/b_service.vue')
    },
    {
        // 後台 任務管理
        path: '/back/mission',
        name: 'b_mission',
        component: () => import('../views/b_mission.vue')
    },
    {
        // 後台 常見問題
        path: '/back/qa',
        name: 'b_qa',
        component: () => import('../views/b_qa.vue')
    },

]


const router = createRouter({
    history: createWebHistory(),
    routes
})



export default router

