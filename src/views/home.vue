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
                        <postItem :postItems="postItems" :userImage="userData.userImg" @addComment="addComment">
                        </postItem>
                    </div>
                </div>
                <div class="home-info">
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
                    <div class="home-hot-activity">
                        <div class="hot-activity-title">
                            <img src="../assets/images/icon/hot.svg" alt="">
                            <h5>熱門活動</h5>
                        </div>
                        <div class="activity-list">
                            <router-link v-for="(item, index) in activities" :key="item.id"
                                :to="{ name: 'activity_info', params: { activityID: item.id } }" class="activity-item">
                                <div class="activity-date">
                                    <p class="date">
                                        <span class="month">{{ item.month }}</span>月
                                        <span class="month">{{ item.day }}</span>日
                                    </p>
                                    <p class="week">{{ item.week }}</p>
                                </div>
                                <div class="activity-title">
                                    <p class="title">{{ item.name }}</p>
                                    <p class="time">{{ item.location }}</p>
                                </div>
                            </router-link>
                        </div>
                        <div class="see-more">
                            <router-link :to="{ name: 'activity' }">
                                查看更多活動
                            </router-link>
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
import friendView from '@/assets/images/icon/friend-view-select.svg';
import globalView from '@/assets/images/icon/global-view-select-2.svg';
import privateView from '@/assets/images/icon/private-view-select.svg';

import { useUserStore } from '@/store/user';

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
                // {
                //     id: 1,
                //     userName: '林小美',
                //     userImg: gBaseImg,
                //     content: "今天天氣真好",
                //     status: 2, //設定狀態(公開 0/ 好友 1/私人 2)
                //     likes: 20,
                //     createTime: '2023/12/30 23:59',
                //     postImages: [
                //         {
                //             id: 1,
                //             src: sampleImg,
                //         },
                //         {
                //             id: 2,
                //             src: sampleImg2,
                //         },
                //     ],
                //     replieds: [
                //         {
                //             id: 1,
                //             commemtText: '好棒',
                //             name: '王小明',
                //             userImg: bBaseImg,
                //             createTime: '2023/12/31 23:50:59'
                //         },
                //     ],
                // },
            ],
            userData: {
                userId: '',
                userName: '',
                userImg: '',
            },
            activities: [
                // {
                //     id: '1',
                //     name: '夏日音樂祭',
                //     month: '12',
                //     day: '25',
                //     week: '星期六',
                //     location: '大台北河濱公園'
                // },
            ]
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
                userImg: this.userData.userImg,
                createTime: Today.toLocaleString("zh-tw", { hour12: false }),
                postId: postId,
            };
            this.postItems[i].replieds.push(commentItem);

            e.target.parentNode.previousSibling.value = '';
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

            //傳入memberID 取回自己、好友及公開的貼文
            axios
                .post('api/getPostItems.php', JSON.stringify(memberId))
                .then(response => {
                    // console.log(response.data);

                    if (response.data != 0) {

                        response.data.forEach((element, index) => {
                            //設定post資料
                            const post = {
                                id: element['POST_ID'],
                                userId: element['MENBER_ID'],
                                userName: element['MEMBER_LAST_NAME'] + element['MEMBER_FIRST_NAME'],
                                userImg: 'data:image;base64,' + element['MEMBER_PIC'],
                                content: element['POST_CONTENT'],
                                status: element['POST_STATUS'], //設定狀態(公開 0/ 好友 1/私人 2)
                                likes: 0,
                                createTime: element['POST_CREATETIME'].replaceAll('-', '/'),
                                postImages: [],
                                replieds: [],
                            }

                            if (post.status == 0) {
                                post.status = globalView;
                            } else if (post.status == 1) {
                                post.status = friendView;
                            } else {
                                post.status = privateView;
                            }

                            // post.postImages = this.getPostImg(post.id);
                            this.getPostImg(post.id, index);
                            this.getPostComment(post.id, index);

                            // post.replieds = this.replieds;


                            this.postItems.push(post);
                        });

                        // console.log(posts);
                    }

                })
                .catch(error => {
                    console.log(error);
                });
        },
        getPostImg(id, i) {

            const postId = { id }

            axios
                .post('api/getPostImg.php', JSON.stringify(postId))
                .then(response => {

                    // console.log(response.data);

                    if (response.data == '0') {
                        console.log('no photo');
                    } else {
                        // console.log(response.data);
                        const postImages = [];
                        const result = response.data;

                        result.forEach(element => {
                            const imageItem = {
                                id: element['ID'],
                                // src: 'data:image;base64,' + element['POST_IMAGE'],
                                src: element['POST_IMAGE'],
                            }

                            postImages.push(imageItem);
                        })

                        this.postItems[i].postImages = postImages;
                    }
                })
                .catch(error => {
                    console.log(error);
                });

        },
        getPostComment(id, i) {

            const postId = { id }

            axios
                .post('api/getPostComment.php', JSON.stringify(postId))
                .then(response => {
                    if (response.data != 0) {
                        // console.log(response.data);
                        const replieds = [];
                        response.data.forEach(element => {
                            const commentItem = {
                                id: element['COMMENT_ID'],
                                commemtText: element['COMMENT_TEXT'],
                                name: element['MEMBER_LAST_NAME'] + element['MEMBER_FIRST_NAME'],
                                userImg: 'data:image;base64,' + element['MEMBER_PIC'],
                                createTime: element['COMMENT_CREATETIME'].replaceAll('-', '/'),
                            }

                            replieds.push(commentItem);
                        })

                        this.postItems[i].replieds = replieds;

                    } else {
                        // console.log('0');
                    }
                })
                .catch(error => {
                    console.log(error);
                });

        },
        getActivities() {

            axios.get('api/getHotActivities.php')
                .then(response => {
                    console.log(response.data)
                    if (response.data != 0) {
                        let count = 0;

                        response.data.forEach(element => {
                            if (element['ACTIVITY_REMAINING_PLACES'] != 0 && count < 3) {
                                const activity = {
                                    id: element['ACTIVITY_ID'],
                                    name: element['ACTIVITY_NAME'],
                                    month: new Date(element['ACTIVITY_DATE'].replaceAll('-', '/')).getMonth() + 1,
                                    day: new Date(element['ACTIVITY_DATE'].replaceAll('-', '/')).getDate(),
                                    week: new Date(element['ACTIVITY_DATE'].replaceAll('-', '/')).getDay(),
                                    location: element['ACTIVITY_ADDRESS']
                                }

                                this.activities.push(activity);
                                count++;
                            }
                        })

                        // this.getWeek(this.activities);
                        this.activities.forEach(element => {
                            switch (element['week']) {
                                case 0:
                                    element['week'] = "星期天";
                                    break;
                                case 1:
                                    element['week'] = "星期一";
                                    break;
                                case 2:
                                    element['week'] = "星期二";
                                    break;
                                case 3:
                                    element['week'] = "星期三";
                                    break;
                                case 4:
                                    element['week'] = "星期四";
                                    break;
                                case 5:
                                    element['week'] = "星期五";
                                    break;
                                case 6:
                                    element['week'] = "星期六";
                                    break;
                            }

                            if (element['month'] < 10) {

                                element['month'] = '0' + element['month'];
                            }
                        })

                        // console.log(this.activities);

                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },

    },
    beforeMount() {
        //取得會員資料
        const userStore = useUserStore();

        this.userData = {
            userId: userStore.userID,
            userName: userStore.userName,
            userImg: userStore.userImg,
        }

        this.getPostItems();
        this.getActivities();
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