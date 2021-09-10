<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">PLANING MANAGEMENT</h3>
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
                                style="width: 100%"
                            >
                                <thead>
                                    <tr class="info">
                                        <th></th>
                                        <th>ชื่อ/บริษัท</th>
                                        <th>นามสกุล</th>
                                        <th>เบอร์ติดต่อหลัก</th>
                                        <th>เบอร์ติดต่อสำรอง</th>
                                        <th>ชื่ออาคาร</th>
                                        <th>บ้านเลขที่</th>
                                        <th>หมู่</th>
                                        <th>ซอย</th>
                                        <th>ถนน</th>
                                        <th>อำเภอ/เขต</th>
                                        <th>จังหวัด</th>
                                        <th>ตำบล/แขวง</th>
                                        <th>รหัสไปรษณีย์</th>
                                        <th>จำนวนอาคาร</th>
                                        <th>จำนวนชั้น</th>
                                        <th>จำนวนห้อง</th>
                                        <th>isp</th>
                                        <th>ตัวแทน/พื้นที่</th>
                                        <th>เลขสมาชิก</th>
                                        <th>ค่าแรกเข้า (฿)</th>
                                        <th>ประเภทงาน</th>
                                        <th>วันนัดหมาย</th>
                                        <th>เวลานัดหมายในระบบ</th>
                                        <th>ทีมช่าง Planing</th>
                                        <th>เบอร์โทร</th>
                                        <th>อีเมลล์</th>
                                        <th>ผู้ให้บริการ</th>
                                        <th>status</th>
                                        <th>subStatus</th>
                                        <th>รีมาร์ค(For Admin)</th>
                                        <th>updated</th>
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
                                            <label>ชื่อ</label>
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
                                            <label>นามสกุล</label>
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
                                    <div
                                        :class="[
                                            editmode ? 'col-sm-2' : 'col-sm-3'
                                        ]"
                                    >
                                        <div class="form-group">
                                            <label>เบอร์โทร</label>
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
                                    <div
                                        :class="[
                                            editmode ? 'col-sm-2' : 'col-sm-3'
                                        ]"
                                    >
                                        <div class="form-group">
                                            <label>เบอร์โทร2</label>
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
                                            editmode ? 'col-sm-12' : 'col-sm-12'
                                        ]"
                                    >
                                        <div class="form-group">
                                            <label>ชื่อตึกอาคาร</label>
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
                                            <label>อาคาร</label>
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
                                            <label>ชั้น</label>
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
                                            <label>ห้อง/เลขที่</label>
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
                                                class="form-control"
                                                v-model="form.isp_id"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in isps"
                                                    :key="item.id"
                                                >
                                                    {{ item.isp }}
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
                                            <label>ตัวแทน/พื้นที่</label>
                                            <select
                                                class="form-control"
                                                v-model="form.agentDetail_id"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in agents"
                                                    :key="item.id"
                                                >
                                                    {{ item.agentDetail }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="agent"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>เลขสมาชิก</label>
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
                                            <label>ค่าแรกเข้า(฿)</label>
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
                                            <label>ประเภทงาน</label>
                                            <select
                                                class="form-control"
                                                v-model="form.jobtype_id"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in jobtpyes"
                                                    :key="item.id"
                                                >
                                                    {{ item.jobType }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="jobType"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>วันนัดหมาย</label>
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
                                            <label>เวลานัดหมาย ในระบบ</label>
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
                                            <label>ชื่อช่าง Planing</label>
                                            <select
                                                class="form-control"
                                                v-model="form.technician_id"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in technicians"
                                                    :key="item.id"
                                                >
                                                    {{ item.teamTechnician }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="technicianPlaning"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>เบอร์โทรช่าง</label>
                                            <input
                                                v-model="form.technician_id"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your phone technician..."
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
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>อีเมลล์ช่าง</label>
                                            <input
                                                v-model="form.technician_id"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your phone technician..."
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
                                    </div> -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>จำนวนการติดต่อ</label>
                                            <select
                                                class="form-control"
                                                v-model="form.callver_id"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in callvers"
                                                    :key="item.id"
                                                >
                                                    {{ item.callVer }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="callver"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>สถานะการติดต่อ</label>
                                            <select
                                                class="form-control"
                                                v-model="form.callverStatus_id"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in callverstatuses"
                                                    :key="item.id"
                                                >
                                                    {{ item.callVerStatus }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="callverstatus"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>ปัญหาและวิธีการแก้ไข</label>
                                            <select
                                                class="form-control"
                                                v-model="form.problemsolution_id"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in problemsolutions"
                                                    :key="item.id"
                                                >
                                                    {{ item.problemSolution }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="problemsolution"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>ID ที่ต้องใช้</label>
                                            <select
                                                class="form-control"
                                                v-model="form.ispId_id"
                                            >
                                                <option value="ispId_id"
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in isps"
                                                    :key="item.id"
                                                >
                                                    {{ item.isp }}
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
                                            <input
                                                v-model="form.status"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your sub status..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'status'
                                                    )
                                                }"
                                            />
                                            <!-- <select
                                                class="form-control"
                                                v-model="form.problemsolution_id"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in problemsolutions"
                                                    :key="item.id"
                                                >
                                                    {{ item.problemSolution }}
                                                </option>
                                            </select> -->
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
                                            <label>รีมาร์ค (For Admin)</label>
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
            technician: [],
            problemsolutions: [],
            technicians: [],
            jobtpyes: [],
            isps: [],
            callvers: [],
            callverstatuses: [],
            agents: [],
            settings: {
                placeholder: { id: "-1", text: "-----กรุณาเลือกโครงการ-----" },
                allowClear: true,
                dropdownParent: ".modal"
            },
            sportsData: ["Badminton", "Cricket", "Football", "Golf", "Tennis"],
            form: new Form({
                id: "",
                building_id: "",
                isp_id: "",
                agentDetail_id: "",
                jobtype_id: "",
                technician_id: "",
                callver_id: "",
                callverStatus_id: "",
                ispId_id: "",
                problemsolution_id: "",
                projectName: "",
                isp: "",
                agentDetail: "",
                jobtype: "",
                technician: "",
                callver: "",
                callverstatus: "",
                ispId: "",
                problemsolution:"",
                name: "",
                surname: "",
                tel: "",
                tel2: "",
                theBuilding: "",
                floor: "",
                room: "",
                circuit: "",
                entranceFee: "",
                appointmentDate: "",
                appointmentTime: "",
                status: "",
                subStatus: "",
                reMark: ""
            })
        };
    },
    methods: {
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
        loadTachnician() {
            axios.get("/technicians").then(response => {
                this.technicians = response.data.data;
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
                $("#planing")
                    .DataTable()
                    .ajax.reload();
            }
            this.$Progress.finish();
        },
        updatePlaning() {
            this.$Progress.start();
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
        createPlaning() {
            if (this.selected == null || this.selected == undefined)
                return false;
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
        },
        generateTable() {
            var vm = this;
            var table = $(this.$refs.planing).DataTable({
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
                    leftColumns: 3,
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
                            dt.column(17)
                                .search("AIS")
                                .draw();
                        }
                    },
                    {
                        className: "bg-danger",
                        text: "<i class='bi bi-file-text mr-1'></i>TRUE",
                        action: function(e, dt, node, config) {
                            dt.column(17)
                                .search("TRUE")
                                .draw();
                        }
                    },
                    {
                        className: "bg-primary",
                        text: "<i class='bi bi-file-text mr-1'></i>TOT",
                        action: function(e, dt, node, config) {
                            dt.column(17)
                                .search("TOT")
                                .draw();
                        }
                    },
                    {
                        className: "bg-danger",
                        text: "<i class='bi bi-file-text mr-1'></i>FINET",
                        action: function(e, dt, node, config) {
                            dt.column(17)
                                .search("FINET")
                                .draw();
                        }
                    },
                    {
                        className: "bg-warning",
                        text: "<i class='bi bi-file-text mr-1'></i>FN",
                        action: function(e, dt, node, config) {
                            dt.column(17)
                                .search("FN")
                                .draw();
                        }
                    },
                    {
                        className: "bg-danger",
                        text: "<i class='bi bi-file-text mr-1'></i>3BB",
                        action: function(e, dt, node, config) {
                            dt.column(17)
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
                    {
                        data: null,
                        defaultContent: "",
                        className: "dt-body-center"
                    },
                    {
                        data: "name",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "surname",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "tel",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "tel2",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger"><i class="bi bi-file-person pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-file-person pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "building[0].projectName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "building[0].houseNumber",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "building[0].squadNumber",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "building[0].alleyName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "building[0].roadName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "building[0].districtName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "building[0].countyName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "building[0].provinceName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "building[0].postalCode",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "theBuilding",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "floor",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "room",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "isp.name",
                        render: function(data, type, row, meta) {
                            if (data == "Ais") {
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
                            } else if (data == "Fibernet") {
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
                            } else if (data == "True") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "Fn") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="text-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "agent_detail.name",
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
                        data: "circuit",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "jobtype.name",
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
                        data: "appointmentDate",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "appointmentTime",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "technician.teamTechnician",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "technician.phoneTechnician",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "technician.emailTechnician",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "isp_id.name",
                        render: function(data, type, row, meta) {
                            if (data == "Ais") {
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
                            } else if (data == "Fibernet") {
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
                            } else if (data == "True") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "Fn") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="text-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "status",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "subStatus",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "reMark",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
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
                        data: "updated_at",
                        render: function(data, type, row, meta) {
                            return moment(data).format("MM/DD/YYYY HH:MM");
                        }
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

            $("tbody", this.$refs.planing).on(
                "click",
                ".edit-planing",
                function() {
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.editModal(row.data());
                }
            );

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
    },
    created() {
        this.$Progress.start();
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        this.loadProblemsolution();
        this.generateTable();
        this.loadTachnician();
        this.loadJobType();
        this.loadIsp();
        this.loadCallver();
        this.loadCallverstatus();
        this.loadAgent();
    }
};
</script>
