import Axios from 'axios'
import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'
const state = () => ({
   
        form:{
            stu_id:'',
            data :[],
            evalution_id :'',
            year :'',
        },
        dataquestion:[],
        data:{
            stu_id:'',
            evalution_id :'',
            year :'',
        }
   
  })
  
  // getters
  const getters = {
    
    dataquestion: state => {
        return state.dataquestion;
      }
  }
  
  // actions
  const actions = {
    getquestion:({commit},payload)=>{
     
        return new Promise((resolve, reject) => {
            Axios.post('/getdataquestion',payload).then(res=>{
                if(res.data.length < 1)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'หัวข้อนี้ถูกประเมินเรียบร้อยแล้ว',
                        text: 'หัวข้อนี้ถูกประเมินเรียบร้อยแล้ว!',
                      })
                      commit('setvaluequestion',res.data);
                }
                else{
                commit('setvaluequestion',res.data);
                }
            }).catch(err=>{
                reject(err);
            })
        })
    },
    saveinsurance:({commit,state},payload)=>{
   
        return new Promise((resolve, reject) => {
            Axios.post('/saveinsurance',state.form).then(res=>{
                resolve(res);
            }).catch(err=>{
                reject(err);
            })
        })
    },
    getdataorder:({commit},payload)=>{
     
        return new Promise((resolve, reject) => {
            Axios.post('/getdataorder',payload).then(res=>{
                if(res.data.length < 1)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'หัวข้อนี้ยังไม่ถูกประเมิน',
                        text: 'หัวข้อนี้ยังไม่ถูกประเมิน!',
                      })
                      commit('setvaluequestion',res.data);
                }
                else{
                commit('setvaluequestion',res.data);
                }
            }).catch(err=>{
                reject(err);
            })
        })
    },
  }
  
  // mutations
  const mutations = {
    setvaluequestion(state,payload){
        state.dataquestion = payload;
            
        console.log(state.dataquestion);
    },
    addform(state,payload){
        state.form.stu_id = payload.stu_id;
        state.form.data   = payload.data;
        state.form.evalution_id = payload.evalution_id;
        state.form.year   = payload.year;
    },
    setnull(state,payload)
    {
        state.dataquestion =[];
        console.log('test');
    }
  }
  
  export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
  }


