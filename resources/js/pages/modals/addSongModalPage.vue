<template>
    <transition name="modal">
        <div class="modal-mask w-screen h-screen">
            <div class="flex justify-center items-center">
                <form class="modal-container flex flex-col items-center bg-add-song bg-cover bg-center bg-no-repeat w-[60%] h-[70%]">
                    <button class="modal-default-button w-full flex justify-end cursor-auto">
                        <img @click="$emit('close')" class="cursor-pointer box-border mr-[5%] mt-[5%]" src="../../../images/Close.svg" alt="close">
                    </button>
                    <div class="w-full h-[55%] flex gap-x-10">
                        <div class="w-[50%] h-full flex justify-end">
                            <div class="flex flex-col items-center justify-center border-2 w-[53%] h-[75%] gap-y-2 cursor-pointer">
                                <input class="cursor-pointer w-[15%] h-[28%] absolute z-20 opacity-0" type="file" ref="avatar_song" @change="this.$store.commit('handleSong')">
                                <div class="relative">
                                    <img src="../../../images/icon_upload.svg" alt="upload">
                                </div>
                                <p class="text-white break-words w-1/2 text-center font-['Gilroy']">DROP IMAGE FILE</p>
                            </div>
                        </div>
                        <div class="w-1/2 flex flex-col gap-y-12">
                            <div class="flex flex-col w-full">
                                <label for="title" class="text-sm uppercase text-gray-500 ml-3 mb-3">title song</label>
                                <input id="title"
                                       class="h-6 w-[65%] border-l-2 border-b-2 tracking-widest font-light font-['Gilroy'] border-white text-md text-white bg-inherit pl-3 pb-2 outline-0"
                                       type="text"/>
                            </div>
                            <div class="flex flex-col w-full">
                                <label for="email" class="text-lg text-white ml-3 mb-3 font-['Gilroy']">Size uploaded file no more <span class="font-['Gilroy'] text-red-700">12 MB</span></label>
                                <div class="flex items-center justify-center border-2 w-[65%] py-6">
                                    <p class="text-white break-words w-[35%] text-center font-['Gilroy']">DROP FILE</p>
                                    <input class="cursor-pointer w-[15%] h-[12%] absolute z-20 opacity-0" type="file" ref="song_file" @change="this.$store.commit('handleSong')">
                                    <div class="relative">
                                        <img class="w-[60%]" src="../../../images/icon_upload.svg" alt="upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="flex gap-x-2 justify-center items-center">
                        <img class="absolute h-10" src="../../../images/Sign%20up.svg" alt="edit">
                        <p class="text-white font-light font-['Gilroy'] text-md">Send</p>
                    </button>
                </form>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "addSongModalPage"
}
</script>

<style scoped>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: grid;
    transition: opacity 0.3s ease;
}

.modal-container {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
}
</style>
