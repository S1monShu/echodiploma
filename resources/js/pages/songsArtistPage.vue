<template>
    <div class="flex flex-col pt-10 gap-y-6 justify-center items-center">

        <div class="flex w-[90%]">
            <div class="flex w-[25%]">
                <img class="rounded-2xl" src="../../images/imageSong.svg" alt="image">
            </div>
            <div class="flex w-[80%] gap-y-2 flex-col">
                <h1 class="text-white text-4xl">RYAN GRIGDRY</h1>
                <p class="w-[80%] text-gray-500 uppercase text-sm font-medium break-words">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget lorem tempor arcu efficitur convallis. Etiam scelerisque sapien massa, maximus tincidunt libero aliquet sit amet. Donec aliquet ante id sapien facilisis pharetra. Donec aliquet ante id sapien facilisis pharetra. Donec aliquet ante id sapien facilisis pharetra.</p>
            </div>
        </div>

        <div class="flex flex-col gap-y-8">
            <div class="flex flex-col justify-center items-center gap-y-3">
                <h2 class="text-white text-3xl font-bold">Песни Artist Artist</h2>
                <pagination-component />
            </div>
            <div class="flex justify-start gap-x-8">
                <card-component v-for="item in 5" />
            </div>
        </div>

    </div>
</template>

<script>
import PaginationComponent from "@/components/paginationComponent.vue";
import CardComponent from "@/components/cardComponent.vue";
export default {
    name: "songsArtistPage",
    components: {PaginationComponent, CardComponent}
}
</script>

<style scoped>

</style>
