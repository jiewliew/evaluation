<template>
<div class="modal fade " id="addstudent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog-1 modal-full" role="document">
        <ValidationObserver ref="observer" v-slot="{ validate }">
            <form @submit.prevent="validate().then(submit)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เพิ่มข้อมูล-</h5>

                    </div>
                    <div class="modal-body   p-1">


                        <div class="content">
                            <div class="animated fadeIn">
                                <!--div class="row"-->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="fa fa-plus-circle" style="font-size:30px"></i>&nbsp;<strong>เพิ่ม/แก้ไขข้อมูลนักเรียน</strong>
                                            <!--1-->
                                        </div>


                                        <div class="uploadimage">

                                            <div id="image_preview"></div>
                                        </div> <br>
                                        <ValidationProvider v-slot="{errors}" name="card" rules="required">
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">เลขประจำตัวประชาชน :</label></div>
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
                                            <div class="col col-md-3"><label for="select" v-model="form.country_4" class=" form-control-label">ประเภทความพิการ :</label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="select" id="select" class="form-control">
                                                    <option value="0"></option>
                                                    <option value="1">บกพร่องทางการเห็น</option>
                                                    <option value="2">บกพร่องทางการได้ยิน</option>
                                                    <option value="3">บกพร่องทางสติปัญญา</option>
                                                    <option value="4">บกพร่องทางร่างกายหรือสุขภาพ</option>
                                                    <option value="5">บุคคลที่มีปัญหาทางการเรียนรู้</option>
                                                    <option value="6">บกพร่องทางการพูดและภาษา</option>
                                                    <option value="7">บุคคลที่มีปัญหาทางพฤติกรรมหรืออารมณ์</option>
                                                    <option value="8">บุคคลออทิสติก</option>
                                                    <option value="9">บุคคลพิการซ้อน</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2"><label for="selectSm" class=" form-control-label">ปีการศึกษาที่เข้าเรียน</label></div>
                                            <div class="col-12 col-md-2">
                                                <select name="select" v-model="form.student_year" id="select" class="form-control form-control">
                                                    <option value="0"></option>
                                                    <option value="1">2563</option>
                                                    <option value="2">2564</option>
                                                    <option value="3">2565</option>

                                                </select>
                                            </div>
                                            <div class="col col-md-2"><label for="selectSm" class=" form-control-label">ชั้นที่เข้าเรียน</label></div>
                                            <div class="col-12 col-md-2">
                                                <select name="select" v-model="form.student_edu" id="select" class="form-control form-control">
                                                    <option value="0"></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="col col-md-2"><label for="selectSm" class=" form-control-label">ห้องที่เข้าเรียน</label></div>
                                            <div class="col-12 col-md-2">
                                                <select name="select" v-model="form.student_room" id="select" class="form-control form-control">
                                                    <option value="0"></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2"><label for="selectSm" class=" form-control-label">ชั้นปัจจุบัน :</label></div>
                                            <div class="col-12 col-md-2">
                                                <select name="select" id="select" v-model="form.student_edu_1" class="form-control form-control">
                                                    <option value="0"></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="col col-md-2"><label for="selectSm" class=" form-control-label">ห้อง :</label></div>
                                            <div class="col-12 col-md-2">
                                                <select name="select" id="select" v-model="form.student_room_1" class="form-control form-control">
                                                    <option value="0"></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <!-- <div class="col col-md-2"><label for="selectSm" class=" form-control-label">ชื่อ-สกุลครูประจำชั้น :</label></div>
                                      <div class="col-12 col-md-2">
                                          <select name="select" id="select"  v-model="form.teacher_id" class="form-control form-control">
                                              <option value="0"></option>
                                          </select>
                                      </div> -->
                                        </div>




                                    </div>


                                </div>

                            </div>

                        </div>

                    </div><!-- .animated -->
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
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">หมู่บ้าน :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.mooband" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
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
                </div>
            </form>
        </ValidationObserver>
    </div>
</div>
</div>
</template>

<script>
export default {

    data() {
        return {
            form: {
                prefix: '',
                name_thai: '',
                surname_thai: '',
                name_en: '',
                surname_en: '',
                id_student: '',
                card: '',
                birthday: '',
                country: '',
                country_1: '',
                country_2: '',
                country_3: '',
                student_year: '',
                student_edu: '',
                student_room: '',
                student_edu_1: '',
                student_room_1: '',
                teacher_id: '',
                address_home: '',
                address_home_1: '',
                moo: '',
                mooband: '',
                road: '',
                city: '',
                amphure: '',
                tumbun: '',
                postcode: '',

            }
        }
    },
    created() {},
    methods: {
        async submit() {
            // console.log(this.form);
            axios.post('/submitcreatestudent', this.form).then(res => {
                if (res.status == 200) {
                    alert('บันทึกข้อมูลสำเร็จ');

                    location.reload();
                } else {
                    alert('บันทึกไม่สำเร็จ');
                }
            }).catch(e => {
                alert('กรุณากรอกข้อมูลให้ครบถ้วน');
            })
        },
        closemodal() {
            $('#addstudent').modal().hide();
            $('.modal-backdrop').hide();
        },

    }

}
</script>

<style lang="scss" scoped>
.error {
    color: red;
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
