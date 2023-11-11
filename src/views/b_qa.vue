<template>
    <Backlayout @toggleBlur="updateBlurStatus">
        <template #section-right-content>
            <div class="b_qa">
                <div class="qa-section" :class="{'blurred':isBlurred}">
                    <h1>常見問題管理</h1>
                    <div class="qa">
                        <div class="qa-img"></div>
                        <p>Nick</p>
                    </div>

                </div>


                <div class="table-section" :class="{'blurred':isBlurred}">
                    <div class="search-section" >
                        <div class="search-section-left">
                            <select name="qa" id="pet-select" placeholder="問題類別">
                                <option value="dog">問題類別</option>
                                <option value="dog">帳號密碼</option>
                                <option value="cat">主題活動</option>
                                <option value="hamster">金幣專區</option>
                            </select>
                        </div>
                        <div class="search-section-right">
                            <input type="text" placeholder="以常見問題編號搜尋">
                            <span>搜尋</span>
                        </div>
                    </div>

                    <table class="table table-bordered ">
                        <thead>
                            <tr class="table-warning">
                                <th scope="col">問題編號</th>
                                <th scope="col">常見提問</th>
                                <th scope="col">問題回覆內容</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(i, index) in  qa" :key="index">
                                <th scope="row">{{ index + 1 }}</th>

                                <td>{{ i.qa_content }}</td>
                                <td>{{ i.qa_reply }}</td>
                                <td><button class="btn btn btn-warning" @click="show(index)">編輯</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="Pagination" :class="{'blurred':isBlurred}">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>></li>
                    </ul>
                </div>
                <div class="editQA" id="editQA" v-if="open">
                    <!-- 外層 -->
                    <div class="dialog" v-for="(i, index) in qa" :key="index"> 
                        <!-- 內容 -->
                        <div class="editTitle" v-if="selectedIndex == index">
                            <span>常見問題管理</span>
                        </div>
                        <div class="editContent" v-if="selectedIndex == index">
                            <div class="editAll_left">
                                <span>問題編號</span>
                                <p>{{index + 1}}</p>
                                <span>常見問題標題</span>
                                <input type="text" :value="i.qa_content">
                                <span>回答內容</span>
                                <input type="text" :value="i.qa_reply">
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
            open:false,
            isBlurred: false,
            selectedIndex: null,
            qa: [
                {

                    qa_content: '忘記登入密碼怎麼辦',
                    qa_reply: '前往「尋找你的帳號」頁面並遵循指示。 請務必使用您之前用來登入 帳號的電腦或手機。',
                },

                {

                    qa_content: '我不記得密碼',
                    qa_reply: '前往「尋找你的帳號」頁面並遵循指示。 請務必使用您之前用來登入 帳號的電腦或手機。',
                },

                {

                    qa_content: '廁所好髒',
                    qa_reply: '前往「尋找你的帳號」頁面並遵循指示。 請務必使用您之前用來登入 帳號的電腦或手機。',
                },
                {

                    qa_content: '你們客服很兇',
                    qa_reply: '前往「尋找你的帳號」頁面並遵循指示。 請務必使用您之前用來登入 帳號的電腦或手機。',
                },
                {

                    qa_content: '你們平台很無聊',
                    qa_reply: '前往「尋找你的帳號」頁面並遵循指示。 請務必使用您之前用來登入 帳號的電腦或手機。',
                },


                {

                    qa_content: '怎麼註冊',
                    qa_reply: '前往「尋找你的帳號」頁面並遵循指示。 請務必使用您之前用來登入 帳號的電腦或手機。',
                },


            ]
        }
    },
    methods:{
        show(index){
            this.$root.$emit('toggleBlur',!this.open);
            this.open = !this.open;
            this.isBlurred = !this.isBlurred;
            this.selectedIndex = index;
            
            // this.$emit('toggle-blur',this.open);
            // console.log(this.$root.$emit('toggleBlur',this.open))
        },
        close(){
            this.open = false; 
            this.isBlurred = false;
        },
        updateBlurStatus(status) {
    this.isBlurred = status;
  }
    },
    components: {
        Backlayout
    }
}
</script>