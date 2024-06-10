<script>
import { defineComponent } from "vue";
import {mapActions, mapGetters} from "vuex";

export default defineComponent({
    methods: {
        ...mapActions(['createSong'])
    },
    computed: {
        ...mapGetters(['getGenres']),
        getImageUrl() {
            const imageBlob = new Blob([this.$store.state.songs.songArtistData.image]);
            return URL.createObjectURL(imageBlob);
        },
    },
    mounted() {
        this.$store.dispatch('getGenres')
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
                                <p class="form_title">Создание трека</p>
                                <div @click="$emit('close')" class="back_btn">
                                    <img src="../../../images/ri_arrow-go-back-line.png" alt="">
                                </div>
                            </div>
                            <div class="create_song_form_container">
                                <form @submit.prevent="createSong" class="create_song_form_container">
                                    <div class="create_song_form">
                                        <div class="image_placeholder_continer">
                                            <input type="file" ref="song_image" name="song_image" id="song_image" @change="this.$store.state.songs.songArtistData.image = this.$refs.song_image.files[0]">
                                            <div class="image_placeholder_wrapper">
                                                <span>
                                                    <div v-show="!this.$store.state.songs.songArtistData.image" class="image_placeholder">
                                                        <img src="../../../images/ri_download-line.png" alt="">
                                                    </div>
                                                    <img v-show="this.$store.state.songs.songArtistData.image" :src="getImageUrl" alt="">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="inputs_container">
                                            <div class="input_title_container">
                                                <label for="title" class="input_title">Дайте название треку</label>
                                                <div class="input_container">
                                                    <input id="title" placeholder="Название песни" v-model="this.$store.state.songs.songArtistData.title">
                                                    <div class="input_deco l t" />
                                                    <div class="input_deco l b" />
                                                    <div class="input_deco r t" />
                                                    <div class="input_deco r b" />
                                                </div>
                                            </div>
                                            <div class="input_genres_container">
                                                <label for="genres" class="input_title">Выберите жанр трека</label>
                                                <div class="input_genres">
                                                    <select v-model="this.$store.state.songs.songArtistData.genre_id" class="" multiple name="genres" id="genres">
                                                        <option class="option_genre" v-for="genre in getGenres" :value="genre.id">{{ genre.title }}</option>
                                                    </select>
                                                    <div class="input_deco l t" />
                                                    <div class="input_deco l b" />
                                                    <div class="input_deco r t" />
                                                    <div class="input_deco r b" />
                                                </div>
                                            </div>
                                            <div class="input_song_container">
                                                <label for="song_file" class="input_title">Загрузите аудио</label>
                                                <div class="input_song_wrapper">
                                                    <input id="song_file" type="file" ref="song_file" @change="this.$store.state.songs.songArtistData.song = this.$refs.song_file.files[0]">
                                                    <div class="input_song_zone">
                                                        <span>
                                                            <p>Перетащите файлы сюда</p>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="submit_btn" type="submit">
                                        <span>
                                            <p>Отправить заявку</p>
                                        </span>
                                    </button>
                                </form>
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
    clip-path: polygon(0 0, 94% 0, 100% 10%, 100% 100%, 6% 100%, 0 90%);
}
.modal_wrapper_deco span{
    padding: 10px;
    background-color: #141316;
    clip-path: polygon(0 0, 94% 0, 100% 10%, 100% 100%, 6% 100%, 0 90%);
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
        clip-path: polygon(0 0, 94% 0, 100% 10%, 100% 100%, 6% 100%, 0 90%);
}
.modal_wrapper span{
    position: relative;
        height: fit-content;
        width: 1284px;
        background-color: #141316;
        clip-path: polygon(0 0, 94% 0, 100% 10%, 100% 100%, 6% 100%, 0 90%);
        display: block;
        padding: 50px;
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
.create_song_form{
    display: flex;
    justify-content: space-between;
    gap: 30px;
    width: 100%;
}
.image_placeholder_continer{
    position: relative;
    height: 440px;
    width: 440px;
}
#song_image{
    opacity: 0;
    position: absolute;
    height: 100%;
    width: 100%;
    z-index: 3;
}
.image_placeholder_wrapper{
    padding: 2px;
    height: 100%;
    width: 100%;
    clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    background-color: #FFF;
}
.image_placeholder_wrapper span{
    display: flex;
    justify-content: center;
    align-items: center;
    clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    height: 100%;
    width: 100%;
    padding: 0;
}
.image_placeholder_wrapper span img{
    height: 100%;
    width: 100%;
}
.inputs_container{
    display: flex;
    flex-direction: column;
    gap: 30px;
    width: 60%;
}
.input_title_container{
    display: flex;
    flex-direction: column;
}
.input_container{
    position: relative;
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
.input_container input{
    background-color: #22243B;
    height: 44px;
    width: 100%;
    caret-color: #fff;
    padding-left: 18px;
    color: #FFF;
    font-family: 'Cygre';
    font-size: 14px;
}

.input_container input:focus{
    outline: none;
}

.input_container input:focus ~ .input_deco{
    box-shadow: 0px 0px 15px 1px #2CA8FC;
}

.input_container input::placeholder{
    font-weight: 300;
    color: #bebebe;
}
.input_container input:focus::placeholder{
    color: transparent
}
.input_genres_container{
    display: flex;
    flex-direction: column;
}
.input_genres{
    width: 100%;
    position: relative;
}
.input_title{
    font-family: 'Cygre';
    font-weight: 300;
    color: #FFF;
    padding-bottom: 10px
}
#genres{
    outline: none;
    width: 100%;
    height: 100px;
}
.option_genre{
    color: #FFF;
    font-family: 'Cygre';
    font-weight: 300;
    background-color: #22243B;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px;
    border-bottom: 1px solid #141316;
    font-size: 14px;
}
.input_song_container{
    display: flex;
    flex-direction: column;
}
.input_song_wrapper{
    position: relative;
}
#song_file{
    position: absolute;
    height: 100%;
    width: 100%;
    opacity: 0;
    z-index: 3;
}
.input_song_zone{
    background-color: #FFF;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2px;
    clip-path: polygon(7% 0, 93% 0, 100% 20%, 100% 80%, 93% 100%, 7% 100%, 0 80%, 0 20%);
}
.input_song_zone span{
    font-family: 'Cygre';
    font-weight: 400;
    color: #FFF;
    color: #FFF;
    padding: 50px;
    width: 100%;
    height: 100%;
    clip-path: polygon(7% 0, 93% 0, 100% 20%, 100% 80%, 93% 100%, 7% 100%, 0 80%, 0 20%);
    display: flex;
    justify-content: center;
}
.submit_btn{
    margin-top: 40px;
    width: 100%;
    background-color: #FFF;
    padding: 1px;
    clip-path: polygon(2% 0, 98% 0, 100% 33%, 100% 67%, 98% 100%, 2% 100%, 0 67%, 0 33%);
    filter: drop-shadow(0px 0px 15px 1px #FFF);
}
.submit_btn span{
    font-family: 'Cygre';
    font-weight: 400;
    color: #FFF;
    width: 100%;
    background-color: #2CA8FC;
    padding: 20px;
    clip-path: polygon(2% 0, 98% 0, 100% 33%, 100% 67%, 98% 100%, 2% 100%, 0 67%, 0 33%);
}
</style>