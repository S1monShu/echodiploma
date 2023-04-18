<template>
    <div class="flex justify-center justify-self-center gap-x-20 w-[90%] pt-[3%]">

        <div class="flex flex-col justify-center gap-y-5">
            <div class="flex">
                <img class="rounded-2xl w-full" src="../../../images/imageSong.svg" alt="image">
            </div>
            <h1 class="text-white capitalize text-4xl">Hello, USER</h1>
            <div>
               <div v-if="!this.$store.state.editUser">
                   <p class="text-gray-500 uppercase text-lg break-words">mail: user@mail.ru</p>
                   <p class="text-gray-500 uppercase text-lg break-words">name: user</p>
               </div>
                <div v-else class="gap-y-4 flex flex-col">
                    <input type="email" value="user@mail.ru" class="text-white text-lg border-2 bg-inherit outline-0 py-1 px-1">
                    <input type="text" value="user" class="text-white text-lg border-2 bg-inherit outline-0 py-1 px-1">
                </div>
            </div>
            <button v-if="!this.$store.state.editUser" @click="this.$store.state.editUser = true" class="flex gap-x-2 justify-center items-center mt-10">
                <img class="absolute" src="../../../images/Border.svg" alt="edit">
                <img src="../../../images/Icon.svg" alt="edit">
                <p class="text-white font-light text-2xl">Edit</p>
            </button>
            <button @click="this.$store.state.editUser = false" v-else class="flex gap-x-2 justify-center items-center mt-10">
                <img class="absolute" src="../../../images/Border.svg" alt="edit">
                <img src="../../../images/Icon.svg" alt="edit">
                <p class="text-white font-light text-2xl">Save</p>
            </button>
        </div>

        <div class="flex flex-col gap-y-5 itc-slider w-[65%] h-[70vh]"
             data-slider="itc-slider"
             data-loop="true"
             data-autoplay="true"
             data-interval="5000">
            <div class="flex flex-col gap-y-3 justify-between items-center">
                <h2 class="text-white text-2xl font-bold">Любимые исполнители</h2>
                <pagination-component />
            </div>
            <div class="itc-slider__wrapper">
                <div class="itc-slider__items">
                    <div class="itc-slider__item flex flex-col" v-for="item in 3">
                        <div class="flex flex-wrap">
                            <artist-card-component class="self-center" v-for="item in 9" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <add-artist-modal-page v-if="this.$store.state.showAddArtistModal" @close="this.$store.state.showAddArtistModal = false" />

    </div>
</template>

<script>
import PaginationComponent from "@/components/paginationComponent.vue";
import artistCardComponent from "@/components/artistCardComponent.vue";
import addArtistModalPage from "@/pages/modals/addArtistModalPage.vue";

export default {
    name: "profileUserPage",
    components: {PaginationComponent, artistCardComponent, addArtistModalPage}
}
</script>

<style scoped>

</style>
