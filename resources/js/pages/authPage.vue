<script>
import { defineComponent } from "vue";
import { mapActions } from "vuex";

export default defineComponent({
    name: 'authPage',
    data(){
        return {
            passwordField: "password",
            passwordConfirmField: "password",
            image: null,
            previewImage: false,
        }
    },
    computed: {
        getImageUrl() {
            const imageBlob = new Blob([this.$store.state.auth.registerUserData.image]);
            return URL.createObjectURL(imageBlob);
        },
    },
    methods: {
        ...mapActions(['authUser', 'storeUser']),
        changeVisible(){
            this.passwordField = this.passwordField === "password" ? "text" : "password";
        },
        changeImagePreview(payload){
            this.$store.state.auth.registerUserData.image = payload;
            this.previewImage = true;
        },
        changeVisibleConfirm(){
            this.passwordConfirmField = this.passwordConfirmField === "password" ? "text" : "password";
        },
        
    }
})
</script>
<template>
    <div class="auth_container">
        <video playsinline autoplay loop muted>
            <source src="../../videos/neon_rain_deco.mp4">
        </video>
        <div class="auth_deco_l">
            <img src="../../images/auth_deco_l.png" alt="">
        </div>
        <div class="auth_wrapper_deco">
            <svg class="controlsdeco_mob" xmlns="http://www.w3.org/2000/svg" width="278" height="9">
                <rect width="100%" height="100%" fill="141316"/>
                <image xlink:href="data:image/png;base64,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" x="0" y="0" width="278" height="9"/>
              </svg>
            <span>
                <div class="auth_wrapper">
                    <span>
                        <img class="auth_deco_l_mob" src="../../images/auth_deco_l_mob.png" alt="">
                        <img class="auth_deco_r_mob" src="../../images/auth_deco_r_mob.png" alt="">
                        <div class="form_header">
                            <router-link to="/">
                                <div class="logo">
                                    <img src="../../images/Echo.png" alt="">
                                </div>
                            </router-link>
                            <div @click="$router.go(-1)" class="back_btn">
                                <img src="../../images/ri_arrow-go-back-line.png" alt="">
                            </div>
                        </div>
                        <div class="form_type_container">
                            <router-link to="/login">
                                <p :class="{ 'current_type': this.$route.fullPath === '/login' }">Авторизация</p>
                            </router-link>
                            <p style="color: #FFF;">/</p>
                            <router-link to="/register">
                                <p :class="{ 'current_type': this.$route.fullPath === '/register' }">Регистрация</p>
                            </router-link>
                        </div>
                        <form @submit.prevent="authUser" v-if="this.$route.fullPath === '/login'" action="" class="login_form">
                            <div class="input_container">
                                <input type="email" placeholder="Почта" v-model="this.$store.state.auth.authUserData.email" required>
                                <div class="input_deco l t" />
                                <div class="input_deco l b" />
                                <div class="input_deco r t" />
                                <div class="input_deco r b" />
                            </div>
                            <div class="input_container">
                                <input :type="passwordField" placeholder="Пароль" id="password" v-model="this.$store.state.auth.authUserData.password" required>
                                <label @click="changeVisible()" class="show_password_btn" for="password">
                                    <img v-if="this.passwordField === 'password'" src="../../images/ri_eye-line.png" alt="">
                                    <img v-if="this.passwordField === 'text'" src="../../images/ri_eye-close-line.png" alt="">
                                </label>
                                <div class="input_deco l t" />
                                <div class="input_deco l b" />
                                <div class="input_deco r t" />
                                <div class="input_deco r b" />
                            </div>
                            
                            <button class="submit_btn" type="submit">
                                <span>
                                    <p>Войти</p>
                                </span>
                            </button>
                        </form>
                        <form @submit.prevent="storeUser" v-if="this.$route.fullPath === '/register'" action="" class="login_form">
                            <div class="input_container">
                                <input type="text" placeholder="Логин" v-model="this.$store.state.auth.registerUserData.name" required>
                                <div class="input_deco l t" />
                                <div class="input_deco l b" />
                                <div class="input_deco r t" />
                                <div class="input_deco r b" />
                            </div>
                            <div class="input_container">
                                <input type="email" placeholder="Почта" v-model="this.$store.state.auth.registerUserData.email" required>
                                <div class="input_deco l t" />
                                <div class="input_deco l b" />
                                <div class="input_deco r t" />
                                <div class="input_deco r b" />
                            </div>
                            <div class="input_container">
                                <input :type="passwordField" placeholder="Пароль" id="password" v-model="this.$store.state.auth.registerUserData.password" required>
                                <label @click="changeVisible()" class="show_password_btn" for="password">
                                    <img v-if="this.passwordField === 'password'" src="../../images/ri_eye-line.png" alt="">
                                    <img v-if="this.passwordField === 'text'" src="../../images/ri_eye-close-line.png" alt="">
                                </label>
                                <div class="input_deco l t" />
                                <div class="input_deco l b" />
                                <div class="input_deco r t" />
                                <div class="input_deco r b" />
                            </div>
                            <div class="input_container">
                                <input :type="passwordConfirmField" placeholder="Повторите пароль" id="passwordConfirm" v-model="this.$store.state.auth.registerUserData.password_confirmation" required>
                                <label @click="changeVisibleConfirm()" class="show_password_btn" for="passwordConfirm">
                                    <img v-if="this.passwordConfirmField === 'password'" src="../../images/ri_eye-line.png" alt="">
                                    <img v-if="this.passwordConfirmField === 'text'" src="../../images/ri_eye-close-line.png" alt="">
                                </label>
                                <div class="input_deco l t" />
                                <div class="input_deco l b" />
                                <div class="input_deco r t" />
                                <div class="input_deco r b" />
                            </div>
                            <div class="input_file_container">
                                <input type="file" name="avatar" id="avatar" ref="avatar" @change="this.$store.state.auth.registerUserData.image = this.$refs.avatar.files[0]">
                            </div>
                            <div class="input_file_container">
                                <div class="avatar_preview">
                                    <span>
                                        <input type="file" name="avatar" id="avatar" ref="avatar_user" @change="this.changeImagePreview(this.$refs.avatar_user.files[0])">
                                        <div class="avatar_preview_overlay">
                                            <img src="../../images/ri_download-line.png" alt="">
                                        </div>
                                        <p v-if="!this.previewImage">Загрузите фото</p>
                                        <img v-if="this.previewImage" :src="getImageUrl" alt="">
                                    </span>
                                </div>
                            </div>
                            <button class="submit_btn" type="submit">
                                <span>
                                    <p>Зарегистрироваться</p>
                                </span>
                            </button>
                        </form>
                        <svg class="controlsdeco" xmlns="http://www.w3.org/2000/svg" width="278" height="9">
                            <rect width="100%" height="100%" fill="141316"/>
                            <image xlink:href="data:image/png;base64,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" x="0" y="0" width="278" height="9"/>
                          </svg>
                    </span>
                </div>
            </span>
            <img @click="$router.go(-1)" class="go_back_btn_mob" src="../../images/go_back_btn_mob.png" alt="">
        </div>
        <div class="auth_deco_r">
            <img src="../../images/auth_deco_r.png" alt="">
        </div>
    </div>
</template>
<style scoped>
    .auth_container{
        height: 100%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .go_back_btn_mob{
        display: none;
    }
    .controlsdeco_mob{
        display: none
    }
    .auth_deco_l_mob{
        display: none;
    }
    .auth_deco_r_mob{
        display: none;
    }
    video{
        position: absolute;
    }
    .auth_deco_l{
        background-color: #000000;
        padding: 20px;
        position: absolute;
        left: 0;
    }
    .auth_deco_r{
        background-color: #000000;
        padding: 20px;
        position: absolute;
        right: 0;
    }
    .auth_wrapper_deco{
        padding: 1px;
        background-color: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
        clip-path: polygon(0 0, 90% 0, 100% 10%, 100% 100%, 10% 100%, 0 90%);
    }
    .auth_wrapper_deco span{
        padding: 10px;
        background-color: #141316;
        clip-path: polygon(0 0, 90% 0, 100% 10%, 100% 100%, 10% 100%, 0 90%);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .auth_wrapper{
        height: fit-content;
        background-color: #A402F6;
        display: flex;
        padding: 1px;
        justify-content: center;
        align-items: center;
        clip-path: polygon(0 0, 90% 0, 100% 10%, 100% 100%, 10% 100%, 0 90%);
    }
    .auth_wrapper span{
        position: relative;
        height: fit-content;
        width: 384px;
        background-color: #141316;
        clip-path: polygon(0 0, 90% 0, 100% 10%, 100% 100%, 10% 100%, 0 90%);
        display: block;
        padding: 40px;
        padding-bottom: 85px;
    }
    .form_header{
        display: flex;
        justify-content: space-between;
    }
    .form_type_container{
        margin-top: 40px;
        margin-bottom: 45px;
        display: flex;
        gap: 4px;
    }
    .login_form{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .current_type{
        color: #FFF;
        font-weight: 400;
    }
    .form_type_container{
        font-family: 'Cygre';
        font-size: 16px;
        color: #2CA8FC;
        font-weight: 300;
    }
    .input_container{
        position: relative;
    }
    .input_deco{
        box-shadow: 0px 0px 5px 1px #A402F6;
        background-color: #FFF;
        width: 2px;
        height: 12px;
        position: absolute;
    }
    .l{
        left: 0;
    }
    .r{
        right: 0;
    }
    .t{
        top: 0;
    }
    .b{
        bottom: 0;
    }
    .input_container input{
        background-color: #22243B;
        height: 34px;
        width: 100%;
        caret-color: #fff;
        padding-left: 18px;
        color: #FFF;
        font-family: 'Cygre';
        font-size: 14px;
    }

    .input_container input:focus{
        outline: none;
    }

    .input_container input:focus ~ .input_deco{
        box-shadow: 0px 0px 15px 1px #2CA8FC;
    }

    .input_container input::placeholder{
        color: #bebebe;
    }
    .input_container input:focus::placeholder{
        color: transparent
    }
    .show_password_btn{
        position: absolute;
        height: 16px;
        width: 16px;
        top: 9px;
        right: 9px;
        cursor: pointer;
    }
    .submit_btn{
        margin-top: 45px;
        height: 49px;
        width: 304px;
        clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
        background-color: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .submit_btn span{
        clip-path: polygon(3% 0, 100% 0, 100% 85%, 97% 100%, 0 100%, 0 15%);
        background-color: #2CA8FC;
        height: 47px;
        width: 302px;
        padding: 0px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FFF;
        font-family: 'Cygre';
        font-size: 14px;
        font-weight: 500;
    }
    .controlsdeco{
        position: absolute;
        bottom: 0;
        left: 14.7%;
    }
    .input_file_container{
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    #avatar{
        opacity: 0;
        position: absolute;
        z-index: 4;
        height: 100%;
        width: 100%;
        cursor: pointer;
    }
    #avatar:hover ~ .avatar_preview_overlay{
        opacity: 1;
    }
    .avatar_preview{
        padding: 2px;
        height: 200px;
        width: 200px;
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        background-color: #FFF;
    }
    .avatar_preview span{
        padding: 0px;
        height: 100%;
        width: 100%;
        padding: 7px;
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
    }
    .avatar_preview span img{
        height: 100%;
        width: 100%;
        clip-path: polygon(20% 0, 80% 0, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0 80%, 0 20%);
        object-fit: cover;
    }
    .avatar_preview_overlay{
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        position: absolute;
        z-index: 3;
        padding: 79px;
    }
    .avatar_preview_overlay img{
        width: 24px;
        height: 24px;
    }
    .avatar_preview p{
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #FFF;
        font-family: "Cygre";
        height: 100%;
    }
    @media screen and (max-width: 425px) {
        video{
            display: none;
        }
        .auth_deco_r{
            display: none;
        }
        .auth_deco_l_mob{
            display: block;
            position: absolute;
            left: 4px;
            top: 40%;
        }
        .auth_deco_r_mob{
            display: block;
            position: absolute;
            right: 4px;
            top: 40%;
        }
        .auth_deco_l{
            display: none;
        }
        .auth_wrapper span {
            clip-path: none;
        }
        .auth_wrapper{
            clip-path: none;
            background-color: #141316;
            height: 100vh;
            width: 100vw;
        }
        .auth_wrapper_deco span{
            clip-path: none;
        }
        .auth_wrapper_deco{
            clip-path: none;
            background-color: #141316;
        }
        .controlsdeco{
            display: none;
        }
        .controlsdeco_mob{
            display: inline-block;
            position: absolute;
            top: 0;
        }
        .back_btn{
            display: none;
        }
        .go_back_btn_mob{
            display: block;
            position: absolute;
            bottom: 0;
        }
        .avatar_preview{
            height: 120px;
            width: 120px
        }
        .input_file_container{
            align-items: flex-start;
        }
        .avatar_preview p{
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #FFF;
            font-family: "Cygre";
            height: 100%;
        }
        .submit_btn{
            margin-top: 25px;
        }
    }
</style>