<template>
    <div class="flex justify-center gap-x-20">

        <div class="flex flex-col justify-center gap-y-5 w-[20%]">
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

        <div class="flex flex-col w-[60%] gap-y-10 overflow-y-auto mt-[3%] pr-4">
            <div class="flex flex-col gap-y-5">
                <div class="flex flex-col justify-between items-center gap-y-2">
                    <h2 class="text-white text-3xl font-bold">Заявки на исполнителей</h2>
                    <pagination-component />
                </div>
                <div class="flex justify-start gap-x-5">
                    <card-component v-for="item in 4" />
                </div>
            </div>
            <div class="flex flex-col gap-y-5">
                <div class="flex flex-col justify-between items-center gap-y-2">
                    <h2 class="text-white text-3xl font-bold">Новые работы</h2>
                    <pagination-component />
                </div>
                <div class="flex justify-start gap-x-5">
                    <card-component v-for="item in 4" />
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import PaginationComponent from "@/components/paginationComponent.vue";
import CardComponent from "@/components/cardComponent.vue";

export default {
    name: "profileAdminPage",
    components: {PaginationComponent, CardComponent}
}
</script>

<style scoped>

</style>