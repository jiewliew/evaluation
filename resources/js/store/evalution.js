

// initial state
// shape: [{ id, quantity }]
const state = () => ({
  evalution: [],
})

// getters
const getters = {
  

   evalution: (state) => {
    return  state.evalution;
  }
}

// actions
const actions = {
}

// mutations
const mutations = {
  getdata:(state,payload)=>{
    state.evalution  =payload;
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}