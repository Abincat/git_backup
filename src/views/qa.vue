<template>
    <layout>
        <template #section-right-content>
            <div class="qa">
                <div class="qa-grid">
                    <div class="qa-left">
                        <h1>Categories</h1>
                        <ul>
                            <li v-for="(item, index) in Categorieitems" :key="index" @click="getQuestionById(item.Id)">
                                {{ item.Name }}
                            </li>
                            <!-- <li>帳號與註冊</li>
                            <li>隱私與安全</li>
                            <li>聚會功能問題</li>
                            <li>會員常見問題</li>
                            <li>付費及會員制度</li> -->
                        </ul>
                    </div>
                    <div class="qa-right">
                        <h1>常見問題</h1>
                        <div class="list" v-for="(l, i) in lists" :key="i">
                            <div class="title" @click="toggle(i)">
                                {{ l.title }}

                            </div>
                            <!-- <ul class="item" v-show="l.show">
                                <li>{{ l.items }}</li>
                            </ul> -->
                            <ul class="item" v-show="l.show">
                                <li v-for="(item, index) in l.items" :key="index">{{ item }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </layout>
</template>
  
<script>
import layout from '@/components/layout.vue';

export default {
    components: {
        layout,
    },
    data() {
        return {
            lists: [
                {
                    title: '',
                    items: [],
                },
                // {
                //     title: '如何註冊帳戶？',
                //     items: ['1. 在首頁或註冊頁面點擊「註冊」。', '2. 填寫必填資訊，如電子郵件、密碼和用戶名。', '3. 確認帳戶創建後，可能需要透過電子郵件驗證帳戶'],
                // },

                // {
                //     title: '我忘記了密碼怎麼辦？',
                //     items: ['1. 在登入頁面點擊「忘記密碼」。', '2. 輸入註冊時使用的電子郵件或用戶名。', '3. 會收到密碼重設的連結或指示，透過電子郵件或簡訊進行密碼重設。'],
                // },
                // {
                //     title: '能否更改帳戶資訊或暱稱？',
                //     items: ['1. 登入後，進入個人設定或資料設定頁面。', '2. 編輯想要更改的資訊，如暱稱、個人簡介等。', '3. 儲存變更，可能需要重新驗證帳戶。'],
                // },
                // {
                //     title: '註冊時是否需要驗證帳戶？',
                //     items: ['1. 大多數平台要求新用戶通過電子郵件或其他方式驗證帳戶。'],
                // },
                // {
                //     title: '是否可以使用社交媒體帳號註冊？',
                //     items: ['1. 一些平台支援通過社交媒體帳號（如Facebook、Google、Twitter等）快速註冊帳戶。'],
                // },
                // {
                //     title: '註冊時需要提供的必填資訊有哪些？',
                //     items: ['1. 註冊時可能需要提供的資訊包括姓名、電子郵件地址、密碼等。有些平台可能還需要其他身份識別信息。'],
                // },
            ],
            Categorieitems: [
                {
                    Id: "",
                    Name: ""
                }
            ]
        }
    },
    methods: {

        toggle: function (index) {
            if (this.lists[index].show) {
                this.lists[index].show = false; // 如果已展开，则关闭
            } else {
                this.lists.forEach((list, i) => (list.show = i === index)); // 展开当前项，关闭其他项
            }

            // console.log(this.lists[index])
        },

        GetCategories() {
            fetch('http://localhost/knock/GetCategories.php', {
                method: 'Get',
                // 非同源
                mode: 'cors',
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(resp => resp.json())
                .then(questions => {
                    this.Categorieitems = questions.map(item => {
                        return {
                            Id: item.QUESTION_CATEGORY_ID,
                            Name: item.QUESTION_CATEGORY_NAME,
                        };

                    })
                })
                .catch(error => {
                    alert('Error fetching data:', error);
                })
        },

        getQuestionById(id) {
            fetch(`http://localhost/knock/getQuestionById.php?id=${id}`, {
                method: 'Get',
                // 非同源
                mode: 'cors',
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(resp => resp.json())
                .then(questions => {
                    this.lists = questions.map(item => {
                        return {
                            title: item.QUESTION_TITLE,
                            items: item.QUESTION_CONTENT.split('。')
                        };

                    })
                })
                .catch(error => {
                    alert('Error fetching data:', error);
                })
        },

        fillLists() {

        }

    },
    mounted() {
        this.GetCategories();
        const CategoryId = 1;
        this.getQuestionById(CategoryId);
    }
};
</script>