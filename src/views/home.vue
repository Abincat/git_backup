<template>
    <layout>
        <template #section-right-content>
            <div class="home" ref="home">
                <div class="home-post">
                    <div class="add-post" ref="addPostBlock">
                        <p v-if="addPostTitleShow" @click="addPostBlock">我有話要說...</p>
                        <addPost v-else @keepPostBlock="keepPostBlock"></addPost>
                    </div>
                    <div class="post-items">
                        <postItem></postItem>
                    </div>
                </div>
                <div class="home-info">
                    <div class="home-hot-activity">
                        <div class="hot-activity-title">
                            <img src="../assets/images/icon/hot.svg" alt="">
                            <h5>熱門活動</h5>
                        </div>
                        <div class="activity-list">
                            <router-link :to="{ name: 'activity_info' }" class="activity-item">
                                <div class="activity-date">
                                    <p class="date">
                                        <span class="month">10</span>月
                                        <span class="month">20</span>日
                                    </p>
                                    <p class="week">星期六</p>
                                </div>
                                <div class="activity-title">
                                    <p class="title">夏日音樂祭</p>
                                    <p class="time">18:00-22:00 大台北河濱公園</p>
                                </div>
                            </router-link>
                            <router-link :to="{ name: 'activity_info' }" class="activity-item">
                                <div class="activity-date">
                                    <p class="date">
                                        <span class="month">10</span>月
                                        <span class="month">20</span>日
                                    </p>
                                    <p class="week">星期六</p>
                                </div>
                                <div class="activity-title">
                                    <p class="title">夏日音樂祭</p>
                                    <p class="time">18:00-22:00 大台北河濱公園</p>
                                </div>
                            </router-link>
                            <router-link :to="{ name: 'activity_info' }" class="activity-item">
                                <div class="activity-date">
                                    <p class="date">
                                        <span class="month">10</span>月
                                        <span class="month">20</span>日
                                    </p>
                                    <p class="week">星期六</p>
                                </div>
                                <div class="activity-title">
                                    <p class="title">夏日音樂祭</p>
                                    <p class="time">18:00-22:00 大台北河濱公園</p>
                                </div>
                            </router-link>
                        </div>
                        <div class="see-more">
                            <router-link :to="{ name: 'activity' }">
                                查看更多活動 >
                            </router-link>
                        </div>
                    </div>
                    <div class="home-chatting-block">
                        <div class="chatting-title">
                            <div class="title">
                                <img src="../assets/images/icon/chat.svg" alt="">
                                <h5>聊天大廳</h5>
                            </div>
                            <div class="enter">
                                <router-link :to="{ name: 'chatting_room' }">
                                    <img src="../assets/images/icon/enter.svg" alt="">
                                </router-link>
                            </div>
                        </div>
                        <div class="chatting-room-mesg" ref="chattingContainer">
                            <ul ref="chattingList">
                                <li v-for="(chatData, key) in chatroom" :key="key">
                                    <div class="user-info">
                                        <p class="username">{{ chatData.username }}</p>
                                        <p> {{ chatData.time }}</p>
                                    </div>
                                    <div class="chatting-content">
                                        <p>{{ chatData.message }}</p>
                                    </div>
                                </li>
                            </ul>
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
import addPost from '@/components/addPost.vue'
import postItem from '@/components/postItem.vue'
import { initializeApp } from 'firebase/app';
import { getDatabase, ref, push, set, get, query, orderByKey, limitToLast, onValue } from 'firebase/database';

const firebaseApp = initializeApp({
    apiKey: "AIzaSyBLqg3ReSlc8ukkM6Fq3syretEb-zJ6MDs",
    authDomain: "grouptwo-5f7c1.firebaseapp.com",
    databaseURL: "https://grouptwo-5f7c1-default-rtdb.firebaseio.com",
    projectId: "grouptwo-5f7c1",
    storageBucket: "grouptwo-5f7c1.appspot.com",
    messagingSenderId: "808510575879",
    appId: "1:808510575879:web:d0e8896ccc079472bbe1a2"
});

const db = getDatabase(firebaseApp);
const messageRef = ref(db, 'chatroom/messages');

export default {
    components: {
        layout,
        addPost,
        postItem,
    },
    data() {
        return {
            addPostTitleShow: true,
            chatroom: [],
            homeWidth: 0,
            repliedMsgs: [
                {
                    id: 1,
                    content: '',
                    time: '2023-11-11',
                }
            ],
        }
    },
    methods: {
        addPostBlock() {
            this.$refs.addPostBlock.classList.toggle('add-post-large');
            this.addPostTitleShow = !this.addPostTitleShow;
        },
        keepPostBlock(keep) {
            console.log(keep);

            if (!keep) {
                this.$refs.addPostBlock.classList.toggle('add-post-large');
                this.addPostTitleShow = !this.addPostTitleShow;
            }
        },
        scrollToBottom() {
            const scrollContainer = this.$refs.chattingContainer;

            // 視窗滾到底部
            scrollContainer.scrollTop = scrollContainer.scrollHeight;
        },
    },
    mounted() {

        this.scrollToBottom();

        onValue(messageRef, (snapshot) => {
            const data = snapshot.val();
            // console.log(data);
            this.chatroom = data;
        })

        // this.homeWidth = this.$refs.home.clientWidth;
        // console.log(this.homeWidth)

    },
    watch: {
        chatroom() {
            // 當內容發生變化時滾動到底部
            this.$nextTick(() => {
                this.scrollToBottom();
            });
        }
    },
}
</script>