<template>
    <div class="friends-list">
        <div class="friend-item" v-for="(friend, index) in invitedFriends" :key="friend.id">
            <div class="friend-img">
                <img src="../assets/images/user/userimage-g.png" alt="">
            </div>
            <div class="friend-info">
                <h5 class="friend-name">{{ friend.name }}</h5>
                <p class="common-friend-num">
                    <span class="nums">{{ friend.num }}</span>
                    位共同好友
                </p>
            </div>
            <div class="btns">
                <button class="accept" @click="acceptFriend($event, index)">
                    <img src="../assets/images/icon/accept.svg" alt="">
                    接受
                </button>
                <button class="reject" @click="rejectFriend($event, index)">
                    <img src="../assets/images/icon/reject.svg" alt="">
                    拒絕
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            invitedFriends: [
                {
                    id: 1,
                    name: "王小美",
                    num: 20,
                    requestStatus: 0 //邀請狀態(待確認 0/已接受 1/已拒絕 2)
                },
                {
                    id: 2,
                    name: "林小美",
                    num: 5,
                    requestStatus: 0 //邀請狀態(待確認 0/已接受 1/已拒絕 2)
                }
            ]
        }
    },
    methods: {
        acceptFriend(e, i) {
            let r = confirm("確定接受「" + this.invitedFriends[i].name + "」的好友邀請嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.invitedFriends.splice(i, 1);
                }, 500);
            }
        },
        rejectFriend(e, i) {
            let r = confirm("確定拒絕「" + this.invitedFriends[i].name + "」的好友邀請嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.invitedFriends.splice(i, 1);
                }, 500);
            }
        },
    }
}
</script>