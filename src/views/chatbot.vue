<template>
  <layout>
    <template #section-right-content>
      <div class="chatbott">
        <!-- 聊天機器人開啟按鈕 -->
        <!-- <button class="chatbot-toggler" @click="toggleChatbot">
          <span class="material-symbols-rounded">mode_comment</span>
          <span class="material-symbols-outlined">close</span>
        </button> -->
        <!-- 聊天機器人窗口 -->
        <div v-show="isChatbotVisible" class="chatbot">
          <header>
            <h2>客服小幫手</h2>
            <span class="close-btn material-symbols-outlined" @click="closeChatbot">close</span>
          </header>
          <!-- 聊天框 -->
          <ul class="chatbox" ref="chatbox">
            <!-- 聊天開始的歡迎消息 -->
            <li class="chat incoming">
              <span class="material-symbols-outlined">smart_toy</span>
              <p>您好 👋<br>有任何問題想詢問的嗎?</p>
            </li>
            <!-- 熱門問題 -->
            <div class="box">
              <h3>熱門問題</h3>
              <ul>
                <!-- 顯示熱門問題，點擊觸發handleQuestionClick方法 -->
                <li v-for="(question, index) in popularQuestions" :key="index" @click="handleQuestionClick(question)" class="chat outgoing">
                  {{ question }}
                </li>
              </ul>
            </div>
            <!-- 對話內容，顯示使用者輸入和機器人回覆 -->
            <li v-for="(message, index) in chatbox" :key="index" :class="{ 'chat': true, 'incoming': message.type === 'incoming', 'outgoing': message.type === 'outgoing' }">
              <span v-if="message.type === 'incoming'" class="material-symbols-outlined">smart_toy</span>
              <p v-html="message.message"></p>
            </li>
          </ul>
          <!-- 聊天輸入框 -->
          <div class="chat-input">
            <textarea v-model="userMessage" placeholder="請輸入文字..." spellcheck="false" required></textarea>
            <!-- 送出按鈕，觸發handleChat方法 -->
            <span id="send-btn" class="material-symbols-rounded" @click="handleChat">send</span>
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
      isChatbotVisible: true, // 控制聊天機器人窗口是否可見
      userMessage: '', // 使用者輸入的消息
      chatbox: [], // 聊天內容
      popularQuestions: ['註冊帳號', '忘記密碼', '更改帳戶', '聚會問題'], // 預設的熱門問題
    };
  },
  methods: {
    // 滾動聊天框至底部
    scrollChatboxToBottom() {
      this.$nextTick(() => {
        const chatbox = this.$refs.chatbox;
        console.log(chatbox); // 檢查 chatbox 是否正確獲取
        if (chatbox) {
          chatbox.scrollTop = chatbox.scrollHeight;
        }
      });
    },
    // 切換聊天機器人可見狀態
    // toggleChatbot() {
    //   this.isChatbotVisible = !this.isChatbotVisible;
    //   document.body.classList.toggle('show-chatbot', this.isChatbotVisible);
    // },
    // 關閉聊天機器人窗口
    closeChatbot() {
      this.isChatbotVisible = false;
    },
    // 創建聊天框中的消息對象
    createChatLi(message, type) {
      return {
        type: type,
        message: message,
      };
    },
    // 處理使用者發送消息
    handleChat() {
  if (!this.userMessage.trim()) {
      // 如果使用者輸入為空或只包含空白字元，不處理
      return;
  }

  const userMessage = this.userMessage.trim();
  this.chatbox.push(this.createChatLi(userMessage, 'outgoing'));
  this.userMessage = '';

  this.showTypingMessage(() => {
      let responseMessage = this.generateResponseMessage(userMessage);
      this.chatbox.push(this.createChatLi(responseMessage, 'incoming'));
      this.scrollChatboxToBottom();
  });
},
    // 處理點擊熱門問題
    handleQuestionClick(question) {
      this.chatbox.push(this.createChatLi(question, 'outgoing'));

      this.showTypingMessage(() => {
        let responseMessage = this.generateResponseMessage(question);
        this.chatbox.push(this.createChatLi(responseMessage, 'incoming'));
      });
      this.scrollChatboxToBottom();
    },
    // 顯示"思考中"消息，並在一段時間後執行回調
    showTypingMessage(callback) {
      this.chatbox.push(this.createChatLi('思考中...', 'incoming'));

      setTimeout(() => {
        this.chatbox.pop(); // 刪除「思考中...」消息
        callback();
      }, 1000); // 顯示回覆的延遲時間，這裡設為一秒
    },
    // 生成回覆消息
    generateResponseMessage(question) {
      switch (question) {
        case '註冊帳號':
          return '在首頁或註冊頁面點擊「註冊」。';
        case '忘記密碼':
          return '在登入頁面點擊「忘記密碼」。';
        case '更改帳戶':
          return '登入後，進入個人設定或資料設定頁面。';
        case '聚會問題':
          return '這是針對聚會問題的回覆';
        default:
          return '您再說什麼?';
      }
    },
  },

  mounted() {
console.log('Component mounted');
console.log('isChatbotVisible:', this.isChatbotVisible);
}

};
</script>





