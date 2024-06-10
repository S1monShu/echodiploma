import axios from 'axios'
// NOTIFICATIONS_CENTER
import NotificationCenter from '../../scripts/notifications'
import { error } from 'jquery';
const NC = new NotificationCenter()

const state = {
    playlists: [],
    playlistArtistData: {
        title: '',
        image: null
    },
    playlist: []
};

const getters = {
    getPlaylist: state => {
        return state.playlist
    },
    getPlaylists: state => {
        return state.playlists
    },
};

const mutations = {
    setPlaylist: (state, payload) => {
        state.playlist = payload
    },
    setPlaylists: (state, payload) => {
        state.playlists = payload
    },
};

const actions = {
    getPlaylist: async (context, payload) => {
        let playlist = await axios.get(`http://127.0.0.1:8000/api/playlist/${payload}`)
        context.commit('setPlaylist', playlist.data.playlist)
    },
    getPlaylists: async (context, payload) => {
        let playlists = await axios.get('http://127.0.0.1:8000/api/playlists')
        context.commit('setPlaylists', playlists.data.playlists)
    },
    createPlaylist: async (context, payload) => {
        await axios.post('http://127.0.0.1:8000/api/playlist/new', {
            title: state.playlistArtistData.title,
            image: state.playlistArtistData.image,
        },{
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            state.playlistArtistData.title = ''
            state.playlistArtistData.image = null
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
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
    editPlaylist: async(context, payload) => {
        await axios.post(`http://127.0.0.1:8000/api/playlist/${payload}/edit`, {
            title: state.playlist.title,
            image: state.playlist.image,
        }, {
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            console.log(state.playlist);
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
        }).catch(error => {
            console.log(error);
        })
    },
    deleteSongFromPlaylist: async (context, { id_playlist, id_song }) => {
        console.log(id_playlist, id_song)
        await axios.delete(`http://127.0.0.1:8000/api/playlist/${id_playlist}/${id_song}`, {
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть']);
            this.$store.dispatch('')
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
    addSongToPlaylist: async (context, { id_playlist, id_song }) => {
        await axios.post(`http://127.0.0.1:8000/api/playlist/${id_playlist}/${id_song}`, {
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
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
    deletePlaylist: async (context, payload) => {
        await axios.delete(`http://127.0.0.1:8000/api/playlist/${payload}`, {
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {

            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
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
};

export default {
    state,
    getters,
    mutations,
    actions,
};
