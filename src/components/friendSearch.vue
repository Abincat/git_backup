<template>
    <div class="friends-list">
        <div class="friend-item" v-for="(friend, index) in searchFriends" :key="friend.id">
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
                <button :class="['add-friend', { invited: friend.requestStatus == 0 }]" @click="inviteFriend($event, index)">{{
                    friend.btnText }}</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            searchFriends: [
                {
                    id: 1,
                    name: "陳大明",
                    num: 20,
                    requestStatus: null, //邀請狀態(待確認 0/已接受 1/已拒絕 2)
                    btnText: ''
                },
                {
                    id: 1,
                    name: "蔡大頭",
                    num: 20,
                    requestStatus: 0, //邀請狀態(待確認 0/已接受 1/已拒絕 2)
                    btnText: ''
                },
            ]
        }
    },
    methods: {
        inviteFriend(e, i) {

            if (this.searchFriends[i].requestStatus == 0) {
                alert('正在等對方接受邀請');

            } else {
                let r = confirm("確定將「" + this.searchFriends[i].name + "」加入好友嗎？");

                if (r) {
                    e.target.classList.add("invited");
                    this.searchFriends[i].btnText = '邀請中';
                    this.searchFriends[i].requestStatus = 0;
                }
            }
        },
    },
    mounted() {

        this.searchFriends.forEach(element => {
            if (element.requestStatus == 0) {
                element.btnText = '邀請中'
            } else {
                element.btnText = '加好友'
            }
        });

    }

}
</script>