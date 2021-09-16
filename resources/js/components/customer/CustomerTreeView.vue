<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div
                    class="card"
                    style="height: calc(100vh - 100px) !important;"
                >
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-fw bi bi-people"></i>
                            {{ translate("CUSTOMER MANAGEMENT") }}
                        </h2>
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
                        <div id="content">
                            <div id="left">
                                <v-jstree
                                    :data="buildings"
                                    show-checkbox
                                    allow-batch
                                    whole-row
                                ></v-jstree>
                            </div>
                            <div id="right">
                                <div class="content">
                                    เลือกโครงการ
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row overflow-auto" style="height: 100% !important;">
                            <div
                                class="col-md-5"
                            >
                                <v-jstree
                                    :data="buildings"
                                    show-checkbox
                                    allow-batch
                                    whole-row
                                ></v-jstree>
                            </div>

                            <v-divider vertical></v-divider>

                            <div class="col">
                                <v-flex d-flex text-xs-center>
                                    <v-scroll-y-transition mode="out-in">
                                        <div
                                            class="title grey--text text--lighten-1 font-weight-light"
                                            style="align-self: center;"
                                        >
                                            เลือกโครงการ
                                        </div>
                                    </v-scroll-y-transition>
                                </v-flex>
                            </div>
                        </div> -->
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
                                Create New Customer
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Customer's Info
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
                                editmode ? updateCustomer() : createCustomer()
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
                                                v-model="
                                                    form.problemsolution_id
                                                "
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
import Select2 from "v-select2-component";
import VJstree from "vue-jstree";

const pause = ms => new Promise(resolve => setTimeout(resolve, ms));

export default {
    components: { Select2, VJstree },
    data() {
        return {
            search: "",
            active: [],
            open: [],
            loader: null,
            editmode: false,
            buildings: [],
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
                problemsolution: "",
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
    computed: {},
    methods: {
        async fetchBuildings(item) {
            await axios.get("/building").then(response => {
                item.children.push(
                    response.data.data.map(a => {
                        return { text: a.projectName, id: a.id };
                    })
                );
            });
        },
        loadBuildings() {
            axios.get("/building").then(response => {
                this.building = response.data.data.map(a => {
                    return { text: a.projectName, id: a.id };
                });
                this.buildings = response.data.data.map(a => {
                    return { id: a.id, text: a.projectName, children: [] };
                });
            });
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
        updateCustomer() {
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
        createCustomer() {
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
        }
    },
    created() {
        this.$Progress.start();
        this.loader = Swal.fire({
            title: "กรุณารอสักครู่...",
            text: "กำลังโหลดข้อมูลที่เกี่ยวข้อง",
            showCancelButton: false,
            showConfirmButton: false
        });
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        this.loadProblemsolution();
        this.loadTachnician();
        this.loadJobType();
        this.loadIsp();
        this.loadCallver();
        this.loadCallverstatus();
        this.loadAgent();
        setTimeout(() => {
            this.loader.close();
        }, 2000);
    }
};
</script>
<style>
.tree-anchor > span {
    word-wrap: break-word !important;
}
#content {
    height: 100%;
    weight: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
}
#left {
    height: 100%;
    width: 30%;
    overflow: scroll;
    order: 1;
}
#right {
    height: 100%;
    width: 70%;
    overflow-y: auto;
    order: 2;
}
#right > .content {
    position: absolute;
  top: 50%; right: 50%;
  transform: translate(50%,-50%);
}
</style>
