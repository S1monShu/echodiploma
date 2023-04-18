<template>
    <div class="flex justify-center gap-x-20">

        <div class="flex flex-col justify-center gap-y-5 w-[20%]">
            <div class="flex">
                <img class="rounded-2xl w-full" src="../../../images/imageSong.svg" alt="image">
            </div>
            <h1 class="text-white capitalize text-3xl">Hello, ADMIN</h1>
            <div v-if="!this.$store.state.editUser">
                <p class="text-gray-500 uppercase text-lg break-words">mail: admin@mail.ru</p>
                <p class="text-gray-500 uppercase text-lg break-words">name: admin</p>
            </div>
            <div v-else class="gap-y-4 flex flex-col">
                <input type="email" value="admin@mail.ru" class="text-white text-lg border-2 bg-inherit outline-0 py-1 px-1">
                <input type="text" value="admin" class="text-white text-lg border-2 bg-inherit outline-0 py-1 px-1">
            </div>
            <button v-if="!this.$store.state.editUser" @click="this.$store.state.editUser = true" class="flex gap-x-2 justify-center items-center mt-10">
                <img class="absolute" src="../../../images/Border.svg" alt="edit">
                <img src="../../../images/Icon.svg" alt="edit">
                <p class="text-white font-light text-2xl">Edit</p>
            </button>
            <button @click="this.$store.state.editUser = false" v-else class="flex gap-x-2 justify-center items-center mt-10">
                <img class="absolute" src="../../../images/Border.svg" alt="edit">
                <img src="../../../images/Icon.svg" alt="edit">
                <p class="text-white font-light text-2xl">Edit</p>
            </button>
        </div>

        <div class="flex flex-col w-[60%] gap-y-10 overflow-y-auto mt-[3%] pr-4">
            <div class="flex flex-col gap-y-5 itc-slider"
                 data-slider="itc-slider"
                 data-loop="true"
                 data-autoplay="true"
                 data-interval="5000">
                <div class="flex flex-col justify-between items-center gap-y-2">
                    <h2 class="text-white text-3xl font-bold">Заявки на исполнителей</h2>
                    <pagination-component />
                </div>
                <div class="itc-slider__wrapper">
                    <div class="itc-slider__items">
                        <div class="itc-slider__item flex flex-col" v-for="item in 3">
                            <div class="flex justify-start">
                                <artist-card-component v-for="item in 4"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-y-5 itc-slider"
                 data-slider="itc-slider"
                 data-loop="true"
                 data-autoplay="true"
                 data-interval="5000">
                <div class="flex flex-col justify-between items-center gap-y-2">
                    <h2 class="text-white text-3xl font-bold">Новые работы</h2>
                    <pagination-component />
                </div>
                <div class="itc-slider__wrapper">
                    <div class="itc-slider__items">
                        <div class="itc-slider__item flex flex-col" v-for="item in 3">
                            <div class="flex justify-start gap-x-5">
                                <card-component v-for="item in 4" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import PaginationComponent from "@/components/paginationComponent.vue";
import CardComponent from "@/components/cardComponent.vue";
import artistCardComponent from "@/components/artistCardComponent.vue";

export default {
    name: "profileAdminPage",
    components: {PaginationComponent, CardComponent, artistCardComponent}
}
</script>

<style scoped>

</style>
