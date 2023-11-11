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
                <div class="user-content">
                    <input type="text" placeholder="請輸入暱稱" v-model="tempUsername">
                    <button @click="submitUsername" class="Btn Btn-dark chatbtn">進入</button>
                </div>
            </div>


            <div class="chatroom" v-else>
                <!-- <h1>聊天大廳</h1> -->
                <div class="chat-section">
                    <ul v-for="(i, key) in chatroom" :key="key">
                        <span class="top" :class="{
                            'user-right': i.username === username,
                            'user-left': i.username !== username
                        }">
                            <li class="username">{{ i.username }}</li>
                            <li> {{ i.time }}</li>

                        </span>
                        <span class="bottom" :class="{
                            'content-right': i.username === username,
                            'content-left': i.username !== username
                        }">
                            <li>{{ i.message }}</li>
                        </span>


                    </ul>


                </div>


                <div class="user-section">

                    <div class="text-content">
                        <input type="text" v-model="message" placeholder="請輸入信息">
                        <button @click="addMessage" class="Btn Btn-dark chatbtn ">送出</button>
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
            message: " ",
            chatroom: [],
            username: " ",
            tempUsername: "",
            isSubmitted: false
        }
    },
    methods: {
        addMessage() {
            const date = new Date().getTime();
            const newMessage = push(messageRef);
            set(newMessage, {
                username: this.username,
                message: this.message,
                time: new Date(date).toLocaleString()
            })
            this.message = '';
        },
        submitUsername() {
            if (this.tempUsername.trim() !== "") {
                this.username = this.tempUsername;
                this.tempUsername = "";
                this.isSubmitted = true;
            } else {
                alert("請輸入暱稱")
            }
        }
    },
    mounted() {
        onValue(messageRef, (snapshot) => {
            const data = snapshot.val();
            console.log(data)
            this.chatroom = data
        })
    }
}
</script>