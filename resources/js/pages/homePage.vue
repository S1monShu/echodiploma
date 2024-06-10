<script>
import {defineComponent} from 'vue'
import { toRaw } from 'vue';
import {mapActions, mapGetters} from "vuex";
import PaginationComponent from "@/components/paginationComponent.vue";
import CardComponent from "@/components/cardComponent.vue";
import GenreCardComponent from "@/components/genreCardComponent.vue";
import ArtistCardComponent from "@/components/artistCardComponent.vue";
// SLIDER

export default defineComponent({
    name: "homePage",
    components: { CardComponent, PaginationComponent, GenreCardComponent, ArtistCardComponent },
    computed: {
        ...mapGetters(['getGenres', 'getSongs', 'getArtists', 'getPlaylists']),
    },
    created(){
        this.$store.dispatch('getPlaylists')
        this.$store.dispatch('getSongs')
    },
    mounted() {
        this.$store.dispatch('getGenres')
        this.$store.dispatch('getSongs')
        this.$store.dispatch('getArtists')
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
    <div class="home_wrapper">
        <div class="section_title">
            <div class="title_wrapper">
                <p class="title_shadow">Топ-чарт</p>
                <p class="title">Топ-чарт</p>
            </div>
        <div class="title_deco"></div>
    </div>
    <div class="popular_container">
        <div class="popular_wrapper">
            <div v-for="song in getSongs.slice(0, 6)">
                <div class="card_component">
                    <div class="song_btn">
                        <button @click="this.playSelectedTrack(song, getSongs)">
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
            <router-link to="/topsongs">
                <img src="../../images/showmore_btn.png" alt="">
            </router-link>
        </div>
    </div>

    <!-- AUTHOR GENRES -->

                <div class="section_title">
                    <div class="title_wrapper">
                        <p class="title_shadow">Попуплярные исполнители</p>
                        <p class="title">Попуплярные исполнители</p>
                    </div>
                    <div class="title_deco"></div>
                </div>
                <div class="popular_container">
                    <div class="popular_wrapper">
                        <div v-for="artist in getArtists.slice(0, 6)"> 
                            <router-link :to="`/artists/${artist.id}`">
                                <div class="card_component">
                                    <div class="artist_img">
                                        <span>
                                            <img :src="artist.image" alt="">
                                        </span>
                                    </div>
                                <div class="genre_title">
                                    <p>{{ artist.name }}</p>
                                </div>
                            </div>
                            </router-link>
                        </div>
                    </div>
                    <div class="show-more_btn">
                        <router-link to="/artists">
                            <img src="../../images/showmore_btn.png" alt="">
                        </router-link>
                    </div>
                </div>

                    <!-- POPULAR PLAYLISTS -->

                    <div class="section_title">
                        <div class="title_wrapper">
                            <p class="title_shadow">Популярные плейлисты</p>
                            <p class="title">Популярные плейлисты</p>
                        </div>
                        <div class="title_deco"></div>
                    </div>
                    <div class="popular_container">
                        <div class="popular_wrapper">
                            <div v-for="playlist in getPlaylists.slice(0, 6)">
                                <div class="card_component"> 
                                    <router-link :to="`/playlist/${playlist.id}`">
                                        <div class="song_btn">
                                            <button>
                                                <img src="../../images/Play.svg" alt="image">
                                            </button>
                                        </div>
                                    </router-link>
                                        <div class="song_img">
                                            <span>
                                                <img :src="playlist.image" alt="">
                                            </span>
                                        </div>
                                    <div class="song_title">
                                        <p>{{ playlist.title }}</p>
                                    </div>
                                    <div class="song_artist">
                                        <router-link :to="`/artists/${playlist.artists[0].id}`">
                                            <p>{{ playlist.artists[0].name }}</p>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="show-more_btn">
                            <router-link to="/playlists">
                                <img src="../../images/showmore_btn.png" alt="">
                            </router-link>
                        </div>
                    </div>

                    <!-- POPUPULAR GENRES -->

                    <div class="section_title">
                        <div class="title_wrapper">
                            <p class="title_shadow">Жанры</p>
                            <p class="title">Жанры</p>
                        </div>
                        <div class="title_deco"></div>
                    </div>
                        <div class="popular_container">
                            <div class="popular_wrapper">
                                <div v-for="genre in getGenres">
                                    <router-link :to="`/genres/${genre.id}`">
                                        <div class="card_component">
                                            <div class="genre_img">
                                                <span>
                                                    <div class="genre_deco">
                                                        <span>
                                                            <img :src="genre.image" alt="">
                                                        </span>
                                                    </div>
                                                </span>
                                            </div>
                                        <div class="genre_title">
                                            <p>{{ genre.title }}</p>
                                        </div>
                                    </div>
                                    </router-link>
                                </div>
                            </div>
                            <div class="show-more_btn">
                                <router-link to="/genres">
                                    <img src="../../images/showmore_btn.png" alt="">
                                </router-link>
                            </div>
                        </div>   
    </div> 
</template>

<style scoped>
    .home_wrapper{
        margin-top: 90px;
        padding-bottom: 200px;
        overflow:scroll;
    }
    .section_title{
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
        font-size: 48px;
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
        font-size: 48px;
        background: -webkit-linear-gradient(top, #2CA8FC, #A402F6);
        -webkit-background-clip: text;
        -webkit-text-stroke: 2px transparent;
    }
    .popular_container{
        display: flex;
        gap: 30px;
    }
    .popular_wrapper{
        margin-top: 30px;
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
    .genre_img{
        position: relative;
        z-index: 1;
        display: flex;
        clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        background-color: #fff;
        height: 200px;
        align-items: center;
        justify-content: center;
    }
    .genre_img span{
        display: flex;
        width: 198px;
        height: 198px;
        clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        background-color: #141316;
        align-items: center;
        justify-content: center;
    }
    .genre_deco{
        width: 186px;
        height: 186px;
        clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        background-color: #A402F6;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .genre_deco span{
        width: 184px;
        height: 184px;
        clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
        background-color: #141316;
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
        margin-top: 60px;
    }
    .genre_title{
        margin-top: 15px;
        color: #fff;
        font-family: 'Cygre';
        font-size: 20px;
        font-weight: 600;
        text-align: center;
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

    @media screen and (max-width: 425px) {
        .home_wrapper{
            padding-left: 30px;
            margin-top: 83px;
            width: 100%;
        }
        .title_wrapper .title{
            font-size: 16px;
        }
        .title_deco{
            background-position: left;
        }
        .title_shadow{
            font-size: 16px;
            top: 3px;
            left: 3px;
        }
        .popular_wrapper{
            grid-template-columns: repeat(6, 112px);
            margin-top: 16px;
            gap: 15px;
            overflow-x: scroll;
        }
        .popular_container{
            gap: 10px;
            align-items: flex-start;
        }
        .card_component{
            height: 170px;
            width: 112px;
        }
        .song_img{
            height: 112px;
        }
        .song_img span{
            height: 110px;
            width: 110px;
        }
        .song_img img{
            height: 104px;
            width: 104px;
        }
        .song_btn button{
            height: 112px;
            width: 112px;
        }
        .song_title{
            margin-top: 10px;
            font-size: 12px;
        }
        .song_artist{
            font-size: 10px;
        }
        .artist_img{
            height: 112px;
        }
        .artist_img span{
            width: 110px;
            height: 110px;
        }
        .artist_img img{
            width: 104px;
            height: 104px;
        }
        .genre_title{
            margin-top: 10px;
            font-size: 16px;
        }
        .genre_img{
            height: 112px;
        }
        .genre_img span{
            width: 110px;
            height: 110px;
        }
        .genre_deco{
            width: 104px;
            height: 104px;
        }
        .genre_deco span{
            width: 104px;
            height: 104px;
        }
        .genre_deco span img{
            height: 50px;
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