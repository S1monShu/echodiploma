import './bootstrap';
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

store.$router = router;
createApp(App).use(router).use(store).mount("#app")
