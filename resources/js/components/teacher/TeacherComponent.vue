<template>
  <div>

    <div align ="right">
      <button  class ="btn btn-primary " @click="addteacher()">เพิ่มรายชื่อ</button>
    </div>
    <br>
    <table id="tablestudents" class="table table-striped table-bordered">
    <thead>
            <tr>
                <th >ลำดับ</th>
                <th> รหัส</th>
                <th >ชื่อ</th>
                <th >นามสกุล</th>
                 <th >เบอร์โทรศัพท์</th>
                <th >อีเมล์</th>
                <th >Ex</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(teachers,index) in teacher " :key="index">
                <td>{{index+1}}</td>
                <td>{{teachers.id}}</td>
                <td>{{teachers.teacher.teacher_name}}</td>
                <td>{{teachers.teacher.teacher_lname}}</td>
                <td>{{teachers.teacher.teacher_tel}}</td>
                <td>{{teachers.teacher.teacher_email}}</td>
                <td><button class ="btn btn-info" @click="editteacher(teachers)">แก้ไขข้อมูล</button>
                  <!-- <button class ="btn btn-danger" @click="editstudent(students.id)">ลบข้อมูล</button> -->
                </td>
            </tr>
          </tbody>

    </table>

    <add-teacher-component></add-teacher-component>
    <edit-teacher-component></edit-teacher-component>
  </div>

</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {

      teacher:[],


    }
  },
  created()
  {
    this.datateacher();
  },

  methods:{
    datateacher()
    {
      axios.get('datateacher').then(res=>{
        this.teacher = res.data;
      })
    },
    addteacher()
    {
      $('#addteacher').modal().show();
      $('.modal-backdrop').show();
    },
    editteacher(teacher)
    {
      this.$store.commit('teacher/getdata',teacher);
      $('#editteacher').modal().show();
      $('.modal-backdrop').show();
    }
  }
}

</script>
