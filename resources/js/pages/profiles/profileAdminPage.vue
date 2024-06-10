<script>
import { defineComponent } from "vue";
import PaginationComponent from "@/components/paginationComponent.vue";
import CardComponent from "@/components/cardComponent.vue";
import artistCardComponent from "@/components/artistCardComponent.vue";
// SLIDER
import { Splide, SplideSlide, SplideTrack } from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css';
import {mapActions, mapGetters} from "vuex";

export default defineComponent({
    name: "profileAdminPage",
    data(){
        return {
            checked: 'requestedArtist',
        }
    },
    components: { PaginationComponent, CardComponent, artistCardComponent, Splide, SplideSlide, SplideTrack },
    computed: {
        ...mapGetters(['getAuthUser', 'getApplicationsArtists', 'getApplicationsSongs']),
        getImageUrl() {
            const imageBlob = new Blob([this.$store.state.auth.me.image]);
            return URL.createObjectURL(imageBlob);
        }
    },
    beforeCreate(){
        this.$store.dispatch('getUser')
    },
    mounted() {
        this.$store.dispatch('getUser')
        this.$store.dispatch('getApplicationsArtists')
        this.$store.dispatch('getApplicationsSongs')
    },
    methods: {
        ...mapActions(['setEditAuthUser', 'playTrack', 'logOutUser']),
        setConfirmArtist(payload) { this.$store.dispatch('setConfirmArtist', payload) },
        setRejectArtist(payload) { this.$store.dispatch('setRejectArtist', payload) },
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
                    <input type="radio" id="requestedArtist" value="requestedArtist" v-model="checked">
                    <label class="option_label" for="requestedArtist">
                        <img v-if="this.checked === 'requestedArtist'" src="../../../images/option_background.png" alt="">
                        <img v-else src="../../../images/option_background_l.png" alt="">
                        <p>Заявки музыкантов</p>
                    </label>
                </div>
                <div class="section_option">
                    <input type="radio" id="requestedSongs" value="requestedSongs" v-model="checked">
                    <label class="option_label" for="requestedSongs">
                        <img v-if="this.checked === 'requestedSongs'" src="../../../images/option_background.png" alt="">
                        <img v-else src="../../../images/option_background_l.png" alt="">
                        <p>Заявки песен</p>
                    </label>
                </div>
                <div class="section_option">
                    <input type="radio" id="tracks" value="favoritesPage" v-model="checked">
                    <label class="option_label" for="tracks">
                    <img v-if="this.checked === 'favoritesPage'" src="../../../images/option_background.png" alt="">
                    <img v-else src="../../../images/option_background_l.png" alt="">
                    <p>Понравившееся</p>
                    </label>
                </div>
            </div>
            <div class="profile_contents_sections_mob">
                <div class="section_option">
                    <input type="radio" id="requestedArtist" value="requestedArtist" v-model="checked">
                    <label class="option_label" for="requestedArtist">
                    <img v-if="this.checked === 'requestedArtist'" src="../../../images/user_tracks_deco_mob.png" alt="">
                    <img v-else src="../../../images/user_songs_deco_black_mob.png" alt="">
                    <p>Заявки исполнителей</p>
                    </label>
                </div>
                <div class="section_option">
                    <input type="radio" id="requestedSongs" value="requestedSongs" v-model="checked">
                    <label class="option_label" for="requestedSongs">
                    <img v-if="this.checked === 'requestedSongs'" src="../../../images/user_playlists_deco_mob.png" alt="">
                    <img v-else src="../../../images/user_playlists_deco_black_mob.png" alt="">
                    <p>Заявки песен</p>
                    </label>
                </div>
                <div class="section_option">
                    <input type="radio" id="favoritesPage" value="favoritesPage" v-model="checked">
                    <label class="option_label" for="favoritesPage">
                    <img v-if="this.checked === 'favoritesPage'" src="../../../images/user_artists_deco_mob.png" alt="">
                    <img v-else src="../../../images/user_artists_deco_black_mob(1).png" alt="">
                    <p>Понравившееся</p>
                    </label>
                </div>
            </div>
            <div class="profile_contents_wrapper">
                <div v-if="this.checked === 'requestedArtist'" class="requested_container">
                    <div :key="artist" v-for="artist in getApplicationsArtists" class="card_component">
                        <div class="artist_img">
                            <span>
                                <div class="controller_btns_artist">
                                    <div @click="setConfirmArtist(artist.id)" class="controller_artist_btn">
                                        <span>
                                            <img src="../../../images/ri_check-fill.png" alt="">
                                        </span>
                                    </div>
                                    <div @click="setRejectArtist(artist.id)" class="controller_artist_btn">
                                        <span>
                                            <img src="../../../images/ri_close-fill.png" alt="">
                                        </span>
                                    </div>
                                </div>
                                <img :src="artist.image" alt="">
                            </span>
                        </div>
                        <div class="artist_title">
                            <p>{{ artist.name }}</p>
                        </div>
                    </div>
                </div>
                <div v-if="this.checked === 'requestedSongs'" class="requested_container">
                    <div v-for="song in getApplicationsSongs" class="card_component">
                        <div class="song_btn">
                            <button @click="this.playSelectedTrack(song, getApplicationsSongs)">
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
                <div v-if="this.checked === 'favoritesPage'" class="requested_container">
                    <div v-for="song in getAuthUser.favourites" class="card_component">
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
.profile_contents_sections_mob{
    display: none;
}
.leave_btn{
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
.profile_contents_wrapper{
    margin: 50px 0 0 50px;
}
.requested_container{
    display: grid;
    grid-template-columns: repeat(5, 200px);
    gap: 30px;
    grid-template-rows: 280px;
    padding-bottom: 200px
}
.card_component{
    position: relative;
    width: 200px;
    height: 280px;
}
.artist_img{
    position: relative;
    display: flex;
    clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    background-color: #fff;
    height: 200px;
    align-items: center;
    justify-content: center;
}
.artist_img span{
    display: flex;
    width: 198px;
    height: 198px;
    clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    background-color: #141316;
    align-items: center;
    justify-content: center;
}
.artist_img img{
    width: 186px;
    height: 186px;
    clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    object-fit: cover;
}
.artist_title{
    margin-top: 15px;
    color: #fff;
    font-family: 'Cygre';
    font-size: 20px;
    font-weight: 600;
    text-align: center;
}
.controller_btns_artist:hover{
    opacity: 1;
}
.controller_btns_artist{
    opacity: 0;
    position: absolute;
    height: 100%;
    width: 100%;
    z-index: 3;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
    background-color: rgba(0, 0, 0, 0.5);
}
.controller_artist_btn{
    padding: 1px;
    background-color: #FFF;
    clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
    cursor: pointer;
}
.controller_artist_btn span{
    height: fit-content;
    width: fit-content;
    padding: 10px;
    background-color: #2CA8FC;
    clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
}
.controller_artist_btn span img{
    height: 24px;
    width: 24px;
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
        padding-bottom: 35px;
    }
    .profile_section_title{
        display: none;
    }
    .user_info_container{
        margin-top: 0px;
    }
    .user_name_title{
        white-space: nowrap;
        font-size: 24px;
        text-align: center;
    }
    .title_deco{
        white-space: nowrap;
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
    .profile_contents_wrapper{
        margin: 0;
    }
    .requested_container{
        margin: 20px 0 0 0;
            grid-template-columns: repeat(2, 139px);
            grid-template-rows: 195px;
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
    .user_profile_contents{
        flex-direction: column;
        align-items: center;
    }
    .profile_contents_sections_mob{
        display: flex;
        width: 100vw;
    }
    .section_option{
        width: 34vw;
        height: 5vh;
        border-bottom: 2px solid #A402F6;
    }
    .section_option label p {
        margin-left: 0;
        width: 100%;
        text-align: center;
        font-size: 12px;
    }
    .option_label img{
        height: 100%;
        width: 34vw;
    }
    .add_new_preview img{
        height: 30px;
        width: 30px;
    }
    .user_head_deco_mob{
        display: block;
        bottom: 0;
        position: absolute
    }
    .user_head_deco_mob img{
        width: 100vw;
    }
    .artist_img{
        height: 139px;
    }
    .artist_img span{
        height: 137px;
        width: 137px;
    }
    .artist_img img{
        height: 124px;
        width: 124px;
    }
    .artist_title{
        font-size: 16px;
    }
}
</style>
