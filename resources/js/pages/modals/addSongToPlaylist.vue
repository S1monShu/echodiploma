<script>
import { defineComponent } from "vue";
import {mapActions, mapGetters} from "vuex";

export default defineComponent({
    data(){
        return {
            previewImage: false,
            searchQuery: ''
        }
    },
    created(){
        this.$store.dispatch('getSongs')
    },
    computed: {
        ...mapGetters(['getAuthUser', 'getSongs']),
        searchedSongs() {
            const searchQuery = this.searchQuery.toLowerCase();
            return this.getSongs.filter(song => song.title.toLowerCase().includes(searchQuery));
        }
    },
    mounted() {
        this.$store.dispatch('getUser')
    },
    methods: {
        ...mapActions(['playTrack', 'addSongToPlaylist']),
        playSelectedTrack(track) { this.playTrack(track); },
        addSong(payload){
            this.addSongToPlaylist(payload)
        },
        closeWindow(){
            this.$store.state.showAddSongToPlaylistModal = false,
            this.$store.dispatch('getPlaylist', this.$route.params.id)
        }
    }
})
</script>

<template>
    <transition name="modal">
       <div class="modal_container">
            <div class="modal_wrapper_deco">
                <span>
                    <div class="modal_wrapper">
                        <span>
                            <div class="form_header">
                                <p class="form_title">Добавление песни в плейлист</p>
                                <div @click="closeWindow()" class="back_btn">
                                    <img src="../../../images/ri_arrow-go-back-line.png" alt="">
                                </div>
                            </div>
                            <div class="searchbar_wrapper">
                                <input type="text" name="" id="searchbar" placeholder="Какую песню добавить?" v-model="this.searchQuery"><img src="../../../images/ri_search-2-line.png" alt="">
                                <div class="input_deco l t" />
                                <div class="input_deco l b" />
                                <div class="input_deco r t" />
                                <div class="input_deco r b" />
                            </div>
                            <div class="song_wrapper">
                                <div class="song_container">
                                    <div class="card_component" v-for="song in searchedSongs">
                                        <div class="song_btn">
                                            <div @click="this.playSelectedTrack(song)" class="controller_artist_btn">
                                                <span>
                                                    <img src="../../../images/mdi_play.png" alt="image">
                                                </span>
                                            </div>
                                            <div @click="this.addSong({id_playlist: this.$route.params.id, id_song: song.id})" class="controller_artist_btn">
                                                <span>
                                                    <img src="../../../images/ri_add-fill.png" alt="image">
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
                        </span>
                    </div>
                </span>
            </div>
       </div>
    </transition>
</template>

<style scoped>
.modal_container{
    position: relative;
    background-color: rgba(0, 0, 0, 0.5);
    height: 100%;
    width: 100%;
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal_wrapper_deco{
    padding: 1px;
    background-color: #FFF;
    display: flex;
    justify-content: center;
    align-items: center;
    clip-path: polygon(0 0, 93% 0, 100% 10%, 100% 100%, 7% 100%, 0 90%);
}
.modal_wrapper_deco span{
    padding: 10px;
    background-color: #141316;
    clip-path: polygon(0 0, 93% 0, 100% 10%, 100% 100%, 7% 100%, 0 90%);
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal_wrapper{
    height: fit-content;
        background-color: #A402F6;
        display: flex;
        padding: 1px;
        justify-content: center;
        align-items: center;
        clip-path: polygon(0 0, 93% 0, 100% 10%, 100% 100%, 7% 100%, 0 90%);

}
.modal_wrapper span{
    position: relative;
        height: 700px;
        width: fit-content;
        background-color: #141316;
        clip-path: polygon(0 0, 93% 0, 100% 10%, 100% 100%, 7% 100%, 0 90%);
        display: block;
        padding: 40px;
        padding-bottom: 85px;
}
.form_header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}
.form_title{
    color: #FFF;
    font-family: 'Cygre';
    font-size: 20px;
    font-weight: 500;
}
.searchbar_wrapper{
    width: 100%;
    margin-bottom: 32px;
}
.input_deco{
    box-shadow: 0px 0px 5px 1px #A402F6;
    background-color: #FFF;
    width: 2px;
    height: 12px;
    position: absolute;
}
.l{
    left: 0;
}
.r{
    right: 0;
}
.t{
    top: 0;
}
.b{
    bottom: 0;
}
#searchbar:focus ~ .input_deco{
    box-shadow: 0px 0px 15px 1px #2CA8FC;
}
#searchbar{
    font-family: 'Cygre';
    font-size: 14px;
    font-weight: 400;
    background-color: #22243B;
    outline: none;
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
    top: 35%;
    right: 1.5%;
    position: absolute;
}
.song_wrapper{
    height: 100%;
    overflow: scroll;
}
.song_container{
    height: fit-content;
    overflow: scroll;
    display: grid;
    grid-template-columns: repeat(5, 200px);
    gap: 30px;
}
.card_component{
    position: relative;
    width: 200px;
    height: 280px;
}
.song_img{
    position: relative;
    width: fit-content;
    z-index: 1;
    display: flex;
    clip-path: polygon(20% 0, 100% 0, 100% 80%, 80% 100%, 0 100%, 0 20%);
    background-color: #fff;
    padding: 1px;
    align-items: center;
    justify-content: center;
}
.song_img span{
    display: flex;
    height: fit-content;
    padding: 10px;
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
</style>
