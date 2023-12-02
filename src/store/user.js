// 匯入 defineStore 的方法
import { defineStore } from 'pinia'


// 這裡帶入兩個參數，一個是store 名稱、另一個是屬性參數
export const useUserStore = defineStore('userStore', {

    // 對應 data
    state: () => ({
        userID: '',
        userName: '',
        userImg: ''
    }),

    // 對應 computed (物件形式)
    getters: {

        // getUserName: (state) => `我的名字叫${state.name}`
    },
    // 對應 methods (物件形式)
    actions: {
        // updateUser() {
        //     this.name = 'Angel'
        // }
    }
})  