<template>
    <div class="flex justify-center gap-x-20 w-[90%] pt-[3%]">

        <div class="flex flex-col justify-center gap-y-5">
            <div class="flex">
                <img class="rounded-2xl w-full" src="../../../images/imageSong.svg" alt="image">
            </div>
            <h1 class="text-white capitalize text-4xl">Hello, USER</h1>
            <div>
                <p class="text-gray-500 uppercase text-lg break-words">mail: user@mail.ru</p>
                <p class="text-gray-500 uppercase text-lg break-words">name: user</p>
            </div>
            <button class="flex gap-x-2 justify-center items-center mt-10">
                <img class="absolute hover:rotate-6" src="../../../images/Border.svg" alt="edit">
                <img src="../../../images/Icon.svg" alt="edit">
                <p class="text-white font-light text-2xl">Edit</p>
            </button>
        </div>

        <div class="flex flex-col gap-y-5">
            <div class="flex flex-col gap-y-3 justify-between items-center">
                <h2 class="text-white text-2xl font-bold">Любимые исполнители</h2>
                <pagination-component />
            </div>
            <div class="grid grid-cols-3 gap-5">
                <card-component class="self-center" v-for="item in 6" />
            </div>
        </div>

    </div>
</template>

<script>
import PaginationComponent from "@/components/paginationComponent.vue";
import CardComponent from "@/components/cardComponent.vue";
export default {
    name: "profileUserPage",
    components: {PaginationComponent, CardComponent}
}
</script>

<style scoped>
img {
    transition: .2s ease-in-out;
}
</style>
