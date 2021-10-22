<template>
  <section class="content">
    <div class="container-fluid">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">
              <i class="fas fa-fw bi bi-aspect-ratio"></i>
              Contractor 
            </h2>
            <div class="card-tools">
              <button
                type="button"
                class="btn btn-sm btn-primary"
                @click="dowloadExcelTemplate"
              >
                <i class="fa fa-download" aria-hidden="true"></i>
                {{ translate("constitution.download") }}
              </button>
              <button
                type="button"
                class="btn btn-sm btn-primary"
                @click="newModal"
              >
                <i class="fa fa-plus-square"></i>
                {{ translate("constitution.addnew") }}
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="card-body m-0">
              <div class="row">
                <button
                  type="button"
                  class="dt-button"
                  @click.prevent="goToImportPanel"
                >
                  <i class="fa fa-upload" aria-hidden="true"></i>
                  {{ translate("constitution.import") }}
                </button>
              </div>
            </div>
            <div class="table-responsive">
              <table
                id="constarution"
                ref="constarution"
                class="display nowrap"
                style="width: 100%"
              >
                <thead>
                  <tr class="info">
                    <th></th>
                    <th>Project Name</th>
                    <th>callverStatus</th>
                    <th>problemsolution</th>
                    <th>confirmAppointment</th>
                    <th>appointmentTimeCustomer</th>
                    <th>reMarkzone</th>
                    <th>equipmentInstall1</th>
                    <th>snInstall1</th>
                    <th>equipmentInstall2</th>
                    <th>snInstall2</th>
                    <th>equipmentInstall3</th>
                    <th>snInstall3</th>
                    <th>equipmentInstall4</th>
                    <th>snInstall4</th>
                    <th>equipmentInstall5</th>
                    <th>snInstall5</th>
                    <th>equipmentInstall6</th>
                    <th>snInstall6</th>
                    <th>equipmentInstall7</th>
                    <th>snInstall7</th>
                    <th>Update At</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="addNew"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addNew"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!editmode">
                {{ translate("constitution.create.header") }}
              </h5>
              <h5 class="modal-title" v-show="editmode">
                {{ translate("constitution.update.header") }}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <!-- <form @submit.prevent="createUser"> -->

            <form-wizard
              ref="wizard"
              :title="null"
              :subtitle="null"
              color="#4051B7"
              shape="eclipse"
              stepSize="xs"
            >
              <wizard-step
                slot-scope="props"
                slot="step"
                :tab="props.tab"
                :transition="props.transition"
                :index="props.index"
              >
              </wizard-step>
              <tab-content title="Project Names" :selected="true">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Project Name</label>
                      <small>/ชื่อโปรเจ็ค</small>
                      <Select2
                        v-model="form.building_id"
                        :options="building"
                        :settings="settings"
                      >
                      </Select2>
                      <has-error :form="form" field="projectName"></has-error>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Project Name ToT / ชื่อโครงการของทีโอที</label>
                      <br />
                      <label class="radio-inline">
                        <input
                          type="radio"
                          name="totName"
                          checked
                        />ชื่อเดียวกัน
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="totName" />ต่างชื่อกัน
                      </label>
                      <input
                        v-model="form.projectNameTot"
                        type="text"
                        class="form-control"
                        placeholder="ชื่อโครงการของทีโอที"
                        :class="{
                          'is-invalid': form.errors.has('projectNameTot'),
                        }"
                      />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Project Name Ais / ชื่อโครงการของเอไอเอส</label>
                      <br />
                      <label class="radio-inline">
                        <input
                          type="radio"
                          name="aisName"
                          checked
                        />ชื่อเดียวกัน
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="aisName" />ต่างชื่อกัน
                      </label>
                      <input
                        v-model="form.projectNameAis"
                        type="text"
                        class="form-control"
                        placeholder="ชื่อโครงการของทีเอไอเอส"
                        :class="{
                          'is-invalid': form.errors.has('projectNameAis'),
                        }"
                      />
                    </div>
                  </div>
                </div>
              </tab-content>
              <template slot="footer" slot-scope="props">
                <div class="wizard-footer-left">
                  <wizard-button
                    v-if="props.activeTabIndex > 0"
                    @click.native="props.prevTab()"
                    :style="props.fillButtonStyle"
                    >Previous</wizard-button
                  >
                </div>
                <div class="wizard-footer-right">
                  <wizard-button
                    v-if="!props.isLastStep"
                    @click.native="props.nextTab()"
                    class="wizard-footer-right"
                    :style="props.fillButtonStyle"
                    >Next</wizard-button
                  >
                  <wizard-button
                    v-show="editmode && props.isLastStep"
                    class="wizard-footer-right finish-button"
                    :style="props.fillButtonStyle"
                    @click.native="updateConstarution()"
                    :disabled="onprogress"
                  >
                    <span
                      v-show="onprogress"
                      class="spinner-border spinner-border-sm"
                      role="status"
                      aria-hidden="true"
                    ></span>
                    {{ translate("constitution.actions.update") }}
                  </wizard-button>
                  <wizard-button
                    v-show="!editmode && props.isLastStep"
                    class="wizard-footer-right finish-button"
                    :style="props.fillButtonStyle"
                    @click.native="createConstarution()"
                    :disabled="onprogress"
                  >
                    <span
                      v-show="onprogress"
                      class="spinner-border spinner-border-sm"
                      role="status"
                      aria-hidden="true"
                    ></span>
                    {{ translate("constitution.actions.create") }}
                  </wizard-button>
                </div>
              </template>
            </form-wizard>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Select2 from "v-select2-component";
import Uploader from "vux-uploader-component";
import { mapGetters, mapState } from "vuex";
import NumberInput from "../partials/NumberInput.vue";

export default {
  title: "Constarution -",
  components: { Select2, Uploader, NumberInput },

  data() {
    return {
      loader: null,
      openWindowPortal: false,
      editmode: false,
      onprogress: false,
      selected: "",
      building: [],
      generatingactions: [],
      teamserways: [],
      fileList: [],
      settings: {
        placeholder: { id: "-1", text: "-----กรุณาเลือกโครงการ-----" },
        allowClear: false,
        dropdownParent: ".modal",
      },
      sportsData: ["Badminton", "Cricket", "Football", "Golf", "Tennis"],
      form: new Form({
        id: "",
        building_id: "",
        projectName: "",
        customer_id: "",
        callverStatus_id: "",
        problemsolution_id: "",
        confirmAppointment: "",
        appointmentTimeCustomer: "",
        reMarkzone: "",
        equipmentInstall1: "",
        snInstall1: "",
        equipmentInstall2: "",
        snInstall2: "",
        equipmentInstall3: "",
        snInstall3: "",
        equipmentInstall4: "",
        snInstall4: "",
        equipmentInstall5: "",
        snInstall5: "",
        equipmentInstall6: "",
        snInstall6: "",
        equipmentInstall7: "",
        snInstall7: "",
      }),
    };
  },
  methods: {
    goToImportPanel() {
      this.$router.push({ path: "importData" });
    },
    loadGeneratingaction() {
      axios.get("/generatingactions").then((response) => {
        this.generatingactions = response.data.data;
      });
    },
    loadTeamserway() {
      axios.get("/teamserways").then((response) => {
        this.teamserways = response.data.data;
      });
    },
    loadBuildings() {
      axios.get("/constarution/retrieveBuilding").then(
        (response) =>
          (this.building = response.data.data.map((a) => {
            return { text: a.projectName, id: a.id };
          }))
      );
    },
    loadConstarution() {
      this.$Progress.start();

      if (this.$gate.isAdmin()) {
        $("#constarution").DataTable().ajax.reload();
      }

      this.$Progress.finish();
    },
    async updateConstarution() {
      this.$Progress.start();
      // console.log('Editing data');
      this.onprogress = true;
      await this.form
        .put("/constarution/" + this.form.id)
        .then((response) => {
          // success
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.$Progress.finish();
          //  Fire.$emit('AfterCreate');

          this.loadConstarution();
        })
        .catch(() => {
          this.$Progress.fail();
        });
      setTimeout(() => {
        this.onprogress = false;
      }, 2000);
    },
    editModal(constarution) {
      this.editmode = true;
      this.form.reset();
      this.form.errors.clear();
      console.log(constarution);
      $("#addNew").modal("show");
      this.form.fill(constarution);
    },
    newModal() {
      this.editmode = false;
      this.selected = "";
      this.form.reset();
      $("#addNew").modal("show");
    },
    deleteConstarution(item) {
      Swal.fire({
        title: window.translate("constitution.alert.delete_building_title"),
        text:
          window.translate("constitution.alert.delete_building_text") +
          ` [${item.building.projectName}]`,
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        cancelButtonText: window.translate(
          "constitution.alert.delete_building_cancel_button_text"
        ),
        confirmButtonText: window.translate(
          "constitution.alert.delete_building_confirm_button_text"
        ),
      }).then((result) => {
        // Send request to the server
        if (result.value) {
          this.form
            .delete("/constarution/" + item.id)
            .then(() => {
              Swal.fire(
                window.translate("constitution.alert.comfirm_delete_title"),
                window.translate("constitution.alert.confirm_delete_message"),
                "success"
              );
              // Fire.$emit('AfterCreate');
              this.loadBuildings();
              this.loadConstarution();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },
    async createConstarution() {
      if (this.selected == null || this.selected == undefined) return false;
      this.onprogress = true;
      await this.form
        .post("/constarution")
        .then((response) => {
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.loadConstarution();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
      setTimeout(() => {
        this.onprogress = false;
      }, 2000);
    },
    generateTable() {
      var vm = this;
      var table = $(this.$refs.constarution).DataTable({
        dom: "Blfrtip",
        ajax: "/api/constarution",
        responsive: true,
        processing: true,
        pageLength: 10,
        lengthMenu: [
          [10, 15, 25, 50, -1],
          [10, 15, 25, 50, "All"],
        ],
        fixedHeader: true,
        fixedColumns: true,
        fixedColumns: {
          leftColumns: 2,
          rightColumns: 1,
        },
        scrollX: true,
        scrollCollapse: true,
        select: true,
        buttons: [
          "colvis",
          {
            extend: "copy",
            text: "<i class='bi bi-clipboard mr-1'></i>Copy",
            exportOptions: {
              columns: "th:not(.notexport)",
            },
          },
          {
            extend: "excelHtml5",
            autoFilter: true,
            sheetName: "Building",
            text: "<i class='bi bi-file-earmark-excel mr-1'></i>Excel",
            exportOptions: {
              columns: "th:not(.notexport)",
            },
          },
          {
            extend: "print",
            text: "<i class='bi bi-printer mr-1'></i>Print",
          },
          {
            text:
              "<i class='bi bi-list-check mr-1'></i>" +
              window.translate(
                "datatables.alert.display_selected_record_title"
              ) +
              "",
            action: function (e, dt, node, config) {
              var rowsel = dt
                .rows({ selected: true })
                .data()
                .map(function (item) {
                  return item.id;
                })
                .join(",");
              if (!rowsel.length) {
                return Swal.fire({
                  title: window.translate(
                    "datatables.alert.display_selected_record_empty_title"
                  ),
                  text: window.translate(
                    "datatables.alert.display_selected_record_empty_text"
                  ),
                  timer: 2000,
                  showCancelButton: false,
                  showConfirmButton: false,
                });
              }
              $.fn.dataTable.ext.search.pop();
              $.fn.dataTable.ext.search.push(function (
                settings,
                data,
                dataIndex
              ) {
                return $(table.row(dataIndex).node()).hasClass("selected")
                  ? true
                  : false;
              });

              table.draw();
            },
          },
          {
            text: "<i class='bi bi-arrow-repeat mr-1'></i>Refresh",
            action: function (e, dt, node, config) {
              console.info("button: Clear");
              $.fn.dataTable.ext.search.pop();
              dt.search("").draw();
              dt.columns().search("").draw();
              dt.rows().deselect();
              dt.ajax.reload();
            },
          },
        ],
        columns: [
          {
            data: null,
            defaultContent: "",
            className: "dt-body-center notexport",
          },
          {
            data: "building[0].projectName"
          },
          {
            data: "callverStatus_id"
          },
          {
            data: "problemsolution_id"
          },
          {
            data: "confirmAppointment"
          },
          {
            data: "appointmentTimeCustomer"
          },
          {
            data: "reMarkzone",
          },
          {
            data: "equipmentInstall1"
          },
          {
            data: "snInstall1"
          },
          {
            data: "equipmentInstall2"
          },
          {
            data: "snInstall2"
          },
          {
            data: "equipmentInstall3"
          },
          {
            data: "snInstall3"
          },
          {
            data: "equipmentInstall4"
          },
          {
            data: "snInstall4"
          },
          {
            data: "equipmentInstall5"
          },
          {
            data: "snInstall5"
          },
          {
            data: "equipmentInstall6"
          },
          {
            data: "snInstall6"
          },
          {
            data: "equipmentInstall7"
          },
          {
            data: "snInstall7"
          },
          {
            data: "updated_at",
            render: function (data, type, row, meta) {
              return moment(data).format("MM/DD/YYYY HH:MM");
            },
          },
          {
            data: null,
            className: "dt-body-center notexport",
            render: function (data, type, row, meta) {
              return "<a class='edit-constarution btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-constarution btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
            },
          },
        ],
        columnDefs: [
          {
            targets: 0,
            searchable: false,
            orderable: false,
            className: "dt-body-center",
            checkboxes: {
              selectRow: true,
            },
          },
        ],
        select: { selector: "td:not(:last-child)", style: "os" },
        order: [[1, "desc"]],
      });

      $("tbody", this.$refs.constarution).on(
        "click",
        ".edit-constarution",
        function (e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          var row = table.row(tr);
          vm.editModal(row.data());
        }
      );

      $("tbody", this.$refs.constarution).on(
        "click",
        ".delete-constarution",
        function (e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          var row = table.row(tr);
          vm.deleteConstarution(row.data());
        }
      );
    },
  },
  created() {
    this.$Progress.start();
    LoadingWait.fire();
    this.loadBuildings();
    this.$Progress.finish();
  },
  mounted() {
    this.loadGeneratingaction();
    this.generateTable();
    this.loadTeamserway();
    $(".datepicker").datepicker({
      language: "th-th",
      format: "dd/mm/yyyy",
      autoclose: true,
    });
    setTimeout(() => {
      LoadingWait.close();
    }, 2000);
  },
};
</script>
