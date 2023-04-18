<template>
    <div class="flex flex-col justify-between ml-5 self-center h-[65%]">
        <ul class="text-white text-xl flex flex-col gap-y-2">
            <li class="text-gray-500 font-medium">Music</li>
            <li @click="this.notAuthorized"><router-link to="/favourites"><span class="text-gray-400 text-2xl icon-favourite mr-2"></span> Liked</router-link></li>
            <li><router-link to="/search"><span class="text-gray-400 text-2xl icon-search mr-2"></span> Search</router-link></li>
            <li><router-link to="/home"><span class="text-gray-400 text-2xl icon-community mr-2"></span> Community</router-link></li>
        </ul>

        <ul class="text-white text-xl flex flex-col gap-y-2">
            <li class="text-gray-500 font-medium">Settings</li>
            <li><button><span class="text-gray-400 text-2xl icon-language mr-2"></span> Language</button></li>
            <li><button><span class="text-gray-400 text-2xl icon-faqs mr-2"></span> About</button></li>
            <li><button><span class="text-gray-400 text-2xl icon-theme mr-2"></span> Theme</button></li>
        </ul>
    </div>
</template>

<script>
import NotificationCenter from '@/scripts/notifications.js';
const NC = new NotificationCenter;

export default {
    name: "sideBarComponent",
    methods: {
        notAuthorized() {
            if (!localStorage.getItem('token')) {
                NC.spawnNote("error", "Доступ запрещен!", "Вы не авторизованы!", ["Close"])
                this.$router.push('/')
            }
            else return true;
        }
    },
}
</script>

<style scoped>

</style>
