import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

//引用 bootstrap
import "bootstrap/dist/css/bootstrap.css"
import 'bootstrap'

//引用sass
import '@/assets/sass/style.scss'

//引用axios
import axios from 'axios'
window.axios = axios;

createApp(App).use(router).mount('#app')
