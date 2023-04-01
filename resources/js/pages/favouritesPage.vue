<template>
    <div class="flex justify-between gap-x-10 w-[90%]">

        <div class="flex flex-col gap-y-5 pt-[7%]">
            <div class="flex justify-between items-center mx-[5%]">
                <h2 class="text-white text-2xl font-bold">Понравившиеся песни</h2>
                <pagination-component />
            </div>
            <div class="grid grid-cols-3 gap-5">
                <card-component v-for="item in 6"/>
            </div>
        </div>

        <div class="flex flex-col gap-y-5 pt-[5%]">
            <div class="flex flex-col gap-y-3 justify-between items-center">
                <h2 class="text-white text-2xl font-bold">Любимые исполнители</h2>
                <pagination-component />
            </div>
            <div class="grid grid-cols-2 gap-y-3">
                <artist-card-component class="self-center" v-for="item in 6" />
            </div>
        </div>

    </div>
</template>

<script>
import PaginationComponent from "@/components/paginationComponent.vue";
import CardComponent from "@/components/cardComponent.vue";
import ArtistCardComponent from "@/components/artistCardComponent.vue";
export default {
    name: "favouritesPage",
    components: {PaginationComponent, CardComponent, ArtistCardComponent}
}
</script>

<style scoped>

</style>
