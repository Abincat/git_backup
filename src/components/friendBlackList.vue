<template>
    <div class="friends-list">
        <div class="friend-item" v-for="(friend, index) in blackFriends" :key="friend.id">
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
                <button class="reject" @click="rejectFriend($event, index)">
                    <img src="../assets/images/icon/reject.svg" alt="">
                    移除黑名單
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            blackFriends: [
                {
                    id: 1,
                    name: "陳大明",
                    num: 20,
                    status: 2 //關係狀態(好友 1/黑名單 2/刪除 3)
                },
            ]
        }
    },
    methods: {
        rejectFriend(e, i) {
            let r = confirm("確定將「" + this.blackFriends[i].name + "」移除黑名單嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.blackFriends.splice(i, 1);
                }, 500);
            }
        },
    }

}
</script>