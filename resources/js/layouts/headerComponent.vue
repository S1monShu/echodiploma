<template>
<div class="flex justify-between w-full self-end">
    <div>
        <img class="box-border" src="../../images/Logo.svg" alt="logo">
    </div>
    <div class="flex items-end gap-x-6">
        <div v-if="this.$route.path === '/profile_user'" class="flex gap-x-4 mb-1">
            <p v-show="this.$store.state.upHere" class="text-white text-lg font-light">Стать исполнителем</p>
            <button @mouseover="this.$store.state.upHere = true"
                    @mouseleave="this.$store.state.upHere = false"
                    @click="this.$store.state.showAddArtistModal = true">
                <img class="w-6" src="../../images/Add.svg" alt="add">
            </button>
        </div>
        <button v-show="this.$store.state.hasToken" @click="this.$store.state.showAuthModal = true">
            <img class="w-[24px] mb-1.5" src="../../images/Logout.svg" alt="logout">
        </button>
        <button @click="this.$store.state.showAuthModal = true" class="icon-login text-2xl text-white"></button>
    </div>
</div>
</template>

<script>

export default {
    name: "headerComponent",
}
</script>

<style scoped>
</style>
