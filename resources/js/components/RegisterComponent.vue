<template>
<div>
        <ValidationObserver ref="observer" v-slot="{ validate }">
            <form @submit.prevent="validate().then(submit)">
             
                    


                        <div class="content">
                            <div class="animated fadeIn">
                                <!--div class="row"-->
                                <div class="col-lg-12 ">
                                    <div class="card p-3">
                                        <div class="card-header">
                                            <i class="fa fa-plus-circle" style="font-size:30px"></i>&nbsp;<strong>เพิ่ม/แก้ไขข้อมูลนักเรียน</strong>
                                            <!--1-->
                                        </div>


                                        <div class="uploadimage">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">รูปภาพ :</label></div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="file" @change='upload_avatar'  name="avatar">        
                                                        <div class="avatar img-fluid img-circle" style="margin-top:10px">
                                                            <img :src="get_avatar()" class="gallery-img" width ="300px"/>
                                                        </div>
                                                </div>
                                        </div> 
                                        <br>
                                        
                                        <ValidationProvider v-slot="{errors}" name="card" rules="required">
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">เลขประจำตัวประชาชน 2:</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" v-model="form.card" class="form-control"><small class="form-text text-muted"></small>
                                                    <span class="error">{{ errors[0] }}</span>
                                                </div>
                                            </div>
                                        </ValidationProvider>
                                        <ValidationProvider v-slot="{errors}" name="id_student" rules="required">
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">เลขประจำตัวนักเรียน :</label></div>
                                                <div class="col-12 col-md-9"><input type="text" v-model="form.id_student" id="id_student" name="id_student" class="form-control"><small class="help-block form-text"></small>
                                                    <span class="error">{{ errors[0] }}</span>
                                                </div>

                                            </div>
                                        </ValidationProvider>
                                        <div class="row form-group">

                                            <div class="col col-md-3"><label for="selectLg" class=" form-control-label">ชื่อ-สกุล :</label></div>
                                            <div class="col-12 col-md-3">
                                                <select name="select" id="select" v-model="form.prefix" class="form-control form-control">
                                                    <option value="0"></option>
                                                    <option value="1">เด็กชาย</option>
                                                    <option value="2">เด็กหญิง</option>

                                                </select>

                                            </div>
                                            <div class="col-lg-3"><input type="text" v-model="form.name_th" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                            <div class="col-lg-3"><input type="text" v-model="form.surname_th" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectLg" class=" form-control-label">ชื่อ-สกุลภาษาอังกฤษ :</label></div>
                                            <div class="col-12 col-md-3">
                                                <select name="select" id="select" v-model="form.prexfix_en" class="form-control form-control">
                                                    <option value="0"></option>
                                                    <option value="1">Boy</option>
                                                    <option value="2">Girl</option>

                                                </select>

                                            </div>
                                            <div class="col-lg-3"><input type="text" id="text-input" v-model="form.name_en" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                            <div class="col-lg-3"><input type="text" id="text-input" v-model="form.surname_en" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectLg" class=" form-control-label">วัน/เดือน/ปีเกิด :</label></div>
                                            <div class="col-12 col-md-3">
                                                <input type="date" v-model='form.birthday' id="text-input" name="text-input" class="form-control">
                                            </div>


                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">เชื้อชาติ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.country" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">สัญชาติ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.country_1" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">ศาสนา :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.country_2" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">ชนเผ่า :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.country_3" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>

                                        
                                         <div class="row form-group">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">ชื่อผู้ปกครอง :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.p_name" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">นามสกุล :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.p_lastname" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>

                                          
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">เบอร์โทรศัพท์ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.p_tel" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">อีเมล์ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.p_email" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>

                                          
                                        </div>

                                           <div class="row form-group">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">จำนวนพี่น้อง :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.p_bro" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>
                                      
                                      
                                        




                                    </div>


                                </div>

                            </div>

                        </div>
                      <div class="content">
                        <div class="animated fadeIn">
                            <!--div class="row"-->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-plus-circle" style="font-size:30px"></i>&nbsp;<strong>ที่อยู่ปัจจุบัน</strong>
                                        <!--2-->
                                    </div>
                                    <div class="card-body card-block">

                                        <br>



                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">รหัสทะเบียนบ้าน :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.address_home_band1" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">เลขที่บ้าน :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.address_home_band2" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">หมู่ที่ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.moo_1" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>

                                        <div class="row form-group">
                                        
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">ถนน :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.road_1" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">จังหวัด :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.city_1" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">อำเภอ/เขต :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.amphure_1" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">ตำบล/แขวง :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.tumbun_1" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">รหัสไปรษณีย์ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.postcode_1" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                   <!-- .animated -->
                    <div class="content">
                        <div class="animated fadeIn">
                            <!--div class="row"-->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-plus-circle" style="font-size:30px"></i>&nbsp;<strong>ที่อยู่ตามทะเบียนบ้าน</strong>
                                        <!--2-->
                                    </div>
                                    <div class="card-body card-block">

                                        <br>



                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">รหัสทะเบียนบ้าน :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.address_home" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">เลขที่บ้าน :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.address_home_1" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">หมู่ที่ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.moo" id="text-input" name="text-input" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>

                                        <div class="row form-group">
                                        
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">ถนน :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.road" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">จังหวัด :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.city" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">อำเภอ/เขต :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.amphure" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">ตำบล/แขวง :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.tumbun" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">รหัสไปรษณีย์ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.postcode" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div><!-- .animated -->

                    <div class="modal-footer">
                        <button class="btn btn-primary">บันทึกข้อมูล</button>
                        <button type="button" @click="closemodal()" class="btn btn-secondary" data-dismiss="modal">ปิด-</button>
                    </div>
            
            </form>
        </ValidationObserver>
    </div>


</template>

<script>
export default {
  data() {
    return {
      form: {
        prefix: "",
        name_thai: "",
        surname_thai: "",
        name_en: "",
        surname_en: "",
        id_student: "",
        card: "",
        birthday: "",
        country: "",
        country_1: "",
        country_2: "",
        country_3: "",
        address_home: "",
        address_home_1: "",
        moo: "",
        mooband: "",
        road: "",
        city: "",
        amphure: "",
        tumbun: "",
        postcode: "",
        address_home_band1: "",
        address_home_band2: "",
        moo_1: "",
        road_1: "",
        city_1: "",
        amphure_1: "",
        tumbun_1: "",
        postcode_1: "",
       
      },
       avatar: "",
    };
  },
  created() {},
  methods: {
    async submit() {
      // console.log(this.form);
       const config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    }
   
      axios
        .post("/submitregister",
       this.$parent.toFormData(this.form) 
       )
        .then((res) => {
          if (res.status == 200) {
            alert("บันทึกข้อมูลสำเร็จ");

            location.reload();
          } else {
            alert("บันทึกไม่สำเร็จ");
          }
        })
        .catch((e) => {
          alert("กรุณากรอกข้อมูลให้ครบถ้วน");
        });
    },
    closemodal() {
      $("#addstudent").modal().hide();
      $(".modal-backdrop").hide();
    },
    upload_avatar(e) {
      let file = e.target.files[0];
      this.form.file = file;
      let reader = new FileReader();

      if (file["size"] < 2111775) {
        reader.onloadend = (file) => {
          //console.log('RESULT', reader.result)
          this.avatar = reader.result;
        };
        reader.readAsDataURL(file);
      } else {
        alert("File size can not be bigger than 2 MB");
      }
    },
    //For getting Instant Uploaded Photo
    get_avatar() {
      let photo =
        this.avatar.length > 100
          ? this.avatar
          : ""
      return photo;
    },
  },
};
</script>

<style lang="scss" scoped>
.error {
  color: red;
}
.gallery-img {
  max-width: 100%;
  height: auto;
  object-fit: cover;
  transition: opacity 0.25s ease-in-out;
}
// .modal-dialog-1 {
// width:100vh;
// }
//
// @media screen and (min-width: 576px)
// {
// .modal-dialog-1 {
//     width:100vh;
//     max-width: auto;
//     margin: 1.75rem auto;
// }
// }
</style>
