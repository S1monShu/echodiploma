<script>
import {defineComponent} from 'vue'
import {mapActions, mapGetters} from "vuex";

export default defineComponent({
    name: "popularArtists",
    computed: {
        ...mapGetters(['getArtists'])
    },
    mounted() {
        this.$store.dispatch('getArtists')
    },
})
</script>
<template>
    <div class="top-songs_container">
        <div class="section_title">
            <div class="title_wrapper">
                <p class="title_shadow">Популярные исполнители</p>
                <p class="title">Популярные исполнители</p>
            </div>
            <div class="title_deco"></div>
        </div>
        <div class="top-songs_wrapper">
            <div v-for="artist in getArtists">
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
    </div>
</template>
<style scoped>
.top-songs_container{
    margin-top: 90px;
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
    .genre_title{
        margin-top: 15px;
        color: #fff;
        font-family: 'Cygre';
        font-size: 20px;
        font-weight: 600;
        text-align: center;
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
        .genre_title{
            margin-top: 10px;
            font-size: 12px;
        }
    }
</style>