<template>
<div class="modal fade " id="addnews" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog-1 modal-full" role="document">
        <ValidationObserver ref="observer" v-slot="{ validate }">
            <form @submit.prevent="validate().then(submit)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เขียนข่าว</h5>

                    </div>
                    <div class="modal-body   p-1">


            

                    </div><!-- .animated -->
                    <div class="content">
                        <div class="animated fadeIn">
                            <!--div class="row"-->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-plus-circle" style="font-size:30px"></i>&nbsp;<strong>เพิ่มข่าว</strong>
                                        <!--2-->
                                    </div>
                                    <div class="card-body card-block">

                                        <br>
                                        <ValidationProvider v-slot="{errors}" name="topic_input" rules="required">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="topic_input" class=" form-control-label">หัวข้อ :</label></div>
                                            <div class="col-12 col-md-9"><input type="text" v-model="form.topic" id="topic_input" name="topic_input" class="form-control"><small class="help-block form-text"></small></div>
                                          <span class="error">{{ errors[0] }}</span>  
                                        </div>
                                         </ValidationProvider>

                                        <ValidationProvider v-slot="{errors}" name="detail_input" rules="required">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="detail_input" class=" form-control-label">รายละเอียดข่าว :</label></div>
                                            <div class="col-12 col-md-9"><textarea v-model="form.detail" id="detail_input" name="detail_input" class="form-control"></textarea><small class="help-block form-text"></small></div>
                                          <span class="error">{{ errors[0] }}</span>   
                                        </div>
                                         </ValidationProvider>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .animated -->
                    <div class="modal-footer">
                        <button class="btn btn-primary">บันทึกข้อมูล</button>
                        <button type="button" @click="closemodal()" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
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
                topic:'',
                detail :'',
                pic :'',
               
            }
        }
    },
    created() {},
    methods: {
        async submit() {
             //console.log(this.form);
            axios.post('/submitcreatenews', this.form).then(res => {
                console.log(res.data);
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
            $('#addnews').modal().hide();
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
