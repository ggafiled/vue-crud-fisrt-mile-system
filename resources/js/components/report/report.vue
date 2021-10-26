<template>
  <section class="content">
    <div class="container-fluid">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <span class="mdi mdi-progress-wrench"></span>
              Report Management
            </h3>
            <div class="card-tools">
              <button
                type="button"
                class="btn btn-sm btn-primary"
                @click="newModal"
              >
                <i class="fa fa-plus-square"></i>
                {{ translate("progress.addnew") }}
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table
                id="progress"
                ref="progress"
                class="display nowrap"
                style="width: 100%"
              >
                <thead>
                  <tr class="info">
                    <th></th>
                    <th>Project Name</th>
                    <th>Status Contrater</th>
                    <th>Date Connect</th>
                    <th>Date Disconnect</th>
                    <th>Work Sheet</th>
                    <th>Remark Account</th>
                    <th>Update At</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
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
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!editmode">
                {{ translate("progress.create.header") }}
              </h5>
              <h5 class="modal-title" v-show="editmode">
                {{ translate("progress.update.header") }}
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

            <form
              @submit.prevent="editmode ? updateProgress() : createProgress()"
            >
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-2" v-show="editmode">
                    <div class="form-group">
                      <label>Building ID</label>
                      <input
                        v-model="form.id"
                        type="text"
                        class="form-control"
                        placeholder="Enter your building id..."
                        readonly
                        :class="{
                          'is-invalid': form.errors.has('id'),
                        }"
                      />
                    </div>
                  </div>
                  <div :class="[editmode ? 'col-sm-10' : 'col-sm-12']">
                    <div class="form-group">
                      <label>Project Name</label>
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
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Status</label>
                      <small>/สถานะ</small>
                      <input
                        v-model="form.nameManager"
                        type="text"
                        class="form-control"
                        placeholder="สถานะ"
                        :class="{
                          'is-invalid': form.errors.has('nameManager'),
                        }"
                      />
                      <has-error :form="form" field="nameManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Date Connect</label>
                      <small>/ วันที่เชื่อมต่อ</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="วันที่เชื่อมต่อ"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Date Disconnect</label>
                      <small>/ วันที่ตัดการเชื่อมต่อ</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="วันที่ตัดการเชื่อมต่อ"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Work Sheet</label>
                      <small>/ใบงาน</small>
                      <input
                        v-model="form.phoneManager"
                        type="text"
                        class="form-control"
                        placeholder="ใบงาน"
                        :class="{
                          'is-invalid': form.errors.has('phoneManager'),
                        }"
                      />
                      <has-error :form="form" field="phoneManager"></has-error>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Remark (Account)</label>
                      <small>/รีมาร์ค</small>
                      <textarea
                        id="remark"
                        v-model="form.reMarkAccount"
                        class="form-control"
                        placeholder="-"
                        :class="{
                          'is-invalid': form.errors.has('reMarkAccount'),
                        }"
                      />
                      <has-error :form="form" field="reMarkAccount"></has-error>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  {{ translate("progress.actions.close") }}
                </button>
                <button v-show="editmode" type="submit" class="btn btn-success">
                  {{ translate("progress.actions.update") }}
                </button>
                <button
                  v-show="!editmode"
                  type="submit"
                  class="btn btn-primary"
                >
                  {{ translate("progress.actions.create") }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { mapGetters, mapState } from "vuex";
import Select2 from "v-select2-component";
export default {
  title: "Progress -",
  components: { Select2 },
  data() {
    return {
      loader: null,
      editmode: false,
      selected: "",
      building: [],
      generatingactions: [],
      settings: {
        placeholder: { id: "-1", text: "-----กรุณาเลือกโครงการ-----" },
        allowClear: false,
        dropdownParent: ".modal",
      },
      sportsData: ["Badminton", "Cricket", "Football", "Golf", "Tennis"],
      form: new Form({
        id: "",
        //Relationship In TableProgress
        building_id: "", //modelBuilding->modelProgress GET field projectName
        fmProgress_id: "", //modelGeneratingaction->modelProgress GET field status
        totProgress_id: "", //modelGeneratingaction->modelProgress GET field status
        aisProgress_id: "", //modelGeneratingaction->modelProgress GET field status
        progress3bb_id: "", //modelGeneratingaction->modelProgress GET field status
        sinetProgress_id: "", //modelGeneratingaction->modelProgress GET field status
        fnProgress_id: "", //modelGeneratingaction->modelProgress GET field status
        trueProgress_id: "", //modelGeneratingaction->modelProgress GET field status
        txrtProgress_id: "", //modelGeneratingaction->modelProgress GET field status
        projectName: "",
        fmProgress: "",
        totProgress: "",
        aisProgress: "",
        Progress3bb: "",
        sinetProgress: "",
        fnProgress: "",
        trueProgress: "",
        txrtProgress: "",
        dateFm: new Date().toISOString().slice(0, 10),
        dateTot: new Date().toISOString().slice(0, 10),
        dateAis: new Date().toISOString().slice(0, 10),
        date3BB: new Date().toISOString().slice(0, 10),
        dateSinet: new Date().toISOString().slice(0, 10),
        dateFn: new Date().toISOString().slice(0, 10),
        dateTrue: new Date().toISOString().slice(0, 10),
        dateTxrx: new Date().toISOString().slice(0, 10),
      }),
    };
  },
  computed: {
    ...mapGetters(["progress"]),
    ...mapState(["progress"]),
  },
  methods: {
    setSearchText(query) {
      if (!!query.task) {
        $(this.$refs.progress).DataTable().search(query.task).draw();
      }
    },
    loadGeneratingaction() {
      axios.get("/generatingactions").then((response) => {
        this.generatingactions = response.data.data;
      });
    },
    loadBuildings() {
      axios.get("/progress/retrieveBuilding").then(
        (response) =>
          (this.building = response.data.data.map((a) => {
            return { text: a.projectName, id: a.id };
          }))
      );
    },
    loadProgress() {
      this.$Progress.start();

      if (this.$gate.isAdmin()) {
        this.$store.dispatch("GET_BUILDINGS");
        $("#progress").DataTable().ajax.reload();
      }

      this.$Progress.finish();
    },
    updateProgress() {
      this.$Progress.start();
      // console.log('Editing data');
      this.form
        .put("/progress/" + this.form.id)
        .then((response) => {
          // success
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.$Progress.finish();
          //  Fire.$emit('AfterCreate');

          this.loadProgress();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    editModal(progress) {
      this.editmode = true;
      this.form.reset();
      this.form.errors.clear();
      progress.projectName = progress.building.projectName;
      $("#addNew").modal("show");
      this.form.fill(progress);
    },
    newModal() {
      this.editmode = false;
      this.selected = "";
      this.form.reset();
      $("#addNew").modal("show");
    },
    deleteProgress(item) {
      item.projectName = item.building.projectName;
      Swal.fire({
        title: window.translate("progress.alert.delete_building_title"),
        text:
          window.translate("progress.alert.delete_building_text") +
          ` [${item.projectName}]`,
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        cancelButtonText: window.translate(
          "progress.alert.delete_building_cancel_button_text"
        ),
        confirmButtonText: window.translate(
          "progress.alert.delete_building_confirm_button_text"
        ),
      }).then((result) => {
        // Send request to the server
        if (result.value) {
          this.form
            .delete("/progress/" + item.id)
            .then(() => {
              Swal.fire(
                window.translate("progress.alert.comfirm_delete_title"),
                window.translate("progress.alert.confirm_delete_message"),
                "success"
              );
              // Fire.$emit('AfterCreate');
              this.loadProgress();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },
    createProgress() {
      if (this.selected == null || this.selected == undefined) return false;
      this.form
        .post("/progress")
        .then((response) => {
          $("#addNew").modal("hide");

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$Progress.finish();
          this.loadProgress();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
    generateTable() {
      var vm = this;
      var table = $(this.$refs.progress).DataTable({
        dom: "Blfrtip",
        ajax: "/api/progress",
        responsive: true,
        processing: true,
        autoWidth: true,
        scrollX: true,
        pageLength: 10,
        lengthMenu: [
          [10, 15, 25, 50, -1],
          [10, 15, 25, 50, "All"],
        ],
        fixedHeader: true,
        fixedColumns: true,
        fixedColumns: {
          leftColumns: 2,
          rightColumns: 3,
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
            data: "building.projectName",
          },
          {
            data: "fm_progress.name",
          },
          {
            data: "dateFm",
          },
          {
            data: "tot_progress.name",
          },
          {
            data: "dateTot",
          },
          {
            data: "ais_progress.name",
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
              return "<a class='edit-progress btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-progress btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
            },
          },
        ],
        fnDrawCallback: function () {
          $("#loading").hide();
          var api = this.api();
          setTimeout(function () {
            api
              .columns()
              .flatten()
              .each(function (colIdx) {
                var columnData = api.columns(colIdx).data().join("");
                if (
                  columnData.length == api.rows().count() - 1 &&
                  colIdx != 0
                ) {
                  api.column(colIdx).visible(false);
                }
              });
          }, 0);
        },
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

      $("tbody", this.$refs.progress).on(
        "click",
        ".edit-progress",
        function (e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          var row = table.row(tr);
          vm.editModal(row.data());
        }
      );

      $("tbody", this.$refs.progress).on(
        "click",
        ".delete-progress",
        function (e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          var row = table.row(tr);
          vm.deleteProgress(row.data());
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
    this.setSearchText(this.$route.query);
    $(".datepicker").datepicker({
      language: "th-th",
      format: "dd/mm/yyyy",
      autoclose: true,
    });
    setTimeout(() => {
      LoadingWait.close();
    }, 3000);
  },
};
</script>
