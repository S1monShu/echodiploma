<script>
import { defineComponent } from "vue";
import '@splidejs/vue-splide/css';
import {mapActions, mapGetters} from "vuex";

export default defineComponent({
    name: "songsArtistPage",
    computed: {
        ...mapGetters(['getArtist'])
    },
    created(){
        this.$store.dispatch('showArtist', this.$route.params.id)
    },
    mounted() {
        this.$store.dispatch('showArtist', this.$route.params.id)
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
})
</script>

<template>
    <div class="user_section" >
        <div class="user_head" >
                <img class="user_image" :src="getArtist.image" alt="">
            <div class="user_info_container">
                <p class="profile_section_title">Исполнитель</p>
                <div class="title_wrapper">
                    <p class="user_name_title title_decor">{{ getArtist.name }}</p>
                    <p class="user_name_title">{{ getArtist.name }}</p>
                </div>
            </div>
            <div class="user_head_deco">
                <img src="../../images/user_head_deco.png" alt="">
            </div>
        </div>
        <div class="section_title">
            <div class="title_wrapper" style="width: 480px;">
                <p class="title_shadow">Попуплярные треки</p>
                <p class="title" >Попуплярные треки</p>
            </div>
            <div class="title_deco"></div>
        </div>
        <div class="popular_container">
            <div class="popular_wrapper">
                <div v-for="song in getArtist.songs.slice(0, 6)">
                    <div class="card_component">
                        <div class="song_btn">
                            <button @click="this.playSelectedTrack(song, getArtist.songs)">
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
            <div class="show-more_btn">
                <router-link :to="`/artists/${getArtist.id}/songs`">
                    <img src="../../images/showmore_btn.png" alt="">
                </router-link>
            </div>
        </div>
        <div class="section_title" v-if="getArtist.playlists.length">
            <div class="title_wrapper" style="width: 480px;">
                <p class="title_shadow">Попуплярные плейлисты</p>
                <p class="title" >Попуплярные плейлисты</p>
            </div>
            <div class="title_deco"></div>
        </div>
        <div class="popular_container" v-if="getArtist.playlists.length">
            <div class="popular_wrapper">
                <div v-for="song in getArtist.playlists.slice(0, 6)">
                    <router-link :to="`/playlist/${song.id}`">
                        <div class="card_component">
                            <div class="song_btn">
                                <button>
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
                    </router-link>
                </div>
            </div>
            <div class="show-more_btn">
                <router-link :to="`/artists/${getArtist.id}/playlists`">
                    <img src="../../images/showmore_btn.png" alt="">
                </router-link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.user_section{
    width: 100%;
    margin-top: 90px;
    padding-bottom: 400px;
}
.user_head{
    width: 73.7%;
    position: relative;
    color: #FFF;
    display: flex;
    gap: 40px;
    height: 312px;
    padding-bottom: 30px;
    z-index: 0;
}
.user_head img{
    width: 100%;
    height: 100%;
    position: absolute;
    object-fit: cover;
}
.user_info_container{
    margin-top: 180px;
    margin-left: 50px;
    width: 100%;
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
}
.title_decor{
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
.section_title{
    margin-top: 45px;
    width: 73.7%;
    display: flex;
    align-items: center;
    gap: 30px;
    position: relative;
}
.title_deco{
    width: 100%;
    height: 8px;
    background-image: url(../../images/TitleDeco.png);
    background-position: center;
}
.title_wrapper .title{
    position: relative;
    color: #fff;
    font-family: 'Cygre';
    font-weight: 600;
    font-size: 32px;
    white-space: nowrap;
}
.title_shadow{
    white-space: nowrap;
    top: 6px;
    left: 6px;
    position: absolute;
    color: #141316;
    font-family: 'Cygre';
    font-weight: 600;
    font-size: 32px;
    background: -webkit-linear-gradient(top, #2CA8FC, #A402F6);
    -webkit-background-clip: text;
    -webkit-text-stroke: 2px transparent;
}
.user_head_deco{
    width: 100%;
    height: 9px;
    bottom: 0;
    position: absolute;
}
.popular_container{
    display: flex;
    padding-top: 30px;
    gap: 30px;
}
.popular_wrapper{
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
    margin-top: 30px;
    cursor: pointer;
}

@media screen and (max-width: 425px) {
    .user_head{
        width: 100%;
        padding-bottom: 0;
        height: 270px;
    }
    .user_name_title{
        font-size: 24px;
    }
    .title_decor{
        top: 3px;
        left: 3px;
    }
    .section_title{
        margin-top: 30px;
        width: 100%;
        gap: 15px;
    }
    .title_wrapper{
        margin-left: 20px;
    }
    .title_wrapper .title_shadow{
        top: 3px;
        left: 3px;
        font-size: 16px;
    }
    .title_wrapper .title{
        font-size: 16px;
    }
    .popular_container{
        margin-left: 20px;
        padding-top: 0;
        gap: 10px;
    }
    .popular_wrapper{
        margin-top: 16px;
        grid-template-columns: repeat(6, 139px);
        gap: 10px;
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
    .show-more_btn{
        margin-top: 25px;
        margin-right: 7px;
    }
    .show-more_btn img{
        height: 100px;
        width: 60px;
    }
}
</style>

