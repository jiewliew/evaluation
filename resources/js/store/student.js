import Axios from 'axios'
import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'
const state = () => ({

    student:{},

})

// getters
const getters = {

   
    form : state=>{
        return state.student
    }
}

// actions
const actions = {
    getquestion: ({ commit }, payload) => {
        console.log(payload);
        return new Promise((resolve, reject) => {
            Axios.post('/getdataquestion', payload).then(res => {
                if (res.data.length < 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'หัวข้อนี้ถูกประเมินเรียบร้อยแล้ว',
                        text: 'หัวข้อนี้ถูกประเมินเรียบร้อยแล้ว!',
                    })
                    commit('setvaluequestion', res.data);
                }
                else {
                    commit('setvaluequestion', res.data);
                }
            }).catch(err => {
                reject(err);
            })
        })
    },
    getorder: ({ commit }, payload) => {
        return new Promise((resolve, reject) => {
            Axios.post('/getorder', payload).then(res => {
                if (res.data.length < 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'หัวข้อยังไม่ถูกประเมิน กรุณาทำการทดสอบก่อน',
                        text: 'กรุณาทำการทดสอบก่อน!',
                    })
                    commit('setvaluequestion', res.data);
                }
                else {
                    commit('setvaluequestion', res.data);
                }
            }).catch(err => {
                reject(err);
            })
        })
    },
    saveregisterorder: ({ commit, state }, payload) => {

        return new Promise((resolve, reject) => {
            Axios.post('/saveregisterorder', state.form).then(res => {
                resolve(res);
            }).catch(err => {
                reject(err);
            })
        })
    }
}

// mutations
const mutations = {
  getdata(state, payload) {
        state.student = payload;
        console.log(payload);
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}


