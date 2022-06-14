<template>
  <div>

    <!-- <div align ="right">
      <button  class ="btn btn-primary " @click="addtype()">เพิ่มข้อมูล </button>
    </div> -->
    <br>
    <table id="tablestudents" class="table table-striped table-bordered">
    <thead>
            <tr>
                <th >ลำดับ</th>
                <th >หัวข้อแบบประเมิน</th>
                <th>ข้อมูล</th>
                <th>จัดการข้อมูล`</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(indicators,index) in indicator " :key="index">
                <td>{{index+1}}</td>
                <td>{{indicators.evaluation.evalution_question_form_detail}}</td>
                <td>{{indicators.detail}}</td>
                <td><button class ="btn btn-info" @click="editindicator(indicators)">แก้ไขข้อมูล</button>
                </td>
            </tr>
          </tbody>

    </table>
  <editquestion-component></editquestion-component>
    <!-- <add-student-component></add-student-component> -->
    <!-- <edit-indicator-component></edit-indicator-component>  -->
  </div>

</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {

      indicator:[],


    }
  },
  created()
  {
    this.datatype();
  },

  methods:{
    datatype()
    {
      axios.get('/ajaxdatatype').then(res=>{
        this.indicator = res.data;
      })
    },
    addtype()
    {
      $('#addstudent').modal().show();
      $('.modal-backdrop').show();
    },
    editindicator(indicators)
    {
      this.$store.commit('indicator/getdata_typeques',indicators);
      $('#edittypequestion').modal().show();
      $('.modal-backdrop').show();
    }
  }
}

</script>
