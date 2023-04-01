<template>
    <div class="flex flex-col justify-around gap-y-10 overflow-y-auto mt-[5vh] pt-[25%]">

        <div class="flex flex-col gap-y-5 itc-slider"
             data-slider="itc-slider"
             data-loop="true"
             data-autoplay="true"
             data-interval="5000">
            <div class="flex justify-between items-center ml-[5%] mr-[15%]">
                <h2 class="text-white text-3xl font-bold">Рекомендации для вас</h2>
                <pagination-component />
            </div>
            <div class="itc-slider__wrapper">
                <div class="itc-slider__items">
                    <div class="itc-slider__item flex justify-start gap-x-10" v-for="paginateItem in 3">
                        <card-component v-for="item in 5"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-y-5 itc-slider"
             data-slider="itc-slider"
             data-loop="true"
             data-autoplay="true"
             data-interval="5000">
            <div class="flex justify-between items-center ml-[5%] mr-[15%]">
                <h2 class="text-white text-3xl font-bold">Популярные жанры</h2>
                <pagination-component />
            </div>
            <div class="itc-slider__wrapper">
                <div class="itc-slider__items">
                    <div class="itc-slider__item flex justify-start gap-x-10" v-for="paginateItem in 3">
                        <genre-card-component v-for="item in 5"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-y-5 itc-slider"
             data-slider="itc-slider"
             data-loop="true"
             data-autoplay="true"
             data-interval="5000">
            <div class="flex justify-between items-center ml-[5%] mr-[15%]">
                <h2 class="text-white text-3xl font-bold">О них знают</h2>
                <pagination-component />
            </div>
            <div class="itc-slider__wrapper">
                <div class="itc-slider__items">
                    <div class="itc-slider__item flex justify-start" v-for="paginateItem in 3">
                        <artist-card-component v-for="item in 6"/>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import PaginationComponent from "@/components/paginationComponent.vue";
import CardComponent from "@/components/cardComponent.vue";
import GenreCardComponent from "@/components/genreCardComponent.vue";
import ArtistCardComponent from "@/components/artistCardComponent.vue";

export default {
    name: "homePage",
    components: { CardComponent, PaginationComponent, GenreCardComponent, ArtistCardComponent },
}

</script>

<style scoped>

</style>
