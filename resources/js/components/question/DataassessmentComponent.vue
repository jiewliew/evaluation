<template>
  <div>

    <!-- <div align ="right">
      <button  class ="btn btn-primary " @click="addtype()">เพิ่มข้อมูล </button>
    </div> -->
    <br>
    <table id="tablestudents" class="table table-striped table-bordered">
    <thead>
            <tr>
                <th class="text-center" >ลำดับ</th>
                 <th class="text-center">หัวข้อแบบประเมิน</th>
                <th class="text-center">หัวข้อประเภท</th>
                <th class="text-center"> ชื่อคำถาม</th>
                <th class="text-center">จัดการข้อมูล`</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(assessments,index) in assessment " :key="index">
                <td class="text-center">{{index+1}}</td>
                <td class="text-center">{{assessments.indicator.evaluation.evalution_question_form_detail}}</td>
                <td class="text-center">{{assessments.indicator.detail}}</td>
                <td class="text-center">{{assessments.detail}}</td>
                <td class="text-center"><button class ="btn btn-info" @click="editdata(assessments)">แก้ไขข้อมูล</button>
                </td>
            </tr>
          </tbody>

    </table>
    <editdata-component></editdata-component>
    <!-- <add-student-component></add-student-component> -->
    <!-- <edit-indicator-component></edit-indicator-component>  -->
  </div>

</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {

      assessment:[],


    }
  },
  created()
  {
    this.datatype();
  },

  methods:{
    datatype()
    {
      axios.get('/ajaxdataassessment').then(res=>{
        this.assessment = res.data;
      })
    },
    addtype()
    {
      $('#addstudent').modal().show();
      $('.modal-backdrop').show();
    },
    editdata(data)
    {
      this.$store.commit('assessment/setdata',data);
      $('#editdata').modal().show();
      $('.modal-backdrop').show();
    }
  }
}

</script>
