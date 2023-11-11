<template>
    <layout>
        <template #section-right-content>
            <div class="home">
                <div class="home-post">
                    <div class="add-post" ref="addPostBlock">
                        <p v-if="addPostTitleShow" @click="addPost">我有話要說...</p>
                        <div v-else class="add-post-block">
                            <div class="add-block-title">
                                <h5 class="post-edit-title">發表貼文</h5>
                                <div class="post-view-setting">
                                    <img src="../assets/images/icon/friend-view.svg" alt="" class="" value="friend">
                                    <img src="../assets/images/icon/global-view-select.svg" alt="" class="select"
                                        value="global">
                                    <img src="../assets/images/icon/private-view-select.svg" alt="" class="select"
                                        value="private">
                                </div>
                            </div>
                            <textarea name="" id="post-content" rows="10" placeholder="輸入想說的話"></textarea>
                            <label for="postImg" class="postImg">
                                <span>
                                    新增照片
                                </span>
                                <img src="../assets/images/icon/image.svg" alt="">
                                <input type="file" name="postImg" id="postImg">
                            </label>
                            <div class="btn-block">
                                <button class="Btn Btn-light" @click="addPost">取消</button>
                                <button class="Btn Btn-dark">發布</button>
                            </div>
                        </div>

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
                                    <img src="../assets/images/icon/good-line.svg" alt="" class="good">
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
                                    <img src="../assets/images/icon/good-line.svg" alt="" class="good">
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
                                    <img src="../assets/images/icon/good-line.svg" alt="" class="good">
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
                        <div class="hot-activity-title">
                            <img src="../assets/images/icon/hot.svg" alt="">
                            <h5>熱門活動</h5>
                        </div>
                        <div class="activity-list">
                            <router-link :to="{ name: 'activity' }" class="activity-item">
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
                            <router-link :to="{ name: 'activity' }" class="activity-item">
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
                            <router-link :to="{ name: 'activity' }" class="activity-item">
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
                    </div>
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
    },
    data() {
        return {
            addPostTitleShow: true
        }
    },
    methods: {
        addPost() {

            this.$refs.addPostBlock.classList.toggle('add-post-large');
            this.addPostTitleShow = !this.addPostTitleShow;

        }
    }
}
</script>