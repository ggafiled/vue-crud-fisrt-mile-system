<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-fw bi bi-people"></i>
                            {{ translate("CUSTOMER MANAGEMENT") }}
                        </h2>
                        <div class="card-tools">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        :class="{
                                            ' is-invalid': error.message
                                        }"
                                        id="input-file-import"
                                        name="file_import"
                                        ref="import_file"
                                        @change="onFileChange"
                                    />
                                    <label class="custom-file-label"
                                        >Choose file for import</label
                                    >
                                </div>
                                <div class="input-group-append">
                                    <button
                                        v-on:click="proceedAction()"
                                        type="button"
                                        class="btn btn-primary"
                                    >
                                        Upload
                                    </button>
                                    &nbsp;
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-primary"
                                        @click="newModal"
                                    >
                                        <i class="fa fa-plus-square"></i>
                                        Add New
                                    </button>
                                </div>
                            </div>
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
                                    <i
                                        class="fa fa-upload"
                                        aria-hidden="true"
                                    ></i>
                                    {{ translate("constitution.import") }}
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table
                                id="customer"
                                ref="customer"
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
                data-backdrop="static"
                data-keyboard="false"
            >
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode">
                                Create New Customer
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Customer's Info
                            </h5>
                            <div
                                class="d-flex flex-row justify-space-between align-items-center text-wrap"
                            >
                                <h5
                                    class="text-muted mr-2"
                                    v-show="form.projectName"
                                >
                                    [{{ form.projectName | limit(60) }}]
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
                            <tab-content
                                title="Customer Detail"
                                :selected="true"
                            >
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <small>/สถานะ</small>
                                            <select
                                                v-model="form.statusContrater"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'statusContrater'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="ปิด Port"
                                                    >ปิด Port</option
                                                >
                                                <option value="ยกเลิกงาน"
                                                    >ยกเลิกงาน</option
                                                >
                                                <option value="ยังไม่ปิดงาน"
                                                    >ยังไม่ปิดงาน</option
                                                >
                                                <option value="ทีมช่างไม่ส่งงาน"
                                                    >ทีมช่างไม่ส่งงาน</option
                                                >
                                                <option
                                                    value="ส่งกลับให้แอดมินตรวจสอบ"
                                                    >ส่งกลับให้แอดมินตรวจสอบ</option
                                                >
                                                <option
                                                    value="อื่นๆ โปรดระบุในรีมาร์ค"
                                                    >อื่นๆ
                                                    โปรดระบุในรีมาร์ค</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="statusBuilding"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Date Connect</label>
                                            <small>/ วันที่เชื่อมต่อ</small>
                                            <input
                                                v-model="form.dateConnect"
                                                type="date"
                                                class="form-control"
                                                placeholder="วันที่เชื่อมต่อ"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateConnect'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateConnect"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Date Disconnect</label>
                                            <small
                                                >/ วันที่ตัดการเชื่อมต่อ</small
                                            >
                                            <input
                                                v-model="form.dateDisconnect"
                                                type="date"
                                                class="form-control"
                                                placeholder="วันที่ตัดการเชื่อมต่อ"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateDisconnect'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateDisconnect"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Work Sheet</label>
                                            <small>/ใบงาน</small>
                                            <input
                                                v-model="form.workSheet"
                                                type="text"
                                                class="form-control"
                                                placeholder="ใบงาน"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'workSheet'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="workSheet"
                                            ></has-error>
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
                                                    'is-invalid': form.errors.has(
                                                        'reMarkAccount'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="reMarkAccount"
                                            ></has-error>
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
                                        @click.native="updateCustomer()"
                                        :disabled="onprogress"
                                    >
                                        <span
                                            v-show="onprogress"
                                            class="spinner-border spinner-border-sm"
                                            role="status"
                                            aria-hidden="true"
                                        ></span>
                                        {{
                                            translate(
                                                "constitution.actions.update"
                                            )
                                        }}
                                    </wizard-button>
                                    <wizard-button
                                        v-show="!editmode && props.isLastStep"
                                        class="wizard-footer-right finish-button"
                                        :style="props.fillButtonStyle"
                                        @click.native="createCustomer()"
                                        :disabled="onprogress"
                                    >
                                        <span
                                            v-show="onprogress"
                                            class="spinner-border spinner-border-sm"
                                            role="status"
                                            aria-hidden="true"
                                        ></span>
                                        {{
                                            translate(
                                                "constitution.actions.create"
                                            )
                                        }}
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
// import {en, th} from 'vuejs-datepicker/dist/locale';
import Select2 from "v-select2-component";
import { ValidationHelper } from "vue-step-wizard";
import "vue-step-wizard/dist/vue-step-wizard.css";
import { required } from "vuelidate/lib/validators";
import { email } from "vuelidate/lib/validators";
import { numeric } from "vuelidate/lib/validators";
// import Datepicker from 'vuejs-datepicker';

export default {
    title: "Customer -",
    name: "StepFormValidation",
    components: { Select2 /*Datepicker*/ },
    mixins: [ValidationHelper],
    data() {
        return {
            // en: en,
            // th: th,
            error: {},
            import_file: "",
            loader: null,
            editmode: false,
            onprogress: false,
            selected: "",
            building: [],
            zone: [],
            jobtpyes: [],
            isps: [],
            settings: {
                placeholder: { id: "-1", text: "-----กรุณาเลือกโครงการ-----" },
                allowClear: false,
                dropdownParent: ".modal"
            },
            form: new Form({
                id: "",
                building_id: "",
                isp_id: "",
                agentDetail_id: "",
                jobtype_id: "",
                zone_id: "",
                zone2_id: "",
                ispId_id: "",
                projectName: "",
                isp: "",
                agentDetail: "",
                jobtype: "",
                zone: "",
                zone2: "",
                ispId: "",
                type: "",
                name: "",
                surname: "",
                tel: "",
                tel2: "",
                theBuilding: "",
                floor: "",
                room: "",
                circuit: "",
                entranceFee: "",
                appointmentDate: new Date().toISOString().slice(0, 10),
                appointmentTime: moment()
                    .add(10 - (new Date().getMinutes() % 10), "minutes")
                    .format("H:mm"),
                status: "-",
                subStatus: "-",
                reMark: "-",

                callver_id: "1",
                callver: "1",
                callverStatus_id: "1",
                callverStatus: "",
                problemsolution_id: "1",
                appointmentTimeCustomer: moment()
                    .add(10 - (new Date().getMinutes() % 10), "minutes")
                    .format("H:mm"),
                problemsolution: "",
                idRequired: "",
                confirmAppointment: new Date().toISOString().slice(0, 10),
                confirmAppointmentTime: moment()
                    .add(10 - (new Date().getMinutes() % 10), "minutes")
                    .format("H:mm"),
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

                statusContrater: "",
                dateConnect: new Date().toISOString().slice(0, 10),
                dateDisconnect: new Date().toISOString().slice(0, 10),
                workSheet: "",
                reMarkAccount: ""
            })
        };
    },
    methods: {
        onFileChange(e) {
            this.import_file = e.target.files[0];
        },
        proceedAction() {
            let formData = new FormData();
            formData.append("import_file", this.import_file);

            axios
                .post("/customers/import", formData, {
                    headers: { "content-type": "multipart/form-data" }
                })
                .then(response => {
                    if (response.status === 200) {
                        // codes here after the file is upload successfully
                        Toast.fire({
                            icon: "success",
                            title: response.data.message
                        });
                    }
                })
                .catch(() => {
                    Toast.fire({
                        icon: "error",
                        title: "Some error occured! Please try again"
                    });
                });
            setTimeout(() => {
                this.onprogress = false;
            }, 2000);
        },
        loadBuildings() {
            axios.get("/building").then(
                response =>
                    (this.building = response.data.data.map(a => {
                        return { text: a.projectName, id: a.id };
                    }))
            );
        },
        loadCallver() {
            axios.get("/callvers").then(response => {
                this.callvers = response.data.data;
            });
        },
        loadCallverstatus() {
            axios.get("/callverstatuses").then(response => {
                this.callverstatuses = response.data.data;
            });
        },
        loadProblemsolution() {
            axios.get("/problemsolutions").then(response => {
                this.problemsolutions = response.data.data;
            });
        },
        loadZone() {
            axios.get("/zones").then(response => {
                this.zones = response.data.data;
            });
        },
        loadJobType() {
            axios.get("/jobtpyes").then(response => {
                this.jobtpyes = response.data.data;
            });
        },
        loadIsp() {
            axios.get("/isps").then(response => {
                this.isps = response.data.data;
            });
        },
        loadAgent() {
            axios.get("/agents").then(response => {
                this.agents = response.data.data;
            });
        },
        loadPlaning() {
            this.$Progress.start();
            if (this.$gate.isAdmin()) {
                this.$store.dispatch("GET_BUILDINGS");
                $("#customer")
                    .DataTable()
                    .ajax.reload();
            }
            this.$Progress.finish();
        },
        updateCustomer() {
            this.$Progress.start();
            this.onprogress = true;
            // console.log('Editing data');
            this.form
                .put("/planing/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');
                    this.loadPlaning();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            setTimeout(() => {
                this.onprogress = false;
            }, 2000);
        },
        editModal(planing) {
            this.editmode = true;
            this.form.reset();
            this.form.errors.clear();
            // console.log(planing);
            planing.isp_id = planing.isp.id;
            // planing.projectName = planing.building[0].projectName;
            $("#addNew").modal("show");
            this.form.fill(planing);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteCustomer(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete("/planing/" + id)
                        .then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadPlaning();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        createCustomer() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.onprogress = true;
            // console.log(this.form);
            this.form
                .post("/planing")
                .then(response => {
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    this.loadPlaning();
                })
                .catch(() => {
                    Toast.fire({
                        icon: "error",
                        title: "Some error occured! Please try again"
                    });
                });
            setTimeout(() => {
                this.onprogress = false;
            }, 2000);
        },
        generateTable() {
            var vm = this;
            var table = $(this.$refs.customer).DataTable({
                dom: "Blfrtip",
                ajax: "/api/planing",
                responsive: true,
                processing: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 15, 25, 50, -1],
                    [10, 15, 25, 50, "All"]
                ],
                fixedHeader: true,
                fixedColumns: true,
                fixedColumns: {
                    leftColumns: 2,
                    rightColumns: 1
                },
                scrollX: true,
                scrollCollapse: true,
                buttons: [
                    "colvis",
                    "copy",
                    "csv",
                    {
                        extend: "print",
                        text: "<i class='bi bi-printer mr-1'></i>Print"
                    },
                    {
                        extend: "excelHtml5",
                        autoFilter: true,
                        sheetName: "Building",
                        text:
                            "<i class='bi bi-file-earmark-excel mr-1'></i>Excel",
                        exportOptions: {
                            columns: "th:not(.notexport)"
                        }
                    },
                    {
                        text: "<i class='bi bi-arrow-repeat mr-1'></i>Refresh",
                        action: function(e, dt, node, config) {
                            console.info("button: Clear");
                            $.fn.dataTable.ext.search.pop();
                            dt.search("").draw();
                            dt.columns()
                                .search("")
                                .draw();
                            dt.rows().deselect();
                            dt.ajax.reload();
                        }
                    }
                ],
                columns: [
                    {
                        data: null,
                        defaultContent: "",
                        className: "dt-body-center"
                    },
                    {
                        data: "building.projectName"
                    },
                    {
                        data: "statusContrater",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "dateConnect",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "dateDisconnect",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "workSheet",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "reMarkAccount",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: null,
                        className: "dt-body-center",
                        render: function(data, type, row, meta) {
                            return "<a class='edit-customer' href='#'><i class='fa fa-edit blue'></i> </a> / <a class='delete-customer' href='#'> <i class='fa fa-trash red'></i> </a>";
                        }
                    }
                ],
                columnDefs: [
                    {
                        targets: 0,
                        searchable: false,
                        orderable: false,
                        className: "dt-body-center",
                        checkboxes: {
                            selectRow: true
                        }
                    }
                ],
                select: { selector: "td:not(:last-child)", style: "os" },
                order: [[1, "desc"]]
            });
            $("tbody", this.$refs.planing).on(
                "click",
                ".edit-customer",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.editModal(row.data());
                }
            );
            $("tbody", this.$refs.planing).on(
                "click",
                ".delete-customer",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.deleteCustomer(row.data().id);
                }
            );
        }
    },
    created() {
        this.$Progress.start();
        LoadingWait.fire();
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        this.loadProblemsolution();
        this.generateTable();
        this.loadZone();
        this.loadJobType();
        this.loadIsp();
        this.loadCallver();
        this.loadCallverstatus();
        this.loadAgent();
        setTimeout(() => {
            LoadingWait.close();
        }, 2000);
    }
};
</script>
