<template>
  <div>

    <div align ="right">
      <!-- <button  class ="btn btn-primary " @click="addstudent()">รับสมัครนักเรียน </button> -->
    </div>
    <br>
    <table id="tablestudents" class="table table-striped table-bordered">
    <thead>
            <tr>
                <th >ลำดับ</th>
                <th> รหัสนักเรียน</th>
                <th >ชื่อ</th>
                <th >นามสกุล</th>
                <th >วันเกิด</th>
                <th >ปีการศึกษา</th>
                <th >Ex</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(students,index) in student " :key="index">
                <td>{{index+1}}</td>
                <td>{{students.student_id}}</td>
                <td>{{students.stu_name}}</td>
                <td>{{students.stu_last}}</td>
                <td>{{students.birthday}}</td>
                <td>{{students.stu_year}}</td>
                <td><button class ="btn btn-info" @click="editstudent(students)">แก้ไขข้อมูล</button>
                  <!-- <button class ="btn btn-danger" @click="editstudent(students.id)">ลบข้อมูล</button> -->
                </td>
            </tr>
          </tbody>

    </table>

    <add-student-component></add-student-component>
    <edit-student-component></edit-student-component>
  </div>

</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {

      student:[],


    }
  },
  created()
  {
    this.datastudent();
  },

  methods:{
    datastudent()
    {
      axios.get('datastudentme').then(res=>{
        this.student = res.data;
      })
    },
    addstudent()
    {
      $('#addstudent').modal().show();
      $('.modal-backdrop').show();
    },
    editstudent(students)
    {
      this.$store.commit('student/getdata',students);
      $('#editstudent').modal().show();
      $('.modal-backdrop').show();
    }
  }
}

</script>
