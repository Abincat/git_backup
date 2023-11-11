<template>
    <layout>
        <template #section-right-content>
            <div class="contact">
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

    <form action="" method="" class="subject">
      <label for="selectoption" class="purpose">主旨</label>
      <select name="selectoption" id="selectoption">
        <option value="">主旨Subject</option>
        <option value="">帳號問題</option>
        <option value="">聚會問題</option>
      </select>

      <label for="content" class="text">聯繫內容</label>
      <textarea name="content" id="content"></textarea>
    </form>

    <div class="captcha-flex">
      <label for="captcha">驗證碼</label>
      <input type="text" id="captcha" name="captcha" v-model="captchaInput" />
      <canvas ref="captchaCanvas" @click="refreshCaptcha" width="80" height="30"></canvas>
    </div>
    <div class="bt">
      <button class="reset">清除</button>
      <button class="confirm" @click="checkCaptcha">確認</button>
    </div>

  </div>
        </template>
    </layout>
</template>
<script>
import layout from '@/components/layout.vue'

export default {
  components: {
    layout
  },
  data() {
    return {
      captchaInput: '',
      correctCaptcha: ''
    };
  },
  mounted() {
    this.refreshCaptcha();
  },
  methods: {
    generateCaptcha() {
      let captcha = '';
      const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      for (let i = 0; i < 4; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        captcha += characters[randomIndex];
      }
      this.correctCaptcha = captcha;
      return captcha;
    },

    refreshCaptcha() {
      const canvas = this.$refs.captchaCanvas;
      const ctx = canvas.getContext('2d');

      ctx.clearRect(0, 0, canvas.width, canvas.height);

      const verificationCode = this.generateCaptcha();

      ctx.font = '24px Arial';
      ctx.fillStyle = 'black';
      ctx.textBaseline = 'middle';
      ctx.textAlign = 'center';

      ctx.fillText(verificationCode, canvas.width / 2, canvas.height / 2);
    },

    checkCaptcha() {
      if (this.captchaInput === this.correctCaptcha) {
        alert('驗證成功');
      } else {
        alert('驗證失敗');
        this.refreshCaptcha();
      }
    },
  },
};
</script>