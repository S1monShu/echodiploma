<template>
    <div class="grid grid-cols-[1fr_2fr_7.5fr_1.5fr] grid-rows-[10vh_75vh_15vh]
     w-screen h-screen bg-main-app overflow-hidden bg-cover bg-center bg-no-repeat">
        <!--  headerComponent  -->
        <header-component class="col-[2_/_4] row-[1_/_2]" />

        <!--  sideBarComponent  -->
        <side-bar-component class="col-[2_/_3] row-[2_/_3]" />

        <!--  mainContent  -->
        <router-view class="col-[3_/_4] row-[2_/_3] h-[65vh]" />

        <!--  playerComponent  -->
        <player-component class="col-[3_/_4] row-[3_/_4]" />

        <!--  authModalPage  -->
        <auth-modal-page v-if="this.$store.state.showAuthModal" @close="this.$store.state.showAuthModal = false" />

        <!--  registerModalPage  -->
        <register-modal-page v-if="this.$store.state.showRegisterModal" @close="this.$store.state.showRegisterModal = false" />

        <!--  notifications  -->
        <svg display="none">
            <symbol id="clock" viewBox="0 0 32 32" >
                <circle r="15" cx="16" cy="16" fill="none" stroke="currentColor" stroke-width="2" />
                <polyline points="16,7 16,16 23,16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </symbol>
            <symbol id="error" viewBox="0 0 32 32" >
                <circle r="15" cx="16" cy="16" fill="none" stroke="hsl(13,90%,55%)" stroke-width="2" />
                <line x1="10" y1="10" x2="22" y2="22" stroke="hsl(13,90%,55%)" stroke-width="2" stroke-linecap="round" />
                <line x1="22" y1="10" x2="10" y2="22" stroke="hsl(13,90%,55%)" stroke-width="2" stroke-linecap="round" />
            </symbol>
            <symbol id="message" viewBox="0 0 32 32" >
                <polygon points="1,6 31,6 31,26 1,26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <polyline points="1,6 16,18 31,6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </symbol>
            <symbol id="success" viewBox="0 0 32 32" >
                <circle r="15" cx="16" cy="16" fill="none" stroke="hsl(93,90%,40%)" stroke-width="2" />
                <polyline points="9,18 13,22 23,12" fill="none" stroke="hsl(93,90%,40%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </symbol>
            <symbol id="up" viewBox="0 0 32 32" >
                <circle r="15" cx="16" cy="16" fill="none" stroke="currentColor" stroke-width="2" />
                <polyline points="11,15 16,10 21,15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <line x1="16" y1="10" x2="16" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </symbol>
            <symbol id="warning" viewBox="0 0 32 32" >
                <polygon points="16,1 31,31 1,31" fill="none" stroke="hsl(33,90%,55%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <line x1="16" y1="12" x2="16" y2="20" stroke="hsl(33,90%,55%)" stroke-width="2" stroke-linecap="round" />
                <line x1="16" y1="25" x2="16" y2="25" stroke="hsl(33,90%,55%)" stroke-width="3" stroke-linecap="round" />
            </symbol>
        </svg>
    </div>
</template>

<script>
import SideBarComponent from "@/layouts/sideBarComponent.vue";
import HeaderComponent from "@/layouts/headerComponent.vue";
import PlayerComponent from "@/layouts/playerComponent.vue";
import authModalPage from "@/pages/modals/auth/authModalPage.vue";
import registerModalPage from "@/pages/modals/auth/registerModalPage.vue";

export default {
    name: "App",
    components: {PlayerComponent, HeaderComponent, SideBarComponent, authModalPage, registerModalPage},
}
</script>

<style scoped>

</style>
