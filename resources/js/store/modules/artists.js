import axios from 'axios'
// NOTIFICATIONS_CENTER
import NotificationCenter from '../../scripts/notifications'
const NC = new NotificationCenter()

const state = {
    artists: [],
    showArtist: {},
    applicationsArtists: []
};

const getters = {
    getArtists: state => {
        return state.artists
    },
    getArtist: state => {
        return state.showArtist
    },
    getApplicationsArtists: state => {
        return state.applicationsArtists
    }
};

const mutations = {
    setArtists: (state, payload) => {
        state.artists = payload
    },
    setArtist: (state, payload) => {
        state.showArtist = payload
    },
    setApplicationsArtists: (state, payload) => {
        state.applicationsArtists = payload
    }
};

const actions = {
    getArtists: async (context, payload) => {
        let artists  = await axios.get('http://127.0.0.1:8000/api/artists')
        context.commit('setArtists', artists.data.artists)
    },
    getApplicationsArtists: async (context, payload) => {
        let applications = await axios.get('http://127.0.0.1:8000/api/applications/artists', {
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        })
        context.commit('setApplicationsArtists', applications.data.artists)
    },
    showArtist: async (context, payload) => {
        let artist = await axios.get(`http://127.0.0.1:8000/api/artists/${payload}`, {
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        })
        context.commit('setArtist', artist.data.artist)
        console.log(artist.data.artist.playlists);
    },
    setConfirmArtist: async (context, payload) => {
        await axios.post(`http://127.0.0.1:8000/api/artists/${payload}`, {},{
            headers: {
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
        }).catch(error => {
            NC.spawnNote('error', error.response.data.error, 'Что-то пошло не так...', ['Закрыть'])
        })
    },
    createApplicationArtist: async (context) => {
        await axios.post('http://127.0.0.1:8000/api/artist/application', {},{
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
    setRejectArtist: async (context, payload) => {
        await axios.delete(`http://127.0.0.1:8000/api/artists/${payload}`, {
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
};

export default {
    state,
    getters,
    mutations,
    actions,
};
