<template>
    <layout>
        <template #section-right-content>
            <div class="home" ref="home">
                <div class="home-post">
                    <div class="add-post" ref="addPostBlock">
                        <p v-if="addPostTitleShow" @click="addPostBlock">我有話要說...</p>
                        <addPost v-else @keepPostBlock="keepPostBlock" @addPost="addPost"></addPost>
                    </div>
                    <div class="post-items">
                        <postItem :postItems="postItems" @addComment="addComment">
                        </postItem>
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

import { useUserStore } from '@/store/user';

import gBaseImg from '@/assets/images/login/girl-base.png';
import bBaseImg from '@/assets/images/login/boy-base.png';
import sampleImg from '@/assets/images/post/sample.jpeg';
import sampleImg2 from '@/assets/images/post/sample2.jpeg';
import sampleImg3 from '@/assets/images/post/sample3.jpeg';

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
            postItems: [
                {
                    id: 1,
                    userName: '林小美',
                    userImg: gBaseImg,
                    content: "今天天氣真好",
                    status: 2, //設定狀態(公開 0/ 好友 1/私人 2)
                    likes: 20,
                    createTime: '2023/12/30 23:59',
                    postImages: [
                        {
                            id: 1,
                            src: sampleImg,
                        },
                        {
                            id: 2,
                            src: sampleImg2,
                        },
                        {
                            id: 3,
                            src: sampleImg3,
                        },
                        {
                            id: 4,
                            src: sampleImg3,
                        },
                    ],
                    replieds: [
                        {
                            id: 1,
                            commemtText: '好棒',
                            name: '王小明',
                            userImg: bBaseImg,
                            createTime: '2023/12/31 23:50:59'
                        },
                        {
                            id: 2,
                            commemtText: 'Good!',
                            name: '林小美',
                            userImg: gBaseImg,
                            createTime: '2023/12/31 23:59:59'
                        },
                        {
                            id: 3,
                            commemtText: 'Good!',
                            name: '林小美',
                            userImg: gBaseImg,
                            createTime: '2023/12/31 23:59:59'
                        },
                        {
                            id: 4,
                            commemtText: '棒棒!',
                            name: '蔡大頭',
                            userImg: bBaseImg,
                            createTime: '2023/12/31 23:59:59'
                        },
                    ],
                },
                {
                    id: 2,
                    userName: '林小美',
                    userImg: gBaseImg,
                    content: "今天天氣真好",
                    status: 2, //設定狀態(公開 0/ 好友 1/私人 2)
                    likes: 300,
                    createTime: '2023/12/25 23:59',
                    postImages: [],
                    replieds: [
                        {
                            id: 1,
                            commemtText: '羨慕',
                            name: '王小明',
                            userImg: bBaseImg,
                            createTime: '2023/10/10 23:59:59'
                        },
                    ],
                },
            ],
            userData: {
                userId: '',
                userName: '',
                userImg: '',
            },
        }
    },
    methods: {
        addPostBlock() {
            this.$refs.addPostBlock.classList.toggle('add-post-large');
            this.addPostTitleShow = !this.addPostTitleShow;
        },
        keepPostBlock(keep) {
            // console.log(keep);

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
        addPost(post) {
            const newPost = post;
            this.postItems.unshift(newPost);
            alert('新增完成');
        },
        addComment(e, i, postId, text) {

            //取得會員資料
            // const userStore = useUserStore();

            //初始化日期
            const Today = new Date();

            const commentItem =
            {
                id: Date.now(),
                commemtText: text,
                userId: this.userData.userId,
                name: this.userData.userName,
                userImg: 'data:image/png;base64,' + this.userData.userImg,
                createTime: Today.toLocaleString("zh-tw", { hour12: false }),
                postId: postId,
            };
            this.postItems[i].replieds.push(commentItem);

            // console.log(this.userData);

            // 新增回覆資料至DB
            axios
                .post('api/addPostComment.php', JSON.stringify(commentItem))
                .then(response => {
                    // console.log(response.data);
                    if (response.data != 1) {
                        alert('saveToDb Error');
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getPostItems() {
            const memberId = {
                userID: this.userData.userId,
            }

            //傳入memberID 取回相關自己及好友的貼文
            axios
                .post('api/getPostItems.php', JSON.stringify(memberId))
                .then(response => {
                    // console.log(response.data);

                })
                .catch(error => {
                    console.log(error);
                });
        }
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

        //取得會員資料
        const userStore = useUserStore();

        this.userData = {
            userId: userStore.userID,
            userName: userStore.userName,
            userImg: userStore.userImg,
        }
        this.getPostItems();
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