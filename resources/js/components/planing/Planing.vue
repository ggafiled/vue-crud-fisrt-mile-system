<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            PLANING MANAGEMENT
                        </h3>
                        <div class="card-tools">
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="planing"
                                ref="planing"
                                class="display nowrap"
                                style="width:100%"
                            >
                                <thead>
                                    <tr class="info">
                                        <th>NO</th>
                                        <th>name</th>
                                        <th>surname</th>
                                        <th>tel</th>
                                        <th>tel2</th>
                                        <th>building name</th>
                                        <th>building</th>
                                        <th>floor</th>
                                        <th>room</th>
                                        <th>isp</th>
                                        <th>agent</th>
                                        <th>circuit</th>
                                        <th>entrance Fee</th>
                                        <th>jobType</th>
                                        <th>appointment date</th>
                                        <th>appointment time</th>
                                        <th>technician planing</th>
                                        <th>idRequired</th>
                                        <th>status</th>
                                        <th>subStatus</th>
                                        <th>remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="!$gate.isAdmin()">
                <not-found></not-found>
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
                                Create New Planing
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Planing's Info
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
                            @submit.prevent="
                                editmode ? updatePlaning() : createPlaning()
                            "
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
                                                    'is-invalid': form.errors.has(
                                                        'id'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input
                                                v-model="form.name"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Name..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'name'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="name"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Surname</label>
                                            <input
                                                v-model="form.surname"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your surname..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'surname'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="surname"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tel</label>
                                            <input
                                                v-model="form.tel"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your tel..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'tel'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="tel"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tel2</label>
                                            <input
                                                v-model="form.tel2"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your tel2..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'tel2'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="tel2"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div
                                        :class="[
                                            editmode ? 'col-sm-10' : 'col-sm-12'
                                        ]"
                                    >
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <Select2
                                                v-model="form.building_id"
                                                :options="building"
                                                :settings="settings"
                                            >
                                            </Select2>
                                            <has-error
                                                :form="form"
                                                field="projectName"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Building</label>
                                            <input
                                                v-model="form.theBuilding"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'theBuilding'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="theBuilding"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Floor</label>
                                            <input
                                                v-model="form.floor"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your floor..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'floor'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="floor"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Room</label>
                                            <input
                                                v-model="form.room"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your room..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'room'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="room"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>ISP</label>
                                            <select
                                                v-model="form.isp"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your isp..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'isp'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >เลือก isp</option
                                                >
                                                <option value="AIS">
                                                    AIS
                                                </option>
                                                <option value="TRUE">
                                                    TRUE
                                                </option>
                                                <option value="3BB">
                                                    3BB
                                                </option>
                                                <option value="TOT">
                                                    TOT
                                                </option>
                                                <option value="FN">
                                                    FN
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="isp"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Agent</label>
                                            <input
                                                v-model="form.agent"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your agent..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'agent'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="agent"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Circuit</label>
                                            <input
                                                v-model="form.circuit"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your circuit..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'circuit'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="circuit"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>EntranceFee</label>
                                            <input
                                                v-model="form.entranceFee"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your entrance fee..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'entranceFee'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="entranceFee"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>JobType</label>
                                            <input
                                                v-model="form.jobType"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your jobType..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'jobType'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="jobType"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Appointment Date</label>
                                            <input
                                                v-model="form.appointmentDate"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your appointmentDate..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'appointmentDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="appointmentDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Appointment Time</label>
                                            <input
                                                v-model="form.appointmentTime"
                                                type="time"
                                                class="form-control"
                                                placeholder="Enter your appointment time..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'appointmentTime'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="appointmentTime"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Technician Planing</label>
                                            <input
                                                v-model="form.technicianPlaning"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your technician planing..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'technicianPlaning'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="technicianPlaning"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>ID Required</label>
                                            <select
                                                v-model="form.idRequired"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your idRequired..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'idRequired'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >เลือก ID Required</option
                                                >
                                                <option value="AIS">
                                                    AIS
                                                </option>
                                                <option value="TRUE">
                                                    TRUE
                                                </option>
                                                <option value="3BB">
                                                    3BB
                                                </option>
                                                <option value="TOT">
                                                    TOT
                                                </option>
                                                <option value="FN">
                                                    FN
                                                </option>
                                                <option value="None">
                                                    None
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="idRequired"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select
                                                v-model="form.status"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your status..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'status'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >เลือก status</option
                                                >
                                                <option value="สำเร็จ">
                                                    สำเร็จ
                                                </option>
                                                <option
                                                    value="ลูกค้าเลื่อนหน้างาน"
                                                >
                                                    ลูกค้าเลื่อนหน้างาน
                                                </option>
                                                <option value="นิติฯไม่อนุญาต">
                                                    นิติฯไม่อนุญาต
                                                </option>
                                                <option value="ติดปัญหาหน้างาน">
                                                    ติดปัญหาหน้างาน
                                                </option>
                                                <option
                                                    value="อื่นๆ โปรดระบุในรีมาร์ค"
                                                >
                                                    อื่นๆ โปรดระบุในรีมาร์ค
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="status"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Sub Status</label>
                                            <input
                                                v-model="form.subStatus"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your sub status..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'subStatus'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="subStatus"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Remark</label>
                                            <input
                                                v-model="form.reMark"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your reMark..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'reMark'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="reMark"
                                            ></has-error>
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
                                    Close
                                </button>
                                <button
                                    v-show="editmode"
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    Update
                                </button>
                                <button
                                    v-show="!editmode"
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Create
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
    components: { Select2 },
    data() {
        return {
            editmode: false,
            selected: "",
            building: [],
            settings: {
                placeholder: { id: "-1", text: "-----กรุณาเลือกโครงการ-----" },
                allowClear: true,
                dropdownParent: ".modal"
            },
            sportsData: ["Badminton", "Cricket", "Football", "Golf", "Tennis"],
            form: new Form({
                id: "",
                building_id: "",
                projectName: "",
                name: "",
                surname: "",
                tel: "",
                tel2: "",
                theBuilding: "",
                floor: "",
                room: "",
                isp: "",
                agent: "",
                circuit: "",
                entranceFee: "",
                jobType: "",
                appointmentDate: "",
                appointmentTime: "",
                technicianPlaning: "",
                idRequired: "",
                status: "",
                subStatus: "",
                reMark: ""
            })
        };
    },
    methods: {
        loadBuildings() {
            axios.get("api/building").then(
                response =>
                    (this.building = response.data.data.map(a => {
                        return { text: a.projectName, id: a.id };
                    }))
            );
        },
        loadPlaning() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                //To DO
            }

            this.$Progress.finish();
        },
        updatePlaning() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("api/planing/" + this.form.id)
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
        },
        editModal(planing) {
            this.editmode = true;
            this.form.reset();
            planing.projectName = planing.building[0].projectName;
            $("#addNew").modal("show");
            this.form.fill(planing);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deletePlaning(id) {
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
                        .delete("api/planing/" + id)
                        .then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadPlanings();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        createPlaning() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("api/planing")
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
        }
    },
    created() {
        this.$Progress.start();
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        var vm = this;
        var table = $(this.$refs.planing).DataTable({
            dom: "Blfrtip",
            ajax: "api/planing",
            responsive: true,
            processing: true,
            pageLength: 15,
            lengthMenu: [
                [10, 15, 25, 50, -1],
                [10, 15, 25, 50, "All"]
            ],
            fixedHeader: true,
            fixedColumns: true,
            fixedColumns: {
                leftColumns: 0,
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
                    className: "bg-success",
                    text: "<i class='bi bi-file-text mr-1'></i>AIS",
                    action: function(e, dt, node, config) {
                        dt.column(9)
                            .search("AIS")
                            .draw();
                    }
                },
                {
                    className: "bg-danger",
                    text: "<i class='bi bi-file-text mr-1'></i>TRUE",
                    action: function(e, dt, node, config) {
                        dt.column(9)
                            .search("TRUE")
                            .draw();
                    }
                },
                {
                    className: "bg-primary",
                    text: "<i class='bi bi-file-text mr-1'></i>TOT",
                    action: function(e, dt, node, config) {
                        dt.column(9)
                            .search("TOT")
                            .draw();
                    }
                },
                {
                    className: "bg-warning",
                    text: "<i class='bi bi-file-text mr-1'></i>FN",
                    action: function(e, dt, node, config) {
                        dt.column(9)
                            .search("FN")
                            .draw();
                    }
                },
                {
                    className: "bg-danger",
                    text: "<i class='bi bi-file-text mr-1'></i>3BB",
                    action: function(e, dt, node, config) {
                        dt.column(9)
                            .search("3BB")
                            .draw();
                    }
                },
                {
                    text: "<i class='bi bi-arrow-repeat mr-1'></i>Clear",
                    action: function(e, dt, node, config) {
                        dt.columns()
                            .search("")
                            .draw();
                    }
                }
            ],
            columns: [
                { data: null, defaultContent: "", className: "dt-body-center" },
                {
                    data: "name"
                },
                {
                    data: "surname"
                },
                {
                    data: "tel"
                },
                {
                    data: "tel2"
                },
                {
                    data: "building[0].projectName"
                },
                {
                    data: "theBuilding"
                },
                {
                    data: "floor"
                },
                {
                    data: "room"
                },
                {
                    data: "isp",
                    render: function(data, type, row, meta) {
                        if (data == "AIS") {
                            return (
                                '<span class="badge badge-success">' +
                                data +
                                "</span>"
                            );
                        } else if (data == "TOT") {
                            return (
                                '<span class="badge badge-primary">' +
                                data +
                                "</span>"
                            );
                        } else if (data == "3BB") {
                            return (
                                '<span class="badge badge-danger">' +
                                data +
                                "</span>"
                            );
                        } else if (data == "TRUE") {
                            return (
                                '<span class="badge badge-danger">' +
                                data +
                                "</span>"
                            );
                        } else if (data == "FN") {
                            return (
                                '<span class="badge badge-warning">' +
                                data +
                                "</span>"
                            );
                        } else {
                            return (
                                '<span class="text-warning">' + data + "</span>"
                            );
                        }
                    }
                },
                {
                    data: "agent",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger"><i class="bi bi-phone pr-2"></i>' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return "<span>" + data + "</span>";
                        }
                    }
                },
                {
                    data: "circuit"
                },
                {
                    data: "entranceFee",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger"><i class="bi bi-phone pr-2"></i>' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return "<span>" + data + "฿" + "</span>";
                        }
                    }
                },
                {
                    data: "jobType",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger"><i class="bi bi-phone pr-2"></i>' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return "<span>" + data + "</span>";
                        }
                    }
                },
                {
                    data: "appointmentDate"
                },
                {
                    data: "appointmentTime"
                },
                {
                    data: "technicianPlaning"
                },
                {
                    data: "idRequired"
                },
                {
                    data: "status"
                },
                {
                    data: "subStatus"
                },
                {
                    data: "reMark"
                },
                {
                    data: null,
                    className: "dt-body-center",
                    render: function(data, type, row, meta) {
                        return "<a class='edit-planing' href='#'><i class='fa fa-edit blue'></i> </a> / <a class='delete-planing' href='#'> <i class='fa fa-trash red'></i> </a>";
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

        $("tbody", this.$refs.planing).on("click", ".edit-planing", function() {
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.editModal(row.data());
        });

        $("tbody", this.$refs.planing).on(
            "click",
            ".delete-planing",
            function() {
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deletePlaning(row.data().id);
            }
        );
    }
};
</script>
