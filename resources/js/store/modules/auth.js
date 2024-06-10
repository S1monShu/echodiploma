import axios from 'axios'
import router from '@/router';
import store from "@/store";
// NOTIFICATIONS_CENTER
import NotificationCenter from '../../scripts/notifications'
const NC = new NotificationCenter()

const state = {
    me: {},
    authUserData: {
        email: '',
        password: '',
    },
    registerUserData: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        image: null,
        description: ''
    },
    nextPageOnRegisterModal: true,
    authToken: localStorage.getItem('auth_token'),
};

const getters = {
    getAuthUser: state => {
        return state.me
    },
    getAuthToken: state => {
        return state.authToken
    }
};

const mutations = {
    setAuthUser: (state, payload) => {
        state.me = payload
    },
    removeAuthUser: (state) => {
        state.me = {}
    },
    setAuthToken: (state, payload) => {
        state.authToken = payload
    },
    removeAuthToken: (state, payload) => {
        state.authToken = payload
    },
};

const actions = {
    authUser: async (context) => {
        await axios.post('http://127.0.0.1:8000/api/signIn', {
            email: state.authUserData.email,
            password: state.authUserData.password
        }).then(response => {
            console.log(response.data.token)
            localStorage.setItem('auth_token', response.data.token)
            store.commit('setAuthToken', response.data.token)
            NC.spawnNote('success', response.data.message, 'Добро пожаловать', ['Закрыть'])
            store.state.showAuthModal = false;
            console.log(response.data)
            if (response.data.role === 2 && response.data.is_candidate != 1) {
                return router.push('/profile_artist')
            }
            if (response.data.role === 3) {
                return router.push('/profile_admin')
            } else {
                router.push('/profile_user')
            }
        }).catch(error => {
            if(error.response.status === 401) {
                return NC.spawnNote('error', error.response.data.message, 'Попробуйте снова', ['Закрыть'])
            }
            const validationErrors = error.response.data.errors
            for (const fieldName in validationErrors) {
                if (validationErrors.hasOwnProperty(fieldName)) {
                    const errors = validationErrors[fieldName];
                    NC.spawnNote('error', errors[0], 'Попробуйте снова', ['Закрыть'])
                }
            }
            });
    },
    storeUser: async (context) => {
        await axios.post('http://127.0.0.1:8000/api/signUp', {
            name: state.registerUserData.name,
            email: state.registerUserData.email,
            password: state.registerUserData.password,
            password_confirmation: state.registerUserData.password_confirmation,
            image: state.registerUserData.image,
        }, {
            headers: {
                "Content-Type": 'multipart/form-data'
            }
        }).then(response => {
            store.commit('setAuthToken', response.data.token)
            localStorage.setItem('auth_token', response.data.token)
            store.state.showRegisterModal = false
            NC.spawnNote('success', response.data.message, 'Добро пожаловать', ['Закрыть'])
            router.push('/login')
        }).catch(error => {
            if(error.response.status === 401) {
                return NC.spawnNote('error', error.response.data.message, 'Попробуйте снова', ['Закрыть'])
            }
            const validationErrors = error.response.data.errors
            for (const fieldName in validationErrors) {
                if (validationErrors.hasOwnProperty(fieldName)) {
                    const errors = validationErrors[fieldName];
                    NC.spawnNote('error', errors[0], 'Попробуйте снова', ['Закрыть'])
                }
            }
        })
    },
    getUser: async (context) => {
        await axios.get('http://127.0.0.1:8000/api/user/show', {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('auth_token')}`
            }
        })
            .then(response => {
                console.log(localStorage.getItem('auth_token'));
                console.log(response.data.user)
                context.commit('setAuthUser', response.data.user)
            })
            // .catch(error => {
            //     if(error) {
            //         return NC.spawnNote('error', error.response.data.message, 'Попробуйте снова', ['Закрыть'])
            //     }
            // })
    },
    setEditAuthUser: async (context, payload) => {
        await axios.post('http://127.0.0.1:8000/api/user/edit', {
            name: state.me.name,
            email: state.me.email,
            image: state.me.image,
        }, {
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            console.log(state.me.name)
            NC.spawnNote('success', response.data.message, 'Выполнено действие...', ['Закрыть'])
        }).catch(error => {
            console.log(state.me.image)
            console.log(error)
        })
    },
    logOutUser: async (context) => {
        await axios.get('http://127.0.0.1:8000/api/logOut', {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('auth_token')}`
            }
        })
            .then(response => {
                NC.spawnNote('success', response.data.message, 'Ждем вас снова', ['Закрыть'])
                localStorage.removeItem('auth_token')
                store.commit('removeAuthToken', null)
                store.commit('removeAuthUser')
                console.log(state.authUserData.email = '');
                state.registerUserData.name = ''
                state.registerUserData.email = ''
                state.registerUserData.description = ''
                state.registerUserData.image = null
                state.registerUserData.password = ''
                state.registerUserData.password_confirmation = ''
                state.authUserData.email = ''
                state.authUserData.password = ''
                router.push('/')
            })
    },
    checkAuth(context, to) {
        if (localStorage.getItem('auth_token')) {
            return true;
        } else {
            router.push('/');
            NC.spawnNote('error', 'Вы не авторизованы!', 'В доступе отказано', ['Закрыть'])
            return false;
        }
    },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
