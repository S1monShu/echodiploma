<script>
import {defineComponent} from "vue";
import {mapGetters, mapActions} from "vuex";

export default defineComponent({
    name: "PlayerComponent",
    data(){
        return{
            isLiked: this.$store.state.player.isFavorite,
        }
    },
    computed: {
        ...mapGetters(['getSongs', 'getCurrentTrack', 'getIsPlaying', 'getVolume', 'getAuthUser', 'getLoop', 'getIsFavorite']),
    },
    created(){
        this.$store.dispatch('getUser')
    },
    mounted() {
        this.$store.dispatch('getSongs'),
        this.$store.dispatch('getCurrentTrack')
    },
    methods: {
        confirmSong(payload) { this.$store.dispatch('confirmSong', payload); this.$store.dispatch('playNext')},
        rejectSong(payload) { this.$store.dispatch('rejectSong', payload) },
        addFavouriteSong(payload) { this.$store.dispatch('addFavouriteSong', payload); this.$store.dispatch('checkIsFavorite'); this.$store.dispatch('getUser');},
        ...mapActions(['togglePlayback', 'muteSongSound' ,'getUser', 'playNext', 'playPrev', 'loopSong']),
    },
})
</script>

<template>
    <div v-if="getCurrentTrack" class="echoPlayer">
        <div class="songInfo">
            <div class="songTitle">
                <p>{{ getCurrentTrack ? getCurrentTrack.title : '' }}</p>
            </div>
            <div class="songArtist">
                <router-link :to="getCurrentTrack ? `/artists/${getCurrentTrack.artists[0].id}` : '/'">
                    <p>{{ getCurrentTrack ? getCurrentTrack.artists[0].name : '' }}</p>
                </router-link>
            </div>
        </div>
        <div class="songControls">
            <svg class="controls_deco" xmlns="http://www.w3.org/2000/svg" width="188" height="5" style="margin-right: 30px;">
                <rect width="100%" height="100%" fill="141316"/>
                <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALsAAAAFCAYAAAAdUJ1vAAAAAXNSR0IArs4c6QAAAJtJREFUSEvtkrENwkAQBHcPAshcgjvgS3AdNAOdENAI7uDpgBKQECKxWCKTgAXB6+VgL3zpblfzQ0xMOqgZVkOKRWz0RCsokUgSmqkdv5vALAgQVwhZYGbgQkS+3XHmLMq5hAlUIPAh+3H56CjsIHUV8h1hAuUICKcQ91us+29H37Jb8nLMfakygR+Sj21oySt/jOPKEfhT8jHwBU6rMdT/DoAqAAAAAElFTkSuQmCC" x="0" y="0" width="187" height="5"/>
              </svg>
              <button class="iconShuffle">
                <img src="../../images/ri_shuffle-fill.png" alt="">
            </button>
            <button class="iconPrevious" @click="playPrev">
                <img src="../../images/Playback.png" alt="">
            </button>
            <button @click="togglePlayback" class="play_btn">
                <img v-if="!getIsPlaying" src="../../images/Playbtn.png" alt="play_btn">
                <span v-else class="iconPause">
                    <img src="../../images/Pausebtn.png" alt="">
                </span>
            </button>
            <button class="iconNext" @click="playNext">
                <img src="../../images/Playnext.png" alt="">
            </button>
            <button class="iconLoop" @click="loopSong">
                <img v-if="!getLoop === true" src="../../images/ri_repeat-fill.png" alt="">
                <img v-if="!getLoop === false" src="../../images/ri_repeat-fill-acrive.png" alt="">
            </button>
            <svg class="controls_deco" xmlns="http://www.w3.org/2000/svg" width="188" height="5" style="margin-left: 30px;">
                <rect width="100%" height="100%" fill="141316"/>
                <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALwAAAAFCAYAAAD/jIYWAAAAAXNSR0IArs4c6QAAAJ9JREFUSEvtlMEJwlAQRGcktxBICenA34E24sFOTCXerCMlfDuwhBwDJrteFCSg5JCFHOYXMDv/7WPZXL2uSuwdltzQEJ5AJDhq6InAhgmQ6N2RCWbu8LDJ7sVQ5Hxm/6s2N/wfVROB1Qn8Ff6G58E4XkA/rj5ZgSIQSYDonFN7Gqvue8yiCy/xIzej7FACM/EXCf8pJPFDV6PwSAJv8V/nCDTgz6ZSXQAAAABJRU5ErkJggg==" x="0" y="0" width="188" height="5"/>
              </svg>
        </div>
        <svg class="controlsdeco" xmlns="http://www.w3.org/2000/svg" width="278" height="9">
            <rect width="100%" height="100%" fill="141316"/>
            <image xlink:href="data:image/png;base64,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" x="0" y="0" width="278" height="9"/>
          </svg>
        <div class="songAdditions">
            <button @click="muteSongSound" id="muteBtn">
                <img v-if="getVolume != 0" src="../../images/ri_headphone-line.png"  alt="">
                <span v-else class="iconUnmute">
                    <img src="../../images/ri_headphone-linemuted.png" alt="">
                </span>
            </button>
            <button v-if="!getCurrentTrack.is_application" @click.prevent="addFavouriteSong(getCurrentTrack.id)" class="icon" id="likeBtn">
                <img v-if="this.$store.state.player.isFavorite" src="../../images/ri_heart-3-fill-active.png" alt="">
                <img v-if="!this.$store.state.player.isFavorite" src="../../images/likebtn.png" alt="">
            </button>
            <button @click.prevent="confirmSong(getCurrentTrack.id)" v-if="this.$route.fullPath === '/profile_admin'" v-show="getCurrentTrack.is_application === 1" class="icon">
                <img src="../../images/ri_check-fill.png" alt="">
            </button>
            <button @click.prevent="rejectSong(getCurrentTrack.id)" v-if="this.$route.fullPath === '/profile_admin'" v-show="getCurrentTrack.is_application === 1" class="icon">
                <img src="../../images/ri_close-fill.png" alt="">
            </button>
        </div>
    </div>
</template>

<style scoped>
    .echoPlayer{
        width: 98%;
        background-color: #141316;
        margin: 0px 20px 20px 20px;
        position: absolute;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 25px;
        height: 89px;
    }
    .songInfo{
        display: flex;
        color: #FFF;
        flex-direction: column;
        gap: 15px;
    }
    .songInfo p{
        padding: 0;
    }
    .songTitle p{
        font-family: 'Cygre';
        font-weight: 500;
        font-size: 16px;
    }
    .songArtist{
        font-family: 'Cygre';
        font-weight: 300;
        font-size: 14px;
    }
    .songControls{
        height: 100%;
        position: absolute;
        left: 33%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
    }
    .songAdditions{
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }
    .controlsdeco{
        left: 43.8%;
        position: absolute;
        bottom: 0;
    }

    @media screen and (max-width: 425px) {
        .echoPlayer{
            width: 96vw;
            height: 63px;
            padding: 14px;
            position: absolute;
            bottom: 47px;
            margin-left: 7px;
        }
        .songInfo{
            gap: 7px;
        }
        .songTitle p{
            font-size: 12px;
        }
        .songArtist{
            font-size: 10px;
        }
        .songControls{
            left: 36%;
        }
        .iconNext img{
            height: 15px;
        }
        .iconPrevious img{
            height: 15px;
        }
        .iconShuffle{
            display: none;
        }
        .iconLoop{
            display: none;
        }
        .play_btn img{
            height: 55px;
        }
        .controls_deco{
            display: none;
        }
        .controlsdeco{
            display: none;
        }
        .songAdditions{
            display: 0;
        }
        #muteBtn{
            display: none;
        }
    }
</style>
