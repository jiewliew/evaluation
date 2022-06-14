<template>
  <div
    class="modal fade"
    id="question"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
  >
    <div class="modal-dialog-1 modal-full" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">ทำแบบทดสอบ-</h5>
            <button @click="closemodal()" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
        </div>
        <div class="modal-body p-1">
          <div id="app" class="ui container">
            <div>
           
              <br />
              <div class="row">
             

                <div class="col-md-4">
                  <select class="form-control" @change="changedata($event)">
                    <option>เลือกหัวข้อ</option>
                    <option
                      :value="typequestions.evalution_id"
                      v-for="(typequestions, index) in typequestion"
                      :key="index"
                    >
                      {{ typequestions.evalution_question_form_detail }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <vuetable
              ref="vuetable"
              :api-mode="false"
              :fields="fields"
              :css="css.table"
              :per-page="perPage"
              :data-manager="dataManager"
              pagination-path="pagination"
              @vuetable:pagination-data="onPaginationData"
            >
              <div slot="index" slot-scope="props">
                {{ props.index + 1 }}
              </div>
              <div slot="detail" slot-scope="props">
                {{ props.rowData.detail }}
              </div>
              <div slot="actions" slot-scope="props">
                <input
                  type="radio"
                  :value="dataTrick[props.rowData.id]"
                  :name="props.rowData.actions"
                  :id="props.rowData.actions"
                  @click="trick(props.rowData)"
                />
                ผ่าน
                <input
                  type="radio"
                  :value="dataTrick[props.rowData.id]"
                  :name="props.rowData.actions"
                  :id="props.rowData.actions"
                  @click="Ontrick(props.rowData)"
                />
                ไม่ผ่าน
              </div>
            </vuetable>
            <div style="padding-top: 10px">
              <vuetable-pagination
                ref="pagination"
                :css="css.pagination"
                @vuetable-pagination:change-page="onChangePage"
              ></vuetable-pagination>
            </div>
            <div align="center">
              <button
                type="button"
                class="btn btn-primary"
                @click="submitinsurance()"
              >
                บันทึกข้อมูล
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>
</template>

<script>
import Vuetable from "vuetable-2";
import VuetablePagination from "vuetable-2/src/components/VuetablePagination";
import Autocomplete from "@trevoreyre/autocomplete-vue";
import { mapActions, mapGetters } from "vuex";
import Swal from "sweetalert2/dist/sweetalert2.js";

import "sweetalert2/src/sweetalert2.scss";
import axios from "axios";
import _ from "lodash";

export default {
  name: "app",

  components: {
    Vuetable,
    VuetablePagination,
    Autocomplete,
  },

  data() {
    return {
      year: "",
      typequestion: [],
      dataTrick: [],
      evalution_id: "",
      form: {
        stu_id: "",
        stu_name: "",
        stu_last: "",
        fullname: "",
      },
      fields: [
        {
          name: "key",
          title: "ลำดับ",
        },

        {
          name: "detail_indicator",
          title: "ช่วงอายุ",
          titleClass: "center aligned",
        },
        {
          name: "detail",
          title: "แบบประเมิน",
        },
        {
          name: "actions",
          title: "ประเมิน",
        },
      ],
      perPage: 100,

      css: {
        table: {
          tableClass: "table table-striped table-bordered table-hovered",
          loadingClass: "loading",
          ascendingIcon: "glyphicon glyphicon-chevron-up",
          descendingIcon: "glyphicon glyphicon-chevron-down",
          handleIcon: "glyphicon glyphicon-menu-hamburger",
        },
        pagination: {
          infoClass: "pull-left",
          wrapperClass: "vuetable-pagination pull-right",
          activeClass: "btn-primary",
          disabledClass: "disabled",
          pageClass: "btn btn-border",
          linkClass: "btn btn-border",
          icons: {
            first: "",
            prev: "",
            next: "",
            last: "",
          },
        },
      },
    };
  },

  watch: {
    data(newVal, oldVal) {
      this.$refs.vuetable.refresh();
    },
  },

 async mounted() {
    // axios.get("/getquestion").then((response) => {
    //   this.data = response.data;
    // });
     const data = await axios.get("dataevalution");

      this.typequestion = data.data;
  },

  computed: {
    ...mapGetters({
      data: "insurance/dataquestion",
      stu_id :"registerorder/stu_id"
    }),
  },

  methods: {
    ...mapActions("registerorder", ["saveregisterorder"]),
     closemodal() {
            $('#question').modal().hide();
            $('.modal-backdrop').hide();
        },
    changedata(event) {
      this.dataTrick = [];
      this.evalution_id = event.target.value;
      const data = {
        evalution_id: event.target.value,
        year: this.year,
        stu_id: this.form.stu_id,
      };

      this.$store.dispatch("insurance/getquestion", data);
    },
    trick(data) {
      let getData = {};
      const checkData = this.dataTrick.find((res) => res.id == data.id);

      if (typeof checkData == "undefined") {
        getData.action = "ผ่าน";
        getData.id = data.id;
        getData.detail = data.detail;
        getData.indicator_detail = data.detail;
        this.dataTrick.push(getData);
        console.log(this.dataTrick);
      } else if (checkData.action == "ไม่ผ่าน") {
        this.dataTrick.map((res) => {
          if (res.id == data.id) {
            res.action = "ผ่าน";
          }
        });
      }
    },
    Ontrick(data) {
      let getData = {};
      const checkData = this.dataTrick.find((res) => res.id == data.id);

      if (typeof checkData == "undefined") {
        getData.action = "ไม่ผ่าน";
        getData.id = data.id;
        getData.detail = data.detail;
        getData.indicator_detail = data.detail;
        this.dataTrick.push(getData);
      } else if (checkData.action == "ผ่าน") {
        this.dataTrick.map((res) => {
          if (res.id == data.id) {
            res.action = "ไม่ผ่าน";
          }
        });
      }
    },
    onPaginationData(paginationData) {
      this.$refs.pagination.setPaginationData(paginationData);
    },
    onChangePage(page) {
      this.$refs.vuetable.changePage(page);
    },
    dataManager(sortOrder, pagination) {
      let local = this.data;
      if (this.data.length < 1) {
        return {
          data: _.slice(local, from, to),
        };
      }

      // sortOrder can be empty, so we have to check for that as well
      if (sortOrder.length > 0) {
        local = _.orderBy(
          local,
          sortOrder[0].sortField,
          sortOrder[0].direction
        );
      }

      pagination = this.$refs.vuetable.makePagination(
        local.length,
        this.perPage
      );
      let from = pagination.from - 1;
      let to = from + this.perPage;

      return {
        pagination: pagination,
        data: _.slice(local, from, to),
      };
    },
    onActionClicked(action, data) {
      console.log("slot actions: on-click", data.name);
    },
    async onSubmit(result) {
    },
    search(input) {
      const url = `/getstudent/${encodeURI(input)}`;

      return new Promise((resolve) => {
        if (input.length < 3) {
          return resolve([]);
        }
        fetch(url)
          .then((response) => response.json())
          .then((data) => {
            console.log(data);
            resolve(data);
          });
      });
    },
    getResultValue(result) {
      return result.stu_name + " " + result.stu_last;
    },
    submitinsurance() {
        console.log(this.stu_id);
      if (this.dataTrick.length != this.data.length) {
        Swal.fire({
          icon: "info",
          title: "กรุณาประเมินให้ครบทุกข้อ",
          text: "กรุณาประเมินให้ครบทุกข้อ!",
        });
      } else {
        const data = {
          stu_id: this.stu_id,
          data: this.dataTrick,
          evalution_id: this.evalution_id,
        };
        this.$store.commit("registerorder/addform", data);
        this.saveregisterorder()
          .then((res) => {
            if (res.data.status == 200) {
              Swal.fire({
                icon: "success",
                title: "บันทึกข้อมูลเรียบร้อย",
                text: "บันทึกข้อมูลเรียบร้อย!",
              });
              window.location.reload();
            }
          })
          .catch((e) => {
            console.log(e);
          });
      }
    },
  },
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 20px;
}
button.ui.button {
  padding: 8px 3px 8px 10px;
  margin-top: 1px;
  margin-bottom: 1px;
}
</style>
