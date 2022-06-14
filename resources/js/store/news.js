import Axios from 'axios'
import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'
const state = () => ({

    news:{
        topic :'',
        detial :'',
        pic :'',
        update_at :'',
        create_at :'',
    },
   

})

// getters
const getters = { 
    form : state=>{
        return state.news
    }
    
}

// actions
const actions = {
    getquestion: ({ commit }, payload) => {
        //console.log(payload);
        return new Promise((resolve, reject) => {
            Axios.post('/getnews', payload).then(res => {
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
            Axios.post('/submitcreatenews', state.form).then(res => {
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
        //14/05/2022 อัพเดท store ส่วนนี้เพื่อใช้ดึงข้อมูลมาแสดงบนฟอร์ม สำหรับ edit
        state.news.topic = payload.news.topic;
        state.news.detail = payload.news.detail;
        //state.news.pic = payload.news.pic;
        // state.teacher.teacher_tel = payload.teacher.teacher_tel;
        // state.teacher.teacher_birthday = payload.teacher.teacher_birthday;
        // state.teacher.id = payload.id;
        // state.teacher.teacher_id = payload.teacher.id;
        // state.teacher.password = payload.password;
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}


