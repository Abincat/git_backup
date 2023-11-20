<template>
    <Backlayout>
        <template #section-right-content>
            <div class="b_active">
                <div class="active-section" :class="{ 'blurred': isBlurred }">
                    <h1>活動查詢</h1>
                    <div class="active">
                        <div class="active-img"></div>
                        <p>Nick</p>
                    </div>

                </div>


                <div class="table-section" :class="{ 'blurred': isBlurred }">
                    <div class="search-section">
                        <div class="search-section-left">
                            <span @click="addActive">新增活動</span>
                        </div>
                        <div class="search-section-right">
                            <div class="form-floating mb-3">
                                <input type="search" class="form-control" id="floatingInput" placeholder="以活動名稱搜尋"
                                    v-model="activeQuery">
                                <label for="floatingInput">以活動名稱搜尋</label>
                                <span>搜尋</span>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered ">
                        <thead>
                            <tr class="table-warning">
                                <th scope="col">活動編號</th>
                                <th scope="col">活動名稱</th>
                                <th scope="col">活動地點</th>
                                <th scope="col">活動狀態</th>
                                <th scope="col">活動日期</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(i, index) in   filterActive" :key="index">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ i.name }}</td>
                                <td>{{ i.location }}</td>
                                <td>{{ i.state }}</td>
                                <td>{{ i.foundingTime }}</td>
                                <td><button @click="showInfo" class="btn btn btn-warning">查詢</button></td>
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

                <!-- 編輯活動 -->
                <div class="editActivity" id="editActivity" v-if="open">
                    <!-- 外層 -->
                    <div class="dialog" v-for="(i, index) in active" :key="index">
                        <!-- 內容 -->
                        <div class="editTitle" v-if="active_show == index">
                            <span>編輯活動</span>
                        </div>
                        <div class="editContent" v-if="active_show == index">
                            <div class="editAll_left">
                                <span>活動編號</span>
                                <p>{{ index + 1 }}</p>
                                <span>活動名稱</span>
                                <input type="text" v-model="i.name">
                                <span>活動地點</span>
                                <input type="text" v-model="i.location">
                            </div>

                            <div class="editAll_right">
                                <span>活動狀態</span>
                                <select>
                                    <option>選擇</option>
                                    <option>正常</option>
                                    <option>取消</option>
                                </select>
                                <span>活動日期</span>
                                <input type="date" v-model="i.foundingTime">

                            </div>
                        </div>
                    </div>


                    <div class="edit_btn">
                        <button type="button" class="mil-link" @click="close">關閉</button>
                        <button type="button" class="mil-link" @click="close">儲存</button>
                    </div>
                </div>




                <!-- 報名資料查詢 -->
                <div class="activeInfo" id="activeInfo" v-if="sign">
                    <!-- 外層 -->
                    <div class="dialog">
                        <!-- 內容 -->
                        <div class="editTitle">
                            <span>報名資料查詢</span>
                        </div>
                        <div class="editContent">

                            <table class="table table-show">
                                <thead>
                                    <tr>
                                        <th scope="col">姓名</th>
                                        <th scope="col">電話</th>
                                        <th scope="col">Emial</th>
                                        <th scope="col">總金額</th>
                                        <th scope="col">報名人數</th>
                                        <th scope="col">付款狀態</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(i, index) in  active" :key="index">
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ i.name }}</td>
                                        <td>{{ i.location }}</td>
                                        <td>{{ i.state }}</td>
                                        <td>{{ i.foundingTime }}</td>
                                        <td>是</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="edit_btn">
                        <button type="button" class="mil-link" @click="close">關閉</button>
                    </div>
                </div>

                <!-- 新增活動 -->
                <div class="addActivity" id="addActivity" v-if="add">
                    <!-- 外層 -->
                    <div class="dialog">
                        <!-- 內容 -->
                        <div class="editTitle">
                            <span>新增活動</span>
                        </div>

                        <div class="addtop">

                        </div>

                        <div class="editContent">
                            <div class="editAll_left">
                                <span>活動編號</span>
                                <p>1</p>
                                <span>活動名稱</span>
                                <input type="text" value="夏日音樂祭">
                                <span>活動地點</span>
                                <input type="text" value="南港展覽館">
                                <span>單人費用</span>
                                <input type="number" value="400">
                            </div>

                            <div class="editAll_right">
                                <span>團體費用</span>
                                <input type="number" value="200">
                                <span>活動日期</span>
                                <input type="date" value="2023-12-31">
                                <span>報名開始</span>
                                <input type="date" value="2023-10-31">
                                <span>報名截止</span>
                                <input type="date" value="2023-11-30">
                            </div>
                        </div>

                        <div class="activeDes">
                            <span>活動描述</span>
                            <textarea name="" id="" cols="30" rows="10">
                            </textarea>
                        </div>

                    </div>


                    <div class="edit_btn">
                        <button type="button" class="mil-link" @click="close">關閉</button>
                        <button type="button" class="mil-link" @click="close">新增活動</button>

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
            sign: false,
            add: false,
            isBlurred: false,
            active_show: null,
            activeQuery: '',
            active: [
                {
                    name: "冬季音樂季",
                    location: '台北市南港展覽館',
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },

                {
                    name: "夏日音樂季",
                    location: '台北市南港展覽館',
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },

                {
                    name: "春季音樂季",
                    location: '台北市南港展覽館',
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },

                {
                    name: "夏日音樂季",
                    location: '台北市南港展覽館',
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },

                {
                    name: "夏日野餐",
                    location: '台北市南港展覽館',
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },



                {
                    name: "夏日音樂季",
                    location: '台北市南港展覽館',
                    state: "正常",
                    foundingTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                },

            ]
        }
    },
    methods: {

        close() {
            this.open = false;
            this.sign = false;
            this.add = false;
            this.isBlurred = false;
        },

        show(index) {
            this.$root.$emit('toggleBlur', !this.open);
            this.open = !this.open;

            this.isBlurred = !this.isBlurred,
            this.active_show = index
            // this.$emit('toggle-blur',this.open);
            // console.log(this.$root.$emit('toggleBlur',this.open))
        },
        showInfo() {
            this.$root.$emit('toggleBlur', !this.sign);
            this.sign = !this.sign;
            this.isBlurred = !this.isBlurred


        },
        addActive() {
            this.$root.$emit('toggleBlur', !this.add);
            this.add = !this.add;
            this.isBlurred = !this.isBlurred
        },


    },
    computed: {
        filterActive() {
            const query = this.activeQuery.toLowerCase();
            return this.active.filter((i) => {
                return i.name.toLowerCase().includes(query);
            });
        }
    },
    components: {
        Backlayout
    }
}
</script>