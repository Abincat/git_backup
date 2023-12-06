<template>
    <div class="friends-list">
        <div class="friend-item" v-for="(friend, index) in invitedFriends" :key="friend.id">
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
                <button class="accept" @click="acceptFriend($event, friend.id, index)">
                    <img src="../assets/images/icon/accept.svg" alt="">
                    接受
                </button>
                <button class="reject" @click="rejectFriend($event, friend.id, index)">
                    <img src="../assets/images/icon/reject.svg" alt="">
                    拒絕
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
            invitedFriends: [
                // {
                //     id: 1,
                //     name: "王小美",
                //     img: '',
                //     num: 20,
                //     friendStatus:null, //關係狀態(好友 1/黑名單 2/刪除 3)
                //     requestStatus: 0 //邀請狀態(待確認 0/已接受 1/已拒絕 2)
                // },
            ],
            userId: '',
        }
    },
    methods: {
        acceptFriend(e, id, i) {
            let r = confirm("確定接受「" + this.invitedFriends[i].name + "」的好友邀請嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.invitedFriends.splice(i, 1);
                }, 500);

                const updateData = {
                    friendId: id,
                    userId: this.userId,
                    action: 'A'
                }
                axios.post('api/updateFriendRequest.php', JSON.stringify(updateData))
                    .then(response => {
                        console.log(response.data)
                    })
                    .catch(error => {
                        console.log(error);
                    })

            }
        },
        rejectFriend(e, id, i) {
            let r = confirm("確定拒絕「" + this.invitedFriends[i].name + "」的好友邀請嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.invitedFriends.splice(i, 1);
                }, 500);

                const updateData = {
                    friendId: id,
                    userId: this.userId,
                    action: 'R'
                }
                axios.post('api/updateFriendRequest.php', JSON.stringify(updateData))
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
                        this.invitedFriends[i].img = 'data:image;base64,' + response.data['img'];
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

        axios.post('api/getFriendInvite.php', JSON.stringify(userId))
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

                        this.invitedFriends.push(friendItem);
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