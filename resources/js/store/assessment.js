

// initial state
// shape: [{ id, quantity }]
const state = () => ({
    assessment: [],
    data:{}
  })
  
  // getters
  const getters = {
    
  
    assessment: (state) => {
      return  state.assessment;
    },
    data: (state) => {
      return  state.data;
    }
  }
  
  // actions
  const actions = {
  }
  
  // mutations
  const mutations = {
    getdata:(state,payload)=>{
      state.assessment  =payload;
    },
    setdata:(state,payload)=>{
      state.data = payload;
    }
  }
  
  export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
  }