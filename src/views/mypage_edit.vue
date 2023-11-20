<template>
    <layout>
        <template #section-right-content>
            <div class="mypage_edit">
                <div class="information">
                    <form class="information_write">
                        <div class="head_sticker">
                            <div class="head_sticker_main">
                                <div>
                                    <img :class="head_sticker_img" src="../assets/images/mypage/TibameCAT.jpg"
                                        alt="head_sticker">
                                </div>
                                <label class="mypage_button">
                                    <span>編輯大頭貼</span>
                                    <input type="file" class="upload_photos_input">
                                </label>
                            </div>
                        </div>
                        <div class="short_input">
                            <div>
                                <p>姓氏*</p>
                                <input type="text" name="first_name">
                            </div>
                            <div>
                                <p>名字*</p>
                                <input type="text" name="last_name">
                            </div>
                        </div>
                        <div class="long_input">
                            <div>
                                <p>電話*</p>
                                <input type="tel" name="tel">
                            </div>
                            <div>
                                <p>Email</p>
                                <input type="email" name="email" value="{{ member_mail@gmail.com }}" disabled>
                            </div>
                        </div>
                        <div class="short_input">
                            <div>
                                <p>性別</p>
                                <select name="gender">
                                    <option>-</option>
                                    <option>男</option>
                                    <option>女</option>
                                </select>
                            </div>
                            <div>
                                <p>星座*</p>
                                <select name="constellation">
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
                                <p>工作/職稱*</p>
                                <input type="text" name="job">
                            </div>
                            <div>
                                <p>所在地區*</p>
                                <select name="city">
                                    <option>-</option>
                                    <option>基隆市</option>
                                    <option>台北市</option>
                                    <option>新北市</option>
                                    <option>桃園市</option>
                                    <option>新竹市</option>
                                    <option>新竹縣</option>
                                    <option>苗栗縣</option>
                                    <option>台中市</option>
                                    <option>彰化縣</option>
                                    <option>南投縣</option>
                                    <option>雲林縣</option>
                                    <option>嘉義市</option>
                                    <option>嘉義縣</option>
                                    <option>台南市</option>
                                    <option>高雄市</option>
                                    <option>屏東縣</option>
                                    <option>宜蘭縣</option>
                                    <option>花蓮縣</option>
                                    <option>台東縣</option>
                                    <option>離島地區</option>
                                </select>
                            </div>
                        </div>
                        <div class="short_input">
                            <div>
                                <p>興趣1*</p>
                                <input type="text" name="first_name">
                            </div>
                            <div>
                                <p>興趣2*</p>
                                <input type="text" name="last_name">
                            </div>
                        </div>
                        <div class="big_input">
                            <div>
                                <p>個人簡介</p>
                                <textarea type="text" name="Self_introduction"></textarea>
                            </div>
                        </div>
                    </form>
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
                            <img :src="faceImageChange" id="faceImage" alt="">
                        </div>
                        <div class="preview_hair avatar_preview">
                            <img :src="hairImageChange" id="hairImage" alt="">
                        </div>
                        <div class="preview_cloth avatar_preview">
                            <img :src="clothImageChange" id="clothImage" alt="">
                        </div>
                        <div class="preview_accessories avatar_preview">
                            <img :src="accessoriesImageChange" id="accessoriesImage" alt="">
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
                <div>
                    <router-link :to="{ name: 'mypage' }" class="submit">
                        <input type="submit" value="儲存變更">
                    </router-link>
                </div>
            </div>
        </template>
    </layout>
</template>

<script>



//import 這頁需要的元件
import layout from '@/components/layout.vue'
import { gsap } from 'gsap'
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
        };
    },
    methods: {
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
<style scoped>
.active-button {
    background-color: #66669A !important;
    color: white;
}
</style>
