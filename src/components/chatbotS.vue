<template>
  <layout>
    <template #section-right-content>
      <div class="chatbotS">
        <!-- 聊天機器人開啟按鈕 -->
        <button class="chatbot-toggler" @click="toggleChatbot">
          <span class="material-symbols-rounded">mode_comment</span>
          <span class="material-symbols-outlined">close</span>
        </button>
        <!-- 聊天機器人窗口 -->
        <div v-show="isChatbotVisible" class="chatbot">
          <header>
            <h2>客服小幫手</h2>
            <span class="close-btn material-symbols-outlined" @click="closeChatbot">X</span>
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
      isChatbotVisible: false, // 控制聊天機器人窗口是否可見
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
    toggleChatbot() {
      this.isChatbotVisible = !this.isChatbotVisible;
      document.body.classList.toggle('show-chatbot', this.isChatbotVisible);
    },
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
          return '這是一般回覆';
      }
    },
  },

  mounted() {
console.log('Component mounted');
console.log('isChatbotVisible:', this.isChatbotVisible);
}

};
</script>

<style lang="scss">
  .chatbotS{
  .chatbox .box {
    width: 200px;
    height: 280px;
    background-color: #C3C4E5;
    border-radius: 10px;
    margin-top: 25px;
    margin-left: 40px;
  }
  
  .chatbox .box h3 {
    color: #343575;
    font-size: 18px;
    text-align: center;
    padding: 15px 10px 0px 10px;
  }
  
  .chatbox .box ul {
    list-style: none;
    width: 180px;
    margin: 0 auto;
  }
  
  .chatbox .box ul > li {
    background-color: #fff;
    padding: 10px;
    padding-right:47px;
    margin: 10px;
    border-radius: 5px;
    color: #343575;
    font-weight: 700;
  }
  
  .chatbox .box li:hover {
    cursor: pointer;
  }
  
  .chatbot-toggler {
    position: fixed;
    bottom: 30px;
    right: 35px;
    outline: none;
    border: none;
    height: 50px;
    width: 50px;
    display: flex;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #343575;
    transition: all 0.2s ease;
  }
  
  body.show-chatbot .chatbot-toggler {
    transform: rotate(90deg);
  }
  
  .chatbot-toggler span {
    color: #fff;
    position: absolute;
  }
  
  .chatbot-toggler span:last-child,
  body.show-chatbot .chatbot-toggler span:first-child {
    opacity: 0;
  }
  
  body.show-chatbot .chatbot-toggler span:last-child {
    opacity: 1;
  }
  
  .chatbot {
    position: fixed;
    right: 35px;
    bottom: 90px;
    width: 420px;
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    transform-origin: bottom right;
    box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
      0 32px 64px -48px rgba(0, 0, 0, 0.5);
    transition: all 0.1s ease;
  }
  
  body.show-chatbot .chatbot {
    opacity: 1;
    pointer-events: auto;
    transform: scale(1);
  }
  
  .chatbot header {
    padding: 16px 0;
    position: relative;
    text-align: center;
    color: #fff;
    background: #343575;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }
  
  .chatbot header span {
    position: absolute;
    right: 15px;
    top: 50%;
    opacity: 1;
    visibility: visible;
    cursor: pointer;
    transform: translateY(-50%);
    transition: opacity 0.2s ease, visibility 0.2s ease;
  }
  
  body.show-chatbot .chatbot header span {
    opacity: 1;
    // visibility: visible;
  }
  
  header h2 {
    font-size: 1.4rem;
  }
  
  .chatbot .chatbox {
    overflow-y: auto;
    height: 400px;
    padding: 30px 20px 100px;
  }
  
  .chatbot :where(.chatbox, textarea)::-webkit-scrollbar {
    width: 6px;
  }
  
  .chatbot :where(.chatbox, textarea)::-webkit-scrollbar-track {
    background: #fff;
    border-radius: 25px;
  }
  
  .chatbot :where(.chatbox, textarea)::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 25px;
  }
  
  .chatbox .chat {
    display: flex;
    list-style: none;
  }
  
  .chatbox .outgoing {
    margin: 20px 0;
    justify-content: flex-end;
  }
  
  .chatbox .incoming span {
    width: 32px;
    height: 32px;
    color: #fff;
    cursor: default;
    text-align: center;
    line-height: 32px;
    align-self: flex-end;
    background: #724ae8;
    border-radius: 4px;
    margin: 0 10px 7px 0;
  }
  
  .chatbox .chat p {
    white-space: pre-wrap;
    padding: 12px 16px;
    border-radius: 10px 10px 0 10px;
    max-width: 75%;
    color: #fff;
    font-size: 0.95rem;
    background: #724ae8;
  }
  
  .chatbox .incoming p {
    border-radius: 10px 10px 10px 0;
  }
  
  .chatbox .chat p.error {
    color: #721c24;
    background: #f8d7da;
  }
  
  .chatbox .incoming p {
    color: #343575;
    background: #C3C4E5;
    font-weight: 700;
  }
  
  .chatbot .chat-input {
    display: flex;
    gap: 5px;
    position: absolute;
    bottom: 0;
    width: 100%;
    background: #fff;
    padding: 3px 20px;
    border-top: 1px solid #ddd;
  }
  
  .chat-input textarea {
    height: 55px;
    width: 100%;
    border: none;
    outline: none;
    resize: none;
    max-height: 180px;
    padding: 15px 15px 15px 0;
    font-size: 0.95rem;
  }
  
  .chat-input span {
    align-self: flex-end;
    color: #724ae8;
    cursor: pointer;
    height: 55px;
    display: flex;
    align-items: center;
    visibility: hidden;
    font-size: 1.35rem;
  }
  
  .chat-input textarea:valid ~ span {
    visibility: visible;
  }
  
  @media (max-width: 575.98px) {
    .chatbot-toggler {
      right: 20px;
      bottom: 150px;
    }
    .chatbot {
      right: 0;
      bottom: 0;
      height: 100%;
      border-radius: 0;
      width: 100%;
    }
    .chatbot .chatbox {
      height: 90%;
      padding: 25px 15px 100px;
    }
    .chatbot .chat-input {
      padding: 5px 15px;
    }
    .chatbot header span {
      display: block;
    }
  
  }

  @media screen and (min-width: 576px) and (max-width: 767.98px){
    .chatbot-toggler {
      right: 20px;
      bottom: 150px;
    }
    .chatbot {
      right: 0;
      bottom: 0;
      height: 100%;
      border-radius: 0;
      width: 100%;
    }
    .chatbot .chatbox {
      height: 90%;
      padding: 25px 15px 100px;
    }
    .chatbot .chat-input {
      padding: 5px 15px;
    }
    .chatbot header span {
      display: block;
    }
  }
  
  
}

</style>



