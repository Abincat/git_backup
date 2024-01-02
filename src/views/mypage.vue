<template>
    <layout>
        <template #section-right-content>
            <div class="mypage">

                <!----------------新增貼文彈窗---------------->
                <div v-if="postShow" class="add-post-blur">
                    <div class="add-post" ref="addPostBlock">
                        <addPost @hideBlock="postShowControl" @addPost="addPost"></addPost>
                    </div>
                </div>
                <!----------------新增貼文彈窗end---------------->



                <div class="introduction_guided_tour">
                    <div class="property">
                        <!-- <router-link :to="{ name: buy_coin }">
                            <button class="mypage_button">購買金幣</button>
                        </router-link> -->
                        <div>
                            <img src="../assets/images/mypage/gold_coin.png">
                            <p>持有金幣${{ hold_coins }}</p>
                        </div>
                    </div>
                    <div class="my_introduction">
                        <div>
                            <button @click="postShow = !postShow" class="new_post_button Btn">發表新貼文</button>
                        </div>
                        <div class="head_sticker">
                            <img :src="'data:image/jpg;base64,' + userImg" ref="head_sticker" alt="" v-if="userImg">
                        </div>
                        <div class="guide_button">
                            <router-link :to="{ name: 'mypage_edit' }">
                                <button class="Btn">個人資料編輯</button>
                            </router-link>

                            <router-link :to="{ name: 'wander' }">
                                <button class="Btn">我要去流浪</button>
                            </router-link>

                            <router-link :to="{ name: 'friends' }">
                                <button class="Btn">好友清單</button>
                            </router-link>

                            <!-- <button class="Btn">＋加朋友</button> -->

                            <div>
                                <button @click="postShow = !postShow" class="new_post_button_RWD Btn">發表新貼文</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mypage_info">
                    <!-- <label class="mypage_button Btn">
                        <span>更換大頭貼</span>
                        <input type="file" class="upload_photos_input" ref="imgInput" accept=".jpg,.png"
                            @change="uploadImg">
                    </label> -->
                    <p>{{ SelfIntroduction }}</p>
                </div>




                <!----------------蒐藏品彈窗---------------->
                <div v-if="collectionShow" class="collection_window_blur">
                    <div class="collection_window">
                        <div class="collection_window_title">
                            <h4>編輯蒐藏品</h4>
                            <p>還沒有蒐藏品嗎?去流浪一下吧!</p>
                            <button @click="collectionShow = !collectionShow">
                                <img src="../assets/images/mypage/X.png" alt="x">
                            </button>
                        </div>
                        <div class="collection_window_list">
                            <div class="collection_window_Classification">
                                <h2>SSR</h2>
                                <div class="collection_list">
                                    <div v-for="(collection, index) in collections.SSR" :key="index"
                                        class="collection_detailed">
                                        <img :src="collection.ownedImg"
                                            :class="{ 'selected-box': isSelected(collection.collectionID) }"
                                            @click="toggleSelection(collection.collectionID)" alt="">
                                        <h6>{{ collection.title }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>SR</h2>
                                <div class="collection_list">
                                    <div v-for="(collection, index) in collections.SR" :key="index"
                                        class="collection_detailed">
                                        <img :src="collection.ownedImg"
                                            :class="{ 'selected-box': isSelected(collection.collectionID) }"
                                            @click="toggleSelection(collection.collectionID)" alt="">
                                        <h6>{{ collection.title }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>R</h2>
                                <div class="collection_list">
                                    <div v-for="(collection, index) in collections.R" :key="index"
                                        class="collection_detailed">
                                        <img :src="collection.ownedImg"
                                            :class="{ 'selected-box': isSelected(collection.collectionID) }"
                                            @click="toggleSelection(collection.collectionID)" alt="">
                                        <h6>{{ collection.title }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collection_window_Classification">
                                <h2>N</h2>
                                <div class="collection_list">
                                    <div v-for="(collection, index) in collections.N" :key="index"
                                        class="collection_detailed">
                                        <img :src="collection.ownedImg"
                                            :class="{ 'selected-box': isSelected(collection.collectionID) }"
                                            @click="toggleSelection(collection.collectionID)" alt="">
                                        <h6>{{ collection.title }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collection_window_summit">
                            <button @click="collectionShow = !collectionShow, collectionReturn()"
                                class="mypage_button Btn">確定</button>
                        </div>
                    </div>
                </div>
                <!----------------蒐藏品彈窗end---------------->

                <!-------------------------------蒐藏品區塊------------------------------->
                <div class="tag">
                    <span v-if="constellation && constellation !== '-'"> {{ constellation }} </span>
                    <span v-if="job"> {{ job }} </span>
                    <span v-if="city"> {{ city }} </span>
                    <span v-if="hobbyA"> {{ hobbyA }} </span>
                    <span v-if="hobbyB"> {{ hobbyB }} </span>
                </div>
                <div class="custom_display">
                    <div class="show_role">
                        <img :src="faceImageChange" class="face character_parts" v-if="faceImageChange">
                        <img :src="hairImageChange" class="hair character_parts" v-if="hairImageChange">
                        <img :src="clothImageChange" class="cloth character_parts" v-if="clothImageChange">
                        <img :src="accessoriesImageChange" class="accessories character_parts"
                            v-if="accessoriesImageChange">
                        <p class="noAvatar"
                            v-if="!faceImageChange && !hairImageChange && !clothImageChange && !accessoriesImageChange">
                            無虛擬人物
                        </p>
                        <div class="base_plate"></div>
                    </div>
                    <div class="my_collect">
                        <button @click="collectionShow = !collectionShow, editCollection()"
                            class="mypage_button">編輯收藏品</button>
                        <div class="my_collect_title">
                            <span>我的收藏</span>
                            <hr>
                        </div>
                        <div class="collect">
                            <div class="collectA">
                                <img :src="'data:image;base64,' + exhibit_collection_A" alt="" v-if="exhibit_collection_A">
                            </div>
                            <div class="collectB">
                                <img :src="'data:image;base64,' + exhibit_collection_B" alt="" v-if="exhibit_collection_B">
                            </div>
                            <div class="collectC">
                                <img :src="'data:image;base64,' + exhibit_collection_C" alt="" v-if="exhibit_collection_C">
                            </div>
                        </div>
                    </div>
                </div>

                <!-------------------------------活動區塊------------------------------->
                <!-- <editActivityScore></editActivityScore> -->
                <div class="life">
                    <div class="activity">
                        <div class="activity_list">
                            <h4>即將開始的活動</h4>
                            <span>{{ activity_name }}</span>
                            <p>{{ '活動日期：' + (activity_date ? activity_date : '無活動報名紀錄') }}</p>
                            <!-- <p>{{ '報名時間' + activity_start + '~' + activity_end }}</p> -->
                        </div>
                        <div class="past_activity">
                            <div class="past_activity_title">
                                <span>歷史活動</span>
                            </div>
                            <ul class="past_activity_list">
                                <li v-for="(activityItem, index) in activityItems" :key="index">
                                    <p>{{ activityItem.ACTIVITY_NAME }}</p>
                                    <div class="activity_time_box"
                                        :class="{ 'activity_time-bg': pastActivityTimeShow === index }">
                                        <p class="past_activity_time" v-if="pastActivityTimeShow === index">{{
                                            activityItem.ACTIVITY_DATE }}</p>
                                        <div>
                                            <button :value="index"
                                                @click="pastActivityTimeShow === index ? pastActivityTimeShow = null : pastActivityTimeShow = index"
                                                class="mypage_button">{{
                                                    pastActivityTimeShow === index ? '關閉' : '查看' }}</button>
                                        </div>
                                    </div>
                                </li>
                                <p v-if="activityItems.length === 0">無歷史紀錄</p>
                            </ul>
                        </div>
                    </div>


                    <!-------------------------------任務區塊------------------------------->

                    <div class="mission_board">
                        <!-- <missionList></missionList> -->
                        <ul class="mission_list">
                            <h4>今日任務</h4>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img :src="loginMissionCheck">
                                    </div>
                                    <p>每日登入獎勵</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+10</p>
                                </div>
                            </li>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img :src="wanderMissionCheck">
                                    </div>
                                    <p>流浪一次</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+15</p>
                                </div>
                            </li>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img :src="snakeMissionCheck">
                                    </div>
                                    <p>貪食蛇遊玩一次</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+10</p>
                                </div>
                            </li>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img :src="millionMissionCheck">
                                    </div>
                                    <p>百萬小學堂遊玩一次</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+10</p>
                                </div>
                            </li>
                            <li>
                                <div class="mission">
                                    <div>
                                        <img :src="postMissionCheck">
                                    </div>
                                    <p>發表公開新貼文</p>
                                </div>
                                <div class="mission_award">
                                    <img src="../assets/images/mypage/gold_coin.png">
                                    <p>+20</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                <!-------------------------------貼文區塊------------------------------->
                <div class="page-post">
                    <div class="post-items">
                        <postItem :postItems="postItems" :userImage="'data:image;base64,' + userImg"
                            @addComment="addComment"></postItem>
                    </div>
                </div>
            </div>
        </template>
    </layout>
</template>


<script>
//import 這頁需要的元件
import layout from '@/components/layout.vue'
import postItem from '@/components/postItem.vue'
import addPost from '@/components/addPost.vue'

import friendView from '@/assets/images/icon/friend-view-select.svg';
import globalView from '@/assets/images/icon/global-view-select-2.svg';
import privateView from '@/assets/images/icon/private-view-select.svg';

import { useUserStore } from '@/store/user';

import unFinish from '@/assets/images/mypage/unFinish_icon.png'
import finish from '@/assets/images/mypage/Finish_icon.png'

export default {
    components: {
        layout,
        postItem,
        addPost
    },

    data() {
        return {
            collectionShow: false,
            postShow: false,
            selectedBoxes: [],
            maxSelection: 3,
            id: '',
            hold_coins: '',
            star: false,
            constellation: '',
            job: '',
            city: '',
            hobbyA: '',
            hobbyB: '',
            SelfIntroduction: '',
            faceImageChange: '',
            hairImageChange: '',
            clothImageChange: '',
            accessoriesImageChange: '',
            userImg: '',
            collectionID: '',
            activityId: '',
            activity_name: '',
            ACTIVITY_NAME: '',
            activity_start: '',
            activity_end: '',
            activity_img: '',
            activity_date: '',
            exhibit_collection_A: '',
            exhibit_collection_B: '',
            exhibit_collection_C: '',
            loginIsCompleted: false,
            loginMissionCheck: unFinish,
            wanderIsCompleted: false,
            wanderMissionCheck: unFinish,
            postIsCompleted: false,
            postMissionCheck: unFinish,
            snakeIsCompleted: false,
            snakeMissionCheck: unFinish,
            millionIsCompleted: false,
            millionMissionCheck: unFinish,
            // isUpload: false,
            pastActivityTimeShow: null,
            // scores: Array(5).fill(5),
            activityItems: [],
            activityPastDay: [],
            //buttonColor: false,
            collections: {
                SSR: [],
                SR: [],
                R: [],
                N: []
            },
            postItems: [],
            userName: '',
            ajax_url: import.meta.env.VITE_AJAX_URL,
        };
    },
    created() {
        //取得會員資料
        const userStore = useUserStore();
        this.id = userStore.userID;
        this.userName = userStore.userName;

        //載入頁面時先讀取用戶資訊填在input裡
        this.getData();

        //讀取使用者貼文
        this.getPostItems();

        //讀取任務紀錄
        this.getMission();
    },
    methods: {
        async getData() {
            axios.post(this.ajax_url + "member_information.php", { id: this.id }).then((resData) => {
                // const member_id = resData.data[0].MEMBER_ID;
                this.constellation = resData.data[0].MEMBER_CONSTELLATION;
                this.job = resData.data[0].MEMBER_JOB;
                this.city = resData.data[0].MEMBER_CITY;
                this.hobbyA = resData.data[0].MEMBER_HOBBY_TEXT_A;
                this.hobbyB = resData.data[0].MEMBER_HOBBY_TEXT_B;
                this.SelfIntroduction = resData.data[0].MEMBER_INTRODUCE;
                this.faceImageChange = resData.data[0].MEMBER_AVATAR_FACE;
                this.hairImageChange = resData.data[0].MEMBER_AVATAR_HAIR;
                this.clothImageChange = resData.data[0].MEMBER_AVATAR_CLOTH;
                this.accessoriesImageChange = resData.data[0].MEMBER_AVATAR_ACCESSORIES;
                this.hold_coins = resData.data[0].MEMBER_COIN;
                this.userImg = resData.data[0].MEMBER_PIC;
            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            });
            axios.post(this.ajax_url + "coming_soon_activity.php", { id: this.id }).then((resData) => {
                this.activity_name = resData.data[0].ACTIVITY_NAME;
                this.activity_date = resData.data[0].ACTIVITY_DATE;
                this.activity_start = resData.data[0].ACTIVITY_STARTDATE;
                this.activity_end = resData.data[0].ACTIVITY_ENDDATE;
                this.activity_img = resData.data[0].ACTIVITY_ACTIVITY_IMAGE;
            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            });
            axios.post(this.ajax_url + "history_activity.php", { id: this.id }).then((resData) => {
                this.activityItems = resData.data;
                this.activityPastDay = resData.data[0].ACTIVITY_DATE;
                // this.activityItem.name = resData.data.ACTIVITY_NAME;
            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            });
            axios.post(this.ajax_url + "member_collection_exhibit.php", { id: this.id }).then((resData) => {

                this.exhibit_collection_A = resData.data[0]['COLLECTION_IMAGE'];
                this.exhibit_collection_B = resData.data[1]['COLLECTION_IMAGE'];
                this.exhibit_collection_C = resData.data[2]['COLLECTION_IMAGE'];
                // console.log(resData.data);

            }).catch((e) => {
                console.log(e);
            });
        },

        light() {
            this.star = true;
        },

        getMission() {
            //登入任務檢查
            axios.post(this.ajax_url + "mission_check_login.php", { id: this.id }).then((resData) => {
                if (resData.data.loginIsCompleted) {
                    // 有登入紀錄，代表今天已經登入過
                    this.loginTime = resData.data.loginTime;
                    console.log('登入' + this.loginTime)

                    // 更換圖片路徑
                    this.loginMissionCheck = finish;
                    // 更新會員金幣及任務完成次數
                    axios.post(this.ajax_url + "mission_check_login_return.php", { id: this.id })
                        .then((response) => {
                            console.log(response.data);
                        })
                } else {
                    this.loginMissionCheck = unFinish;
                }
            }).catch((e) => {
                console.log(e);
            });


            //流浪任務檢查
            axios.post(this.ajax_url + "mission_check_wander.php", { id: this.id }).then((resData) => {
                if (resData.data.wanderIsCompleted) {
                    this.wanderTime = resData.data.wanderTime;
                    console.log('流浪' + this.wanderTime)

                    // 更換圖片路徑
                    this.wanderMissionCheck = finish;
                    // 更新會員金幣及任務完成次數
                    axios.post(this.ajax_url + "mission_check_wander_return.php", { id: this.id })
                        .then((response) => {
                            console.log(response.data);
                        })
                } else {
                    this.wanderMissionCheck = unFinish;
                }
            }).catch((e) => {
                console.log(e);
            });


            //貼文任務檢查
            axios.post(this.ajax_url + "mission_check_post.php", { id: this.id }).then((resData) => {
                if (resData.data.postIsCompleted) {
                    this.postTime = resData.data.postTime;
                    console.log('貼文' + this.postTime)

                    // 更換圖片路徑
                    this.postMissionCheck = finish;
                    // 更新會員金幣及任務完成次數
                    axios.post(this.ajax_url + "mission_check_post_return.php", { id: this.id })
                        .then((response) => {
                            console.log(response.data);
                        })
                } else {
                    this.postMissionCheck = unFinish;
                }
            }).catch((e) => {
                console.log(e);
            });


            //貪食蛇任務檢查
            axios.post(this.ajax_url + "mission_check_snake.php", { id: this.id }).then((resData) => {
                if (resData.data.snakeIsCompleted) {
                    this.snakeTime = resData.data.snakeTime;
                    console.log('貪食蛇' + this.snakeTime)

                    // 更換圖片路徑
                    this.snakeMissionCheck = finish;
                    // 更新會員金幣及任務完成次數
                    axios.post(this.ajax_url + "mission_check_snake_return.php", { id: this.id })
                        .then((response) => {
                            console.log(response.data);
                        })
                } else {
                    this.snakeMissionCheck = unFinish;
                }
            }).catch((e) => {
                console.log(e);
            });


            //百萬學堂任務檢查
            axios.post(this.ajax_url + "mission_check_million.php", { id: this.id }).then((resData) => {
                if (resData.data.millionIsCompleted) {
                    this.millionTime = resData.data.millionTime;
                    console.log('百萬學堂' + this.millionTime)

                    // 更換圖片路徑
                    this.millionMissionCheck = finish;
                    // 更新會員金幣及任務完成次數
                    axios.post(this.ajax_url + "mission_check_million_return.php", { id: this.id })
                        .then((response) => {
                            console.log(response.data);
                        })
                } else {
                    this.millionMissionCheck = unFinish;
                }
            }).catch((e) => {
                console.log(e);
            });
        },

        toggleSelection(index) {
            const selectedIndex = this.selectedBoxes.indexOf(index);

            if (selectedIndex !== -1) {
                // 如果已經選中,取消選擇
                this.selectedBoxes.splice(selectedIndex, 1);
            } else {
                // 如果未選中,並且未達到最大選擇數,選取起來
                if (this.selectedBoxes.length < this.maxSelection) {
                    this.selectedBoxes.push(index);
                }
            }
        },
        isSelected(index) {
            return this.selectedBoxes.includes(index);

        },

        editCollection() {
            axios.post(this.ajax_url + "member_collection.php", { id: this.id }).then((resData) => {
                // 清空舊有資料
                this.collections.SSR = [];
                this.collections.SR = [];
                this.collections.R = [];
                this.collections.N = [];

                // 分類資料
                resData.data.forEach(collection => {
                    const formattedCollection = {
                        title: collection.COLLECTION_NAME,
                        ownedImg: 'data:image;base64,' + collection.COLLECTION_IMAGE,
                        collectionID: collection.COLLECTION_ID
                    };

                    switch (collection.COLLECTION_LEVEL) {
                        case 'SSR':
                            this.collections.SSR.push(formattedCollection);
                            break;
                        case 'SR':
                            this.collections.SR.push(formattedCollection);
                            break;
                        case 'R':
                            this.collections.R.push(formattedCollection);
                            break;
                        case 'N':
                            this.collections.N.push(formattedCollection);
                            break;
                        default:
                            break;
                    }
                });
                console.log(this.collections);
            }).catch((e) => {
                console.log(e);
            });
        },
        async collectionReturn() {
            const collectionIDs = this.selectedBoxes;
            for (let index = 0; index < this.selectedBoxes.length; index++) {
                const id = this.selectedBoxes[index];
                const response = await axios.post(this.ajax_url + "member_collection_return.php", {
                    id: this.id,
                    collectionID: id,
                    collectionIDs: collectionIDs,
                });
                console.log(response.data);
            }
            // 在這裡清空selectedBoxes
            this.selectedBoxes = [];

            // 存檔後再次呼叫展示
            axios.post(this.ajax_url + "member_collection_exhibit.php", { id: this.id }).then((resData) => {
                this.exhibit_collection_A = resData.data[0]['COLLECTION_IMAGE'];
                this.exhibit_collection_B = resData.data[1]['COLLECTION_IMAGE'];
                this.exhibit_collection_C = resData.data[2]['COLLECTION_IMAGE'];
                console.log(resData.data);
            }).catch((e) => {
                console.log(e);
            });
        },



        // 以下開始是貼文相關的Methods
        postShowControl(show) {
            this.postShow = show;
        },
        addPost(post) {
            const newPost = post;
            if (newPost.status == 0) {
                newPost.status = globalView;
            } else if (newPost.status == 1) {
                newPost.status = friendView;
            } else {
                newPost.status = privateView;
            }
            this.postItems.unshift(newPost);
            alert('新增完成');
        },
        getPostItems() {

            const memberId = {
                userID: this.id,
            }

            //傳入memberID 取回自己的貼文
            axios
                .post(this.ajax_url + 'getMyPostItems.php', JSON.stringify(memberId))
                .then(response => {
                    // console.log(response.data);

                    if (response.data != 0) {

                        response.data.forEach((element, index) => {
                            //設定post資料
                            const post = {
                                id: element['POST_ID'],
                                userId: element['MENBER_ID'],
                                userName: element['MEMBER_LAST_NAME'] + element['MEMBER_FIRST_NAME'],
                                userImg: 'data:image;base64,' + this.userImg,
                                content: element['POST_CONTENT'],
                                status: element['POST_STATUS'], //設定狀態(公開 0/ 好友 1/私人 2)
                                likes: element['POST_LIKES'],
                                liked: element['liked'],
                                createTime: element['POST_CREATETIME'].replaceAll('-', '/'),
                                postImages: [],
                                replieds: [],
                            }

                            if (post.status == 0) {
                                post.status = globalView;
                            } else if (post.status == 1) {
                                post.status = friendView;
                            } else {
                                post.status = privateView;
                            }

                            // post.postImages = this.getPostImg(post.id);
                            this.getPostImg(post.id, index);
                            this.getPostComment(post.id, index);

                            // post.replieds = this.replieds;


                            this.postItems.push(post);
                        });

                    }

                })
                .catch(error => {
                    console.log(error);
                });
        },
        getPostImg(id, i) {

            const postId = { id }

            axios
                .post(this.ajax_url + 'getPostImg.php', JSON.stringify(postId))
                .then(response => {

                    // console.log(response.data);

                    if (response.data == '0') {
                        console.log('no photo');
                    } else {
                        // console.log(response.data);
                        const postImages = [];
                        const result = response.data;

                        result.forEach(element => {
                            const imageItem = {
                                id: element['ID'],
                                // src: 'data:image;base64,' + element['POST_IMAGE'],
                                src: element['POST_IMAGE'],
                            }

                            postImages.push(imageItem);
                        })

                        this.postItems[i].postImages = postImages;
                    }
                })
                .catch(error => {
                    console.log(error);
                });

        },
        getPostComment(id, i) {

            const postId = { id }

            axios
                .post(this.ajax_url + 'getPostComment.php', JSON.stringify(postId))
                .then(response => {
                    if (response.data != 0) {
                        // console.log(response.data);
                        const replieds = [];
                        response.data.forEach(element => {
                            const commentItem = {
                                id: element['COMMENT_ID'],
                                commemtText: element['COMMENT_TEXT'],
                                name: element['MEMBER_LAST_NAME'] + element['MEMBER_FIRST_NAME'],
                                userImg: 'data:image;base64,' + element['MEMBER_PIC'],
                                createTime: element['COMMENT_CREATETIME'].replaceAll('-', '/'),
                            }

                            replieds.push(commentItem);
                        })

                        this.postItems[i].replieds = replieds;

                    } else {
                        // console.log('0');
                    }
                })
                .catch(error => {
                    console.log(error);
                });

        },
        addComment(e, i, postId, text) {

            //初始化日期
            const Today = new Date();

            const commentItem =
            {
                id: Date.now(),
                commemtText: text,
                userId: this.id,
                name: this.userName,
                userImg: 'data:image;base64,' + this.userImg,
                createTime: Today.toLocaleString("zh-tw", { hour12: false }),
                postId: postId,
            };
            this.postItems[i].replieds.push(commentItem);

            e.target.parentNode.previousSibling.value = '';
            // console.log(this.userData);

            // 新增回覆資料至DB
            axios
                .post(this.ajax_url + 'addPostComment.php', JSON.stringify(commentItem))
                .then(response => {
                    // console.log(response.data);
                    if (response.data != 1) {
                        alert('saveToDb Error');
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },

    },


}





</script>
