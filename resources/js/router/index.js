import { createRouter } from 'vue-router'
import { createWebHistory } from 'vue-router'

import homePage from "@/pages/homePage.vue";
import favouritesPage from "@/pages/favouritesPage.vue";
import profileUserPage from "@/pages/profiles/profileUserPage.vue";
import profileAdminPage from "@/pages/profiles/profileAdminPage.vue";
import profileArtistPage from "@/pages/profiles/profileArtistPage.vue";
import searchPage from "@/pages/searchPage.vue";
import songsArtistPage from "@/pages/songsArtistPage.vue";

const routes = [
    { path: '/home', component: homePage, alias: '/' },
    { path: '/favourites', component: favouritesPage },
    { path: '/artist', component: songsArtistPage },
    { path: '/search', component: searchPage },
    /**         PROFILES        **/
    { path: '/profile_user', component: profileUserPage },
    { path: '/profile_admin', component: profileAdminPage },
    { path: '/profile_artist', component: profileArtistPage },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
