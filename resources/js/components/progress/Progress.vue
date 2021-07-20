<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            Progress List Table
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
                        <div class="table-responsive">
                            <table
                                id="progress"
                                ref="progress"
                                class="display nowrap"
                                style="width:100%"
                            >
                                <thead>
                                    <tr class="info">
                                        <th></th>
                                        <th>Project Name</th>
                                        <th>Fm-Progress</th>
                                        <th>TOT-Progress</th>
                                        <th>AIS-Progress</th>
                                        <th>3BB-Progress</th>
                                        <th>SINET-Progress</th>
                                        <th>FN-Progress</th>
                                        <th>TRUE-Progress</th>
                                        <th>Update</th>
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
                                Create New Progress
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Progress's Info
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
                                editmode ? updateProgress()
                                : createProgress()
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
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>FM Progress :</label>
                                            <select
                                                v-model="form.fmProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your fmProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fmProgress'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >การดำเนินการสร้าง</option
                                                >
                                                <option value="รอเข้า Survey"
                                                    >รอเข้า Survey</option
                                                >
                                                <option value="รอเข้าดำเนินการ"
                                                    >รอเข้าดำเนินการ</option
                                                >
                                                <option value="กำลังดำเนินการ"
                                                    >กำลังดำเนินการ</option
                                                >
                                                <option
                                                    value="ดำเนิการแล้วเสร็จ"
                                                    >ดำเนิการแล้วเสร็จ</option
                                                >
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                    >กำลังสร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                    >สร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                    >เชื่อมโครงข่ายแล้ว</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="fmProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label
                                                >วันที่เข้าวางโครงข่าย :</label
                                            >
                                            <input
                                                v-model="form.dateFn"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your dateFn..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateFn'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateFn"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>TOT Progress :</label>
                                            <select
                                                v-model="form.totProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your totProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'totProgress'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >การดำเนินการสร้าง</option
                                                >
                                                <option value="รอเข้า Survey"
                                                    >รอเข้า Survey</option
                                                >
                                                <option value="รอเข้าดำเนินการ"
                                                    >รอเข้าดำเนินการ</option
                                                >
                                                <option value="กำลังดำเนินการ"
                                                    >กำลังดำเนินการ</option
                                                >
                                                <option
                                                    value="ดำเนิการแล้วเสร็จ"
                                                    >ดำเนิการแล้วเสร็จ</option
                                                >
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                    >กำลังสร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                    >สร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                    >เชื่อมโครงข่ายแล้ว</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="totProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>TOT วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.dateTot"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your dateTot..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateTot'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateTot"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>AIS Progress :</label>
                                            <select
                                                v-model="form.aisProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your aisProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'aisProgress'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >การดำเนินการสร้าง</option
                                                >
                                                <option value="รอเข้า Survey"
                                                    >รอเข้า Survey</option
                                                >
                                                <option value="รอเข้าดำเนินการ"
                                                    >รอเข้าดำเนินการ</option
                                                >
                                                <option value="กำลังดำเนินการ"
                                                    >กำลังดำเนินการ</option
                                                >
                                                <option
                                                    value="ดำเนิการแล้วเสร็จ"
                                                    >ดำเนิการแล้วเสร็จ</option
                                                >
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                    >กำลังสร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                    >สร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                    >เชื่อมโครงข่ายแล้ว</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="aisProgress"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>AIS วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.dateAis"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your dateAis..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateAis'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateAis"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>3BB Progress :</label>
                                            <select
                                                v-model="form.Progress3bb"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Progress3bb..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'Progress3bb'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >การดำเนินการสร้าง</option
                                                >
                                                <option value="รอเข้า Survey"
                                                    >รอเข้า Survey</option
                                                >
                                                <option value="รอเข้าดำเนินการ"
                                                    >รอเข้าดำเนินการ</option
                                                >
                                                <option value="กำลังดำเนินการ"
                                                    >กำลังดำเนินการ</option
                                                >
                                                <option
                                                    value="ดำเนิการแล้วเสร็จ"
                                                    >ดำเนิการแล้วเสร็จ</option
                                                >
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                    >กำลังสร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                    >สร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                    >เชื่อมโครงข่ายแล้ว</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="Progress3bb"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>3BB วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.date3BB"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your date3BB..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'date3BB'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="date3BB"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Sinet Progress :</label>
                                            <select
                                                v-model="form.sinetProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your sinetProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'sinetProgress'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >การดำเนินการสร้าง</option
                                                >
                                                <option value="รอเข้า Survey"
                                                    >รอเข้า Survey</option
                                                >
                                                <option value="รอเข้าดำเนินการ"
                                                    >รอเข้าดำเนินการ</option
                                                >
                                                <option value="กำลังดำเนินการ"
                                                    >กำลังดำเนินการ</option
                                                >
                                                <option
                                                    value="ดำเนิการแล้วเสร็จ"
                                                    >ดำเนิการแล้วเสร็จ</option
                                                >
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                    >กำลังสร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                    >สร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                    >เชื่อมโครงข่ายแล้ว</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="sinetProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label
                                                >Sinet วันวางโครงข่าย :</label
                                            >
                                            <input
                                                v-model="form.dateSinet"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your dateSinet..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateSinet'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateSinet"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>FN Progress :</label>
                                            <select
                                                v-model="form.fnProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your fnProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fnProgress'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >การดำเนินการสร้าง</option
                                                >
                                                <option value="รอเข้า Survey"
                                                    >รอเข้า Survey</option
                                                >
                                                <option value="รอเข้าดำเนินการ"
                                                    >รอเข้าดำเนินการ</option
                                                >
                                                <option value="กำลังดำเนินการ"
                                                    >กำลังดำเนินการ</option
                                                >
                                                <option
                                                    value="ดำเนิการแล้วเสร็จ"
                                                    >ดำเนิการแล้วเสร็จ</option
                                                >
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                    >กำลังสร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                    >สร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                    >เชื่อมโครงข่ายแล้ว</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>

                                            <has-error
                                                :form="form"
                                                field="fnProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>FN วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.dateFn"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your dateFn..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateFn'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateFn"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->

                                            <label>True Progress :</label>
                                            <select
                                                v-model="form.trueProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your trueProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'trueProgress'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >การดำเนินการสร้าง</option
                                                >
                                                <option value="รอเข้า Survey"
                                                    >รอเข้า Survey</option
                                                >
                                                <option value="รอเข้าดำเนินการ"
                                                    >รอเข้าดำเนินการ</option
                                                >
                                                <option value="กำลังดำเนินการ"
                                                    >กำลังดำเนินการ</option
                                                >
                                                <option
                                                    value="ดำเนิการแล้วเสร็จ"
                                                    >ดำเนิการแล้วเสร็จ</option
                                                >
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                    >กำลังสร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                    >สร้างพร้อมโครงการฯ</option
                                                >
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                    >เชื่อมโครงข่ายแล้ว</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="trueProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>True วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.dateTrue"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your dateTrue..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateTrue'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateTrue"
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
                fmProgress: "",
                dateFm: "",
                totProgress: "",
                dateTot: "",
                aisProgress: "",
                dateAis: "",
                Progress3bb: "",
                date3BB: "",
                sinetProgress: "",
                dateSinet: "",
                fnProgress: "",
                dateFn: "",
                trueProgress: "",
                dateTrue: ""
            })
        };
    },
    computed: {
        ...mapGetters(["progress"]),
        ...mapState(["progress"])
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
        loadProgress() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                this.$store.dispatch("GET_BUILDINGS");
                $("#progress")
                    .DataTable()
                    .ajax.reload();
            }

            this.$Progress.finish();
        },
        updateProgress() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("api/progress/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
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
        deleteProgress(id) {
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
                        .delete("api/progress/" + id)
                        .then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadProgress();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        createProgress() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("api/progress")
                .then(response => {
                    $("#addNew").modal("hide");

                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });

                    this.$Progress.finish();
                    this.loadProgress();
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
        var table = $(this.$refs.progress).DataTable({
            dom: "Blfrtip",
            ajax: "api/progress",
            responsive: true,
            processing: true,
            autoWidth: true,
            scrollX: true,
            pageLength: 15,
            lengthMenu: [
                [10, 15, 25, 50, -1],
                [10, 15, 25, 50, "All"]
            ],
            buttons: [
                "colvis",
                "copy",
                "csv",
                {
                    extend: "print",
                    text: "<i class='bi bi-printer mr-1'></i>Print"
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
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: "building.projectName"
                },
                {
                    data: "fmProgress",
                    render: function(data, type, row, meta) {
                         if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return (
                                '<span>' + data + "</span>"
                            );
                        }
                    }
                },
                {
                    data: "totProgress",
                    render: function(data, type, row, meta) {
                         if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return (
                                '<span>' + data + "</span>"
                            );
                        }
                    }

                },
                {
                    data: "aisProgress",
                    render: function(data, type, row, meta) {
                         if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return (
                                '<span>' + data + "</span>"
                            );
                        }
                    }
                },
                {
                    data: "Progress3bb",
                    render: function(data, type, row, meta) {
                         if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return (
                                '<span>' + data + "</span>"
                            );
                        }
                    }
                },
                {
                    data: "sinetProgress",
                    render: function(data, type, row, meta) {
                         if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return (
                                '<span>' + data + "</span>"
                            );
                        }
                    }
                },
                {
                    data: "fnProgress",
                    render: function(data, type, row, meta) {
                         if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return (
                                '<span>' + data + "</span>"
                            );
                        }
                    }
                },
                {
                    data: "trueProgress",
                    render: function(data, type, row, meta) {
                         if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return (
                                '<span>' + data + "</span>"
                            );
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
                        return "<a class='edit-progress' href='#'><i class='fa fa-edit blue'></i> </a> / <a class='delete-progress' href='#'> <i class='fa fa-trash red'></i> </a>";
                    }
                }
            ],
            fnDrawCallback: function() {
                $("#loading").hide();
                var api = this.api();
                setTimeout(function() {
                    api.columns()
                        .flatten()
                        .each(function(colIdx) {
                            var columnData = api
                                .columns(colIdx)
                                .data()
                                .join("");
                            if (
                                columnData.length == api.rows().count() - 1 &&
                                colIdx != 0
                            ) {
                                api.column(colIdx).visible(false);
                            }
                        });
                }, 0);
            }
        });

        $("tbody", this.$refs.progress).on("click", ".edit-progress", function(
            e
        ) {
            e.preventDefault();
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.editModal(row.data());
        });

        $("tbody", this.$refs.progress).on(
            "click",
            ".delete-progress",
            function(e) {
                e.preventDefault();
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deleteProgress(row.data().id);
            }
        );
    }
};
</script>
