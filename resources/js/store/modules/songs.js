import axios from 'axios'
// NOTIFICATIONS_CENTER
import NotificationCenter from '../../scripts/notifications'
const NC = new NotificationCenter()

const state = {
    songs: [],
    applicationsSongs: [],
    recommendedSongs: [],
    rejectSongs: [],
    songArtistData: {
        title: '',
        song: null,
        image: null,
        genre_id: []
    },
    favouriteSongs: [],
};

const getters = {
    getSongs: state => {
        return state.songs
    },
    getApplicationsSongs: state => {
        return state.applicationsSongs
    },
    getRejectSongs: state => {
        return state.rejectSongs
    },
    getRecommendedSongs: state => {
        return state.recommendedSongs
    },
    getFavouriteSongs: state => {
        return state.favouriteSongs
    },
};

const mutations = {
    setSongs: (state, payload) => {
        state.songs = payload
    },
    setApplicationsSongs: (state, payload) => {
        state.applicationsSongs = payload
    },
    setRejectSongs: (state, payload) => {
        state.rejectSongs = payload
    },
    setRecommendedSongs: (state, payload) => {
        state.recommendedSongs = payload
    },
    setfavouriteSongs: (state, payload) => {
        state.favouriteSongs = payload
    },
};

const actions = {
    getSongs: async (context, payload) => {
        let songs = await axios.get('http://89.111.175.236:80/api/songs')
        context.commit('setSongs', songs.data.songs)
    },
    getFavouriteSongs: async (context, payload) => {
        let songs = await axios.get('http://89.111.175.236:80/api/songs/favorites')
        context.commit('setfavouriteSongs', songs.data.songs)
    },
    getApplicationsSongs: async (context, payload) => {
        let applications = await axios.get('http://89.111.175.236:80/api/applications/songs', {
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        })
        context.commit('setApplicationsSongs', applications.data.songs)
    },
    getRejectSongs: async (context, payload) => {
        let reject = await axios.get('http://89.111.175.236:80/api/applications/reject', {
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        })
        context.commit('setRejectSongs', reject.data.songs)
    },
    getRecommendedSongs: async (context, payload) => {
        let recommended = await axios.get('http://127.0.0.1:8000/api/songs/recommended', {
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        })
        context.commit('setRecommendedSongs', recommended.data.recommended_songs)
    },
    confirmSong: async (context, payload) => {
        await axios.post(`http://127.0.0.1:8000/api/songs/${payload}`, {},{
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
        }).catch(error => {
            console.log(error)
        })
    },
    rejectSong: async (context, payload) => {
        await axios.delete(`http://127.0.0.1:8000/api/songs/${payload}`, {
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
        }).catch(error => {
            NC.spawnNote('error', error.response.data.error, 'Что-то пошло не так...', ['Закрыть'])
        })
    },
    createSong: async (context, payload) => {
        await axios.post('http://127.0.0.1:8000/api/songs/new', {
            title: state.songArtistData.title,
            song: state.songArtistData.song,
            image: state.songArtistData.image,
            genre_id: state.songArtistData.genre_id,
        },{
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            state.songArtistData.title = ''
            state.songArtistData.song = null
            state.songArtistData.image = null
            state.songArtistData.genre_id = []
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
            this.$store.state.showAddSongModal = false;
        }).catch(error => {
            if(error.response.status === 401) {
                return NC.spawnNote('error', error.response.data.message, 'Попробуйте снова', ['Закрыть'])
            }
            const validationErrors = error.response.data.errors
            for (const fieldName in validationErrors) {
                if (validationErrors.hasOwnProperty(fieldName)) {
                    const errors = validationErrors[fieldName];
                    NC.spawnNote('error', errors[0], 'Попробуйте снова', ['Закрыть'])
                }
            }
        })
    },
    addFavouriteSong: async (context, payload) => {
        await axios.post(`http://127.0.0.1:8000/api/songs/${payload}/favourite`, {},{
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
        }).catch(error => {
            NC.spawnNote('error', error.response.data.error, 'Что-то пошло не так...', ['Закрыть'])
        })
    },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
