<script>
import { defineComponent } from "vue";
import { mapActions, mapGetters } from "vuex";

export default defineComponent({
    name: "profileUserPage",
    data(){
        return {
            checked: 'favoritesPage'
        }
    },
    computed: {
      ...mapGetters(['getAuthUser', 'getRecommendedSongs']),
        getImageUrl() {
            const imageBlob = new Blob([this.$store.state.auth.me.image]);
            return URL.createObjectURL(imageBlob);
        }
    },
    mounted() {
        this.$store.dispatch('getUser')
        this.$store.dispatch('getRecommendedSongs')
    },
    methods: {
        ...mapActions(['playTrack', 'setEditAuthUser', 'createApplicationArtist', 'logOutUser']),
        playSelectedTrack(currentTrack, query) { 
            const payload = {
                track: currentTrack,
                query: query
            }
            this.playTrack(payload); 
        },
    }
})
</script>

<template>
    <div class="user_section" >
        <div class="user_head">
            <div class="user_avatar">
                <span>
                    <img :src="getAuthUser.image" alt="">
                </span>
            </div>
            <div class="user_info_container">
                <p class="profile_section_title">Коллекция</p>
                <div class="title_wrapper">
                    <p class="user_name_title title_deco">{{ getAuthUser.name }}</p>
                    <p class="user_name_title">{{ getAuthUser.name }}</p>
                </div>
                <div class="user_activities">
                    <button class="edit_profile">
                        <span @click="this.$store.state.showEditForm = true">
                            <p>Редактировать профиль</p>
                        </span>
                    </button>
                    <button class="leave_btn">
                        <span  @click.prevent="logOutUser">
                            <img src="../../../images/ri_door-open-line.png" alt="">
                        </span>
                    </button>
                </div>
            </div>
            <div class="user_head_deco">
                <img src="../../../images/user_head_deco.png" alt="">
            </div>
        </div>
        <div class="user_profile_contents" >
            <div class="profile_contents_sections">
                <div class="section_option">
                    <input type="radio" id="tracks" value="favoritesPage" v-model="checked">
                    <label class="option_label" for="tracks">
                    <img v-if="this.checked === 'favoritesPage'" src="../../../images/option_background.png" alt="">
                    <img v-else src="../../../images/option_background_l.png" alt="">
                    <p>Понравившееся</p>
                    </label>
                </div>
                <button v-if="getAuthUser.is_candidate != 1" class="become_artist_btn">
                    <span @click="createApplicationArtist()">
                        <p>Стать исполнителем</p>
                    </span>
                </button>
            </div>
            <button v-if="getAuthUser.is_candidate != 1" class="become_artist_btn_mob">
                <span @click="createApplicationArtist()">
                    <p>Стать исполнителем</p>
                </span>
            </button>
            <div v-if="this.checked === 'favoritesPage'" class="user_profile_tracks" >
                <div v-for="song in getAuthUser.favourites" class="user_profile_track_el">
                        <div class="card_component">
                            <div class="song_btn">
                                <button @click="this.playSelectedTrack(song, getAuthUser.favourites)">
                                    <img src="../../../images/Play.svg" alt="image">
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
    </div>
</template>

<style scoped>
    .user_section{
        width: 100%;
        margin-top: 90px;
    }
    .become_artist_btn_mob{
        display: none;
    }
    .user_head{
        padding-top: 70px;
        width: 100%;
        position: relative;
        color: #FFF;
        display: flex;
        gap: 40px;
        padding-bottom: 30px;
    }
    .user_avatar{
        height: 200px;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2px;
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        background-color: #FFF;
    }
    .leave_btn{
        display: none;
    }
    .user_avatar span{
        height: 100%;
        width: 100%;
        padding: 7px;
        background-color: #000;
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    }
    .user_avatar span img{
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .user_info_container{
        margin-top: 21px;
    }
    .profile_section_title{
        color: #fff;
        font-family: 'Cygre';
        font-size: 300;
        font-size: 16px;
    }
    .title_wrapper{
        position: relative;
    }
    .user_name_title{
        position: relative;
        color: #fff;
        font-family: 'Cygre';
        font-weight: 600;
        font-size: 48px;
        white-space: nowrap;
    }
    .title_deco{
        white-space: nowrap;
        top: 6px;
        left: 6px;
        position: absolute;
        color: #141316;
        font-family: 'Cygre';
        font-weight: 600;
        font-size: 48px;
        background: -webkit-linear-gradient(top, #2CA8FC, #A402F6);
        -webkit-background-clip: text;
        -webkit-text-stroke: 2px transparent;
    }
    .edit_profile{
        margin-top: 35px;
        height: 49px;
        width: 221px;
        padding: 1px;
        clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
        background-color: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .edit_profile span{
        clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
        background-color: #2CA8FC;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FFF;
        font-family: 'Cygre';
        font-size: 12px;
        font-weight: 500;
    }
    .user_head_deco{
        bottom: 0;
        position: absolute
    }
    .user_profile_contents{
        display: flex;
    }
    .profile_contents_sections{
        width: 174px;
        border-right: 2px solid #A402F6;
    }
    .section_option{
        position: relative;
        height: 51px;
    }
    .section_option input{
        display: none;
    }
    .section_option label{
        display: flex;
        align-items: center;
        position: absolute;
    }
    .section_option label p{
        margin-left: 20px;
        position: absolute;
        color: #FFF;
        font-family: 'Cygre';
        font-size: 14px;
        font-weight: 500;
    }
    .become_artist_btn{
        margin: 15px 0 0 6px;
        height: 49px;
        width: 161px;
        padding: 1px;
        clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
        background-color: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .become_artist_btn span{
        clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
        background-color: #2CA8FC;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FFF;
        font-family: 'Cygre';
        font-size: 12px;
        font-weight: 500;
    }
    .user_profile_tracks{
        margin: 50px 0 0 50px;
        display: grid;
        grid-template-columns: repeat(5, 200px);
        gap: 30px;
        grid-template-rows: 280px;
        padding-bottom: 200px
    }
    .user_profile_track_el{
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

    @media screen and (max-width: 425px) {
        .user_section{
            width: 100vw;
            margin-top: 66px;
        }
        .user_head{
            padding-top: 45px;
            flex-direction: column;
            align-items: center;
            gap: 19px;
        }
        .profile_section_title{
            display: none;
        }
        .user_info_container{
            margin-top: 0px;
        }
        .user_name_title{
            font-size: 24px;
            text-align: center;
        }
        .title_deco{
            top: 3px;
            left: 3px;
            width: 100%;
            text-align: center;
        }
        .user_activities{
            display: flex;
            margin-top: 20px;
            gap: 20px;
        }
        .edit_profile{
            margin-top: 0;
        }
        .leave_btn{
            display: flex;
        }
        .leave_btn {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 49px;
            width: 49px;
            background-color: #FFF;
            clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        }
        .leave_btn span{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 47px;
            width: 47px;
            background-color: #2CA8FC;
            clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        }
        .profile_contents_sections{
            display: none;
        }
        .user_profile_tracks{
            margin: 20px 0 0 0;
            grid-template-columns: repeat(2, 139px);
            grid-template-rows: 195px;
        }
        .user_profile_track_el{
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
        .user_profile_contents{
            flex-direction: column;
            align-items: center;
        }
        .become_artist_btn_mob{
            display: flex;
        }
        .become_artist_btn_mob{
            margin: 15px 0 0 0;
            height: 49px;
            width: 225px;
            padding: 1px;
            clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
            background-color: #FFF;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .become_artist_btn_mob span{
            clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
            background-color: #2CA8FC;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #FFF;
            font-family: 'Cygre';
            font-size: 12px;
            font-weight: 500;
        }
    }
</style>
