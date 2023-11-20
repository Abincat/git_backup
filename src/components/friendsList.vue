<template>
    <div class="friends-list">
        <div class="friend-item" v-for="(friend, index) in friends" :key="friend.id">
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
                <button class="delete" @click="deleteFriend($event, index)">
                    <img src="../assets/images/icon/trash_purple.svg" alt="">
                    刪除
                </button>
                <button class="add-blacklist" @click="addBlackFriend($event, index)">
                    <img src="../assets/images/icon/blacklist.svg" alt="">
                    加入黑名單
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            friends: [
                {
                    id: 1,
                    name: "王小美",
                    num: 20,
                    status: 1 //關係狀態(好友 1/黑名單 2/刪除 3)
                },
                {
                    id: 2,
                    name: "林小美",
                    num: 5,
                    status: 1
                },
                {
                    id: 3,
                    name: "美美",
                    num: 30,
                    status: 1
                }
            ]
        }
    },
    methods: {
        deleteFriend(e, i) {
            let r = confirm("確定刪除好友「" + this.friends[i].name + "」嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.friends.splice(i, 1);
                }, 500);
            }
        },
        addBlackFriend(e, i) {
            let r = confirm("確定將好友「" + this.friends[i].name + "」加入黑名單嗎？");

            if (r) {
                // console.log(e.target.closest('div').parentElement)
                e.target.closest('div').parentElement.classList.add("fade_out");

                setTimeout(() => {
                    this.friends.splice(i, 1);
                }, 500);
            }
        },
    }
}
</script>