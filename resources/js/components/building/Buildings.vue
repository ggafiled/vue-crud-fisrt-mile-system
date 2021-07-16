<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Building Managment Table</h3>
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
                        <div class="card-body table-responsive p-2">
                            <table
                                id="buildings"
                                ref="buildings"
                                class="table table-striped table-bordered"
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
                                Create New Building
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Bulding's Info
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Project Tot Name</label>
                                            <input
                                                v-model="form.projectNameTot"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectNameTot'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Project 3bb Name</label>
                                            <input
                                                v-model="form.projectName3bb"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectName3bb'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Project True Name</label>
                                            <input
                                                v-model="form.projectNameTrue"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectNameTrue'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Project Ais Name</label>
                                            <input
                                                v-model="form.projectNameAis"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectNameAis'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Project FiberNet Name</label>
                                            <input
                                                v-model="
                                                    form.projectNameFiberNet
                                                "
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectNameFiberNet'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
                                            <input
                                                v-model="form.contractSell"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your contract..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'contractSell'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="contractSell"
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
                                            <select
                                                v-model="form.spendSpace"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your spendspace..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'spendSpace'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >เลือกรูปแบบการชำระ</option
                                                >
                                                <option value="ไม่แบ่งรายได้"
                                                    >ไม่แบ่งรายได้</option
                                                >
                                                <option
                                                    value="แบ่งรายได้ทุกเดือน"
                                                    >แบ่งรายได้ทุกเดือน</option
                                                >
                                                <option value="ชำระรายปี"
                                                    >ชำระรายปี</option
                                                >
                                                <option
                                                    value="ชำระรายปีแล้วแบ่งรายได้"
                                                    >ชำระรายปีแล้วแบ่งรายได้</option
                                                >
                                                <option
                                                    value="ชำระรายปีแบบขั้นบันได"
                                                    >ชำระรายปีแบบขั้นบันได</option
                                                >
                                                <option value="ยังไม่ได้ทำสัญญา"
                                                    >ยังไม่ได้ทำสัญญา</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="spendSpace"
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
                                            <label>AreaN</label>
                                            <input
                                                v-model="form.areaN"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your areaN..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'areaN'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="areaN"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>BBN</label>
                                            <input
                                                v-model="form.bbN"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your bbn..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'bbN'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="bbN"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Area3BB</label>
                                            <select
                                                v-model="form.area3BB"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your area 3b..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'area3BB'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >เลือกพื้นที่</option
                                                >
                                                <option value="RO 1"
                                                    >RO 1</option
                                                >
                                                <option value="RO 2"
                                                    >RO 2</option
                                                >
                                                <option value="RO 3"
                                                    >RO 3</option
                                                >
                                                <option value="RO 4"
                                                    >RO 4</option
                                                >
                                                <option value="RO 5"
                                                    >RO 5</option
                                                >
                                                <option value="RO 6"
                                                    >RO 6</option
                                                >
                                                <option value="RO 7"
                                                    >RO 7</option
                                                >
                                                <option value="RO 8"
                                                    >RO 8</option
                                                >
                                                <option value="RO 9"
                                                    >RO 9</option
                                                >
                                                <option value="RO 10"
                                                    >RO 10</option
                                                >
                                                <option value="RO 10/1"
                                                    >RO 10/1</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="area3BB"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>AreaTrue</label>
                                            <select
                                                v-model="form.areaTrue"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your area Tr..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'areaTrue'
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
                                            <select
                                                v-model="form.areaAis"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your area A.."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'areaAis'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >เลือกพื้นที่</option
                                                >
                                                <option value="Yes">Yes</option>
                                                <option value="N/A">N/A</option>
                                            </select>
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
                                            <select
                                                v-model="form.areaFiberNet"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your area F..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'areaFiberNet'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >เลือกพื้นที่</option
                                                >
                                                <option value="Yes">Yes</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="areaFiberNet"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Operating Time</label>
                                            <select
                                                v-model="form.operatingTime"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your operatingTime..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'operatingTime'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >เลือกเวลาในการปฏิบัติงาน</option
                                                >
                                                <option
                                                    value="จันทร์ - ศุกร์ (9.00 - 17.00 น)"
                                                    >จันทร์ - ศุกร์ (9.00 -
                                                    17.00 น)</option
                                                >
                                                <option
                                                    value="จันทร์ - เสาร์ (9.00 - 17.00 น)"
                                                    >จันทร์ - เสาร์ (9.00 -
                                                    17.00 น)</option
                                                >
                                                <option
                                                    value="จันทร์ - ศุกร์ และเสาร์ครึ่งวันช่วงเช้า"
                                                    >จันทร์ - ศุกร์
                                                    และเสาร์ครึ่งวันช่วงเช้า</option
                                                >
                                                <option
                                                    value="จันทร์ - ศุกร์ และเสาร์ครึ่งวันช่วงบ่าย"
                                                    >จันทร์ - ศุกร์
                                                    และเสาร์ครึ่งวันช่วงบ่าย</option
                                                >
                                                <option
                                                    value="จันทร์ - ศุกร์ และวันเสาร์ ประสาน นิติฯ ก่อน"
                                                    >จันทร์ - ศุกร์ และวันเสาร์
                                                    ประสาน นิติฯ ก่อน</option
                                                >
                                                <option
                                                    value="จันทร์ - ศุกร์ และวันเสาร์-อาทิตย์ ประสาน นิติฯ ก่อน"
                                                    >จันทร์ - ศุกร์
                                                    และวันเสาร์-อาทิตย์ ประสาน
                                                    นิติฯ ก่อน</option
                                                >
                                                <option value="ทุกวัน"
                                                    >ทุกวัน</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="operatingTime"
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
export default {
    data() {
        return {
            editmode: false,
            selected: "",
            form: new Form({
                id: "",
                projectName: "",
                projectNameTot: "",
                projectName3bb: "",
                projectNameAis: "",
                projectNameTrue: "",
                projectNameFiberNet: "",
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
                contractSell: "",
                contractDate: "",
                contractDateEnd: "",
                spendSpace: "",
                condition: "",
                contractPeriod: "",
                reNewContact: "",
                areaN: "",
                bbN: "",
                area3BB: "",
                areaTrue: "",
                areaTrueNew: "",
                areaAis: "",
                areaFiberNet: "",
                operatingTime: ""
            })
        };
    },
    computed: {
        ...mapGetters(["buildings"]),
        ...mapState(["buildings"])
    },
    methods: {
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
        updateBuilding() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("api/building/" + this.form.id)
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
            console.log(building);
            $("#addNew").modal("show");
            this.form.fill(building);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteBuilding(id) {
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
                        .delete("api/building/" + id)
                        .then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
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
                .post("api/building")
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
        }
    },
    created() {
        this.$Progress.start();
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        var vm = this;
        var table = $(this.$refs.buildings).DataTable({
            dom: "Blfrtip",
            ajax: "api/building",
            responsive: true,
            processing: true,
            autoWidth: true,
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
                    className: "bg-danger",
                    text: "<i class='bi bi-file-text mr-1'></i>ยังไม่ทำสัญญา",
                    action: function(e, dt, node, config) {
                        dt.columns(4)
                            .search("ยังไม่ได้ทำสัญญา")
                            .draw();
                    }
                },
                {
                    text:
                        "<i class='bi bi-list-check mr-1'></i>แสดงที่เลือกไว้",
                    action: function(e, dt, node, config) {
                        console.info("button: Display Select Item");
                        var rowsel = dt
                            .rows({ selected: true })
                            .data()
                            .map(function(item) {
                                return item.id;
                            })
                            .join(",");
                        if (!rowsel.length) {
                            return Swal.fire({
                                title: "ไม่มีเรดคอร์ดที่เลือก",
                                text: "กรุณาเลือกเรดคอร์ดก่อน",
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
                            text:
                                "<i class='bi bi-arrow-repeat mr-1'></i>Refresh",
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
                { data: null, defaultContent: "", className: "dt-body-center" },
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
                    data: "nameManager"
                },
                {
                    data: "phoneManager"
                },
                {
                    data: "spendSpace"
                },
                {
                    data: null,
                    className: "dt-body-center",
                    render: function(data, type, row, meta) {
                        return "<a class='edit-building' href='#'><i class='fa fa-edit blue'></i> </a> / <a class='delete-building' href='#'> <i class='fa fa-trash red'></i> </a>";
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
                },
                {
                    targets: [4],
                    visible: false,
                    searchable: true
                }
            ],
            select: { selector: "td:not(:last-child)", style: "os" },
            order: [[1, "desc"]]
        });

        $("tbody", this.$refs.buildings).on("click", ".edit-building", function(
            e
        ) {
            e.preventDefault();
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.editModal(row.data());
        });

        $("tbody", this.$refs.buildings).on(
            "click",
            ".delete-building",
            function(e) {
                e.preventDefault();
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deleteBuilding(row.data().id);
            }
        );
    }
};
</script>

<style></style>
