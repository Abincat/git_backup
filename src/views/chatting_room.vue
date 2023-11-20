<template>
    <layout>
        <template #section-right-content>
            <!-- <h1>KNOCK KNOCK 聊天大廳</h1>
            <input type="text" placeholder="username" v-model="username">
            <input type="text" placeholder="text" v-model="message">
            <button @click="addMessage" class="btn btn-outline-secondary">送出</button>
            <ul class="messages">

                <li v-for="(i, index) in chatroom" :key="index"
                    :class="{ 'is-right': isCurrentUser(i.username), 'is-left': !isCurrentUser(i.username) }">
                    <span>
                        {{ isCurrentUser(i.username) ? 'You' : i.username }}: {{ i.message }}{{ i.time }}
                    </span>
                </li>
            </ul> -->
            <div class="chatroom-start" v-if="!isSubmitted">
                <h1>加入聊天大廳</h1>
                <div class="user-img-section">
                    <div class="img-select" v-for="(i, key) in imgList" :key="i.id">
                        <img :class="{ active: i.url == activeImage }" :src="i.url" alt="" @click="selectImg(i.url)">
                    </div>
                </div>
                <div class="user-content">
                    <input type="text" placeholder="請輸入暱稱" v-model="tempUsername">
                    <button @click="submitUsername" class="Btn Btn-dark chatbtn">進入</button>
                </div>
            </div>


            <div class="chatroom" v-else>
                <!-- <h1>聊天大廳</h1> -->
                <div class="chat-section">
                    <ul v-for="(i, key) in chatroom" :key="key" ref="chatContainer">


                        <span class="middle" :class="{
                            'user-right': i.username === username,
                            'user-left': i.username !== username
                        }">
                            <img :src="i.image" alt="">
                        </span>

                        <span class="bottom" :class="{
                            'content-right': i.username === username,
                            'content-left': i.username !== username
                        }">
                            <li>{{ i.message }}</li>
                        </span>
                        <span class="top" :class="{
                            'user-right': i.username === username,
                            'user-left': i.username !== username
                        }">

                            <li class="username">{{ i.username }}</li>
                            <li> {{ i.time }}</li>

                        </span>

                    </ul>


                </div>


                <div class="user-section">

                    <div class="text-content">
                        <div class="input-section">
                            <input type="text" v-model="message" placeholder="請輸入信息">
                            <img src="../assets/images/chatroom/Vector.svg" alt="" @click="addMessage">
                        </div>

                        <button @click="addMessage" @keyup.enter="addMessage" class="Btn Btn-dark chatbtn">送出</button>
                    </div>
                </div>
            </div>
        </template>
    </layout>
</template>

<script>
import layout from '../components/layout.vue';
import { initializeApp } from 'firebase/app';
import { getAuth } from 'firebase/auth';
import { getDatabase, ref, push, set, get, query, orderByKey, limitToLast, onValue } from 'firebase/database';
import { nextTick } from 'vue';

const firebaseApp = initializeApp({
    apiKey: "AIzaSyBLqg3ReSlc8ukkM6Fq3syretEb-zJ6MDs",
    authDomain: "grouptwo-5f7c1.firebaseapp.com",
    databaseURL: "https://grouptwo-5f7c1-default-rtdb.firebaseio.com",
    projectId: "grouptwo-5f7c1",
    storageBucket: "grouptwo-5f7c1.appspot.com",
    messagingSenderId: "808510575879",
    appId: "1:808510575879:web:d0e8896ccc079472bbe1a2"
});

const auth = getAuth(firebaseApp);
const db = getDatabase(firebaseApp);
function writeUserData(userID, name, email) {
    set(ref(db, 'user/' + userID),
        {
            username: name,
            email
        })
}

// writeUserData(3, "測試測試", "ttt@gmail.com");

const messageRef = ref(db, 'chatroom/messages');

// export default {
//     components: {
//         layout
//     },
//     data() {
//         return {
//             message: " ",
//             chatroom: [],
//             username: " ",

//         }
//     },
//     methods: {
//         isCurrentUser(username) {
//             return username === this.username; // 返回 true 或 false
//         },
//         addMessage() {
//             const date = new Date().getTime();
//             const newMessage = push(messageRef);
//             set(newMessage, {
//                 username: this.username,
//                 message: this.message,
//                 time: new Date(date).toLocaleString()
//             })
//             this.message = ''
//         },

//     },
//     mounted() {
//         onValue(messageRef, (snapshot) => {
//             const data = snapshot.val();
//             // console.log(data)
//             this.chatroom = data
//         })
//     }
// }

export default {
    components: {
        layout
    },
    data() {
        return {
            activeImage: '',
            active: false,
            message: " ",
            chatroom: [],
            username: " ",
            tempUsername: "",
            isSubmitted: false,
            currentMessageImage: '', // 存放選中的圖片
            imgList: [
                {
                    id: 1,
                    url: 'src/assets/images/user/userimage.png'
                },
                {
                    id: 2,
                    url: 'src/assets/images/user/userimage-g.png'
                },
                {
                    id: 3,
                    url: 'src/assets/images/chatroom/man_A.png'
                },
                {
                    id: 4,
                    url: 'src/assets/images/chatroom/woman_B.png'
                }
            ]
        }
    },
    methods: {
        forceRerender() {
            this.$forceUpdate();
        },
        addMessage() {
            const date = new Date().getTime();
            const newMessage = push(messageRef);
            let image = this.currentMessageImage || 'src/assets/images/user/userimage.png'; // 設置預設值

            if (this.message !== "") {
                set(newMessage, {
                    username: this.username,
                    message: this.message,
                    time: new Date(date).toLocaleString(),
                    image: image, // 新增 image 屬性
                })
                this.message = '';

                this.$nextTick(() => {
                    this.scrollToBottom();
                });

            } else {
                alert("請輸入信息");
            }
        },
        submitUsername() {
            if (this.tempUsername.trim() !== "") {
                this.username = this.tempUsername;
                this.tempUsername = "";
                this.isSubmitted = true;

                this.$nextTick(() => {
                    this.scrollToBottom();
                });

            } else {
                alert("請輸入暱稱")
            };
        },
        selectImg(image) {
            this.currentMessageImage = image || '';
            console.log(this.currentMessageImage);
            this.active = !this.active;
            this.activeImage = image
        }, scrollToBottom() {
            // const chatContainer = this.$refs.chatContainer;
            const chatContainer = document.querySelector('.slot-content')
            console.log("Trying to scroll to bottom...");
            if (chatContainer) {
                console.log("chatContainer test is available");
                if (chatContainer.scrollHeight > 0) {
                    setTimeout(() => {
                        chatContainer.scrollTo(0, chatContainer.scrollHeight)
                        console.log("Scrolled successfullyfsfsfs!");
                    }, 10);
                    console.log(chatContainer.scrollHeight);
                    // chatContainer.scroll(0, chatContainer.scrollHeight);
                    chatContainer.scroll({
                        top: 9000,
                    });
                    console.log("Scrolled successfully!");
                } else {
                    console.warn('chatContainer.scrollHeight is 0. Cannot scroll to bottom.')
                }
            } else {
                console.error("chatContainer is undefined.");
            }
        },


    },

    mounted() {
        this.forceRerender();
        onValue(messageRef, (snapshot) => {
            const data = snapshot.val();
            this.chatroom = data;
            this.$nextTick(() => {
                this.scrollToBottom();
            });
        });
        this.$nextTick(() => {
            const chatContainer = this.$refs.chatContainer;
            if (chatContainer) {
                // console.log("chatContainer is available");

            } else {
                console.error("chatContainer is undefined.");
            }
        })
    },

}
</script>