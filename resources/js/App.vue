<script>
import { defineComponent } from "vue";
import SideBarComponent from "@/layouts/sideBarComponent.vue";
import HeaderComponent from "@/layouts/headerComponent.vue";
import PlayerComponent from "@/layouts/playerComponent.vue";
import NotificationsBlockComponent from "@/components/notificationsBlockComponent.vue";
import AddSongModalPage from "@/pages/modals/addSongModalPage.vue";
import editProfileModalPage from "@/pages/modals/editProfileModalPage.vue";
import {mapActions, mapGetters} from "vuex";
import EditProfileModalPage from "./pages/modals/editProfileModalPage.vue";
import addPlaylistModal from "./pages/modals/addPlaylistModal.vue";
import addSongToPlaylist from "./pages/modals/addSongToPlaylist.vue";
import editPlaylistModalPage from "./pages/modals/editPlaylistModalPage.vue";

export default defineComponent({
    name: "App",
    components: { AddSongModalPage, editProfileModalPage, PlayerComponent, HeaderComponent, SideBarComponent, NotificationsBlockComponent, addPlaylistModal, addSongToPlaylist, editPlaylistModalPage},
    computed: {
        ...mapGetters(['getCurrentTrack']),
    }
})
</script>

<template>
    <div style="height: 100vh; position: relative; background-color: #000000;" v-if="this.$route.fullPath === '/login'">
        <router-view></router-view>
    </div>
    <div style="height: 100vh; position: relative; background-color: #000000;" v-if="this.$route.fullPath === '/register'">
        <router-view></router-view>
    </div>
    <div class="main" style="height: 100%; width: 100%; position: relative; background-color: #000000;" v-show="this.$route.fullPath !== '/login'" v-if="this.$route.fullPath !== '/register'">

        <img id="deco" src="../images/MainDeco.png" style="position: absolute; margin-left: 20px;" alt="">
       
        <header-component />
        
        <side-bar-component class="side_bar" />

        <router-view class="main_contents" style="position: absolute; height: 100%; overflow:scroll;" />

        <editPlaylistModalPage v-if="this.$store.state.showEditPlaylistModal" @close="this.$store.state.showEditPlaylistModal = false" />
       
        <player-component class="player_container"/>

        <editProfileModalPage  v-if="this.$store.state.showEditForm" @close="this.$store.state.showEditForm = false" />

        <AddSongModalPage v-if="this.$store.state.showAddSongModal" @close="this.$store.state.showAddSongModal = false" />

        <addPlaylistModal v-if="this.$store.state.showAddPlaylistModal" @close="this.$store.state.showAddPlaylistModal = false" />

        <addSongToPlaylist v-if="this.$store.state.showAddSongToPlaylistModal" @close="this.$store.state.showAddSongToPlaylistModal = false" />

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
            <symbol id="success" viewBox="0 0 32 32" >
                <circle r="15" cx="16" cy="16" fill="none" stroke="hsl(93,90%,40%)" stroke-width="2" />
                <polyline points="9,18 13,22 23,12" fill="none" stroke="hsl(93,90%,40%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </symbol>
        </svg>
    </div>
</template>

<style scoped>
@keyframes fade-in {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

.track-image {
    animation-name: fade-in;
    animation-duration: 0.3s;
    animation-timing-function: ease-in-out;
}
.player_container{
    position: fixed;
    z-index: 4;
}
.side_bar{
    position: absolute;
}
.main{
    margin-top: 23px;
}
.main_contents{
    margin-left: 400px;
}

@media screen and (max-width: 425px) {
    .main{
        margin-top: 0px;
    }
    #deco{
        display: none;
    }
    .main_contents{
        margin-left: 0px;
    }
    .side_bar{
        position: fixed;
        bottom: 0px;
    }
}
</style>
