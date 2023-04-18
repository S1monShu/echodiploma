<template>
    <transition name="modal">
        <div class="modal-mask w-screen h-screen">
            <div class="flex justify-center items-center">
                <div class="modal-container flex flex-col items-center bg-background-modal bg-cover bg-center bg-no-repeat w-[30%] h-[90%]">
                    <button class="modal-default-button w-full flex justify-end cursor-auto">
                        <img @click="$emit('close')" class="cursor-pointer box-border mr-[10%] mt-[10%]" src="../../../../images/Close.svg" alt="close">
                    </button>
                    <div class="flex flex-col items-center justify-center gap-y-10">
                        <div class="flex justify-center">
                            <img class="box-border" src="../../../../images/Logo.svg" alt="logo">
                        </div>
                        <form class="flex flex-col w-full gap-y-8 items-center">
                            <div class="flex flex-col w-full">
                                <label for="name" class="text-sm uppercase text-gray-500 ml-3 mb-3">name</label>
                                <input id="name"
                                       v-model="this.$store.state.registerUserData.name"
                                       class="h-6 border-l-2 border-b-2 tracking-widest font-light font-['Gilroy'] border-white text-md text-white bg-inherit pl-3 pb-2 outline-0"
                                       type="text"/>
                            </div>
                            <div class="flex flex-col w-full">
                                <label for="email" class="text-sm uppercase text-gray-500 ml-3 mb-3">email</label>
                                <input id="email"
                                       v-model="this.$store.state.registerUserData.email"
                                       class="h-6 border-l-2 border-b-2 tracking-widest font-light font-['Gilroy'] border-white text-md text-white bg-inherit pl-3 pb-2 outline-0"
                                       type="email"/>
                            </div>
                            <div class="flex flex-col w-full">
                                <label for="password" class="text-sm uppercase text-gray-500 ml-3 mb-3">password</label>
                                <input id="password"
                                       v-model="this.$store.state.registerUserData.password"
                                       class="h-6 border-l-2 border-b-2 tracking-widest font-light font-['Gilroy'] border-white text-md text-white bg-inherit pl-3 pb-2 outline-0"
                                       type="password"/>
                            </div>
                            <div class="flex flex-col w-full">
                                <label for="password_confirmation" class="text-sm uppercase text-gray-500 ml-3 mb-3">password confirm</label>
                                <input id="password_confirmation"
                                       v-model="this.$store.state.registerUserData.password_confirmation"
                                       class="h-6 border-l-2 border-b-2 tracking-widest font-light font-['Gilroy'] border-white text-md text-white bg-inherit pl-3 pb-2 outline-0"
                                       type="password"/>
                            </div>
                            <button type="submit" class="flex gap-x-2 justify-center items-center mt-5">
                                <img class="absolute h-10" src="../../../../images/Sign%20up.svg" alt="edit">
                                <p class="text-white font-light font-['Gilroy'] text-md">Sign up</p>
                            </button>
                            <p class="text-white font-['Gilroy'] mt-5">Have an account, please <a @click="this.$store.state.showAuthModal=true; this.$store.state.showRegisterModal=false;" class="cursor-pointer text-red-700 border-b-[1px] pb-1">sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "registerModalPage"
}
</script>

<style scoped>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.9);
    display: grid;
    transition: opacity 0.3s ease;
}

.modal-container {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
}
</style>
