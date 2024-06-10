<script>
import { defineComponent } from "vue";
import { mapActions, mapGetters } from "vuex";
import { toRaw } from "vue";

export default defineComponent({
    data() {
        return {
            searchQuery: '',
            showSearchMob: false,
            resultQuery: []
        }
    },
    computed: {
        ...mapGetters(['getAuthToken', 'getSongs', 'getAuthUser', 'getPlaylists']),
        searchedSongs() {
            const searchQuery = this.searchQuery.toLowerCase();
            return this.getSongs.filter(song => {
                return song.title.toLowerCase().includes(searchQuery) || song.artists[0].name.toLowerCase().includes(searchQuery)
            });
        }
    },
    mounted() {
        this.$store.dispatch('getUser')
        this.$store.dispatch('getSongs')
    },
    methods: {
        ...mapActions(['logOutUser', 'createApplicationArtist', 'playTrack']),
        changeResultQuery(query){
            this.resultQuery = [];
            query.forEach(element => {
                this.resultQuery.push(toRaw(element))
            });
        },
        playSelectedTrack(currentTrack, query) {
            this.changeResultQuery(query);
            const payload = {
                track: currentTrack,
                query: this.resultQuery
            }
            this.playTrack(payload);
        },
    }
})
</script>

<template>
    <div class="header_container">
        <img src="../../images/header_deco.png" alt="" class="header_deco">

        <div v-if="!getAuthToken" v-show="this.showSearchMob === false" class="login_btn">
            <span>
                <router-link to="/login">
                    <img src="../../images/ri_door-lock-box-line.png" alt="">
                </router-link>
            </span>
        </div>
        <div v-if="getAuthToken" v-show="this.showSearchMob === false" class="avatar_user">
            <span>
                <router-link v-show="this.$store.state.auth.me.role_id === 1 || this.$store.state.auth.me.is_candidate === 1" to="/profile_user">
                    <img :src="getAuthUser.image" alt="">
                </router-link>
                <router-link v-show="this.$store.state.auth.me.role_id === 2 && getAuthUser.is_candidate != 1" to="/profile_artist">
                    <img :src="getAuthUser.image" alt="">
                </router-link>
                <router-link v-show="this.$store.state.auth.me.role_id === 3" to="/profile_admin">
                    <img :src="getAuthUser.image" alt="">
                </router-link>
            </span>
        </div>
        <div v-if="this.showSearchMob === false" class="logo" >
            <router-link to="/home"><img src="../../images/Echo.png" alt=""></router-link>
        </div>
        <div v-if="this.showSearchMob === false" @click="this.showSearchMob = true" class="search_btn">
            <span>
                <img src="../../images/ri_search-2-line.png" alt="">
            </span>
        </div>
        <div v-if="this.showSearchMob === true" @click="this.showSearchMob = false" class="close_search_btn">
            <span>
                <img src="../../images/ri_arrow-drop-left-line.png" alt="">
            </span>
        </div>
        <div v-if="this.showSearchMob === true" class="searchbar_wrapper_mob">
            <input type="text" name="" id="searchbar" placeholder="Что хотите послушать?" v-model="this.searchQuery">
        </div>
        <div class="searchbar_wrapper">
            <input type="text" name="" id="searchbar" placeholder="Что хотите послушать?" v-model="this.searchQuery"><img src="../../images/ri_search-2-line.png" alt="">
            <img src="../../images/searchdeco.png" style="position: absolute; left: 0; margin-top: 45px;" alt="">
        </div>
        <div class="user_container">
            <div class="user_wrapper">
                <router-link to="/login" style="margin: 0 auto;">
                    <p class="login" v-if="!getAuthToken">Войти</p>
                </router-link>
                <router-link v-show="this.$store.state.auth.me.role_id === 1 || this.$store.state.auth.me.is_candidate === 1" v-if="getAuthToken" to="/profile_user">
                    <div class="user_info" v-if="getAuthToken">
                        <p class="user_name">
                            {{ getAuthUser.name }}
                        </p>
                        <div class="user_image">
                            <span>
                                <img :src="getAuthUser.image" alt="">
                            </span>
                        </div>
                    </div>
                </router-link>
                <router-link v-show="this.$store.state.auth.me.role_id === 2 && getAuthUser.is_candidate != 1" v-if="getAuthToken" to="/profile_artist">
                    <div class="user_info" v-if="getAuthToken">
                        <p class="user_name">
                            {{ getAuthUser.name }}
                        </p>
                        <div class="user_image">
                            <span>
                                <img :src="getAuthUser.image" alt="">
                            </span>
                        </div>
                    </div>
                </router-link>
                <router-link v-show="this.$store.state.auth.me.role_id === 3" v-if="getAuthToken" to="/profile_admin">
                    <div class="user_info" v-if="getAuthToken">
                        <p class="user_name">
                            {{ getAuthUser.name }}
                        </p>
                        <div class="user_image">
                            <span>
                                <img :src="getAuthUser.image" alt="">
                            </span>
                        </div>
                    </div>
                </router-link>
            </div>
            <img src="../../images/userDeco.png" alt="">
        </div>
        <div class="logout_wrapper" v-if="getAuthToken">
            <button @click.prevent="logOutUser" class="logout_btn">
                <img src="../../images/ri_door-open-line.png" alt="">
            </button>
            <img src="../../images/userDeco.png" alt="">
        </div>
    </div>
    <div v-if="searchQuery" class="search_wrapper">
        <div class="search_container">
            <div v-for="song in searchedSongs">
                <div class="card_component">
                    <div class="song_btn">
                        <button @click="this.playSelectedTrack(song, searchedSongs)">
                            <img src="../../images/Play.svg" alt="image">
                        </button>
                    </div>
                        <div class="song_img">
                            <span>
                                <img :src="song.image" alt="">
                            </span>
                        </div>
                    <div class="song_title">
                        <p>{{ song.title }}</p>
                    </div>
                    <div class="song_artist">
                        <router-link :to="`/artists/${song.artists[0].id}`">
                            <p>{{ song.artists[0].name }}</p>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .header_container{
        display: flex;
        gap: 35px;
        align-items: center;
        justify-content: space-between;
        position: absolute;
        margin-left: 400px;
        width: 1415px;
    }
    .avatar_user{
        display: none;
    }
    .header_deco{
        display: none;
    }
    .login_btn{
        display: none;
    }
    .logo{
        display: none;
    }
    .search_btn{
        display: none;
    }
    .searchbar_wrapper{
        width: 100%;
    }
    .searchbar_wrapper_mob{
        display: none;
    }
    .close_search_btn{
        display: none;
    }
    #searchbar{
        font-family: 'Cygre';
        font-size: 14px;
        font-weight: 400;
        background-color: #141316;
        outline: none;
        border-bottom: 1px solid #A402F6;
        padding: 14px 0 14px 20px;
        caret-color: #fff;
        color: #fff;
        width: 100%;
    }
    #searchbar::placeholder{
        color: #bebebe;
    }
    #searchbar:focus::placeholder{
        color: transparent;
    }
    .searchbar_wrapper{
        position: relative;
    }
    .searchbar_wrapper img{
        top: 30%;
        right: 1.5%;
        position: absolute;
    }
    .user_container{
        display: flex;
        gap: 4px;
        margin-left: auto;
    }
    .user_wrapper{
        display: flex;
        align-items: center;
        color: #FFF;
        width: 215px;
        height: 60px;
        clip-path: polygon(10% 0, 100% 0, 100% 100%, 0 100%, 0 30%);
        background-color: #141316;
        border-bottom: 1px solid #A402F6;
    }
    .user_wrapper p{
        font-family: 'Cygre';
        font-size: 14px;
        font-weight: 500;
    }
    .user_wrapper a{
        margin-left: auto;
    }
    .user_info{
        margin-right: 20px;
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }
    .user_name{
        font-family: 'Cygre';
        font-size: 14px;
        font-weight: 500;
        color: #FFF;
    }
    .user_image{
        display: flex;
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        background-color: #FFF;
        height: 40px;
        width: 40px;
        justify-content: center;
        align-items: center;
    }
    .user_image span{
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        background-color: #141316;
        height: 38px;
        width: 38px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 3px;
    }
    .user_image span img{
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .search_wrapper{
        overflow: scroll;
        margin-left: 400px;
        z-index: 5;
        margin-top: 90px;
        position: absolute;
        width: fit-content;
        height: fit-content;
        background-color: #141316;
        padding: 32px;
        padding-top: 64px;
        border: 1px solid #FFF;
        height: 657px;
    }
    .search_container{
        height: fit-content;
        display: grid;
        grid-template-columns: repeat(6, 200px);
        gap: 30px;
    }
    .card_component{
        position: relative;
        width: 200px;
        height: 280px;
    }
    .song_img{
        position: relative;
        z-index: 1;
        display: flex;
        clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        background-color: #fff;
        height: 200px;
        align-items: center;
        justify-content: center;
    }
    .song_img span{
        display: flex;
        width: 198px;
        height: 198px;
        clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        background-color: #141316;
        align-items: center;
        justify-content: center;
    }
    .song_img img{
        width: 186px;
        height: 186px;
        clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
    }
    .song_btn{
        z-index: 2;
        position: absolute;
        opacity: 0;
    }
    .song_btn button{
        background-color: #141316;
        opacity: 0.5;
        height: 200px;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .song_btn:hover{
        opacity: 1;
    }
    .song_title{
        margin-top: 15px;
        color: #fff;
        font-family: 'Cygre';
        font-size: 16px;
        font-weight: 500;
    }
    .song_artist{
        position: absolute;
        color: #fff;
        font-family: 'Cygre';
        font-size: 14px;
        font-weight: 300;
        bottom: 0;
    }
    .show-more_btn{
        cursor: pointer;
        margin-top: 30px;
    }
    .logout_wrapper{
        display: flex;
        gap: 4px;
    }
    .logout_btn{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #141316;
        height: 60px;
        width: 60px;
        clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%, 0 15%);
        border-bottom: 1px solid #A402F6;
        margin-left: auto;
    }
    @media screen and (max-width: 425px) {
        .header_container{
            padding: 10px 30px 0 30px;
            margin-left: 0px;
            width: 100vw;
            background-color: #000;
            border-bottom: 2px solid #A402F6;
            height: 66px;
            gap: 0px;
        }
        .header_deco{
            display: inline-block;
            position: absolute;
            top: 0;
            left: 14%;
        }
        .logo{
            display: inline-block;
        }
        .searchbar_wrapper{
            display: none;
        }
        .searchbar_wrapper_mob{
            display: block;
            width: 100vw;
        }
        #searchbar{
            border-bottom: none;
            background-color: transparent;
        }
        .searchbar_wrapper img{
            display: none;
        }
        .search_wrapper{
            overflow-y: scroll;
            height: 86vh;
            margin-left: 0px;
        }
        .search_container{
            grid-template-columns: repeat(2, 139px);
        }
        .card_component{
            height: 195px;
            width: 139px;
        }
        .song_img{
            height: 139px;
        }
        .song_img span{
            height: 137px;
            width: 137px;
        }
        .song_img img{
            height: 124px;
            width: 124px;
        }
        .song_btn button{
            height: 139px;
            width: 139px;
        }
        .song_title{
            margin-top: 10px;
            font-size: 12px;
        }
        .song_artist{
            font-size: 10px;
        }
        .user_container{
            display: none;
        }
        .login_btn{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #FFF;
            height: 31px;
            width: 31px;
            clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        }
        .login_btn span{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #2CA8FC;
            width: 29px;
            height: 29px;
            clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        }
        .search_btn{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #FFF;
            height: 31px;
            width: 31px;
            clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        }
        .search_btn span{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #2CA8FC;
            width: 29px;
            height: 29px;
            clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        }
        .close_search_btn{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #FFF;
            height: 31px;
            width: 31px;
            clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        }
        .close_search_btn span{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #2CA8FC;
            width: 29px;
            height: 29px;
            clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        }
        .user_section{
            display: flex;
            gap: 10px;
        }
        .avatar_user{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 31px;
            background-color: #FFF;
            width: 31px;
            clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        }
        .avatar_user span{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #000;
            height: 29px;
            width: 29px;
            clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        }
        .avatar_user span img{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 26px;
            width: 26px;
            clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        }
        .logout_wrapper{
            display: none;
        }
    }
</style>
