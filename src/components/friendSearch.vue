<template>
    <div v-if="showResult" class="friends-list">
        <div class="friend-item" v-for="(friend, index) in searchFriends" :key="friend.id">
            <div class="friend-img">
                <img :src="friend.img" alt="">
            </div>
            <div class="friend-info">
                <h5 class="friend-name">{{ friend.name }}</h5>
                <p class="common-friend-num">
                    <span class="nums">{{ friend.num }}</span>
                    位共同好友
                </p>
            </div>
            <div class="btns">
                <button :disabled="friend.requestStatus == 0"
                    :class="['add-friend', { invited: friend.requestStatus == 0 }]"
                    @click="inviteFriend($event, friend.id, index)">
                    {{ friend.btnText }}</button>
            </div>
        </div>
    </div>
    <div v-else class="noResult">
        <p>找不到你要的人</p>
        <img src="../assets/images/friend/notFound.png" alt="">
    </div>
</template>

<script>
import { useUserStore } from '@/store/user';
import axios from 'axios';
// import { BIconThreeDotsVertical } from 'bootstrap-vue';
export default {
    props: ["keyword"],
    data() {
        return {
            searchFriends: [
                // {
                //     id: 1,
                //     name: "陳大明",
                //     num: 20,
                //     img: '',
                //     friendStatus: null,
                //     requestStatus: null, //邀請狀態(待確認 0/已接受 1/已拒絕 2)
                //     btnText: ''
                // },
            ],
            showResult: false,
        }
    },
    methods: {
        inviteFriend(e, id, i) {

            if (this.searchFriends[i].requestStatus == 0) {
                alert('正在等對方接受邀請');

            } else {
                let r = confirm("確定將「" + this.searchFriends[i].name + "」加入好友嗎？");

                if (r) {
                    e.target.classList.add("invited");
                    this.searchFriends[i].btnText = '邀請中';
                    this.searchFriends[i].requestStatus = 0;

                    const userStore = useUserStore();
                    const friendData = {
                        userId: userStore.userID,
                        friendId: id,
                    }
                    axios.post('api/addFriend.php', JSON.stringify(friendData))
                        .then(response => {
                            if (response.data == 1) {
                                alert('成功發送邀請');
                            }
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            }
        },
        getUserImg(id, i) {
            const userId = { id }

            axios.post('api/gerUserImg.php', JSON.stringify(userId))
                .then(response => {
                    console.log(response.data);
                    if (response.data != 'f') {
                        this.searchFriends[i].img = 'data:image;base64,' + response.data['img'];
                    }
                })
                .catch(error => {
                    console.log(error);
                });

        }
    },
    beforeMount() {
        const userStore = useUserStore();

        const keyword = {
            userId: userStore.userID,
            keyword: this.keyword
        }

        console.log(keyword);

        axios.post('api/searchFriends.php', JSON.stringify(keyword))
            .then(response => {
                console.log('This data is from -> ' + this.$route.name + ' -> response data: ' + response.data)
                if (response.data == '0') {
                    console.log('查無用戶');
                } else {
                    this.showResult = true;
                    response.data.forEach((element, index) => {
                        const resultItem = {
                            id: element['MEMBER_ID'],
                            name: element['FullName'],
                            img: '',
                            num: element['num'],
                            friendStatus: element['friendStatus'], //關係狀態(好友 1/黑名單 2/刪除 3)
                            requestStatus: element['requestStatus'], //邀請狀態(待確認 0/已接受 1/已拒絕 2)
                            btnText: '',
                        }

                        //設定按鈕文字
                        if (resultItem.requestStatus == 0) {
                            resultItem.btnText = '邀請中';
                        } else if (resultItem.requestStatus == 1) {

                        } else {
                            resultItem.btnText = '加好友';
                        }

                        //取得個人頭像
                        this.getUserImg(resultItem.id, index);

                        //過濾掉已成為好友的人
                        if (resultItem.requestStatus != 1) {
                            this.searchFriends.push(resultItem);
                        }
                    })
                }
            })
            .catch(error => {
                console.log(error);
            });
    },
    mounted() {

        // if (this.searchFriends.length > 0) {

        //     this.searchFriends.forEach(element => {
        //         if (element.requestStatus == 0) {
        //             element.btnText = '邀請中'
        //         } else {
        //             element.btnText = '加好友'
        //         }
        //     });
        // }
    },
}
</script>