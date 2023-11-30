<template>
    <layout>
        <template #section-right-content>
            <div class="mypage_edit">
                <div class="information">
                    <div class="information_write">
                        <div class="head_sticker">
                            <div class="head_sticker_main">
                                <div>
                                    <img :src="userImg" ref="head_sticker" alt="head_sticker" v-show="isUpload">
                                </div>
                                <label class="mypage_button">
                                    <span>編輯大頭貼</span>
                                    <input type="file" class="upload_photos_input" ref="imgInput" accept=".jpg,.png"
                                        @change="uploadImg">
                                </label>
                            </div>
                        </div>
                        <div class="short_input">
                            <div>
                                <p>姓氏*</p>
                                <input type="text" name="firstName" ref="firstName" v-model="first_Name">
                            </div>
                            <div>
                                <p>名字*</p>
                                <input type="text" name="lastName" ref="lastName" v-model="last_Name">
                            </div>
                        </div>
                        <div class="long_input">
                            <div>
                                <p>電話</p>
                                <input type="tel" name="tel" ref="tel" v-model="tel">
                            </div>
                            <div>
                                <p>Email*</p>
                                <input type="email" name="email" ref="email" v-model="email" disabled>
                            </div>
                        </div>
                        <div class="short_input">
                            <div>
                                <p>性別</p>
                                <select name="gender" ref="gender" v-model="gender">
                                    <option>-</option>
                                    <option>男</option>
                                    <option>女</option>
                                </select>
                            </div>
                            <div>
                                <p>星座</p>
                                <select name="constellation" ref="constellation" v-model="constellation">
                                    <option>-</option>
                                    <option>牡羊座</option>
                                    <option>金牛座</option>
                                    <option>雙子座</option>
                                    <option>巨蟹座</option>
                                    <option>獅子座</option>
                                    <option>處女座</option>
                                    <option>天秤座</option>
                                    <option>天蠍座</option>
                                    <option>射手座</option>
                                    <option>魔羯座</option>
                                    <option>水瓶座</option>
                                    <option>雙魚座</option>
                                </select>
                            </div>
                        </div>
                        <div class="short_input">
                            <div>
                                <p>工作/職稱</p>
                                <input type="text" name="job" ref="job" v-model="job">
                            </div>
                            <div>
                                <p>所在地區</p>
                                <input type="text" name="city" ref="city" v-model="city">
                            </div>
                        </div>
                        <div class="short_input">
                            <div>
                                <p>興趣1</p>
                                <input type="text" name="hobbyA" ref="hobbyA" v-model="hobbyA">
                            </div>
                            <div>
                                <p>興趣2</p>
                                <input type="text" name="hobbyB" ref="hobbyB" v-model="hobbyB">
                            </div>
                        </div>
                        <div class="big_input">
                            <div>
                                <p>個人簡介</p>
                                <textarea type="text" name="SelfIntroduction" ref="SelfIntroduction"
                                    v-model="SelfIntroduction"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="decorate">
                        <iframe src="https://my.spline.design/untitled-18d75517c6c7d24ac267703c26c745f5/"></iframe>
                        <div class="mask"></div>
                        <div>
                            <div class="TibameCAT">
                                <img class="TibameCAT_leave_catch"
                                    src="../assets/images/mypage_edit/TibameCAT_leave_catch.png" alt="">
                                <img class="TibameCAT_leave" src="../assets/images/mypage_edit/TibameCAT_leave.png" alt="">
                                <img class="ball" src="../assets/images/mypage_edit/ball.png" alt="">
                                <button class="clickme" @click="ball_animation" id="clickme">Click Me!</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-------------------虛擬人物------------------->
                <div class="avatar">
                    <div class="preview">
                        <h4>虛擬角色人物</h4>
                        <div class="preview_face avatar_preview">
                            <img :src="faceImageChange" id="faceImage" alt="" ref="faceImage">
                        </div>
                        <div class="preview_hair avatar_preview">
                            <img :src="hairImageChange" id="hairImage" alt="" ref="hairImage">
                        </div>
                        <div class="preview_cloth avatar_preview">
                            <img :src="clothImageChange" id="clothImage" alt="" ref="clothImage">
                        </div>
                        <div class="preview_accessories avatar_preview">
                            <img :src="accessoriesImageChange" id="accessoriesImage" alt="" ref="accessoriesImage">
                        </div>
                        <!-- <div class="base_plate"></div> -->
                    </div>

                    <!-------------------------配件頁籤------------------------->
                    <div class="avatar_components">
                        <div class="avatar_components_button">
                            <div class="button_group">
                                <button @click="showTab('face')" :class="{ 'active-button': avatarWindow === 'face' }"
                                    class="face_button">臉型</button>
                                <button @click="showTab('hair')" :class="{ 'active-button': avatarWindow === 'hair' }"
                                    class="hair_button">髮型</button>
                                <button @click="showTab('cloth')" :class="{ 'active-button': avatarWindow === 'cloth' }"
                                    class="cloth_button">服裝</button>
                                <button @click="showTab('accessories')"
                                    :class="{ 'active-button': avatarWindow === 'accessories' }"
                                    class="accessories_button">配件</button>
                            </div>
                        </div>

                        <!-------------------------臉配件------------------------->
                        <div class="avatar_components_assemble">
                            <div v-show="avatarWindow === 'face'" class="avatar_components_face">
                                <img @click="selectImage('face', 'faceHehe')" class="faceA"
                                    src="../assets/images/mypage_edit/face_hehe.png" alt="">
                                <img @click="selectImage('face', 'faceGrimace')" class="faceB"
                                    src="../assets/images/mypage_edit/face_grimace.png" alt="">
                                <img @click="selectImage('face', 'faceUnhappy')" class="faceC"
                                    src="../assets/images/mypage_edit/face_unhappy.png" alt="">
                                <img @click="selectImage('face', 'faceSmile')" class="faceD"
                                    src="../assets/images/mypage_edit/face_smile.png" alt="">
                                <img @click="selectImage('face', 'facePlayful')" class="faceE"
                                    src="../assets/images/mypage_edit/face_Playful.png" alt="">
                                <img @click="selectImage('face', 'faceScare')" class="faceF"
                                    src="../assets/images/mypage_edit/face_scare.png" alt="">
                            </div>

                            <!-------------------------頭髮配件------------------------->
                            <div v-show="avatarWindow === 'hair'" class="avatar_components_hair">
                                <img @click="selectImage('hair', 'hairCurls')" class="hairA"
                                    src="../assets/images/mypage_edit/hair_curls.png" alt="">
                                <img @click="selectImage('hair', 'hairNovelist')" class="hairB"
                                    src="../assets/images/mypage_edit/hair_novelist.png" alt="">
                                <img @click="selectImage('hair', 'hairPonytail')" class="hairC"
                                    src="../assets/images/mypage_edit/hair_ponytail.png" alt="">
                                <img @click="selectImage('hair', 'hairPurple')" class="hairD"
                                    src="../assets/images/mypage_edit/hair_purple.png" alt="">
                                <img @click="selectImage('hair', 'hairTea')" class="hairE"
                                    src="../assets/images/mypage_edit/hair_tea.png" alt="">
                                <img @click="selectImage('hair', 'hairWhite')" class="hairF"
                                    src="../assets/images/mypage_edit/hair_white.png" alt="">
                            </div>

                            <!-------------------------衣服配件------------------------->
                            <div v-show="avatarWindow === 'cloth'" class="avatar_components_cloth">
                                <img @click="selectImage('cloth', 'clothBlack')" class="clothA"
                                    src="../assets/images/mypage_edit/cloth_black.png" alt="">
                                <img @click="selectImage('cloth', 'clothPinkvest')" class="clothB"
                                    src="../assets/images/mypage_edit/cloth_pinkvest.png" alt="">
                                <img @click="selectImage('cloth', 'clothRedsweater')" class="clothC"
                                    src="../assets/images/mypage_edit/cloth_redsweater.png" alt="">
                                <img @click="selectImage('cloth', 'clothShirt')" class="clothD"
                                    src="../assets/images/mypage_edit/cloth_shirt.png" alt="">
                                <img @click="selectImage('cloth', 'clothBluecoat')" class="clothE"
                                    src="../assets/images/mypage_edit/cloth_bluecoat.png" alt="">
                                <img @click="selectImage('cloth', 'clothCoffeejacket')" class="clothF"
                                    src="../assets/images/mypage_edit/cloth_coffeejacket.png" alt="">
                            </div>

                            <!-------------------------飾品配件------------------------->
                            <div v-show="avatarWindow === 'accessories'" class="avatar_components_accessories">
                                <img @click="selectImage('accessories', 'accessoriesBachelorcap')" class="accessoriesA"
                                    src="../assets/images/mypage_edit/accessories_Bachelorcap_center.png" alt="">
                                <img @click="selectImage('accessories', 'accessoriesBowtie')" class="accessoriesB"
                                    src="../assets/images/mypage_edit/accessories_bowtie_center.png" alt="">
                                <img @click="selectImage('accessories', 'accessoriesBubble')" class="accessoriesC"
                                    src="../assets/images/mypage_edit/accessories_bubble_center.png" alt="">
                                <img @click="selectImage('accessories', 'accessoriesChef')" class="accessoriesD"
                                    src="../assets/images/mypage_edit/accessories_chef_center.png" alt="">
                                <img @click="selectImage('accessories', 'accessoriesChristmas')" class="accessoriesE"
                                    src="../assets/images/mypage_edit/accessories_Christmas_center.png" alt="">
                                <img @click="selectImage('accessories', 'accessoriesCrown')" class="accessoriesF"
                                    src="../assets/images/mypage_edit/accessories_crown_center.png" alt="">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="submit_div">
                    <button class="submit Btn" @click="submit" type="submit">儲存變更</button>
                </div>
            </div>
        </template>
    </layout>
</template>

<script>



//import 這頁需要的元件
import layout from '@/components/layout.vue'
import { gsap } from 'gsap'
import axios from 'axios'
import faceHehe from '@/assets/images/mypage_edit/face_hehe.png'
import faceGrimace from '@/assets/images/mypage_edit/face_grimace.png'
import faceUnhappy from '@/assets/images/mypage_edit/face_unhappy.png'
import faceSmile from '@/assets/images/mypage_edit/face_smile.png'
import facePlayful from '@/assets/images/mypage_edit/face_Playful.png'
import faceScare from '@/assets/images/mypage_edit/face_scare.png'

import hairCurls from '@/assets/images/mypage_edit/hair_curls.png'
import hairNovelist from '@/assets/images/mypage_edit/hair_novelist.png'
import hairPonytail from '@/assets/images/mypage_edit/hair_ponytail.png'
import hairPurple from '@/assets/images/mypage_edit/hair_purple.png'
import hairTea from '@/assets/images/mypage_edit/hair_tea.png'
import hairWhite from '@/assets/images/mypage_edit/hair_white.png'

import clothBlack from '@/assets/images/mypage_edit/cloth_black.png'
import clothPinkvest from '@/assets/images/mypage_edit/cloth_pinkvest.png'
import clothRedsweater from '@/assets/images/mypage_edit/cloth_redsweater.png'
import clothShirt from '@/assets/images/mypage_edit/cloth_shirt.png'
import clothBluecoat from '@/assets/images/mypage_edit/cloth_bluecoat.png'
import clothCoffeejacket from '@/assets/images/mypage_edit/cloth_coffeejacket.png'

import accessoriesBachelorcap from '@/assets/images/mypage_edit/accessories_Bachelorcap.png'
import accessoriesBowtie from '@/assets/images/mypage_edit/accessories_bowtie.png'
import accessoriesBubble from '@/assets/images/mypage_edit/accessories_bubble.png'
import accessoriesChef from '@/assets/images/mypage_edit/accessories_chef.png'
import accessoriesChristmas from '@/assets/images/mypage_edit/accessories_Christmas.png'
import accessoriesCrown from '@/assets/images/mypage_edit/accessories_crown.png'
//這邊要把全部圖片import進去

export default {
    components: {
        layout
    },
    data() {
        return {
            avatarWindow: 'face',
            faceImageChange: faceHehe,
            hairImageChange: hairCurls,
            clothImageChange: clothBlack,
            accessoriesImageChange: accessoriesBachelorcap,
            id: "7", //抓會員id編號,要是浮動的
            first_Name: '',
            last_Name: '',
            tel: '',
            email: '',
            gender: '',
            constellation: '',
            job: '',
            city: '',
            hobbyA: '',
            hobbyB: '',
            SelfIntroduction: '',
            isUpload: false,
            userImg: ''
        };
    },
    created() {
        //載入頁面時先讀取用戶資訊填在input裡
        this.getData();
    },
    methods: {
        async getData() {
            console.log(this.id)
            axios.post("api/mypage_edit.php", { id: this.id }).then((resData) => {
                // console.log(resData); //我拿到資料之後要做什麼事
                this.first_Name = resData.data[0].MEMBER_FIRST_NAME;
                this.last_Name = resData.data[0].MEMBER_LAST_NAME;
                this.tel = resData.data[0].MEMBER_PHONE;
                this.email = resData.data[0].MEMBER_ACCOUNT;
                this.gender = resData.data[0].MEMBER_GENDER;
                this.constellation = resData.data[0].MEMBER_CONSTELLATION;
                this.job = resData.data[0].MEMBER_JOB;
                this.city = resData.data[0].MEMBER_CITY;
                this.hobbyA = resData.data[0].MEMBER_HOBBY_TEXT_A;
                this.hobbyB = resData.data[0].MEMBER_HOBBY_TEXT_B;
                this.SelfIntroduction = resData.data[0].MEMBER_INTRODUCE;

                const imageBlob = new Blob([resData.data[0].MEMBER_PIC], { type: 'image/jpeg' });
                this.userImg = URL.createObjectURL(imageBlob);

            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            })
        },
        async submit() {
            console.log(this.id)
            axios.post("api/mypage_edit_return.php", {
                id: this.id,
                first_Name: this.first_Name,
                last_Name: this.last_Name,
                tel: this.tel,
                gender: this.gender,
                constellation: this.constellation,
                job: this.job,
                city: this.city,
                hobbyA: this.hobbyA,
                hobbyB: this.hobbyB,
                SelfIntroduction: this.SelfIntroduction
            }).catch((e) => {
                console.log(e) //連線錯誤的時候會執行這邊
            })

            this.$router.push({ name: 'mypage' }) //存檔完導回個人頁面-測試完再取消註解
        },

        uploadImg(e) {
            this.isUpload = true;
            let file = e.target.files[0];
            let url = '';
            let reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = (e) => {
                // 使用 e.target.result 取得讀取的資料
                url = e.target.result.substring(e.target.result.indexOf(',') + 1);
                this.userImg = 'data:image/png;base64,' + url;
            };
        },


        ball_animation() {
            gsap.to(".ball", {
                y: -300,
                duration: 1,
                yoyo: true,
                scale: 1.5,
                repeat: 1,
                rotation: 360,
                onComplete: () => {
                    gsap.to(".clickme", {
                        opacity: 1
                    });
                    gsap.to(".TibameCAT_leave_catch", {
                        opacity: 1
                    });
                    gsap.to(".TibameCAT_leave", {
                        opacity: 0
                    });
                }
            });
            gsap.to(".clickme", {
                opacity: 0
            });
            gsap.to(".TibameCAT_leave_catch", {
                opacity: 0
            });
            gsap.to(".TibameCAT_leave", {
                opacity: 1
            });
        },

        showTab(tab) {
            this.avatarWindow = tab;
        },
        selectImage(category, imageName) {
            const imageId = category + 'Image';
            switch (category) {
                case 'face':
                    switch (imageName) {
                        case 'faceHehe':
                            this.faceImageChange = faceHehe;
                            break;
                        case 'faceGrimace':
                            this.faceImageChange = faceGrimace;
                            break;
                        case 'faceUnhappy':
                            this.faceImageChange = faceUnhappy;
                            break;
                        case 'faceSmile':
                            this.faceImageChange = faceSmile;
                            break;
                        case 'facePlayful':
                            this.faceImageChange = facePlayful;
                            break;
                        case 'faceScare':
                            this.faceImageChange = faceScare;
                            break;
                    }
                case 'hair':
                    switch (imageName) {
                        case 'hairCurls':
                            this.hairImageChange = hairCurls;
                            break;
                        case 'hairNovelist':
                            this.hairImageChange = hairNovelist;
                            break;
                        case 'hairPonytail':
                            this.hairImageChange = hairPonytail;
                            break;
                        case 'hairPurple':
                            this.hairImageChange = hairPurple;
                            break;
                        case 'hairTea':
                            this.hairImageChange = hairTea;
                            break;
                        case 'hairWhite':
                            this.hairImageChange = hairWhite;
                            break;
                    }
                    break;
                case 'cloth':
                    switch (imageName) {
                        case 'clothBlack':
                            this.clothImageChange = clothBlack;
                            break;
                        case 'clothPinkvest':
                            this.clothImageChange = clothPinkvest;
                            break;
                        case 'clothRedsweater':
                            this.clothImageChange = clothRedsweater;
                            break;
                        case 'clothShirt':
                            this.clothImageChange = clothShirt;
                            break;
                        case 'clothBluecoat':
                            this.clothImageChange = clothBluecoat;
                            break;
                        case 'clothCoffeejacket':
                            this.clothImageChange = clothCoffeejacket;
                            break;
                    }
                case 'accessories':
                    switch (imageName) {
                        case 'accessoriesBachelorcap':
                            this.accessoriesImageChange = accessoriesBachelorcap;
                            break;
                        case 'accessoriesBowtie':
                            this.accessoriesImageChange = accessoriesBowtie;
                            break;
                        case 'accessoriesBubble':
                            this.accessoriesImageChange = accessoriesBubble;
                            break;
                        case 'accessoriesChef':
                            this.accessoriesImageChange = accessoriesChef;
                            break;
                        case 'accessoriesChristmas':
                            this.accessoriesImageChange = accessoriesChristmas;
                            break;
                        case 'accessoriesCrown':
                            this.accessoriesImageChange = accessoriesCrown;
                            break;
                    }
            };
        }
    }
};


</script>
