import './bootstrap';
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import '../css/app.css'
import '../css/icon-fonts.css'
import '../css/notifications.css'
import '../css/fonts.css'
import '../css/range-input.css'
import '../css/scrollbar.css'
import '../js/scripts/notifications'

store.$router = router;
createApp(App).use(router).use(store).mount("#app")

