<template>
<div class="modal fade " id="editdata" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog-1 modal-full" role="document">
        <ValidationObserver ref="observer" v-slot="{ validate }">
            <form @submit.prevent="validate().then(submit)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขข้อมูล-</h5>
                        <button @click="closemodal()" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body   p-1">


                        <div class="content">
                            <div class="animated fadeIn">
                                <!--div class="row"-->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="fa fa-plus-circle" style="font-size:30px"></i>&nbsp;<strong>แก้ไขข้อมูล</strong>
                                            <!--1-->
                                        </div>


                                        <div class="uploadimage">

                                            <div id="image_preview"></div>
                                        </div> <br>
                                        <ValidationProvider v-slot="{errors}" name="evalution_question_form_detail" rules="required">
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ชื่อคำถาม :</label></div>
                                                <div class="col-12 col-md-9"><input type="text"  id="text-input" name="text-input" v-model="data.detail" class="form-control"><small class="form-text text-muted"></small>
                                                    <span class="error">{{ errors[0] }}</span>
                                                </div>
                                            </div>
                                        </ValidationProvider>
                                       
                                      



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
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      form: {
        evalution_question_form_detail: "",
      },
    };
  },
  created() {},
  methods: {
    async submit() {
      // console.log(this.form);
      axios
        .post("/submiteditdata/" + this.data.id, this.data)
        .then((res) => {
          if (res.status == 200) {
            alert("บันทึกข้อมูลสำเร็จ");
            $("#editdata").modal().hide();
            $(".modal-backdrop").hide();
          } else {
            alert("บันทึกไม่สำเร็จ");
          }
        })
        .catch((e) => {
          alert("กรุณากรอกข้อมูลให้ครบถ้วน");
        });
    },
    closemodal() {
      $("#editdata").modal().hide();
      $(".modal-backdrop").hide();
    },
  },
  computed: {
    ...mapGetters({
      data: "assessment/data",
    }),
  },
};
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
