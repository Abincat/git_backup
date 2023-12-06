<template>
    <Backlayout>
        <template #section-right-content>
            <div class="b_serve">
                <div class="serve-section" :class="{ 'blurred': isBlurred }">
                    <h1>客服管理</h1>
                    <div class="serve">
                        <div class="serve-img"></div>
                        <p>Nick</p>
                    </div>

                </div>


                <div class="table-section" :class="{ 'blurred': isBlurred }">
                    <div class="search-section">
                        <div class="form-floating mb-3">
                            <input type="search" class="form-control" id="floatingInput" placeholder="以回復狀態搜尋"
                                v-model="serveQuery">
                            <label for="floatingInput">以回復狀態搜尋</label>
                            <span>搜尋</span>
                        </div>
                    </div>
                    <table class="table table-bordered ">
                        <thead>
                            <tr class="table-warning">
                                <th scope="col">問題編號</th>
                                <th scope="col">會員信箱</th>
                                <th scope="col">問題內容</th>
                                <th scope="col">提問人姓名</th>
                                <th scope="col">反應日期</th>
                                <th scope="col">回復日期</th>
                                <th scope="col">回復狀態</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(i, index) in  serveFliter" :key="index">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ i.mail }}</td>
                                <td>{{ i.qa_content }}</td>
                                <td>{{ i.qa_name }}</td>
                                <td :class="{ 'active': i.state == '未回覆' }">{{ i.state }}</td>
                                <td>{{ i.reflectTime }}</td>
                                <td>{{ i.resTime }}</td>
                                <td><button class="btn btn btn-warning" @click="show(index)"
                                        v-if="i.state == '未回覆'">回覆</button>
                                    <button class="btn btn btn-warning" @click="show(index)"
                                        v-if="i.state == '已回覆'">查詢</button>
                                </td>

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

                <div class="serviceRes" id="serviceRes" v-if="open">
                    <!-- 外層 -->
                    <div class="dialog" v-for="(i, index) in serve_qa" :key="index">
                        <!-- 內容 -->
                        <div class="editTitle" v-if="serve_qa_index == index">
                            <span>客服問題</span>
                        </div>
                        <div class="editContent" v-if="serve_qa_index == index">
                            <div class="editAll_left">
                                <span>問題編號</span>
                                <p>{{ index + 1 }}</p>
                                <span>提問內容</span>
                                <p>{{ i.qa_content }}</p>
                                <span>姓名</span>
                                <p>{{ i.qa_name }}</p>
                                <span>會員信箱</span>
                                <p>{{ i.mail }}</p>
                            </div>

                            <div class="editAll_right">
                                <span>問題狀態</span>
                                <p>{{ i.state }}</p>
                                <span>反應日期</span>
                                <p>{{ i.reflectTime }}</p>
                                <span>回覆日期</span>
                                <p v-if="i.state == '已回覆'">{{ i.resTime }}</p>
                                <input type="date" v-if="i.state == '未回覆'">
                            </div>

                        </div>
                        <div class="reply" v-if="i.state == '未回覆' && serve_qa_index == index">
                            <textarea name="" id="" cols="30" rows="10">
                                </textarea>
                        </div>
                        <div class="edit_btn" v-if="serve_qa_index == index">
                            <button type="button" class="mil-link" @click="close">關閉</button>
                            <button type="button" class="mil-link" @click="close" v-if="i.state == '未回覆'">儲存</button>
                        </div>
                    </div>
                </div>



            </div>

        </template>
    </Backlayout>
</template>
<script>
//import 這頁需要的元件
import { query } from "firebase/database";
import Backlayout from "../components/backlayout.vue";

export default {
    data() {
        return {
            id: 0,
            open: false,
            serve_qa_index: null,
            serveQuery: '',
            serve_qa: [
                {
                    mail: "aaaa1234567@gmail.com",
                    qa_content: "忘記密碼了",
                    qa_name: "張嘉航",
                    state: "已回覆",
                    reflectTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                    resTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`
                },
                {
                    mail: "aaaa1234567@gmail.com",
                    qa_content: "忘記密碼了",
                    qa_name: "張嘉航",
                    state: "未回覆",
                    reflectTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                    resTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`
                },
                {
                    mail: "aaaa1234567@gmail.com",
                    qa_content: "忘記密碼了",
                    qa_name: "張嘉航",
                    state: "已回覆",
                    reflectTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                    resTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`
                },
                {
                    mail: "aaaa1234567@gmail.com",
                    qa_content: "忘記密碼了",
                    qa_name: "張嘉航",
                    state: "未回覆",
                    reflectTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                    resTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`
                },
                {
                    mail: "aaaa1234567@gmail.com",
                    qa_content: "忘記密碼了",
                    qa_name: "張嘉航",
                    state: "未回覆",
                    reflectTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                    resTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`
                },
                {
                    mail: "aaaa1234567@gmail.com",
                    qa_content: "忘記密碼了",
                    qa_name: "張嘉航",
                    state: "已回覆",
                    reflectTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`,
                    resTime: `${new Date().getFullYear()}-${new Date().getMonth() + 1}-${new Date().getDate()}`
                },

            ]
        }
    },
    methods: {
        show(index) {
            this.$root.$emit('toggleBlur', !this.open);
            this.open = !this.open;
            this.isBlurred = !this.isBlurred;
            this.serve_qa_index = index
        },
        close() {
            this.open = false;
            this.isBlurred = false;
        }
    },
    computed: {
        serveFliter() {
            const query = this.serveQuery.toLowerCase();
            return this.serve_qa.filter((i) => {
                return i.state.toLowerCase().includes(query);
            })
        }
    },
    components: {
        Backlayout
    }
}
</script>




<!-- <div class=" dialog" v-for="(i, index) in serve_qa" v-if="state == '未回覆'" :key="index">
    內容
    <div class="editTitle">
        <span>客服問題</span>
    </div>
    <div class="editContent">
        <div class="editAll_left">
            <span>問題編號</span>
            <p>{{ index + 1 }}</p>
            <span>提問內容</span>
            <p>{{ i.qa_content }}</p>
            <span>姓名</span>
            <p>{{ i.qa_name }}</p>
            <span>會員信箱</span>
            <p>{{ i.mail }}</p>
        </div>

        <div class="editAll_right">
            <span>問題狀態</span>
            <p>{{ i.state }}</p>
            <span>反應日期</span>
            <p>{{ i.reflectTime }}</p>
            <span>回覆日期</span>
            <input type="date">
        </div>
    </div>

</div>




<div class="edit_btn">
    <button type="button" class="mil-link" @click="close">關閉</button>
</div> -->