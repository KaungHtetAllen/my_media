import { createStore } from 'vuex'

export default createStore({
  state: {                               //declaration   //step 2 
    userData : {},
    token : '', 
  },
  getters: {                             //step 3           // get from storeand return to vuejs
    getToken: state => state.token,
    getUserData: state => state.userData
  },
  mutations: {
  },
  actions: {                              //step 1   //put to store
    setToken:({state},value)=>state.token = value,
    setUserData:({state},value)=>state.userData = value,
  },
  modules: {
  }
})
