<script>
import { defineComponent } from "vue";
import { mapActions, mapGetters } from "vuex";

export default defineComponent({
    name: "playlistPage",
    computed: {
      ...mapGetters(['getAuthUser', 'getRecommendedSongs', 'getArtist', 'getPlaylist']),
        getImageUrl() {
            const imageBlob = new Blob([this.$store.state.auth.me.image]);
            return URL.createObjectURL(imageBlob);
        }
    },
    created(){
        this.$store.dispatch('getPlaylist', this.$route.params.id)
    },
    mounted() {
        this.$store.dispatch('getUser'),
        this.$store.dispatch('getRecommendedSongs'),
        this.$store.dispatch('getPlaylist', this.$route.params.id)
    },
    methods: {
        ...mapActions(['playTrack', 'deleteSongFromPlaylist', 'deletePlaylist']),
        playSelectedTrack(currentTrack, query) {
            const payload = {
                track: currentTrack,
                query: query
            }
            this.playTrack(payload);
        },
        deleteSong(payload){
            this.deleteSongFromPlaylist(payload);
            this.$store.dispatch('getPlaylist', this.$route.params.id)
        }
    }
})
</script>

<template>
    <div class="playlist_section" >
        <div class="playlist_head">
            <div class="playlist_avatar">
                <span>
                    <img :src="getPlaylist.image" alt="">
                </span>
            </div>
            <div class="playlist_info_container">
                <p class="playlist_section_title">Альбом</p>
                <div class="title_wrapper">
                    <p class="playlist_title title_deco">{{ getPlaylist.title }}</p>
                    <p class="playlist_title">{{ getPlaylist.title }}</p>
                </div>
                <p class="playlist_section_artist"><b>Создатель: </b>{{ getPlaylist.artists[0].name }}</p>
                <div class="playlist_actions">
                    <button v-show="getPlaylist.artists[0].id === getAuthUser.id" class="edit_playlist">
                        <span @click="this.$store.state.showEditPlaylistModal = true">
                            <p>Редактировать плейлист</p>
                        </span>
                    </button>
                    <button v-show="getPlaylist.artists[0].id === getAuthUser.id || getAuthUser.role_id === 3" class="delete_playlist" @click="$router.go(-1)">
                        <span @click="deletePlaylist(getPlaylist.id)">
                            <img src="../../images/ri_close-fill.png" alt="">
                        </span>
                    </button>
                </div>
            </div>
            <div class="playlist_head_deco">
                <img src="../../images/user_head_deco.png" alt="">
            </div>
        </div>
        <div class="playlist_contents">
            <div v-show="getPlaylist.artists[0].id === getAuthUser.id" class="user_profile_track" @click="this.$store.state.showAddSongToPlaylistModal = true">
                <div class="card_component">
                    <div class="song_img">
                        <span>
                            <div class="add_new_preview">
                                <img src="../../images/ri_add-fill.png" alt="">
                            </div>
                        </span>
                    </div>
                    <div class="song_title">
                        <p>Добавить трек</p>
                    </div>
                </div>
            </div>
            <div class="card_component" v-for="song in getPlaylist.songs">
                <div class="song_btn">
                    <div @click="this.playSelectedTrack(song, getPlaylist.songs)" class="controller_artist_btn">
                        <span>
                            <img src="../../images/mdi_play.png" alt="image">
                        </span>
                    </div>
                    <div v-show="getPlaylist.artists[0].id === getAuthUser.id || getAuthUser.role_id === 3" @click="this.deleteSong({id_playlist: this.$route.params.id, id_song: song.id})" class="controller_artist_btn">
                        <span>
                            <img src="../../images/ri_close-fill.png" alt="image">
                        </span>
                    </div>
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
</template>

<style scoped>
    .playlist_section{
        width: 100%;
        margin-top: 90px;
    }
    .playlist_head{
        padding-top: 70px;
        width: 100%;
        position: relative;
        color: #FFF;
        display: flex;
        gap: 40px;
        padding-bottom: 30px;
    }
    .playlist_avatar{
        height: 200px;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2px;
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        background-color: #FFF;
    }
    .playlist_avatar span{
        height: 100%;
        width: 100%;
        padding: 7px;
        background-color: #000;
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    }
    .playlist_avatar span img{
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .playlist_section_title{
        color: #fff;
        font-family: 'Cygre';
        font-size: 300;
        font-size: 16px;
    }
    .title_wrapper{
        position: relative;
    }
    .playlist_title{
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
        display: inline;
    }
    .playlist_section_artist{
        font-family: 'Cygre';
        color: #FFF;
        font-size: 14px;
        margin-top: 8px;
    }
    .playlist_actions{
        display: flex;
        gap: 15px;
    }
    .delete_playlist{
        margin-top: 35px;
        height: 49px;
        padding: 1px;
        clip-path: polygon(15% 0, 100% 0, 100% 85%, 85% 100%, 0 100%, 0 15%);
        background-color: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .delete_playlist span{
        clip-path: polygon(15% 0, 100% 0, 100% 85%, 85% 100%, 0 100%, 0 15%);
        background-color: #2CA8FC;
        height: 100%;
        padding: 0px 10px 0px 10px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .edit_playlist{
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
    .edit_playlist span{
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
    .playlist_head_deco{
        bottom: 0;
        position: absolute
    }
    .playlist_contents{
        margin: 50px 0 0 0;
        display: grid;
        grid-template-columns: repeat(6, 200px);
        gap: 30px;
        grid-template-rows: 280px;
        padding-bottom: 200px
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
    .add_new_preview img{
        height: 30px;
        width: 30px
    }
    .song_btn{
        z-index: 2;
        position: absolute;
        height: 200px;
        width: 200px;
        opacity: 0;
        gap: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .song_btn:hover{
        opacity: 1;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .controller_artist_btn{
        display: flex;
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
        .playlist_section{
            width: 100vw;
            margin-top: 66px;
        }
        .playlist_head{
            align-items: center;
            padding-top: 45px;
            width: 100%;
            flex-direction: column;
            gap: 20px;
            padding-bottom: 30px;
        }
        .playlist_avatar{
            height: 200px;
            width: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2px;
            clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
            background-color: #FFF;
        }
        .playlist_avatar span{
            height: 100%;
            width: 100%;
            padding: 7px;
            background-color: #000;
            clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        }
        .playlist_avatar span img{
            clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .playlist_section_title{
            display: none;
        }
        .title_wrapper{
            position: relative;
        }
        .playlist_title{
            text-align: center;
            position: relative;
            color: #fff;
            font-family: 'Cygre';
            font-weight: 600;
            font-size: 24px;
            white-space: nowrap;
        }
        .title_deco{
            width: 100%;
            position: absolute;
            top: 3px;
            left: 3px;
            text-align: center;
            color: #141316;
            font-family: 'Cygre';
            font-weight: 600;
            font-size: 24px;
            background: -webkit-linear-gradient(top, #2CA8FC, #A402F6);
            -webkit-background-clip: text;
            -webkit-text-stroke: 2px transparent;
            display: inline;
        }
        .playlist_section_artist{
            margin-top: 14px;
            text-align: center;
        }
        .playlist_actions{
            display: flex;
            gap: 15px;
        }
        .delete_playlist{
            margin-top: 20px;
            height: 49px;
            padding: 1px;
            clip-path: polygon(15% 0, 100% 0, 100% 85%, 85% 100%, 0 100%, 0 15%);
            background-color: #FFF;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .delete_playlist span{
            clip-path: polygon(15% 0, 100% 0, 100% 85%, 85% 100%, 0 100%, 0 15%);
            background-color: #2CA8FC;
            height: 100%;
            padding: 0px 10px 0px 10px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .edit_playlist{
            margin-top: 20px;
            height: 49px;
            width: 221px;
            padding: 1px;
            clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
            background-color: #FFF;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .edit_playlist span{
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
        .playlist_head_deco img{
            height: 5px;
        }
        .playlist_contents{
            margin-left: 30px;
            grid-template-columns: repeat(2, 139px);
            grid-template-rows: 195px;
            margin-top: 20px;
            overflow-x: scroll;
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
        .add_new_preview img{
            height: 30px;
            width: 30px
        }
        .song_btn{
            padding: 10px;
            gap: 20px;
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
        .controller_artist_btn{
            display: flex;
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
    }
</style>
