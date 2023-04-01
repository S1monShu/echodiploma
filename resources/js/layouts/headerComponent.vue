<template>
<div class="flex justify-between w-full self-end">
    <div>
        <img class="box-border" src="../../images/Logo.svg" alt="logo">
    </div>
    <div class="flex items-end gap-x-6">
        <div v-if="this.$route.path === '/profile_user'" class="flex gap-x-4 mb-1">
            <p v-show="upHere" class="text-white text-lg font-light">Become An Artist</p>
            <button @mouseover="upHere = true" @mouseleave="upHere = false"><img class="w-6" src="../../images/Add.svg" alt="add"></button>
        </div>
        <button class="icon-login text-2xl text-white"></button>
    </div>
</div>
</template>

<script>
export default {
    name: "headerComponent",
    data() {
        return {
            upHere: false
        }
    }
}
</script>

<style scoped>
</style>
