<template>
  <div>

    <div align ="right">
      <button  class ="btn btn-primary " @click="addnews()">เพิ่มข่าว</button>
    </div>
    <br>
    <table id="tablestudents" class="table table-striped table-bordered">
    <thead>
            <tr>
                <th >ลำดับที่</th>
                <th >หัวข้อ</th>
                <th> เนื้อหา</th>
                <th >รูปภาพ</th>
                <th >แก้ไขล่าสุด</th>
                <th >วันที่สร้าง</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(news,index) in allnews " :key="index">
                <td>{{index+1}}</td>
                <td>{{news.topic}}</td>
                <td>{{news.detail}}</td>                
                <td><img v-bind:src="'/images/'+news.pic"></td> <!-- File รูป จะถูกเก็บไว้ที่ public/images -->
                <td>{{news.update_at}}</td>
                <td>{{news.create_at}}</td>
                <td><button class ="btn btn-info" @click="editnews(news)">แก้ไขข้อมูล</button>
                  <!-- <button class ="btn btn-danger" @click="editstudent(students.id)">ลบข้อมูล</button> -->
                </td>
            </tr>
          </tbody>

    </table>

    <add-news-component></add-news-component>
    <edit-news-component></edit-news-component>
  </div>

</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      allnews:[],
      
    }
  },
  created()
  {    
    this.datanews();
  },

  methods:{
    datanews()
    {      
      axios.get('datanews').then(res=>{        
        this.allnews = res.data;
      })
    },
    addnews()
    {
      $('#addnews').modal().show();
      $('.modal-backdrop').show();
    },
    editnews(news) //ส่งค่า news มาจากข้างบนแก้ไขข้อมูล เพื่อส่งไป server
    {
      console.log(news);
      this.$store.commit('news/getdata',news); //มันจะเรียกไฟล์ store 
      $('#editnews').modal().show();
      $('.modal-backdrop').show();
    }
  }
}

</script>
