<template>
    <div class="flex justify-between gap-x-10 w-[90%]">

        <div class="flex flex-col gap-y-5 pt-[4.5%] itc-slider w-[65%]"
             data-slider="itc-slider"
             data-loop="true"
             data-autoplay="true"
             data-interval="5000">
            <div class="flex justify-between items-center mx-[5%]">
                <h2 class="text-white text-2xl font-bold">Понравившиеся песни</h2>
                <pagination-component />
            </div>
            <div class="itc-slider__wrapper">
                <div class="itc-slider__items">
                    <div class="itc-slider__item flex flex-col" v-for="item in 3">
                        <div class="flex flex-wrap gap-5">
                            <card-component v-for="item in 6"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-y-5 pt-[2.5%] itc-slider w-[40%]"
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
                    <div class="itc-slider__item flex flex-col" v-for="item in 2">
                        <div class="flex flex-wrap gap-y-3">
                            <artist-card-component class="self-center" v-for="item in 6" />
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
import ArtistCardComponent from "@/components/artistCardComponent.vue";
export default {
    name: "favouritesPage",
    components: {PaginationComponent, CardComponent, ArtistCardComponent}
}
</script>

<style scoped>

</style>
