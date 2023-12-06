<template>
  <layout>
    <template #section-right-content>
      <div class="contact">
        <!-- ------ 聯絡資訊 ------ -->
        <div class="title">
          <h1>聯絡我們</h1>
          <p>歡迎您提供寶貴的意見,請填寫下方聯絡表單</p>
        </div>

        <div class="title-flex">
          <h3>聯絡資訊</h3>
          <p>INFORMATION</p>
        </div>

        <div class="phone">
          <h3>電話</h3>
          <p>02-2211-3322</p>
        </div>

        <div class="gmail">
          <h3>信箱</h3>
          <p>pieapple@gmail.com</p>
        </div>

        <div class="title-flex">
          <h3>聯絡表單</h3>
          <p>CONTACT FORM</p>
        </div>
        <!-- ------ 表單內容 ------ -->
        <div class="subject">
          <label for="selectoption" class="purpose">主旨</label>
          <input type="text" placeholder="主旨Subject" v-model="purpose"/>

          <label for="content" class="text">聯繫內容</label>
          <textarea name="content" v-model="content"></textarea>
        </div>

        <div class="captcha-flex">
          <label for="captcha">驗證碼</label>
          <input
            type="text"
            id="captcha"
            name="captcha"
            v-model="captchaInput"
          />
          <canvas
            ref="captchaCanvas"
            @click="refreshCaptcha"
            width="80"
            height="30"
          ></canvas>

          <!-- 新增按鈕觸發刷新驗證碼 -->
          <button class="refresh-button" @click="refreshCaptcha">重整驗證碼</button>
        </div>
        
        <div class="bt">
          <button class="reset" @click="del">清除</button>
          <button class="confirm" @click="Confirm">確認</button>
        </div>
      </div>
    </template>
  </layout>
</template>

<script>
import layout from "@/components/layout.vue";

export default {
  components: {
    layout,
  },
  data() {
    return {
      purpose:"",
      content:"",
      captchaInput: "",
      correctCaptcha: "",
    };
  },
  mounted() {
    this.refreshCaptcha();
  },
  methods: {
    del(){
      this.purpose = "" ;
      this.content = "";
      this.captchaInput = "";
    },




    generateCaptcha() {
      let captcha = "";
      const characters =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      for (let i = 0; i < 4; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        captcha += characters[randomIndex];
      }
      this.correctCaptcha = captcha;
      return captcha;
    },

    refreshCaptcha() {
      const canvas = this.$refs.captchaCanvas;
      const ctx = canvas.getContext("2d");

      ctx.clearRect(0, 0, canvas.width, canvas.height);

      const verificationCode = this.generateCaptcha();

      ctx.font = "24px Arial";
      ctx.fillStyle = "black";
      ctx.textBaseline = "middle";
      ctx.textAlign = "center";

      ctx.fillText(verificationCode, canvas.width / 2, canvas.height / 2);
    },

    checkdata() {
      if(this.purpose == ""){
        alert("請輸入主旨");
        return false;
      };

      if(this.content == ""){
        alert("請輸入聯繫內容");
        return false;
      };

      if(this.captchaInput == ""){
        alert("請輸入驗證碼");
        return false;
      };

      return true;
    },

    checkCaptcha() {
      if (this.captchaInput !== this.correctCaptcha) {
        alert("驗證失敗");
        this.refreshCaptcha();
        return false;
      }
      return true;
    },

    
    TransBackend(){
      let data = {
        purpose: this.purpose, //使用者輸入的主旨
        content: this.content // 使用者輸入的內容
      };

      // 用fetch 發送 POST 請求後端路徑
      fetch('http://localhost/knock/contact.php', {
          method: 'POST',
          // 處理跨域請求(非同源)
          mode: 'cors',
          headers: {
              'Content-Type': 'application/json'// 設定請求的 Content-Type 為 JSON 格式
          },
          body: JSON.stringify(data) // 將資料物件轉換為 JSON 格式並放入請求的主體中
      }).then(resp =>{
        if(resp.ok){
          this.purpose = "";
          this.content = "";
          this.captchaInput = "";
          this.refreshCaptcha();
          alert("新增成功");
        }
      }) // 在收到回應後 清除使用者輸入的資料 並且顯示新增成功的提示框
    },

    Confirm(){
      if(this.checkdata()){
        if(this.checkCaptcha()){
          // 傳到後端
          this.TransBackend();
        };
      };
      

    }
  },
};
</script>
