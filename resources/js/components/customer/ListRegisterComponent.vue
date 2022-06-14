<template>
  <div>

  
    <br>
    <table id="tablestudents" class="table table-striped table-bordered">
    <thead>
            <tr>
                <th >ลำดับ</th>
                <th >รูป</th>
                <th >ชื่อ</th>
                <th >นามสกุล</th>
                <th >ชื่อภาษาอังกฤษ</th>
                <th >นามสกุลอังกฤษ</th>
                <th >วันเกิด</th>
              
                <th >จัดการข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(students,index) in student " :key="index">
                <td class ="text-center">{{index+1}}</td>
                <td><img :src ="url + students.images" width="auto" height="100px"></td>
                <td>{{students.stu_name}}</td>
                <td>{{students.stu_last}}</td>
                <td>{{students.stu_name_en}}</td>
                <td>{{students.stu_lastname_en}}</td>
                <td>{{students.birthday}}</td>
              
                <td>
                  <!-- <button class ="btn btn-primary" @click="editstudent(students)">ดูข้อมูล</button> -->
                   <button class ="btn btn-info" @click="addquestion(students.stu_id)">ทำแบบทดสอบ</button>
                   <button class ="btn btn-danger" @click="viewquesiton(students.stu_id)">ผลการประเมิน</button>
                   <button class ="btn btn-primary" @click="editstudent(students.stu_id)">ปรับสถานะ</button>
                </td>
            </tr>
          </tbody>

    </table>
      <question-component></question-component>
    <edit-register-component></edit-register-component>
     <view-question-component></view-question-component>
  </div>

</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {

      student:[],
      url :'/images/',


    }
  },
  created()
  {
    this.datastudent();
  },

  methods:{
    viewquesiton(id)
    {
      this.$store.commit('registerorder/setid',id);
      $('#viewquestion').modal().show();
      $('.modal-backdrop').show();
    },
    addquestion(id)
    {
      this.$store.commit('registerorder/setid',id);
      $('#question').modal().show();
      $('.modal-backdrop').show();
    },
    datastudent()
    {
      axios.get('dataregister').then(res=>{
      
        this.student = res.data;
          this.$store.commit('registerorder/setdatastudent',res.data);
      })
    },
    addstudent()
    {
      $('#addstudent').modal().show();
      $('.modal-backdrop').show();
    },
    editstudent(id)
    {
      this.$store.commit('registerorder/set_form_edit',id);
      $('#editregister').modal().show();
      $('.modal-backdrop').show();
    }
  }
}

</script>
