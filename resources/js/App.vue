<template>
    <div class="grid grid-cols-[1fr_2fr_7.5fr_1.5fr] grid-rows-[10vh_75vh_15vh]
     w-screen h-screen bg-main-app overflow-hidden bg-cover bg-center bg-no-repeat">
        <!--  headerComponent  -->
        <header-component class="col-[2_/_4] row-[1_/_2]" />

        <!--  sideBarComponent  -->
        <side-bar-component class="col-[2_/_3] row-[2_/_3]" />

        <!--  mainContent  -->
        <router-view class="col-[3_/_4] row-[2_/_3] h-[65vh]" />

        <!--  playerComponent  -->
        <player-component class="col-[3_/_4] row-[3_/_4]" />
    </div>
</template>

<script>
import SideBarComponent from "@/layouts/sideBarComponent.vue";
import HeaderComponent from "@/layouts/headerComponent.vue";
import PlayerComponent from "@/layouts/playerComponent.vue";

export default {
    name: "App",
    components: {PlayerComponent, HeaderComponent, SideBarComponent},
}
</script>

<style scoped>

</style>
