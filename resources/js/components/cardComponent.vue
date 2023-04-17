<template>
    <div class="flex flex-col gap-y-2 justify-center items-center">
        <img class="rounded-2xl w-[90%] cursor-pointer" src="../../images/imageSong.svg" alt="image">
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

</style>
