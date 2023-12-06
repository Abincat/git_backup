import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/home.vue'


const routes = [
    {
        // 前台 首頁
        path: '/',
        name: 'home',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: Home
    },
    {
        // 前台 搜尋好友
        path: '/search_friends/:keyword?',
        name: 'search_friends',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/search_friends.vue')
    },
    {
        // 前台 聊天大廳
        path: '/chatting_room',
        name: 'chatting_room',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/chatting_room.vue')
    },
    {
        // 前台 遊樂場
        path: '/playground',
        name: 'playground',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/playground.vue'),
    },
    {
        // 前台 貪食蛇
        path: '/playground/snake',
        name: 'snake',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/snake.vue')
    },
    {
        // 前台 白萬小學堂
        path: '/playground/million_school_start',
        name: 'million_school_start',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('../views/million_school_start.vue')
    },
    {
        // 前台 白萬小學堂
        path: '/playground/million_school',
        name: 'million_school',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/million_school.vue')
    },
    {
        // 前台 白萬小學堂
        path: '/playground/million_school_end',
        name: 'million_school_end',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('../views/million_school_end.vue')
    },
    {
        // 前台 主題活動
        path: '/activity',
        name: 'activity',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/activity.vue'),
    },
    {
        // 前台 活動詳細頁
        path: '/activity/activity_info/:activityID?',
        name: 'activity_info',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/activity_info.vue')
    },
    {
        // 前台 活動搜尋結果
        path: '/activity/activity_search',
        name: 'activity_search',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/activity_search.vue')
    },
    {
        // 前台 關於我們
        path: '/about-us',
        name: 'about-us',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/about_us.vue')
    },
    {
        // 前台 我有問題
        path: '/customer-service',
        name: 'service',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/service.vue'),
    },
    {
        // 前台 聯繫我們
        path: '/customer-service/contact_us',
        name: 'contact_us',
        component: () => import('@/views/contact_us.vue')
    },
    {
        // 前台 常見問題
        path: '/customer-service/qa',
        name: 'qa',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/qa.vue')
    },
    {
        // 前台 客服小幫手
        path: '/customer-service/chatbot',
        name: 'chatbot',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/chatbot.vue')
    },
    {
        // 前台 個人版面
        path: '/mypage',
        name: 'mypage',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/mypage.vue'),
    },
    {
        // 前台 編輯個人版面
        path: '/mypage/mypage_edit',
        name: 'mypage_edit',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/mypage_edit.vue')
    },
    {
        // 前台 我要去流浪
        path: '/mypage/wander',
        name: 'wander',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/wander.vue')
    },
    {
        // 前台 好友清單
        path: '/mypage/friends',
        name: 'friends',
        meta: {
            requiresAuth: true // 添加一個 meta 屬性來標記需要登錄的頁面
        },
        component: () => import('@/views/friends.vue')
    },
    {
        // 前台 會員登入
        path: '/login',
        name: 'member_login',
        component: () => import('@/views/member_login.vue')
    },
    {
        // 前台 會員註冊
        path: '/sign_up',
        name: 'member_signup',
        component: () => import('@/views/member_signup.vue')
    },
    {
        // 前台 會員忘記密碼
        path: '/password_reset',
        name: 'member_pwd_reset',
        component: () => import('@/views/member_pwd_reset.vue')
    },

    /*--------------------------  backside --------------------------*/

    {
        // 後台 登入頁
        path: '/backend',
        name: 'b_index',
        component: () => import('@/views/b_index.vue'),
        children: [
        ]
    },
    {
        // 後台 會員管理
        path: '/backend/member_management',
        name: 'b_member',
        component: () => import('@/views/b_member.vue')
    },
    {
        // 後台 活動管理
        path: '/backend/activity_management',
        name: 'b_activity',
        component: () => import('@/views/b_activity.vue')
    },
    {
        // 後台 客服專區
        path: '/backend/service_management',
        name: 'b_service',
        component: () => import('@/views/b_service.vue')
    },
    {
        // 後台 任務管理
        path: '/backend/mission_management',
        name: 'b_mission',
        component: () => import('@/views/b_mission.vue')
    },
    {
        // 後台 常見問題
        path: '/backend/qa_management',
        name: 'b_qa',
        component: () => import('@/views/b_qa.vue')
    },

    /*--------------------------  404 --------------------------*/
    {
        path: '/:pathMatch(.*)*', // 任何不存在的路徑都會跳轉到首頁
        component: Home
    },

]


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
})


router.beforeEach((to, from, next) => {

    const noAuthPages = ['/login', '/sign_up', '/password_reset'];
    const cookies = document.cookie.split('; ');

    if (noAuthPages.includes(to.path) && cookies.length > 1) {
        // 如果要訪問的頁面為登入頁，但用戶已經登錄，則跳轉到首頁
        next({ name: 'home' });

    } else if (to.meta.requiresAuth && cookies.length <= 1) {
        // 如果要訪問的頁面需要登錄，但用戶未登錄，則跳轉到登錄頁面
        next({ name: 'member_login' });

    } else {
        next();
    }

})


export default router

