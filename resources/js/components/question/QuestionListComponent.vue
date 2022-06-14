<template>
  <div>

    <div align ="right">
      <button  class ="btn btn-primary " @click="addstudent()">เพิ่มข้อมูล </button>
    </div>
    <br>
    <table id="tablestudents" class="table table-striped table-bordered">
    <thead>
            <tr>
                <th >ลำดับ</th>
                <th>ชื่อหัวข้อ</th>
                <th>จัดการข้อมูล`</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(evalutions,index) in evalution " :key="index">
                <td>{{index+1}}</td>
                <td>{{evalutions.evalution_question_form_detail}}</td>
                <td><button class ="btn btn-info" @click="editevalution(evalutions)">แก้ไขข้อมูล</button>
                </td>
            </tr>
          </tbody>

    </table>

    <!-- <add-student-component></add-student-component> -->
    <edit-evalution-component></edit-evalution-component> 
  </div>

</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {

      evalution:[],


    }
  },
  created()
  {
    this.datastudent();
  },

  methods:{
    datastudent()
    {
      axios.get('dataevalution').then(res=>{
        this.evalution = res.data;
      })
    },
    addstudent()
    {
      $('#addstudent').modal().show();
      $('.modal-backdrop').show();
    },
    editevalution(students)
    {
      this.$store.commit('evalution/getdata',students);
      $('#editevaluation').modal().show();
      $('.modal-backdrop').show();
    }
  }
}

</script>
