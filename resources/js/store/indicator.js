

// initial state
// shape: [{ id, quantity }]
const state = () => ({
    indicator: [],
    typequest :{}
  })
  
  // getters
  const getters = {
    
  
    indicator: (state) => {
      return  state.indicator;
    },
    typequest:(state)=>{
      return state.typequest;
    }
  }
  
  // actions
  const actions = {
  }
  
  // mutations
  const mutations = {
    getdata:(state,payload)=>{
      state.indicator  =payload;
    },
    getdata_typeques:(state,payload)=>{
      state.typequest = payload;
    }
  }
  
  export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
  }