import { toRaw } from "vue";
import axios from "axios";

const state = {
    currentTrack: null,
    isPlaying: false,
    audioPlayer: null,
    volume: 1,
    query: null,
    isLooping: false,
    isFavorite: false
};

const getters = {
    getCurrentTrack: state => {
        return state.currentTrack
    },
    getIsPlaying: state => {
        return state.isPlaying
    },
    getVolume: state => {
        return state.volume
    },
    getQuery: state => {
        return state.query
    },
    getLoop: state => {
        return state.isLooping
    },
    getIsFavorite: state => {
        return state.isFavorite
    }
}

const mutations = {
    setCurrentTrack(state, track) {
        state.currentTrack = track;
    },

    setPlaybackState(state, isPlaying) {
        state.isPlaying = isPlaying;
    },

    setAudioPlayer(state, audioPlayer) {
        state.audioPlayer = audioPlayer;
    },

    setSoundState(state, volume){
        state.volume = volume;
    },
    setQuery(state, query){
        state.query = query;
    },
    setLoopState(state, isLooping){
        state.isLooping = isLooping;
    },
    setIsFavorite(state, isFavorite){
        state.isFavorite = isFavorite;
    }
};

const actions = {

    playTrack({ commit, state }, payload) {
        commit('setQuery', payload.query)
        let query = toRaw(payload.query)
        let i = 0;
        query.forEach(element => {
            element["queryId"] = i;
            i++;
       })
        let track = toRaw(payload.track)
        query.forEach(element => {
            if(element === track){
                if(!state.audioPlayer){
                    commit('setPlaybackState', false);
                    commit('setCurrentTrack', element);
                    commit('setPlaybackState', true);
                    let audioPlayer = new Audio(element.song_url);
                    audioPlayer.volume = state.volume;
                    commit('setAudioPlayer', audioPlayer);
                    audioPlayer.addEventListener('ended', () => {
                        commit('setPlaybackState', false);
                    });
                    audioPlayer.play();
                } else {
                    commit('setPlaybackState', false);
                    commit('setCurrentTrack', element);
                    commit('setPlaybackState', true);
                    let audioPlayer = state.audioPlayer;
                    audioPlayer.pause();
                    audioPlayer = new Audio(element.song_url);
                    audioPlayer.volume = state.volume;
                    commit('setAudioPlayer', audioPlayer);
                    audioPlayer.addEventListener('ended', () => {
                        commit('setPlaybackState', false);
                    });
                    audioPlayer.play();
                }
            }
        });
        this.dispatch('checkIsFavorite')
    },

    checkIsFavorite({commit, state}){
        let favoriteSongs = toRaw(this.state.auth.me.favourites)
        let isFinded = false;
        favoriteSongs.forEach(element => {
            if (JSON.stringify(element.id) === JSON.stringify(toRaw(state.currentTrack.id))){
                isFinded = true
            }
        });
        console.log(isFinded);
        if(isFinded) {
            commit('setIsFavorite', true)
        } else {
            commit('setIsFavorite', false);
        }
    },

    playNext({commit, state}){
        let currentTrack = state.currentTrack;

        let query = state.query;

        let nextTrack = currentTrack.queryId + 1;

        if (nextTrack > query.length - 1){
            nextTrack = 0;
        }

        query.forEach(element => {
            if(element.queryId === nextTrack){
                if(!state.audioPlayer){
                    commit('setPlaybackState', false);
                    commit('setCurrentTrack', element);
                    commit('setPlaybackState', true);
                    let audioPlayer = new Audio(element.song_url);
                    audioPlayer.volume = state.volume;
                    commit('setAudioPlayer', audioPlayer);
                    audioPlayer.addEventListener('ended', () => {
                        commit('setPlaybackState', false);
                    });
                    audioPlayer.play();
                } else {
                    commit('setPlaybackState', false);
                    commit('setCurrentTrack', element);
                    commit('setPlaybackState', true);
                    let audioPlayer = state.audioPlayer;
                    audioPlayer.pause();
                    audioPlayer = new Audio(element.song_url);
                    audioPlayer.volume = state.volume;
                    commit('setAudioPlayer', audioPlayer);
                    audioPlayer.addEventListener('ended', () => {
                        commit('setPlaybackState', false);
                    });
                    audioPlayer.play();
                }
            }
        });
        this.dispatch('checkIsFavorite')
    },

    playPrev({commit, state}){
        let currentTrack = state.currentTrack;

        let audioPlayer = state.audioPlayer

        let query = state.query;

        let prevTrack = currentTrack.queryId - 1;

        if (prevTrack < 0){
            prevTrack = query.length - 1;
            console.log(prevTrack);
        }

        if (audioPlayer.currentTime >= 10 ){
            audioPlayer.currentTime = 0;
        } else {
            query.forEach(element => {
                if(element.queryId === prevTrack){
                    if(!state.audioPlayer){
                        commit('setPlaybackState', false);
                        commit('setCurrentTrack', element);
                        commit('setPlaybackState', true);
                        audioPlayer = new Audio(element.song_url);
                        audioPlayer.volume = state.volume;
                        commit('setAudioPlayer', audioPlayer);
                        audioPlayer.addEventListener('ended', () => {
                            commit('setPlaybackState', false);
                        });
                        audioPlayer.play();
                    } else {
                        commit('setPlaybackState', false);
                        commit('setCurrentTrack', element);
                        commit('setPlaybackState', true);
                        audioPlayer = state.audioPlayer;
                        audioPlayer.pause();
                        audioPlayer = new Audio(element.song_url);
                        audioPlayer.volume = state.volume;
                        commit('setAudioPlayer', audioPlayer);
                        audioPlayer.addEventListener('ended', () => {
                            commit('setPlaybackState', false);
                        });
                        audioPlayer.play();
                    }
                }
            });
        }
        this.dispatch('checkIsFavorite')
    },

    togglePlayback({ commit, state }) {
        const audioPlayer = state.audioPlayer;

        if (state.isPlaying) {
            audioPlayer.pause();
        } else {
            audioPlayer.play();
        }

        commit('setPlaybackState', !state.isPlaying);
    },
    muteSongSound({commit, state}) {
        let overallVolume = state.volume;
        const audioPlayer = state.audioPlayer;

        if (overallVolume != 1){
            overallVolume = 1
            audioPlayer.volume = overallVolume;
        } else {
            overallVolume = 0
            audioPlayer.volume = overallVolume;
        }
        commit('setSoundState', overallVolume);
    },

    loopSong({commit, state}){
        const audioPlayer = state.audioPlayer;

        if  (state.isLooping === true){
            audioPlayer.loop = false
        } else {
            audioPlayer.loop = true
        }

        commit('setLoopState', !state.isLooping)
    }
};

export default {
    state,
    mutations,
    actions,
    getters
};
