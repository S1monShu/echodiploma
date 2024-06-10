import { createRouter } from 'vue-router'
import { createWebHistory } from 'vue-router'
import store from '@/store'
import homePage from "@/pages/homePage.vue";
import profileUserPage from "@/pages/profiles/profileUserPage.vue";
import profileAdminPage from "@/pages/profiles/profileAdminPage.vue";
import profileArtistPage from "@/pages/profiles/profileArtistPage.vue";
import songsArtistPage from "@/pages/songsArtistPage.vue";
import notFoundPage from "@/pages/notFoundPage.vue";
import topSongsPage from "@/pages/topSongsPage.vue";
import genresPage from "@/pages/genresPage.vue";
import artistsPage from "@/pages/popularArtists.vue";
import authPage from "@/pages/authPage.vue";
import genresSongsPage from "@/pages/genresSongsPage.vue";
import playlistPage from "@/pages/playlistPage.vue";
import popularPlaylistsPage from "@/pages/popularPlaylists.vue";
import artistPlaylistsPage from "@/pages/artistPlaylistsPage.vue";
import artistSongsPage from "@/pages/artistSongsPage.vue";

const routes = [
    { path: '/home', component: homePage, alias: '/' },
    { path: '/artists/:id', component: songsArtistPage },
    { path: '/topsongs', component: topSongsPage },
    { path: '/genres', component: genresPage },
    { path: '/artists', component: artistsPage },
    { path: '/login', component: authPage },
    { path: '/register', component: authPage },
    { path: '/genres/:id', component: genresSongsPage },
    { path: '/playlists', component: popularPlaylistsPage },
    { path: '/playlist/:id', component: playlistPage},
    { path: '/artists/:id/songs', component: artistSongsPage},
    { path: '/artists/:id/playlists', component: artistPlaylistsPage},
    /**         PROFILES        **/
    { path: '/profile_user', component: profileUserPage, meta: { requiresAuth: true } },
    { path: '/profile_admin', component: profileAdminPage, meta: { requiresAuth: true } },
    { path: '/profile_artist', component: profileArtistPage, meta: { requiresAuth: true } },
    /**         404PAGE        **/
    { path: '/:pathMatch(.*)*', component: notFoundPage }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

// GUARDING ROUTES
router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        store.dispatch('checkAuth', to).then((isAuthenticated) => {
            if (isAuthenticated) {
                next();
            } else {}
        });
    } else {
        next();
    }
});

export default router
