import Vue from 'vue'
import Vuex from 'vuex'
import  student from './student';
import  evalution from './evalution';
import  insurance from './insurance';
import  registerorder from './registerorder';
import  teacher from './teacher';
import news from './news';
import indicator from './indicator';
import assessment from './assessment';
Vue.use(Vuex)

export default new Vuex.Store({
  modules:{
  evalution,
  insurance,
  indicator,
  registerorder,
  student,
  teacher,
  news,
  assessment
  }
})


