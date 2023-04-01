<template>
    <div class="flex flex-col gap-y-10 w-full justify-center items-center pt-10">
        <input class="border-l-2 border-b-2 border-white text-white bg-inherit w-[30%] pl-3 pb-3 outline-0" type="text" v-model="this.searchQuery">
        <div class="grid grid-cols-3 w-[60%] h-[90%] gap-10 overflow-y-auto pr-6">
            <span v-for="item in 6" class="w-40 h-40 border-solid border-b-2 border-l-2"></span>
        </div>
    </div>
</template>

<script>
export default {
    name: "searchPage",
    data() {
        return {
            searchQuery: ''
        }
    }
}
</script>

<style scoped>

</style>
