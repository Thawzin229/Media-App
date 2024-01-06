import { createStore } from 'vuex'

export default createStore({
  state: {
    token:null,
    userdata:null,
  },
  getters: {
  },
  mutations: {
  },
  actions: {
    setToken:({state},token) => {
      if(token != null){
        state.token = token.token;
        state.userdata = token.userdata;
      }else{
        state.token = token;
      }

    }
  },
  modules: {
  }
})
