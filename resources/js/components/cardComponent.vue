<template>
    <div class="flex flex-col gap-y-2 justify-center items-center">
        <div class="rounded-2xl w-[90%] cursor-pointer img-responsive">
            <img class="rounded-2xl darkness" src="../../images/imageSong.svg" alt="image">
            <div class="rounded-2xl flex justify-center items-center">
                <button class="rounded-2xl flex justify-center items-center">
                    <img src="../../images/Play.svg" alt="image">
                </button>
            </div>
        </div>
        <div>
            <p class="text-center text-white capitalize text-md break-words">song song song</p>
            <router-link to="/artists/artist">
                <p class="text-center text-gray-500 uppercase text-sm font-medium break-words">artist artist</p>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "songComponent",
}
</script>

<style scoped>
button {
    opacity: 0;
    position: fixed;
    width: 15%;
    height: 75%;
    bottom: 28%;
    color:#fff;
    transition: opacity .3s;
}

.img-responsive:hover button {
    opacity: 1;
    transition: opacity .3s;
}

.img-responsive:hover .darkness {
    filter: brightness(0.2);
    transition: opacity .5s;
}
</style>
