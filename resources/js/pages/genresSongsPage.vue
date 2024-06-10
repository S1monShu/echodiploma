<script>
import {defineComponent} from 'vue'
import {mapActions, mapGetters} from "vuex";

export default defineComponent({
    name: "genresSongsPage",
    computed: {
        ...mapGetters(['getGenres'])
    },
    mounted() {
        this.$store.dispatch('showGenresSongs', this.$route.params.id)
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
    <div class="top-songs_container">
        <div class="section_title">
            <div class="title_wrapper">
                <p class="title_shadow">{{ getGenres.title }}</p>
                <p class="title">{{ getGenres.title }}</p>
            </div>
            <div class="title_deco"></div>
        </div>
        <div class="top-songs_wrapper">
            <div v-for="song in getGenres.songs">
                <div class="card_component">
                    <div class="song_btn">
                        <button @click="this.playSelectedTrack(song, getGenres.songs)">
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
.top-songs_container{
    margin-top: 90px;
    width: 73.5%;
    padding-bottom: 200px
}
.top-songs_wrapper{
    margin-top: 30px;
    display: grid;
    grid-template-columns: repeat(6, 200px);
    gap: 30px;
}
.section_title{
    display: flex;
    align-items: center;
    gap: 30px;
    position: relative;
    width: 100%;
}
.title_deco{
    width: 100%;
    height: 8px;
    background-image: url(../../images/TitleDeco.png);
    background-position: center;
}
.title_wrapper .title{
    white-space: nowrap;
    position: relative;
    color: #fff;
    font-family: 'Cygre';
    font-weight: 600;
    font-size: 48px;
}
.title_shadow{
    width: 100%;
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
@media screen and (max-width: 425px) {
    .top-songs_container{
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
    .top-songs_wrapper{
        grid-template-columns: repeat(2, 139px);
        margin-top: 16px;
        overflow-x: scroll;
    }
    .popular_container{
        gap: 10px;
        align-items: flex-start;
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
}
</style>
