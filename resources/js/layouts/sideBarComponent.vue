<script>
import {defineComponent} from 'vue'
import {mapActions, mapGetters} from "vuex";
import { toRaw } from "vue";

export default {
    name: "side-bar-component",
    data(){
        return{
            songQuery: null,
            popularSongsAll: []
        }
    },
    computed: {
        ...mapGetters(['getFavouriteSongs', 'getAuthUser', 'getAuthToken', 'getSongs']),
    },
    mounted() {
        this.$store.dispatch('getSongs')
        this.$store.dispatch('getUser')
        this.$store.dispatch('getFavouriteSongs')
    },
    methods: {
        ...mapActions(['playTrack']),
        playSelectedTrack(currentTrack, query) {
            const payload = {
                track: currentTrack,
                query: query
            }
            this.playTrack(payload);
        },
    }
}
</script>


<template>
    <div class="sidebar_wrapper">
        <img class="logo" src="../../images/Echo.png" alt="" style="margin-bottom: 40px;">
        <ul class="page_options_mob">
            <li v-if="this.$route.path != '/home'"><router-link to="/home"><img src="../../images/ri_home-6-line.png" alt=""></router-link></li>
            <li v-if="this.$route.path === '/home'"><router-link to="/home"><img src="../../images/home_mob_btn.png" alt=""></router-link></li>
            <li v-if="this.$route.path != '/genres'"><router-link to="/genres"><img src="../../images/ri_music-line.png" alt=""></router-link></li>
            <li v-if="this.$route.path === '/genres'"><router-link to="/genres"><img src="../../images/genres_mob_btn.png" alt=""></router-link></li>
            <li v-if="this.$route.path != '/topsongs'"  v-show="!getAuthToken"><router-link v-if="this.$route.path != '/topsongs'" to="/topsongs"><img src="../../images/ri_album-line.png" alt=""></router-link></li>
            <li v-if="this.$route.path === '/topsongs'" v-show="!getAuthToken"><router-link to="/topsongs"><img src="../../images/popular_mob_btn.png" alt=""></router-link></li>
            <li v-show="this.$store.state.auth.me.role_id === 1" v-if="this.$route.path != '/profile_user' && getAuthToken"><router-link to="/profile_user"><img src="../../images/ri_heart-3-line.png" alt=""></router-link></li>
            <li v-show="this.$store.state.auth.me.role_id === 1" v-if="this.$route.path === '/profile_user' && getAuthToken"><router-link to="/profile_user"><img src="../../images/like_mob_btn.png" alt=""></router-link></li>
            <li v-show="this.$store.state.auth.me.role_id === 2" v-if="this.$route.path != '/profile_artist' && getAuthToken"><router-link to="/profile_artist"><img src="../../images/ri_heart-3-line.png" alt=""></router-link></li>
            <li v-show="this.$store.state.auth.me.role_id === 2" v-if="this.$route.path === '/profile_artist' && getAuthToken"><router-link to="/profile_artist"><img src="../../images/like_mob_btn.png" alt=""></router-link></li>
            <li v-show="this.$store.state.auth.me.role_id === 3" v-if="this.$route.path != '/profile_admin' && getAuthToken"><router-link to="/profile_admin"><img src="../../images/ri_heart-3-line.png" alt=""></router-link></li>
            <li v-show="this.$store.state.auth.me.role_id === 2" v-if="this.$route.path === '/profile_admin' && getAuthToken"><router-link to="/profile_admin"><img src="../../images/ri_heart-3-line.png" alt=""></router-link></li>
        </ul>
        <ul class="page_options">
            <li><router-link to="/home"><img src="../../images/ri_home-6-line.png" alt="">Главная</router-link></li>
            <li><router-link to="/genres"><img src="../../images/ri_music-line.png" alt="">Жанры</router-link></li>
            <li v-if="!getAuthToken"><router-link to="/topsongs"><img src="../../images/ri_album-line.png" alt="">Популярное</router-link></li>
            <li v-show="this.$store.state.auth.me.role_id === 1" v-if="getAuthToken"><router-link to="/profile_user"><img src="../../images/ri_heart-3-line.png" alt="">Понравившееся</router-link></li>
            <li v-show="this.$store.state.auth.me.role_id === 2" v-if="getAuthToken"><router-link to="/profile_artist"><img src="../../images/ri_heart-3-line.png" alt="">Понравившееся</router-link></li>
            <li v-show="this.$store.state.auth.me.role_id === 3" v-if="getAuthToken"><router-link to="/profile_admin"><img src="../../images/ri_heart-3-line.png" alt="">Понравившееся</router-link></li>
        </ul>
        <ul v-if="!getAuthToken" class="songlist">
            <li v-for="song in getSongs" class="song_wrapper" @click="this.playSelectedTrack(song, getSongs)">
                <img :src="song.image" alt="" style="height: 45px; width: 45px;">
                <div class="songInfo">
                    <p class="title">{{song.title}}</p>
                    <router-link :to="`/artists/${song.artists[0].id}`">
                        <p class="artist">{{ song.artists[0].name }}</p>
                    </router-link>
                </div>
            </li>
        </ul>
        <ul v-if="getAuthToken" class="songlist">
            <li v-for="song in getAuthUser.favourites" class="song_wrapper" @click="this.playSelectedTrack(song, getAuthUser.favourites)">
                <img :src="song.image" alt="" style="height: 45px; width: 45px;">
                <div class="songInfo">
                    <p class="title">{{song.title}}</p>
                    <router-link :to="`/artists/${song.artists[0].id}`">
                        <p class="artist">{{ song.artists[0].name }}</p>
                    </router-link>
                </div>
            </li>
        </ul>
        <svg class="deco_container" xmlns="http://www.w3.org/2000/svg" width="220" height="38">
            <rect width="100%" height="100%" fill="#141316"/>
            <image xlink:href="data:image/png;base64,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" x="0" y="0" width="220" height="38"/>
          </svg>
    </div>
</template>
<style scoped>
    .sidebar_wrapper{
        position: relative;
        background-color: #141316;
        width: 220px;
        height: 746px;
        margin-left: 120px;
        padding: 20px;
        overflow: hidden;
        border-bottom: 1px solid #2CA8FC;
    }
    .page_options{
        display: flex;
        flex-direction: column;
        gap: 17px;
        margin-bottom: 25px;
    }
    .page_options_mob{
        display: none;
    }
    li a{
        color: #FFF;
        display: flex;
        gap: 15px;
        font-family: 'Cygre';
        font-size: 14px;
        font-weight: 400;
    }
    .title{
        color: #FFF;
        font-family: 'Cygre';
        font-size: 12px;
        font-weight: 500;
    }
    .artist{
        font-size: 10px;
        font-weight: 300;
    }
    .songlist{
        display: flex;
        flex-direction: column;
        gap: 15px;
        height: 470px;
        overflow-y: scroll;
    }
    .songlist::-webkit-scrollbar {
        width: 0;
    }
    .songlist{
        -ms-overflow-style: none;
    }
    .song_wrapper{
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .song_wrapper:hover{
        background-color: #22243B;
        cursor: pointer;
    }
    .deco_container{
        position: absolute;
        bottom: 10px;
        margin-left: -20px;
    }
    @media screen and (max-width: 425px) {
        .sidebar_wrapper{
            margin-left: 0px;
            width: 100vw;
            padding: 0px 30px 0 30px;
            height: 55px;
            border-bottom: none;
            z-index: 4;
            border-top: 2px solid #A402F6;
        }
        .deco_container{
            display: none
        }
        .page_options{
            display: none;
        }
        .logo{
            display: none;
        }
        .page_options_mob{
            height: 100%;
            display: flex;
            margin-top: -4px;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }
        .page_options_mob li{
            width: 74px;
            display: flex;
            justify-content: center;
        }
        .songlist{
            display: none;
        }
    }
</style>
