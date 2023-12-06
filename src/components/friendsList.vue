<template>
    <div class="friends-list">
        <div class="friend-item" v-for="(friend, index) in friends" :key="friend.id">
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
                <button class="delete" @click="deleteFriend($event, friend.id, index)">
                    <img src="../assets/images/icon/trash_purple.svg" alt="">
                    刪除
                </button>
                <button class="add-blacklist" @click="addBlackFriend($event, friend.id, index)">
                    <img src="../assets/images/icon/blacklist.svg" alt="">
                    加入黑名單
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
            friends: [
                // {
                //     id: 1,
                //     name: "王小美",
                //     img: '',
                //     num: 20,
                //     friendStatus: 1, //關係狀態(好友 1/黑名單 2/刪除 3)
                //     requestStatus: 1, //邀請狀態(待確認 0/已接受 1/已拒絕 2)
                // },

            ],
            userId: '',
        }
    },
    methods: {
        deleteFriend(e, id, i) {
            let r = confirm("確定刪除好友「" + this.friends[i].name + "」嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.friends.splice(i, 1);
                }, 500);

                const deleteData = {
                    friendId: id,
                    userId: this.userId,
                    action: 'D'
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
        addBlackFriend(e, id, i) {
            let r = confirm("確定將好友「" + this.friends[i].name + "」加入黑名單嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.friends.splice(i, 1);
                }, 500);

                const blackData = {
                    friendId: id,
                    userId: this.userId,
                    action: 'B'
                }
                axios.post('api/updateFriendStatus.php', JSON.stringify(blackData))
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
                        this.friends[i].img = 'data:image;base64,' + response.data['img'];
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

        axios.post('api/getFriendList.php', JSON.stringify(userId))
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

                        this.friends.push(friendItem);
                    })
                } else {
                    console.log('查無好友');
                }
            })
            .catch(error => {
                console.log(error);
            });
    }
}
</script>