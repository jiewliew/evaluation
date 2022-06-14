import Axios from 'axios'
import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'
const state = () => ({

    form: {
        stu_id: '',
        data: [],
        evalution_id: '',
    },
    dataquestion: [],
    data: {
        stu_id: '',
        evalution_id: '',
    },
    stu_id: '',
    formedit: {},
    studentregis:[],
    

})

// getters
const getters = {

    dataquestion: state => {
        return state.dataquestion;
    },
    stu_id: state => {
        return state.stu_id
    },
    form : state=>{
        return state.formedit
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
    setid(state, payload) {
        state.stu_id = payload;
        console.log(payload);
    },
    setvaluequestion(state, payload) {
        state.dataquestion = payload;
    },
    addform(state, payload) {
        state.form.stu_id = payload.stu_id;
        state.form.data = payload.data;
        state.form.evalution_id = payload.evalution_id;
    },
    setnull(state, payload) {
        state.dataquestion = [];
        console.log('test');
    },
    set_form_edit(state,payload)
    {
       
        state.formedit =state.studentregis.find(res=>res.stu_id == payload);
    },
    setdatastudent(state,payload)
    {
        state.studentregis = payload;
        console.log(state.studentregis);
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}


