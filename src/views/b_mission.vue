<template>
    <Backlayout>
        <template #section-right-content>
            <div class="b_mission">
                <div class="mission-section" :class="{ 'blurred': isBlurred }">
                    <h1>任務管理</h1>
                    <div class="mission">
                        <div class="mission-img"></div>
                        <p>Nick</p>
                    </div>

                </div>


                <div class="table-section" :class="{ 'blurred': isBlurred }">
                    <div class="search-section">
                        <div class="search-section-left">
                        </div>
                        <div class="search-section-right">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="以任務內容搜尋"
                                    v-model="missionQuery">
                                <label for="floatingInput">以任務內容搜尋</label>
                                <span>搜尋</span>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered ">
                        <thead>
                            <tr class="table-warning">
                                <th scope="col">任務編號</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">任務內容</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">金幣數量</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">完成次數</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(i, index) in    missionFliter" :key="index">
                                <th scope="row">{{ index + 1 }}</th>
                                <td></td>
                                <td></td>
                                <td>{{ i.mission_content }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ i.mission_cash }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ i.finish_time }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button class="btn btn btn-warning" @click="show(index)">編輯</button></td>
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

                <div class="editMission" id="editMission" v-if="open">
                    <!-- 外層 -->
                    <div class="dialog" v-for="(i, index) in mission" :key="index">
                        <!-- 內容 -->
                        <div class="editTitle" v-if="selectedIndex == index">
                            <span>任務管理</span>
                        </div>
                        <div class="editContent" v-if="selectedIndex == index">
                            <div class="editAll_left">
                                <span>任務編號</span>
                                <p>{{ index + 1 }}</p>
                                <span>任務內容</span>
                                <p>{{ i.mission_content }}</p>
                            </div>

                            <div class="editAll_right">
                                <span>金幣數量</span>
                                <input type="number" :value="i.mission_cash">
                                <span>完成次數</span>
                                <input type="number" :value="i.finish_time">
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
            missionQuery: '',
            mission: [
                {

                    mission_content: '每日登入1',
                    mission_cash: 10,
                    finish_time: 1,
                },
                {

                    mission_content: '每日登入2',
                    mission_cash: 20,
                    finish_time: 1,
                },
                {

                    mission_content: '每日登入3',
                    mission_cash: 30,
                    finish_time: 1,
                },
                {

                    mission_content: '每日登入4',
                    mission_cash: 40,
                    finish_time: 1,
                },
                {

                    mission_content: '每日登入5',
                    mission_cash: 50,
                    finish_time: 1,
                },
                {

                    mission_content: '每日登入6',
                    mission_cash: 60,
                    finish_time: 1,
                },



            ]
        }
    },
    methods: {
        show(index) {
            this.$root.$emit('toggleBlur', !this.open);
            this.open = !this.open;
            this.isBlurred = !this.isBlurred
            this.selectedIndex = index;

            // this.$emit('toggle-blur',this.open);
            // console.log(this.$root.$emit('toggleBlur',this.open))
        },
        close() {
            this.open = false;
            this.isBlurred = false;
        }
    },
    computed: {
        missionFliter() {
            const query = this.missionQuery.toLowerCase();
            return this.mission.filter((i) => {
                return i.mission_content.toLowerCase().includes(query)
            })
        }


    },
    components: {
        Backlayout
    }
}
</script>