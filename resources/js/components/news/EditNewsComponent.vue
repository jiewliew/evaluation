<template>
<div class="modal fade " id="editnews" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog-1 modal-full" role="document">
        <ValidationObserver ref="observer" v-slot="{ validate }">
            <form @submit.prevent="validate().then(submit)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขข้อมูลข่าวสาร</h5>
                        <!-- <button @click="closemodal()" class="close"> -->
                    </div>
                    <div class="modal-body   p-1">


            

                    </div><!-- .animated -->
                    <div class="content">
                        <div class="animated fadeIn">
                            <!--div class="row"-->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-plus-circle" style="font-size:30px"></i>&nbsp;<strong>แก้ไขข้อมูล</strong>
                                        <!--2-->
                                    </div>
                                    <div class="card-body card-block">

                                        <br>
                                    <ValidationProvider v-slot="{ errors }" name="N_topic" rules="required">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="topic-input" class=" form-control-label">หัวข้อ :</label></div>
                                            <div class="col-12 col-md-9">
                                            <input type="text" v-model="form.topic" id="topic-input" name="topic-input" class="form-control"><small class="help-block form-text"></small></div>
                                          <span class="error">{{ errors[0] }}</span>  
                                        </div>
                                    </ValidationProvider>

                                    <ValidationProvider v-slot="{ errors }" name="N_topic" rules="required">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="detail-input" class=" form-control-label">รายละเอียดข่าว :</label></div>
                                            <div class="col-12 col-md-9"><textarea v-model="form.detail" id="N_detail" name="N_detail" class="form-control"></textarea><small class="help-block form-text"></small></div>
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

</template>

<script>
import axios from 'axios';
import { mapGetters } from "vuex";
export default {

    data() {
    return {
      form: {
        topic: "",
        detail: "",  
      },
    };
  },
    async created() {
        const news = await axios.get('/datanews');
        this.news = news.data;
    },
    created() {},
    methods: {
        async submit() {
            //  console.log(this.form);
            this.form   =  this.news;
            axios.post('/submiteditenews',this.form).then(res => {
                if (res.data.status == 200) {
                    alert('บันทึกข้อมูลสำเร็จ');
                    $("#editnews").modal().hide();
                    $(".modal-backdrop").hide();
                    location.reload();
                } else {
                    alert('บันทึกไม่สำเร็จ');
                }
            }).catch(e => {
                alert('กรุณากรอกข้อมูลให้ครบถ้วน');
            })
        },
        closemodal() {
            $('#editnews').modal().hide();
            $('.modal-backdrop').hide();
        },

    },

    computed: {
    ...mapGetters({
      form: "news/form",
    }),
    },
    // watch:
    // {
    //     form()
    //     {
    //         console.log(this.form);
    //     }
    // }

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
