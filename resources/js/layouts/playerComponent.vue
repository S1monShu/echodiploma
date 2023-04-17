<template>
    <div class="flex justify-between">

        <div class="w-[70%] flex flex-col my-2 gap-y-3">
            <div class="flex justify-end">
                <div class="flex justify-around w-[50%] mr-10 text-white text-2xl">
                    <button class="icon-previous"></button>
                    <button @click="() => { this.activeSong = false }" v-if="this.activeSong" class="icon-pause w-[6.5%]"></button>
                    <button @click="() => { this.activeSong = true }" v-else class="flex justify-center items-center"><img class="w-[80%] mb-[20%] ml-[30%]" src="../../images/Play.svg" alt="play_btn"></button>
                    <button class="icon-next"></button>
                    <button @click.prevent="addFavourite" class="icon-favourite clickLike"></button>
                </div>
                <div class="flex flex-col">
                    <p class="text-center text-white capitalize text-xl break-words">song song song</p>
                    <router-link to="/artists/artist" class="flex justify-center">
                        <p class="text-center text-gray-500 uppercase text-md font-medium break-words">artist artist</p>
                    </router-link>
                </div>
            </div>
            <div class="flex justify-end">
                <input class="styled-slider slider-progress" value="0" type="range">
            </div>
        </div>

        <div class="w-[30%] ml-10">
            <img class="rounded-2xl w-[35%]" src="../../images/imageSong.svg" alt="image">
        </div>

    </div>
</template>

<script>
export default {
    name: "playerComponent",
    data() {
      return {
          isFavourite: false,
          activeSong: false
      }
    },
    methods: {
        // ADD_FAVOURITE
        addFavourite () {
            if (this.isFavourite) {
                document.querySelector('.clickLike').style.color = 'white'
                document.querySelector('.clickLike').style.transition = '.2s ease-in-out'
                this.isFavourite = false
            }
            else {
                document.querySelector('.clickLike').style.color = 'red'
                document.querySelector('.clickLike').style.transition = '.2s ease-in-out'
                this.isFavourite = true
            }
        }
    }
}
</script>
