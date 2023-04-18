import { createStore } from "vuex"

const store = createStore({
    state() {
        return {
            // EDIT_DATA_USER_ADMIN_FORM_STATES
            editUser: false,
            editAdmin: false,
            // HEADER_STATES
            upHere: false,
            hasToken: localStorage.getItem('token'),
            // SEARCH_INPUT
            searchQuery: '',
            // DATA_USER_FORMS
            authUserData: {
                email: '',
                password: '',
            },
            registerUserData: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
            songArtistData: {
                title: '',
                file: null,
                image: null
            },
            artistUserData: {
                title: '',
                email: '',
                image: null
            },
            // STATES_OF_AXIOS_QUERIES
            me: [],
            users: [],
            songs: [],
            artists: [],
            playlistOfGenres: [],
            // STATES_MODALS
            showAuthModal: false,
            showRegisterModal: false,
            showAddSongModal: false,
            showAddArtistModal: false,
            // PLAYER_STATES
            isFavourite: false,
            activeSong: false,
        }
    },
    mutations: {
        // ADD_FAVOURITE
        addFavourite (state) {
            if (state.isFavourite) {
                document.querySelector('.clickLike').style.color = 'white'
                document.querySelector('.clickLike').style.transition = '.2s ease-in-out'
                state.isFavourite = false
            }
            else {
                document.querySelector('.clickLike').style.color = 'red'
                document.querySelector('.clickLike').style.transition = '.2s ease-in-out'
                state.isFavourite = true
            }
        },
        // HANDLE_AVATAR_ARTIST
        handleArtist(state) {
            let file = this.$refs.avatar.files[0];
            state.artistUserData.image = URL.createObjectURL(file);
        },
        // HANDLE_AVATAR_SONG
        handleSong(state) {
            let avatarFile = this.$refs.avatar_song.files[0];
            let songFile = this.$refs.song_file.files[0];
            state.songArtistData.image = URL.createObjectURL(avatarFile);
            state.songArtistData.file = URL.createObjectURL(songFile);
        },
    }
})

export default store
