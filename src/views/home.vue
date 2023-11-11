<template>
    <layout>
        <template #section-right-content>
            <userinfo></userinfo>
            <div class="home">
                <div class="home-post">
                    <div class="add-post">
                        <p>我有話要說...</p>
                    </div>
                    <div class="post-items">
                        <div class="post-item">
                            <div class="post-user-info">
                                <div class="post-user-image">
                                    <img src="../assets/images/user/userimage-g.png" alt="">
                                </div>
                                <div class="post-user-time">
                                    <p class="user-name">林小美</p>
                                    <p class="user-post-time">2023/10/25</p>
                                </div>
                            </div>
                            <div class="post-content">
                                <p>
                                    今天天氣真好
                                </p>
                            </div>
                            <div class="post-images"></div>
                            <div class="post-feedback">
                                <div class="good-block">
                                    <img src="../assets/images/icon/good-line.svg" alt="">
                                    <p class="good-nums">123</p>
                                    <p>人</p>
                                </div>
                                <div class="reply-block">
                                    <img src="../assets/images/icon/message.svg" alt="">
                                    <p class="reply-nums">123</p>
                                    <p>則</p>
                                </div>
                            </div>
                            <div class="post-reply">
                                <div class="replied">
                                    <div class="user-image">
                                        <img src="../assets/images/user/userimage.png" alt="">
                                    </div>
                                    <div class="replied-message">
                                        <div class="user-name">王小明</div>
                                        <div class="content">
                                            <div class="text">好棒的天氣啊啊啊</div>
                                            <div class="replied-time">2023/10/10 23:59:59</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="reply-message">
                                    <div class="user-image">
                                        <img src="../assets/images/user/userimage.png" alt="">
                                    </div>
                                    <div class="reply-input">
                                        <input type="text">
                                        <button type="button"><img src="../assets/images/icon/submit.svg" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="post-user-info">
                                <div class="post-user-image">
                                    <img src="../assets/images/user/userimage-g.png" alt="">
                                </div>
                                <div class="post-user-time">
                                    <p class="user-name">林小美</p>
                                    <p class="user-post-time">2023/10/25</p>
                                </div>
                            </div>
                            <div class="post-content">
                                <p>
                                    今天天氣真好
                                </p>
                            </div>
                            <div class="post-images"></div>
                            <div class="post-feedback">
                                <div class="good-block">
                                    <img src="../assets/images/icon/good-line.svg" alt="">
                                    <p class="good-nums">123</p>
                                    <p>人</p>
                                </div>
                                <div class="reply-block">
                                    <img src="../assets/images/icon/message.svg" alt="">
                                    <p class="reply-nums">123</p>
                                    <p>則</p>
                                </div>
                            </div>
                            <div class="post-reply">
                                <div class="replied">
                                    <div class="user-image">
                                        <img src="../assets/images/user/userimage.png" alt="">
                                    </div>
                                    <div class="replied-message">
                                        <div class="user-name">王小明</div>
                                        <div class="content">
                                            <div class="text">好棒的天氣啊啊啊</div>
                                            <div class="replied-time">2023/10/10 23:59:59</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="reply-message">
                                    <div class="user-image">
                                        <img src="../assets/images/user/userimage.png" alt="">
                                    </div>
                                    <div class="reply-input">
                                        <input type="text">
                                        <button type="button"><img src="../assets/images/icon/submit.svg" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="home-info">
                    <div class="home-hot-activity">
                        <h5>熱門活動</h5>
                    </div>
                    <div class="home-chatting-block"></div>
                </div>
            </div>
        </template>
    </layout>
</template>
<script>
//import 這頁需要的元件
import layout from '@/components/layout.vue'
import userinfo from '@/components/userInfo.vue'

export default {
    components: {
        layout,
        userinfo
    }
}
</script>