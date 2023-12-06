<template>
    <div class="post-item" v-for="(item, index) in postItems" :key="item.id">
        <div class="post-user-info">
            <div class="post-user-image">
                <img :src=item.userImg alt="">
            </div>
            <div class="post-user-time">
                <p class="user-name">{{ item.userName }}</p>
                <div class="post-time">
                    <p class="user-post-time">{{ item.createTime.replaceAll('-', '/') }}</p>
                    <img :src="item.status" alt="">
                </div>
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
                <p class="reply-nums">{{ item.replieds.length }}</p>
                <p>則</p>
            </div>
        </div>
        <div class="post-reply">
            <div ref="repliedContainer" class="replied showScrollbar">
                <div class="replied-msg" v-for="(comment, index) in item.replieds" :key="comment.id">
                    <div class="user-image">
                        <img :src=comment.userImg alt="">
                    </div>
                    <div class="replied-message">
                        <div class="user-name">{{ comment.name }}</div>
                        <div class="content">
                            <div class="text">{{ comment.commemtText }}</div>
                            <div class="replied-time">{{ comment.createTime }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reply-message">
                <div class="user-image">
                    <img :src="userImage" alt="">
                </div>
                <div class="reply-input">
                    <input type="text" class="inputCommon" @blur="bindCommentText($event)"
                        @keyup.enter="bindCommentText($event), enterAddComment($event, index, item.id)">
                    <button type="button" @click="addComment($event, index, item.id)">
                        <img src="../assets/images/icon/submit.svg" alt="">
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


// import { Luminous } from "luminous-lightbox";


export default {
    props: ["postItems", "userImage"],
    emits: ["addComment"],
    data() {
        return {
            commemtText: '',
        }
    },
    methods: {
        scrollToBottom() {
            const scrollContainer = this.$refs.repliedContainer;
            // console.log(scrollContainer.scrollHeight)

            // 視窗滾到底部
            // scrollContainer.scrollTop = scrollContainer.scrollHeight;
        },
        bindCommentText(e) {
            if (e.target.value != '') {
                //將input資料設定至commentText變數
                this.commemtText = e.target.value;
            }
        },
        addComment(e, i, postId) {

            if (this.commemtText != '') {
                //將回覆內容傳回父層(home)
                const comment = this.commemtText;
                this.$emit('addComment', e, i, postId, comment)

                //清空變數跟input欄位
                this.commemtText = '';
                // console.log(e.target.parentNode.previousSibling);
                e.target.parentNode.previousSibling.value = '';

            } else {
                alert('請輸入回覆內容');
            }
        },
        enterAddComment(e, i, postId) {

            this.addComment(e, i, postId);
            e.target.value = '';
        },

    },
    beforeMount() {
        // const items = this.postItems;

        // items.forEach(element => {

        //     console.log(element['status']);

        //     if (element['status'] == 0) {
        //         element['status'] = globalView;
        //     } else if (element['status'] == 1) {
        //         element['status'] = friendView;
        //     } else {
        //         element['status'] = privateView;
        //     }

        // })
    },
    mounted() {
        // this.scrollToBottom();
    },
}
</script>