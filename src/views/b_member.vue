<template>
    <Backlayout>
        <template #section-right-content>
            <div class="b_member">
                <div class="member-section" :class="{ 'blurred': isBlurred }">
                    <h1>會員查詢</h1>
                    <div class="member">
                        <div class="member-img"></div>
                        <p>Nick</p>
                    </div>

                </div>


                <div class="table-section" :class="{ 'blurred': isBlurred }">
                    <div class="search-section">
                        <div class="form-floating mb-3">
                            <input type="search" class="form-control" id="floatingInput" placeholder="以會員帳號搜尋"
                                v-model="searchQuery">
                            <label for="floatingInput">以會員帳號搜尋</label>
                            <span @click="fliterMember">搜尋</span>
                        </div>
                    </div>
                    <table class="table table-bordered ">
                        <thead>
                            <tr class="table-warning">
                                <th scope="col">會員編號</th>
                                <th scope="col">帳號</th>
                                <th scope="col">電話</th>
                                <th scope="col">姓名</th>
                                <th scope="col">帳號狀態</th>
                                <th scope="col">創建時間</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(i, index) in fliterMember" :key="index">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ i.mail }}</td>
                                <td>{{ i.phone }}</td>
                                <td>{{ i.name }}</td>
                                <td>{{ i.state }}</td>
                                <td>{{ i.foundingTime }}</td>
                                <td><button @click="show(index)" class="btn btn btn-warning">編輯</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="Pagination" :class="{ 'blurred': isBlurred }">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>></li>
                    </ul>
                </div>


                <div class="editMember" id="editMember" v-if="open">
                    <!-- 外層 -->
                    <div class="dialog" v-for="(i, index) in member" :key="index">
                        <!-- 內容 -->
                        <div class="editTitle" v-if="selectedIndex == index">
                            <span>編輯帳號</span>
                        </div>
                        <div class="editContent" v-if="selectedIndex == index">
                            <div class="editAll_left">
                                <span>會員編號</span>
                                <p>{{ index + 1 }}</p>
                                <span>帳號</span>
                                <p>{{ i.mail }}</p>
                                <span>姓名</span>
                                <p>{{ i.name }}</p>
                            </div>

                            <div class="editAll_right">
                                <span>帳號狀態</span>
                                <select>
                                    <option>選擇</option>
                                    <option>正常</option>
                                    <option>凍結</option>
                                </select>
                                <span>電話</span>
                                <p>{{ i.phone }}</p>
                                <span>創建時間</span>
                                <p>{{ i.foundingTime }}</p>
                            </div>
                        </div>

                    </div>


                    <div class="edit_btn">
                        <button type="button" class="mil-link" @click="close">關閉</button>
                        <button type="button" class="mil-link" @click="close">儲存</button>
                    </div>


                </div>



            </div>

        </template>
    </Backlayout>
</template>
<script>
//import 這頁需要的元件
import Backlayout from "../components/backlayout.vue";

export default {
    data() {
        return {
            id: 0,
            open: false,
            isBlurred: false,
            selectedIndex: null,
            searchQuery: '',
            member: [
                {
                    mail: "aaaa1234567@gmail.com",
                    phone: "0911000333",
                    name: "張嘉航1",
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },
                {
                    mail: "bbbb1234567@gmail.com",
                    phone: "0911000333",
                    name: "張嘉航2",
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },
                {
                    mail: "ccc1234567@gmail.com",
                    phone: "0911000333",
                    name: "張嘉航3",
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },

                {
                    mail: "dddd1234567@gmail.com",
                    phone: "0911000333",
                    name: "張嘉航5",
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },
                {
                    mail: "aeeee1234567@gmail.com",
                    phone: "0911000333",
                    name: "張嘉航6",
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },
                {
                    mail: "gggg1234567@gmail.com",
                    phone: "0911000333",
                    name: "張嘉航7",
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },
            ]
        }
    },
    methods: {

        show(index) {
            this.$root.$emit('toggleBlur', !this.open);
            this.open = !this.open;
            this.isBlurred = !this.isBlurred;
            this.selectedIndex = index;

            // this.$emit('toggle-blur',this.open);
            // console.log(this.$root.$emit('toggleBlur',this.open))
        },
        close() {
            this.open = false;
            this.isBlurred = false;
        },



    },
    computed: {
        fliterMember() {
            const query = this.searchQuery.toLowerCase()
            return this.member.filter(i => i.mail.toLowerCase().includes(query));

        }
    },
    components: {
        Backlayout
    }
}
</script>

<style>
.blurred {
    filter: blur(100px);
}
</style>