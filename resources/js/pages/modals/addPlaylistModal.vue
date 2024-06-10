<script>
import { defineComponent } from "vue";
import {mapActions, mapGetters} from "vuex";

export default defineComponent({
    data(){
        return {
            previewImage: false,
        }
    },
    computed: {
        ...mapGetters(['getAuthUser', 'getArtist']),
        getImageUrl() {
            const imageBlob = new Blob([this.$store.state.playlists.playlistArtistData.image]);
            return URL.createObjectURL(imageBlob);
        },
    },
    mounted() {
        this.$store.dispatch('getUser')
    },
    methods: {
        ...mapActions(['createPlaylist']),
        changeImagePreview(payload){
            this.$store.state.playlists.playlistArtistData.image = payload;
            this.previewImage = true;
        },
        closeWindow(){
            this.$store.state.showAddPlaylistModal = false,
            this.$store.dispatch('getUser'),
            this.$store.dispatch('showArtist', this.getAuthUser.id)
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
                                <p class="form_title">Создание плейлиста</p>
                                <div @click="this.closeWindow()" class="back_btn">
                                    <img src="../../../images/ri_arrow-go-back-line.png" alt="">
                                </div>
                            </div>
                            <div class="login_form">
                                <div class="input_container">
                                    <input type="text" v-model="this.$store.state.playlists.playlistArtistData.title">
                                    <div class="input_deco l t" />
                                    <div class="input_deco l b" />
                                    <div class="input_deco r t" />
                                    <div class="input_deco r b" />
                                </div>
                                <div class="input_file_container">
                                    <div class="avatar_preview">
                                        <span>
                                            <input type="file" name="avatar" id="avatar" ref="avatar_user" @change="this.changeImagePreview(this.$refs.avatar_user.files[0])">
                                            <div class="avatar_preview_overlay">
                                                <img src="../../../images/ri_download-line.png" alt="">
                                            </div>
                                            <img v-if="this.previewImage" :src="getImageUrl" alt="">
                                        </span>
                                    </div>
                                </div>
                                <button @click="createPlaylist" class="submit_btn" type="submit">
                                    <span @click="this.closeWindow()">
                                        <p>Создать</p>
                                    </span>
                                </button>
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
    clip-path: polygon(0 0, 90% 0, 100% 10%, 100% 100%, 10% 100%, 0 90%);
}
.modal_wrapper_deco span{
    padding: 10px;
    background-color: #141316;
    clip-path: polygon(0 0, 90% 0, 100% 10%, 100% 100%, 10% 100%, 0 90%);
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
        clip-path: polygon(0 0, 90% 0, 100% 10%, 100% 100%, 10% 100%, 0 90%);
}
.modal_wrapper span{
    position: relative;
        height: fit-content;
        width: 384px;
        background-color: #141316;
        clip-path: polygon(0 0, 90% 0, 100% 10%, 100% 100%, 10% 100%, 0 90%);
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
.login_form{
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
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
    height: 34px;
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
    color: #bebebe;
}
.input_container input:focus::placeholder{
    color: transparent
}
.submit_btn{
    margin-top: 45px;
    height: 49px;
    width: 304px;
    clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
    background-color: #FFF;
    display: flex;
    justify-content: center;
    align-items: center;
}
.submit_btn span{
    clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
    background-color: #2CA8FC;
    height: 47px;
    width: 302px;
    padding: 0px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #FFF;
    font-family: 'Cygre';
    font-size: 14px;
    font-weight: 500;
}
.input_file_container{
    margin-top: 30px;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
}
#avatar{
    opacity: 0;
    position: absolute;
    z-index: 4;
    height: 100%;
    width: 100%;
    cursor: pointer;
}
#avatar:hover ~ .avatar_preview_overlay{
    opacity: 1;
}
.avatar_preview{
    padding: 2px;
    height: 200px;
    width: 200px;
    clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    background-color: #FFF;
}
.avatar_preview span{
    padding: 0px;
    height: 100%;
    width: 100%;
    padding: 7px;
    clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
}
.avatar_preview span img{
    height: 100%;
    width: 100%;
    clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    object-fit: cover;
}
.avatar_preview_overlay{
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    position: absolute;
    z-index: 3;
    padding: 79px;
}
.avatar_preview_overlay img{
    width: 24px;
    height: 24px;
}
</style>
