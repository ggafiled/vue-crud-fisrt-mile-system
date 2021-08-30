<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-fw bi bi-building"></i>
                                {{ translate("building.header") }}
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
                                            <th>Manager Name</th>
                                            <th>Phone</th>
                                            <th>SpendSpace</th>
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

                        <form
                            @submit.prevent="
                                editmode ? updateBuilding() : createBuilding()
                            "
                        >
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <input
                                                v-model="form.projectName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectName'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>FmCode</label>
                                            <input
                                                v-model="form.fmCode"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your FmCode..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fmCode'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="fmCode"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Building Number</label>
                                            <input
                                                v-model="form.buildingSum"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your code..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'buildingSum'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="buildingSum"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Floor Number</label>
                                            <input
                                                v-model="form.floorSum"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your floor..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'floorSum'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="floorSum"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Room Number</label>
                                            <input
                                                v-model="form.roomSum"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your room..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'roomSum'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="roomSum"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Manager Name</label>
                                            <input
                                                v-model="form.nameManager"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Manager..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'nameManager'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="nameManager"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input
                                                v-model="form.phoneManager"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your phone number..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'phoneManager'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="phoneManager"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Mail</label>
                                            <input
                                                v-model="form.mailManager"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your mail..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'mailManager'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="mailManager"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Corporation Name</label>
                                            <input
                                                v-model="form.nameNiti"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Corporation..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'nameNiti'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="nameNiti"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input
                                                v-model="form.phoneNiti"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your phone number..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'phoneNiti'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="phoneNiti"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Mail</label>
                                            <input
                                                v-model="form.mailNiti"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your mail..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'mailNiti'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="mailNiti"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>House Number</label>
                                            <input
                                                v-model="form.houseNumber"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your House..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'houseNumber'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="houseNumber"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Swine</label>
                                            <input
                                                v-model="form.squadNumber"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Swine..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'squadNumber'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="squadNumber"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Alley</label>
                                            <input
                                                v-model="form.alleyName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Alley..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'alleyName'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="alleyName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Road</label>
                                            <input
                                                v-model="form.roadName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Road..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'roadName'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="roadName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>District</label>
                                            <input
                                                v-model="form.districtName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your District..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'districtName'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="districtName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>County</label>
                                            <input
                                                v-model="form.countyName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your County..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'countyName'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="countyName"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <input
                                                v-model="form.provinceName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your province..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'provinceName'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="provinceName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>PostalCode</label>
                                            <input
                                                v-model="form.postalCode"
                                                type="text"
                                                required
                                                pattern="/^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$/"
                                                class="form-control"
                                                placeholder="Enter your PostalCode..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'postalCode'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="postalCode"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input
                                                v-model="form.latitude"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your latitude..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'latitude'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="latitude"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Longtude</label>
                                            <input
                                                v-model="form.longitude"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your longtude..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'longitude'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="longitude"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Contract Sell</label>
                                            <Select2
                                                v-model="form.payment_id"
                                                :options="nameSale"
                                            >
                                            </Select2>
                                            <has-error
                                                :form="form"
                                                field="nameSale"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Contract Date</label>
                                            <input
                                                v-model="form.contractDate"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your contract date..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'contractDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="contractDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Contract Date End</label>
                                            <input
                                                v-model="form.contractDateEnd"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your contract date..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'contractDateEnd'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="contractDateEnd"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>SpendSpace</label>
                                            <Select2
                                                v-model="form.payment_id"
                                                :options="paymentType"
                                            >
                                            </Select2>
                                            <has-error
                                                :form="form"
                                                field="paymentType"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Condition</label>
                                            <input
                                                v-model="form.condition"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your condition..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'condition'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="condition"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Contract Period</label>
                                            <input
                                                v-model="form.contractPeriod"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your period..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'contractPeriod'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="contractPeriod"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>AREA *</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaN"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in areas"
                                                    :key="item.id"
                                                >
                                                    {{ item.name }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="areaN"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>BBN *</label>
                                            <select
                                                class="form-control"
                                                v-model="form.bbN"
                                                :disabled="form.areaN == ''"
                                                required
                                            >
                                                <option value=""
                                                    >Select a Section</option
                                                >
                                                <option
                                                    v-for="bbn in bbns"
                                                    :key="bbn.id"
                                                    :value="bbn.id"
                                                >
                                                    {{ bbn.name }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="bbN"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Area3BB</label>
                                            <Select2
                                                v-model="form.area3BB_id"
                                                :options="area3BB"
                                            >
                                            </Select2>
                                            <has-error
                                                :form="form"
                                                field="area3BB"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>AreaTrue</label>
                                            <Select2
                                                v-model="form.areaTrue_id"
                                                :options="areaTrue"
                                            >
                                            </Select2>
                                            <has-error
                                                :form="form"
                                                field="areaTrue"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>AreaTrueNew</label>
                                            <select
                                                v-model="form.areaTrueNew"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your area Tr..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'areaTrueNew'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >เลือกพื้นที่</option
                                                >
                                                <option
                                                    value="BMA 1 (North West)"
                                                    >BMA 1 (North West)</option
                                                >
                                                <option
                                                    value="BMA 2 (South West)"
                                                    >BMA 2 (South West)</option
                                                >
                                                <option
                                                    value="BMA 3 (North East)"
                                                    >BMA 3 (North East)</option
                                                >
                                                <option
                                                    value="BMA 4 (South East)"
                                                    >BMA 4 (South East)</option
                                                >
                                                <option value="BMA 5 (Central)"
                                                    >BMA 5 (Central)</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="areaTrueNew"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>AreaAis</label>
                                            <Select2
                                                v-model="form.areaAis_id"
                                                :options="areaAis"
                                            >
                                            </Select2>
                                            <has-error
                                                :form="form"
                                                field="areaAis"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Area FiberNet</label>
                                            <Select2
                                                v-model="form.areaFibetNet_id"
                                                :options="areaFiberNet"
                                            >
                                            </Select2>
                                            <has-error
                                                :form="form"
                                                field="areaFiberNet"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Operating Time</label>
                                            <Select2
                                                v-model="form.workTime_id"
                                                :options="workTime"
                                            >
                                            </Select2>
                                            <has-error
                                                :form="form"
                                                field="workTime"
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
                                    {{ translate("building.actions.close") }}
                                </button>
                                <button
                                    v-show="editmode"
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    {{ translate("building.actions.update") }}
                                </button>
                                <button
                                    v-show="!editmode"
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    {{ translate("building.actions.create") }}
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
export default {
    title: "All -",
    data() {
        return {
            editmode: false,
            selected: "",
            areas: [],
            bbns: [],
            form: new Form({
                id: "",
                projectName: "",
                nameSale: "",
                paymentType: "",
                area3BB: "",
                areaTrue: "",
                areaAis: "",
                areaFiberNet: "",
                workTime: "",
                buildingSum: "",
                floorSum: "",
                roomSum: "",
                fmCode: "",
                nameManager: "",
                phoneManager: "",
                mailManager: "",
                nameNiti: "",
                phoneNiti: "",
                mailNiti: "",
                houseNumber: "",
                squadNumber: "",
                alleyName: "",
                roadName: "",
                districtName: "",
                countyName: "",
                provinceName: "",
                postalCode: "",
                longitude: "",
                latitude: "",
                contractDate: "",
                contractDateEnd: "",
                condition: "",
                contractPeriod: "",
                reNewContact: "",
                areaN: "",
                bbN: ""
            })
        };
    },
    computed: {
        ...mapGetters(["buildings"]),
        ...mapState(["buildings"]),
        areaN() {
            return this.form.areaN;
        }
    },
    watch: {
        areaN: function(value) {
            this.form.bbN = "";
            axios.get("/bbns?area_id=" + this.form.areaN).then(response => {
                // console.log(response.data);
                this.bbns = response.data.data;
            });
        }
    },
    methods: {
        loadArea() {
            axios.get("/areas").then(response => {
                this.areas = response.data.data;
            });
        },
        loadBuildings() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                this.$store.dispatch("GET_BUILDINGS");
                $("#buildings")
                    .DataTable()
                    .ajax.reload();
            }

            this.$Progress.finish();
        },
        loadArea3bbs() {
            axios.get("/area3bb").then(
                response =>
                    (this.area3BB = response.data.data.map(a => {
                        return { text: a.area3BB, id: a.id };
                    }))
            );
        },
        loadAreaTrues() {
            axios.get("/areatrue").then(
                response =>
                    (this.areaTrue = response.data.data.map(a => {
                        return { text: a.areaTrue, id: a.id };
                    }))
            );
        },
        loadAreaAis() {
            axios.get("/areaais").then(
                response =>
                    (this.areaAis = response.data.data.map(a => {
                        return { text: a.areaAis, id: a.id };
                    }))
            );
        },
        loadAreaFiberNet() {
            axios.get("/areafibernet").then(
                response =>
                    (this.areaFiberNet = response.data.data.map(a => {
                        return { text: a.areaFiberNet, id: a.id };
                    }))
            );
        },
        loadWorktime() {
            axios.get("/worktime").then(
                response =>
                    (this.workTime = response.data.data.map(a => {
                        return { text: a.workTime, id: a.id };
                    }))
            );
        },
        loadPayment() {
            axios.get("/payment").then(
                response =>
                    (this.paymentType = response.data.data.map(a => {
                        return { text: a.paymentType, id: a.id };
                    }))
            );
        },
        loadSaleFm() {
            axios.get("/salefm").then(
                response =>
                    (this.nameSale = response.data.data.map(a => {
                        return { text: a.nameSale, id: a.id };
                    }))
            );
        },
        updateBuilding() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("/building/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');

                    this.loadBuildings();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        editModal(building) {
            this.editmode = true;
            this.form.reset();
            $("#addNew").modal("show");
            this.form.fill(building);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
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
                )
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete("/building/" + item.id)
                        .then(() => {
                            Swal.fire(
                                window.translate(
                                    "building.alert.comfirm_delete_title"
                                ),
                                window.translate(
                                    "building.alert.confirm_delete_message"
                                ),
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadBuildings();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        createBuilding() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("/building")
                .then(response => {
                    $("#addNew").modal("hide");

                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });

                    this.$Progress.finish();
                    this.loadBuildings();
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
            var table = $(this.$refs.buildings).DataTable({
                dom: "Blfrtip",
                ajax: "/building",
                responsive: true,
                processing: true,
                autoWidth: true,
                pageLength: 10,
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
                select: true,
                buttons: [
                    "colvis",
                    {
                        extend: "copy",
                        text: "<i class='bi bi-clipboard mr-1'></i>Copy",
                        exportOptions: {
                            columns: "th:not(.notexport)"
                        }
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
                        extend: "print",
                        text: "<i class='bi bi-printer mr-1'></i>Print"
                    },
                    {
                        className: "bg-danger",
                        text:
                            "<i class='bi bi-file-text mr-1'></i>ยังไม่ทำสัญญา",
                        action: function(e, dt, node, config) {
                            dt.columns(4)
                                .search("ยังไม่ได้ทำสัญญา")
                                .draw();
                        }
                    },
                    {
                        text:
                            "<i class='bi bi-list-check mr-1'></i>" +
                            window.translate(
                                "datatables.alert.display_selected_record_title"
                            ) +
                            "",
                        action: function(e, dt, node, config) {
                            var rowsel = dt
                                .rows({ selected: true })
                                .data()
                                .map(function(item) {
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
                                    showConfirmButton: false
                                });
                            }
                            $.fn.dataTable.ext.search.pop();
                            $.fn.dataTable.ext.search.push(function(
                                settings,
                                data,
                                dataIndex
                            ) {
                                return $(table.row(dataIndex).node()).hasClass(
                                    "selected"
                                )
                                    ? true
                                    : false;
                            });

                            table.draw();
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
                        className: "dt-body-center notexport"
                    },
                    {
                        data: "projectName",
                        render: function(data, type, row, meta) {
                            return (
                                '<span><i class="bi bi-building pr-2"></i>' +
                                data +
                                "</span>"
                            );
                        }
                    },
                    {
                        data: "nameManager",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (
                                data == "" ||
                                data == null ||
                                typeof data == undefined
                            ) {
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
                        data: "phoneManager",
                        render: function(data, type, row, meta) {
                            if (
                                data == "" ||
                                data == null ||
                                typeof data == undefined
                            ) {
                                return (
                                    '<span class="text-danger"><i class="bi bi-phone pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-phone pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "spendSpace",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data="") {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: null,
                        className: "dt-body-center notexport",
                        render: function(data, type, row, meta) {
                            return "<a class='edit-building btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-building btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
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

            $("tbody", this.$refs.buildings).on(
                "click",
                ".edit-building",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.editModal(row.data());
                }
            );

            $("tbody", this.$refs.buildings).on(
                "click",
                ".delete-building",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.deleteBuilding(row.data());
                }
            );
        }
    },
    created() {
        this.$Progress.start();
        this.loadBuildings();
        this.loadArea3bbs();
        this.loadAreaTrues();
        this.loadAreaAis();
        this.loadAreaFiberNet();
        this.loadWorktime();
        this.loadPayment();
        this.loadSaleFm();
        this.$Progress.finish();
    },
    mounted() {
        this.loadArea();
        this.generateTable();
    }
};
</script>
