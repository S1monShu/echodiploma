import { createStore } from "vuex"
import songs from "@/store/modules/songs"
import genres from "@/store/modules/genres"
import artists from "@/store/modules/artists"
import auth from "@/store/modules/auth"
import player from "@/store/modules/player";
import playlists from "@/store/modules/playlists"

const store = createStore({
    state: {
        upHere: false,
        showEditForm: false,
        showAddSongToPlaylistModal: false,
        showAddSongModal: false,
        showAddPlaylistModal: false,
        showEditPlaylistModal: false
    },
    modules: { songs, artists, genres, auth, player, playlists }
})

export default store
