import axios from 'axios'

const state = {
    genres: [],
};

const getters = {
    getGenres: state => {
        return state.genres
    },
};

const mutations = {
    setGenres: (state, payload) => {
        state.genres = payload
    },
};

const actions = {
    getGenres: async (context, payload) => {
        let genres = await axios.get('http://127.0.0.1:8000/api/genres')
        context.commit('setGenres', genres.data.genres)
    },
    showGenresSongs: async (context, payload) => {
        let genres = await axios.get(`http://127.0.0.1:8000/api/genres/${payload}`)
        console.log(genres.data.genre)
        context.commit('setGenres', genres.data.genre)
    },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
