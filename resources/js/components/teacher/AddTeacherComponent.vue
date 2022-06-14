<template>
<div class="modal fade " id="addteacher" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog-1 modal-full" role="document">
        <ValidationObserver ref="observer" v-slot="{ validate }">
            <form @submit.prevent="validate().then(submit)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เพิ่มข้อมูล</h5>

                    </div>
                    <div class="modal-body   p-1">


            

                    </div><!-- .animated -->
                    <div class="content">
                        <div class="animated fadeIn">
                            <!--div class="row"-->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-plus-circle" style="font-size:30px"></i>&nbsp;<strong>เพิ่มข้อมูล</strong>
                                        <!--2-->
                                    </div>
                                    <div class="card-body card-block">

                                        <br>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">ชื่อ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.teacher_name" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">นามสกุล :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.teacher_lname" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>



                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">เบอร์โทรศัพท์ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.teacher_tel" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">อีเมล์ :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.teacher_email" id="password-input" name="password-input" class="form-control"><small class="help-block form-text"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">วันเกิด :</label></div>
                                            <div class="col-12 col-md-3"><input type="date" v-model="form.teacher_birthday" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
                                            

                                              <div class="col col-md-3"><label for="email-input" class=" form-control-label">password :</label></div>
                                            <div class="col-12 col-md-3"><input type="text" v-model="form.password" id="email-input" name="email-input" class="form-control"><small class="help-block form-text"></small></div>
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
                teacher_name :'',
                teacher_lname :'',
                teacher_email :'',
                teacher_tel :'',
                teacher_birthday :'',
                password:'',
            }
        }
    },
    created() {},
    methods: {
        async submit() {
            // console.log(this.form);
            axios.post('/submitcreateteacher', this.form).then(res => {
                if (res.data.status == 200) {
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
