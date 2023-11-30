<template>
    <div class="post-item" v-for="(item, index) in postItems" :key="item.id">
        <div class="post-user-info">
            <div class="post-user-image">
                <img :src=item.userImg alt="">
            </div>
            <div class="post-user-time">
                <p class="user-name">{{ item.userNmae }}</p>
                <p class="user-post-time">{{ item.createTime }}</p>
            </div>
        </div>
        <div class="post-content">
            <p>
                {{ item.content }}
            </p>
        </div>
        <div :class="['post-images', { 'show': item.postImages.length > 0 }]">
            <div class="img-item" v-for="(img, index) in item.postImages" :key="img.id"><img :src=img.src alt=""></div>
        </div>
        <div class="post-feedback">
            <div class="good-block">
                <img src="../assets/images/icon/good-line.svg" alt="" class="good">
                <p class="good-nums">{{ item.likes }}</p>
                <p>人</p>
            </div>
            <div class="reply-block">
                <img src="../assets/images/icon/message.svg" alt="">
                <p class="reply-nums">123</p>
                <p>則</p>
            </div>
        </div>
        <div class="post-reply">
            <div class="replied showScrollbar">
                <div class="replied-msg" v-for="(comment, index) in item.replieds" :key="comment.id">
                    <div class="user-image">
                        <img :src=comment.userImg alt="">
                    </div>
                    <div class="replied-message">
                        <div class="user-name">{{ comment.name }}</div>
                        <div class="content">
                            <div class="text">{{ comment.commemtText }}</div>
                            <div class="replied-time">{{ comment.time }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reply-message">
                <div class="user-image">
                    <img src="../assets/images/user/userimage.png" alt="">
                </div>
                <div class="reply-input">
                    <input type="text" class="inputCommon">
                    <button type="button"><img src="../assets/images/icon/submit.svg" alt=""></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import gBaseImg from '@/assets/images/login/girl-base.png';
import bBaseImg from '@/assets/images/login/boy-base.png';
import sampleImg from '@/assets/images/post/sample.jpeg';
import sampleImg2 from '@/assets/images/post/sample2.jpeg';
import sampleImg3 from '@/assets/images/post/sample3.jpeg';

// import { Luminous } from "luminous-lightbox";


export default {
    data() {
        return {
            postItems: [
                {
                    id: 1,
                    userNmae: '林小美',
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
                            time: '2023/12/31 23:50:59'
                        },
                        {
                            id: 2,
                            commemtText: 'Good!',
                            name: '林小美',
                            userImg: gBaseImg,
                            time: '2023/12/31 23:59:59'
                        },
                        {
                            id: 3,
                            commemtText: 'Good!',
                            name: '林小美',
                            userImg: gBaseImg,
                            time: '2023/12/31 23:59:59'
                        },
                        {
                            id: 4,
                            commemtText: '棒棒!',
                            name: '蔡大頭',
                            userImg: bBaseImg,
                            time: '2023/12/31 23:59:59'
                        },
                    ],
                },
                {
                    id: 2,
                    userNmae: '林小美',
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
                            time: '2023/10/10 23:59:59'
                        },
                    ],
                },
            ]
        }
    },
}
</script>