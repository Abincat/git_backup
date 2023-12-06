<template>
    <div class="friends-list">
        <div class="friend-item" v-for="(friend, index) in blackFriends" :key="friend.id">
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
                <button class="reject" @click="removetFriend($event, friend.id, index)">
                    <img src="../assets/images/icon/reject.svg" alt="">
                    移除黑名單
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { useUserStore } from '@/store/user';
export default {
    data() {
        return {
            blackFriends: [
                // {
                //     id: 1,
                //     name: "陳大明",
                //     img: '',
                //     num: 20,
                //     friendStatus: element['FRIEND_STATUS'], //關係狀態(好友 1/黑名單 2/刪除 3)
                //     requestStatus: 2 //關係狀態(好友 1/黑名單 2/刪除 3)
                // },
            ]
        }
    },
    methods: {
        removetFriend(e, id, i) {
            let r = confirm("確定將「" + this.blackFriends[i].name + "」移除黑名單嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.blackFriends.splice(i, 1);
                }, 500);


                const deleteData = {
                    friendId: id,
                    userId: this.userId,
                    action: 'F'
                }
                axios.post('api/updateFriendStatus.php', JSON.stringify(deleteData))
                    .then(response => {
                        console.log(response.data)
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },
        getUserImg(id, i) {
            const friendId = { id }

            axios.post('api/gerUserImg.php', JSON.stringify(friendId))
                .then(response => {
                    // console.log(response.data);
                    if (response.data != 'f') {
                        this.blackFriends[i].img = 'data:image;base64,' + response.data['img'];
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    beforeMount() {
        //取得會員id
        const userStore = useUserStore();
        this.userId = userStore.userID;

        const userId = {
            userId: this.userId,
        }

        axios.post('api/getBlackFriendList.php', JSON.stringify(userId))
            .then(response => {
                // console.log('This data is from -> ' + this.$route.name + ' -> response data: ' + response.data)
                if (response.data != 0) {

                    response.data.forEach((element, index) => {

                        const friendItem = {
                            id: element['FRIENDS_ID'],
                            name: element['FullName'],
                            img: '',
                            num: element['num'],
                            friendStatus: element['FRIEND_STATUS'], //關係狀態(好友 1/黑名單 2/刪除 3)
                            requestStatus: element['FRIENDS_REQUESTS_STATUS'], //邀請狀態(待確認 0/已接受 1/已拒絕 2)
                        }

                        //取得個人頭像
                        this.getUserImg(friendItem.id, index);

                        this.blackFriends.push(friendItem);
                    })
                } else {
                    console.log('查無好友邀請');
                }
            })
            .catch(error => {
                console.log(error);
            });
    }

}
</script>