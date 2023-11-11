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
                                <button>編輯大頭貼</button>
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
                                <p>星座</p>
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
                                <p>工作/職稱</p>
                                <input type="text" name="job">
                            </div>
                            <div>
                                <p>所在地區</p>
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
                            <img src="../assets/images/mypage_edit/face_grimace.png" alt="">
                        </div>
                        <div class="preview_hair avatar_preview">
                            <img src="../assets/images/mypage_edit/hair_ponytail.png" alt="">
                        </div>
                        <div class="preview_cloth avatar_preview">
                            <img src="../assets/images/mypage_edit/cloth_bluecoat.png" alt="">
                        </div>
                        <div class="preview_accessories avatar_preview">
                            <img src="../assets/images/mypage_edit/accessories_Christmas.png" alt="">
                        </div>
                        <div class="base_plate"></div>
                    </div>
                    <div class="avatar_components">
                        <div class="avatar_components_button">
                            <button class="face_button">臉型</button>
                            <button class="hair_button">髮型</button>
                            <button class="cloth_button">服裝</button>
                            <button class="accessories_button">配件</button>
                        </div>
                        <div class="avatar_components_assemble">
                            <div class="avatar_components_face">
                                <img class="faceA" src="../assets/images/mypage_edit/face_hehe.png" alt="">
                                <img class="faceB" src="../assets/images/mypage_edit/face_grimace.png" alt="">
                                <img class="faceC" src="../assets/images/mypage_edit/face_unhappy.png" alt="">
                                <img class="faceD" src="../assets/images/mypage_edit/face_smile.png" alt="">
                                <img class="faceE" src="../assets/images/mypage_edit/face_Playful.png" alt="">
                                <img class="faceF" src="../assets/images/mypage_edit/face_scare.png" alt="">
                            </div>
                            <div class="avatar_components_hair">
                                <img class="hairA" src="../assets/images/mypage_edit/hair_curls.png" alt="">
                                <img class="hairB" src="../assets/images/mypage_edit/hair_novelist.png" alt="">
                                <img class="hairC" src="../assets/images/mypage_edit/hair_ponytail.png" alt="">
                                <img class="hairD" src="../assets/images/mypage_edit/hair_purple.png" alt="">
                                <img class="hairE" src="../assets/images/mypage_edit/hair_tea.png" alt="">
                                <img class="hairF" src="../assets/images/mypage_edit/hair_white.png" alt="">
                            </div>
                            <div class="avatar_components_cloth">
                                <img class="clothA" src="../assets/images/mypage_edit/cloth_black.png" alt="">
                                <img class="clothB" src="../assets/images/mypage_edit/cloth_pinkvest.png" alt="">
                                <img class="clothC" src="../assets/images/mypage_edit/cloth_redsweater.png" alt="">
                                <img class="clothD" src="../assets/images/mypage_edit/cloth_shirt.png" alt="">
                                <img class="clothE" src="../assets/images/mypage_edit/cloth_bluecoat.png" alt="">
                                <img class="clothF" src="../assets/images/mypage_edit/cloth_coffeejacket.png" alt="">
                            </div>
                            <div class="avatar_components_accessories">
                                <img class="accessoriesA" src="../assets/images/mypage_edit/accessories_Bachelorcap.png"
                                    alt="">
                                <img class="accessoriesB" src="../assets/images/mypage_edit/accessories_bowtie.png" alt="">
                                <img class="accessoriesC" src="../assets/images/mypage_edit/accessories_bubble.png" alt="">
                                <img class="accessoriesD" src="../assets/images/mypage_edit/accessories_chef.png" alt="">
                                <img class="accessoriesE" src="../assets/images/mypage_edit/accessories_Christmas.png"
                                    alt="">
                                <img class="accessoriesF" src="../assets/images/mypage_edit/accessories_crown.png" alt="">
                            </div>
                        </div>
                    </div>


                    <!--課金按鈕尚未規劃-->
                    <div>
                        <div>
                            <div>
                                <img>
                                <span></span>
                            </div>
                            <div>
                                <button></button>
                            </div>
                        </div>
                        <div>
                            <div>
                                <img>
                                <span></span>
                            </div>
                            <div>
                                <button></button>
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


export default {
    components: {
        layout
    },
    data() {
        return {};
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
        }

    }
};



</script>


