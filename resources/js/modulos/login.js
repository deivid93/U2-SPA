import router from '../router.js'
export default {
    namespaced: true,
    state: {
        user: null,
        auth: false
    },
    mutations: {
        SET_USER(state, user){
            state.user = user
        },
        SET_AUTH(state, auth){
            state.auth = auth
        }
    },
    actions: {
        login( { commit }, credenciales){
            //console.log(credenciales)
            //return;
             axios.get('/sanctum/csrf-cookie').then(response => {
                  const resp =  axios.post('/api/signin', credenciales).then(res => {
                       console.log(res)
                        commit("SET_USER", res.data )
                        commit("SET_AUTH", true)
                        localStorage.setItem('user',res.data.token)
                        return router.replace("/main")
                    });
             }).catch(error => {
                 console.log(error)
             });
         },
         async logout( {commit} ){
             const res = await axios.post('logout');
             commit("SET_USER", res.data )
             commit("SET_AUTH", false)
             return router.replace("/")
         }

    }

}
