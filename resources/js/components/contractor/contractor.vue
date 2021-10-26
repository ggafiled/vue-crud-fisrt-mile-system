<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-fw bi bi-building"></i>
                Constractor Management
              </h3>
              <div class="card-tools">
                <button
                  type="button"
                  class="btn btn-sm btn-primary"
                  @click="newModal"
                >
                  <i class="fa fa-plus-square"></i>
                  {{ translate("building.addnew") }}
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table
                  id="buildings"
                  ref="buildings"
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
            </div>
          </div>
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
                {{ translate("building.create.header") }}
              </h5>
              <h5 class="modal-title" v-show="editmode">
                {{ translate("building.update.header") }}
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
              <tab-content title="Sub-Building" :selected="true">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Project Name</label>
                      <small>/ชื่อโปรเจ็ค</small>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="ชื่อโปรเจ็ค"
                        v-model="form.projectName"
                      />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Callver</label>
                      <small>/โทรยืนยัดนัดหมาย</small>
                      <select
                        class="form-control"
                        v-model="form.progress3bb_id"
                      >
                        <option disabled value="">Select a Class</option>
                        <option
                          :value="item.id"
                          v-for="item in callvers"
                          :key="item.id"
                        >
                          {{ item.callVer }}
                        </option>
                      </select>
                      <has-error :form="form" field="Progress3bb"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Appointment Time</label>
                      <small>/เวลานัดหมาย ในระบบ</small>
                      <input
                        v-model="form.appointmentTimeCustomer"
                        type="time"
                        class="form-control"
                        placeholder="เวลานัดหมาย ในระบบ"
                        :class="{
                          'is-invalid': form.errors.has(
                            'appointmentTimeCustomer'
                          ),
                        }"
                      />
                      <has-error
                        :form="form"
                        field="appointmentTimeCustomer"
                      ></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Callver Status</label>
                      <small>/สถานะการยืนยันนัดหมาย</small>
                     <select
                        class="form-control"
                        v-model="form.aisProgress_id"
                      >
                        <option disabled value="">Select a Class</option>
                        <option
                          :value="item.id"
                          v-for="item in callverstatuses"
                          :key="item.id"
                        >
                          {{ item.callVerStatus }}
                        </option>
                      </select>
                      <has-error :form="form" field="aisProgress"></has-error>
                    </div>
                  </div>
                </div>
              </tab-content>

              <tab-content title="Remark">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Technician</label>
                      <small>/ทีมช่าง</small>
                      <select
                        class="form-control"
                        v-model="form.aisProgress_id"
                      >
                        <option disabled value="">Select a Class</option>
                        <option
                          :value="item.id"
                          v-for="item in technicians"
                          :key="item.id"
                        >
                          {{ item.teamTechnician }}
                        </option>
                      </select>
                      <has-error :form="form" field="aisProgress"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>ID Required</label>
                      <small>/ID ที่ต้องใช้</small>
                      <input
                        v-model="form.idRequired"
                        type="text"
                        class="form-control"
                        placeholder="ID ที่ต้องใช้"
                        :class="{
                          'is-invalid': form.errors.has(
                            'idRequired'
                          ),
                        }"
                      />
                      <has-error
                        :form="form"
                        field="idRequired"
                      ></has-error>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Problemsolution</label>
                      <small>/สถานะงาน</small>
                      <select
                        class="form-control"
                        v-model="form.aisProgress_id"
                      >
                        <option disabled value="">Select a Class</option>
                        <option
                          :value="item.id"
                          v-for="item in problemsolutions"
                          :key="item.id"
                        >
                          {{ item.problemSolution }}
                        </option>
                      </select>
                      <has-error :form="form" field="aisProgress"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Confirm Appointment</label>
                      <small>/วันนัดหมาย</small>
                      <input
                        v-model="form.confirmAppointment"
                        type="text"
                        class="form-control"
                        placeholder="สถานะการยืนยันนัดหมาย"
                        :class="{
                          'is-invalid': form.errors.has('confirmAppointment'),
                        }"
                      />
                      <has-error
                        :form="form"
                        field="confirmAppointment"
                      ></has-error>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Remark (For Zone)</label>
                      <small>/รีมาร์ค</small>
                      <textarea
                        id="remark"
                        v-model="form.remark"
                        class="form-control"
                        placeholder="-"
                        :class="{
                          'is-invalid': form.errors.has('remark'),
                        }"
                      />
                      <has-error :form="form" field="remark"></has-error>
                    </div>
                  </div>
                </div>
              </tab-content>
              <tab-content title="Sale Detail">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Name</label>
                      <small>/อุปกรณ์ที่ใช้ติดตั้ง 1</small>
                      <input
                        v-model="form.nameManager"
                        type="text"
                        class="form-control"
                        placeholder="อุปกรณ์ที่ใช้ติดตั้ง 1"
                        :class="{
                          'is-invalid': form.errors.has('nameManager'),
                        }"
                      />
                      <has-error :form="form" field="nameManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Tel</label>
                      <small>/ S/N ที่ใช้ติดตั้ง 1</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="S/N ที่ใช้ติดตั้ง 1"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Name</label>
                      <small>/อุปกรณ์ที่ใช้ติดตั้ง 2</small>
                      <input
                        v-model="form.nameManager"
                        type="text"
                        class="form-control"
                        placeholder="อุปกรณ์ที่ใช้ติดตั้ง 2"
                        :class="{
                          'is-invalid': form.errors.has('nameManager'),
                        }"
                      />
                      <has-error :form="form" field="nameManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Tel</label>
                      <small>/S/N ที่ใช้ติดตั้ง 2</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="S/N ที่ใช้ติดตั้ง 2"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Name</label>
                      <small>/อุปกรณ์ที่ใช้ติดตั้ง 3</small>
                      <input
                        v-model="form.nameManager"
                        type="text"
                        class="form-control"
                        placeholder="อุปกรณ์ที่ใช้ติดตั้ง 3"
                        :class="{
                          'is-invalid': form.errors.has('nameManager'),
                        }"
                      />
                      <has-error :form="form" field="nameManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Tel</label>
                      <small>/S/N ที่ใช้ติดตั้ง 3</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="S/N ที่ใช้ติดตั้ง 3"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Name</label>
                      <small>/อุปกรณ์ที่ใช้ติดตั้ง 4</small>
                      <input
                        v-model="form.nameManager"
                        type="text"
                        class="form-control"
                        placeholder="อุปกรณ์ที่ใช้ติดตั้ง 4"
                        :class="{
                          'is-invalid': form.errors.has('nameManager'),
                        }"
                      />
                      <has-error :form="form" field="nameManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Tel</label>
                      <small>/S/N ที่ใช้ติดตั้ง 4</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="S/N ที่ใช้ติดตั้ง 4"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Name</label>
                      <small>/อุปกรณ์ที่ใช้ติดตั้ง 5</small>
                      <input
                        v-model="form.nameManager"
                        type="text"
                        class="form-control"
                        placeholder="อุปกรณ์ที่ใช้ติดตั้ง 5"
                        :class="{
                          'is-invalid': form.errors.has('nameManager'),
                        }"
                      />
                      <has-error :form="form" field="nameManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Tel</label>
                      <small>/S/N ที่ใช้ติดตั้ง 5</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="S/N ที่ใช้ติดตั้ง 5"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Name</label>
                      <small>/อุปกรณ์ที่ใช้ติดตั้ง 6</small>
                      <input
                        v-model="form.nameManager"
                        type="text"
                        class="form-control"
                        placeholder="อุปกรณ์ที่ใช้ติดตั้ง 6"
                        :class="{
                          'is-invalid': form.errors.has('nameManager'),
                        }"
                      />
                      <has-error :form="form" field="nameManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Tel</label>
                      <small>/S/N ที่ใช้ติดตั้ง 6</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="S/N ที่ใช้ติดตั้ง 6"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Name</label>
                      <small>/อุปกรณ์ที่ใช้ติดตั้ง 7</small>
                      <input
                        v-model="form.nameManager"
                        type="text"
                        class="form-control"
                        placeholder="อุปกรณ์ที่ใช้ติดตั้ง 7"
                        :class="{
                          'is-invalid': form.errors.has('nameManager'),
                        }"
                      />
                      <has-error :form="form" field="nameManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manager Tel</label>
                      <small>/S/N ที่ใช้ติดตั้ง 7</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="S/N ที่ใช้ติดตั้ง 7"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
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
                    class="btn wizard-footer-right finish-button"
                    :style="props.fillButtonStyle"
                    @click.native="updateBuilding()"
                    :disabled="onprogress"
                  >
                    <span
                      v-show="onprogress"
                      class="spinner-border spinner-border-sm"
                      role="status"
                      aria-hidden="true"
                    ></span>
                    {{ translate("building.actions.update") }}
                  </wizard-button>
                  <wizard-button
                    v-show="!editmode && props.isLastStep"
                    class="btn wizard-footer-right finish-button"
                    :style="props.fillButtonStyle"
                    @click.native="createBuilding()"
                    :disabled="onprogress"
                  >
                    <span
                      v-show="onprogress"
                      class="spinner-border spinner-border-sm"
                      role="status"
                      aria-hidden="true"
                    ></span>
                    {{ translate("building.actions.create") }}
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
import { mapGetters, mapState } from "vuex";
import NumberInput from "../partials/NumberInput.vue";
export default {
  title: "All -",
  components: { NumberInput },
  data() {
    return {
      loader: null,
      openWindowPortal: false,
      editmode: false,
      onprogress: false,
      selected: "",
      areas: [],
      bbns: [],
      area3bbs: [],
      areaTrues: [],
      areaTrueNews: [],
      areaAises: [],
      areaFiberNets: [],
      workTimes: [],
      spendSpaces: [],
      saleFms: [],
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
  computed: {
    ...mapGetters(["buildings"]),
    ...mapState(["buildings"]),
  },
  methods: {
    loadcallver() {
      axios.get("/callvers").then((response) => {
        this.callvers = response.data.data;
      });
    },
    loadcallverStatus() {
      axios.get("/callverstatuses").then((response) => {
        this.callverstatuses = response.data.data;
      });
    },
    loadTechnicians() {
      axios.get("/technicians").then((response) => {
        this.technicians = response.data.data;
      });
    },
    loadProblemsolution() {
      axios.get("/problemsolutions").then((response) => {
        this.problemsolutions = response.data.data;
      });
    },
    loadBuildings() {
      this.$Progress.start();
      if (this.$gate.isAdmin()) {
        this.$store.dispatch("GET_BUILDINGS");
        $("#buildings").DataTable().ajax.reload();
      }
      this.$Progress.finish();
    },
    async updateBuilding() {
      this.$Progress.start();
      // console.log('Editing data');
      this.onprogress = true;
      await this.form
        .put("/building/" + this.form.id)
        .then((response) => {
          // success
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.$Progress.finish();
          //  Fire.$emit('AfterCreate');
          this.loadBuildings();
        })
        .catch(() => {
          this.$Progress.fail();
        });
      setTimeout(() => {
        this.onprogress = false;
      }, 2000);
    },
    editModal(building) {
      this.editmode = true;
      this.form.reset();
      this.form.errors.clear();
      this.$refs.wizard.activateAll();
      building.subbuilding = building.subbuilding;
      console.log(building);
      $("#addNew").modal("show");
      this.form.fill(building);
    },
    openMapPickerLocation() {
      $("#pickermap").modal("show");
    },
    newModal() {
      this.editmode = false;
      this.selected = "";
      this.form.reset();
      this.$refs.wizard.reset();
      this.form.errors.clear();
      $("#addNew").modal("show");
    },
    deleteBuilding(item) {
      Swal.fire({
        title: window.translate("building.alert.delete_building_title"),
        text:
          window.translate("building.alert.delete_building_text") +
          ` [${item.projectName}]`,
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        cancelButtonText: window.translate(
          "building.alert.delete_building_cancel_button_text"
        ),
        confirmButtonText: window.translate(
          "building.alert.delete_building_confirm_button_text"
        ),
      }).then((result) => {
        // Send request to the server
        if (result.value) {
          this.form
            .delete("/building/" + item.id)
            .then(() => {
              Swal.fire(
                window.translate("building.alert.comfirm_delete_title"),
                window.translate("building.alert.confirm_delete_message"),
                "success"
              );
              // Fire.$emit('AfterCreate');
              this.loadBuildings();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },
    async createBuilding() {
      console.log("createBuilding");
      if (this.selected == null || this.selected == undefined) return false;
      this.onprogress = true;
      await this.form
        .post("/building")
        .then((response) => {
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.$Progress.finish();
          this.loadBuildings();
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
      var table = $(this.$refs.buildings).DataTable({
        dom: "Blfrtip",
        ajax: "/api/building",
        responsive: true,
        processing: true,
        autoWidth: true,
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
            className: "bg-danger",
            text: "<i class='bi bi-file-text mr-1'></i>ยังไม่ทำสัญญา",
            action: function (e, dt, node, config) {
              dt.columns(4).search("ยังไม่ได้ทำสัญญา").draw();
            },
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
              if (!rowsel) {
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
            data: "building[0].projectName",
          },
          {
            data: "callverStatus_id",
          },
          {
            data: "problemsolution_id",
          },
          {
            data: "confirmAppointment",
          },
          {
            data: "appointmentTimeCustomer",
          },
          {
            data: "reMarkzone",
          },
          {
            data: "equipmentInstall1",
          },
          {
            data: "snInstall1",
          },
          {
            data: "equipmentInstall2",
          },
          {
            data: "snInstall2",
          },
          {
            data: "equipmentInstall3",
          },
          {
            data: "snInstall3",
          },
          {
            data: "equipmentInstall4",
          },
          {
            data: "snInstall4",
          },
          {
            data: "equipmentInstall5",
          },
          {
            data: "snInstall5",
          },
          {
            data: "equipmentInstall6",
          },
          {
            data: "snInstall6",
          },
          {
            data: "equipmentInstall7",
          },
          {
            data: "snInstall7",
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
      $("tbody", this.$refs.buildings).on(
        "click",
        ".edit-building",
        function (e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          var row = table.row(tr);
          vm.editModal(row.data());
        }
      );
      $("tbody", this.$refs.buildings).on(
        "click",
        ".delete-building",
        function (e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          var row = table.row(tr);
          vm.deleteBuilding(row.data());
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
    const vm = this;
    this.loadcallver();
    this.loadcallverStatus();
    this.loadTechnicians();
    this.loadProblemsolution();
    this.generateTable();
    setTimeout(() => {
      LoadingWait.close();
    }, 3000);
  },
};
</script>
