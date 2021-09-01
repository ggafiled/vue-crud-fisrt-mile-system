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
                                            <th>Project</th>
                                            <th>Fm Code</th>
                                            <th>พื้นที่ tot</th>
                                            <th>พื้นที่ BBN</th>
                                            <th>พื้นที่ 3BB</th>
                                            <th>พื้นที่ True</th>
                                            <th>พื้นที่ TrueNew</th>
                                            <th>พื้นที่ Ais</th>
                                            <th>พื้นที่ FiberNet</th>
                                            <th>จำนวนอาคาร</th>
                                            <th>จำนวนชั้น</th>
                                            <th>จำนวนห้อง</th>
                                            <th>ชื่อผู้จัดการ</th>
                                            <th>เบอร์โทรผู้จัดการ</th>
                                            <th>เมล์ผู้จัดการ</th>
                                            <th>ชื่อนิติบุคคล</th>
                                            <th>เบอร์นิติบุคคล</th>
                                            <th>เมล์นิติบุคคล</th>
                                            <th>บ้านเลขที่</th>
                                            <th>หมู่</th>
                                            <th>ซอย</th>
                                            <th>ถนน</th>
                                            <th>อำเภอ/เขต</th>
                                            <th>จังหวัด</th>
                                            <th>ตำบล/แขวง</th>
                                            <th>รหัสไปรษณีย์</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th>ชื่อเซลล์ที่ทำสัญญา</th>
                                            <th>วันที่ทำสัญญา</th>
                                            <th>วันสิ้นสุดสัญญา</th>
                                            <th>SpendSpace</th>
                                            <th>รูปแบบการแบ่งรายได้</th>
                                            <th>ระยะเวลาสัญญาเพิ่ม</th>
                                            <th>Condition</th>
                                            <th>ราคาที่ต้องจ่าย</th>
                                            <th>เวลาปฏิบัติงาน</th>
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
                                            <label>Project</label>
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
                                            <label>จำนวนอาคาร</label>
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
                                            <label>จำนวนชั้น</label>
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
                                            <label>จำนวนห้อง</label>
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
                                            <label>ชื่อผู้จัดการ</label>
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
                                            <label>เบอร์โทรผู้จัดการ</label>
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
                                            <label>เมล์ผู้จัดการ</label>
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
                                            <label>ชื่อนิติบุคคล</label>
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
                                            <label>เบอร์นิติบุคคล</label>
                                            <input
                                                v-model="form.phoneNiti"
                                                type="text"
                                                class="form-control"
                                                autocomplete="chrome-off"
                                                placeholder="Enter your phone number..."
                                                :autocomplete="isChrome ?  'chrome-off' : 'off'"
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
                                            <label>เมล์นิติบุคคล</label>
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <addressinput-subdistrict
                                                v-model="form.districtName"
                                            />
                                            <!-- <input
                                                v-model="form.districtName"
                                                type="text"
                                                class="form-control addressinput-subdistrict"
                                                placeholder="Enter your District..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'districtName'
                                                    )
                                                }"
                                            /> -->
                                            <has-error
                                                :form="form"
                                                field="districtName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <addressinput-district
                                                v-model="form.countyName"
                                            />
                                            <!-- <input
                                                v-model="form.countyName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your County..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'countyName'
                                                    )
                                                }"
                                            /> -->
                                            <has-error
                                                :form="form"
                                                field="countyName"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <addressinput-province
                                                v-model="form.provinceName"
                                            />
                                            <!-- <input
                                                v-model="form.provinceName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your province..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'provinceName'
                                                    )
                                                }"
                                            /> -->
                                            <has-error
                                                :form="form"
                                                field="provinceName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <addressinput-zipcode
                                                v-model="form.postalCode"
                                            />
                                            <!-- <input
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
                                            /> -->
                                            <has-error
                                                :form="form"
                                                field="postalCode"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
<<<<<<< HEAD
                                            <label>บ้านเลขที่</label>
                                            <input
                                                v-model="form.houseNumber"
=======
                                            <addressinput-subdistrict
                                                v-model="form.districtName"
                                                label="Sub District"
                                                placeholder="Enter your sub district..."
                                                autocomplete="chrome-off"
                                                :autocomplete="isChrome ?  'chrome-off' : 'off'"
                                            />
                                            <!-- <input
                                                v-model="form.districtName"
>>>>>>> 345f7bca021b475c92e73b993d1e83357eaffdb1
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
<<<<<<< HEAD
                                            <label>หมู่</label>
                                            <input
                                                v-model="form.squadNumber"
=======
                                            <addressinput-district
                                                v-model="form.countyName"
                                                label="District"
                                                placeholder="Enter your district..."
                                                autocomplete="chrome-off"
                                                :autocomplete="isChrome ?  'chrome-off' : 'off'"
                                            />
                                            <!-- <input
                                                v-model="form.countyName"
>>>>>>> 345f7bca021b475c92e73b993d1e83357eaffdb1
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
<<<<<<< HEAD
                                            <label>ซอย</label>
                                            <input
                                                v-model="form.alleyName"
=======
                                            <addressinput-province
                                                v-model="form.provinceName"
                                                label="Province"
                                                placeholder="Enter your province..."
                                                autocomplete="chrome-off"
                                                :autocomplete="isChrome ?  'chrome-off' : 'off'"
                                            />
                                            <!-- <input
                                                v-model="form.provinceName"
>>>>>>> 345f7bca021b475c92e73b993d1e83357eaffdb1
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
<<<<<<< HEAD
                                            <label>ถนน</label>
                                            <input
                                                v-model="form.roadName"
=======
                                            <addressinput-zipcode
                                                v-model="form.postalCode"
                                                label="Postal Code"
                                                placeholder="Enter your postal code..."
                                                :autocomplete="isChrome ?  'chrome-off' : 'off'"
                                            />
                                            <!-- <input
                                                v-model="form.postalCode"
>>>>>>> 345f7bca021b475c92e73b993d1e83357eaffdb1
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
                                    <div class="col-sm-2">
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
                                            <label>ชื่อเซลล์ที่ทำสัญญา</label>
                                            <select
                                                class="form-control"
                                                v-model="form.contractSell"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in saleFms"
                                                    :key="item.id"
                                                >
                                                    {{ item.nameSale }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="contractSell"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>วันที่ทำสัญญา</label>
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
                                            <label>วันสิ้นสุดสัญญา</label>
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
                                            <label>*</label>
                                            <select
                                                class="form-control"
                                                v-model="form.spendSpace"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in spendSpaces"
                                                    :key="item.id"
                                                >
                                                    {{ item.paymentType }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="spendSpace"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>รูปแบบการแบ่งรายได้</label>
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
                                            <label>ระยะเวลาสัญญา</label>
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
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>ระยะเวลาสัญญาเพิ่ม</label>
                                            <input
                                                v-model="form.reNewContact"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your renew..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'reNewContact'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="reNewContact"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>ราคาที่ต้องจ่าย</label>
                                            <input
                                                v-model="form.balance"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your balance..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'balance'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="balance"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>พื้นที่ ToT *</label>
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
                                            <label>พื้นที่ BBN *</label>
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
                                            <label>พื้นที่ 3BB *</label>
                                            <select
                                                class="form-control"
                                                v-model="form.area3BB"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in area3bbs"
                                                    :key="item.id"
                                                >
                                                    {{ item.area3BB }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="area3BB"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>พื้นที่ True</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaTrue"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in areaTrues"
                                                    :key="item.id"
                                                >
                                                    {{ item.areaTrue }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="areaTrue"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>พื้นที่ TrueNew</label>
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
                                                >
                                                    BMA 1 (North West)
                                                </option>
                                                <option
                                                    value="BMA 2 (South West)"
                                                >
                                                    BMA 2 (South West)
                                                </option>
                                                <option
                                                    value="BMA 3 (North East)"
                                                >
                                                    BMA 3 (North East)
                                                </option>
                                                <option
                                                    value="BMA 4 (South East)"
                                                >
                                                    BMA 4 (South East)
                                                </option>
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
                                            <label>พื้นที่ Ais</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaAis"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in areaAises"
                                                    :key="item.id"
                                                >
                                                    {{ item.areaAis }}
                                                </option>
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
                                            <label>พื้นที่ FiberNet</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaFiberNet"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in areaFiberNets"
                                                    :key="item.id"
                                                >
                                                    {{ item.areaFiberNet }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="areaFiberNet"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>เวลาปฏิบัติงาน</label>
                                            <select
                                                class="form-control"
                                                v-model="form.operatingTime"
                                            >
                                                <option value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in workTimes"
                                                    :key="item.id"
                                                >
                                                    {{ item.workTime }}
                                                </option>
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
            area3bbs: [],
            areaTrues: [],
            areaAises: [],
            areaFiberNets: [],
            workTimes: [],
            spendSpaces: [],
            saleFms: [],
            form: new Form({
                id: "",
                projectName: "",
                areaN: "",
                bbN: "",
                area3BB: "",
                areaTrue: "",
                areaTrueNew: "",
                areaAis: "",
                areaFiberNet: "",
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
                balance: "",
                operatingTime: ""
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
        loadSaleFm() {
            axios.get("/saleFms").then(response => {
                this.saleFms = response.data.data;
            });
        },
        loadSpendSpace() {
            axios.get("/spendSpaces").then(response => {
                this.spendSpaces = response.data.data;
            });
        },
        loadArea() {
            axios.get("/areas").then(response => {
                this.areas = response.data.data;
            });
        },
        loadArea3BB() {
            axios.get("/area3bbs").then(response => {
                this.area3bbs = response.data.data;
            });
        },
        loadAreaTrue() {
            axios.get("/areaTrues").then(response => {
                this.areaTrues = response.data.data;
            });
        },
        loadAreaAis() {
            axios.get("/areaAises").then(response => {
                this.areaAises = response.data.data;
            });
        },
        loadAreaFiberNet() {
            axios.get("/areaFiberNets").then(response => {
                this.areaFiberNets = response.data.data;
            });
        },
        loadWorkTime() {
            axios.get("/workTimes").then(response => {
                this.workTimes = response.data.data;
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
        updateBuilding() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("/api/building/" + this.form.id)
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
                        .delete("/api/building/" + item.id)
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
                .post("/api/building")
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
                ajax: "/api/building",
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
                    leftColumns: 2,
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
                        data: "fmCode",
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
                        data: "areaN",
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
                        data: "bbN",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "area3BB",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "areaTrue",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "areaTrueNew",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "areaAis",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "areaFiberNet",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "buildingSum",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "floorSum",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "roomSum",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "nameManager",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "phoneManager",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "mailManager",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "nameNiti",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "phoneNiti",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "mailNiti",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "houseNumber",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "squadNumber",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "alleyName",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "roadName",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "districtName",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "countyName",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "provinceName",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "postalCode",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "longitude",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "latitude",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "contractSell",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "contractDate",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "contractDateEnd",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
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
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "condition",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "contractPeriod",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "reNewContact",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "balance",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "operatingTime",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data) {
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
    computed: {
        isChrome: function() {
            return this.$isChrome;
        }
    },
    created() {
        this.$Progress.start();
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        this.loadSaleFm();
        this.loadSpendSpace();
        this.loadArea();
        this.loadArea3BB();
        this.loadAreaTrue();
        this.loadAreaAis();
        this.loadAreaFiberNet();
        this.loadWorkTime();
        this.generateTable();
        $('input').attr('autocomplete',this.isChrome? 'chrome-off': 'off');
    }
};
</script>
