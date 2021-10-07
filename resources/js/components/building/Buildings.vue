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
                                            <th>
                                                Project Name
                                            </th>
                                            <th>
                                                SubBuilding Sum
                                            </th>
                                            <th>
                                                Floor Sum
                                            </th>
                                            <th>
                                                Room Sum
                                            </th>
                                            <th>
                                                Manager Name
                                            </th>
                                            <th>
                                                Phone Manager
                                            </th>
                                            <th>
                                                Mail Manager
                                            </th>
                                            <th>
                                                Niti Name
                                            </th>
                                            <th>
                                                Phone Niti
                                            </th>
                                            <th>
                                                Mail Niti
                                            </th>
                                            <th>
                                                Technician Name
                                            </th>
                                            <th>
                                                Phone Technician
                                            </th>
                                            <th>
                                                Mail Technician
                                            </th>
                                            <th>
                                                House Number
                                            </th>
                                            <th>
                                                Squad Number
                                            </th>
                                            <th>
                                                Alley Name
                                            </th>
                                            <th>
                                                Road Name
                                            </th>
                                            <th>
                                                District Name
                                            </th>
                                            <th>
                                                Province Name
                                            </th>
                                            <th>
                                                County Name
                                            </th>
                                            <th>
                                                Postal Code
                                            </th>
                                            <th>
                                                Latitude
                                            </th>
                                            <th>
                                                Longitude
                                            </th>
                                            <th>
                                                Contract Start Date
                                            </th>
                                            <th>
                                                Contract Term
                                            </th>
                                            <th>
                                                Contract End Date
                                            </th>
                                            <th>
                                                Balance
                                            </th>
                                            <th>
                                                Remark Contract
                                            </th>
                                            <th>
                                                Remark
                                            </th>
                                            <th>
                                                Create At
                                            </th>
                                            <th>
                                                Update At
                                            </th>
                                            <th>
                                                Action
                                            </th>
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

                        <form>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <small>/ชื่อโปรเจ็ค</small>
                                            <input
                                                v-model="form.projectName"
                                                type="text"
                                                class="form-control"
                                                placeholder="ชื่อโปรเจ็ค"
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
                                            <label>Buildingsum</label>
                                            <small>/จำนวนอาคาร</small>
                                            <!-- <input
                                                v-model="form.subBuildingsum"
                                                type="number"
                                                min="0"
                                                class="form-control"
                                                placeholder="จำนวนอาคาร"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'subBuildingsum'
                                                    )
                                                }"
                                            /> -->
                                            <number-input
                                                inline
                                                controls
                                                v-model="form.subBuildingsum"
                                                :min="1"
                                                @change="onSubBuildingUpdate"
                                            ></number-input>
                                            <has-error
                                                :form="form"
                                                field="subBuildingsum"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Floor</label>
                                            <small>/ชั้น</small>
                                            <input
                                                v-model="form.floorSum"
                                                type="number"
                                                min="0"
                                                class="form-control"
                                                placeholder="ชั้น"
                                                :disabled="
                                                    form.subBuildingsum > 1
                                                "
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
                                            <label>Room</label>
                                            <small>/ห้อง</small>
                                            <input
                                                v-model="form.roomSum"
                                                type="number"
                                                min="0"
                                                class="form-control"
                                                placeholder="ห้อง"
                                                :disabled="
                                                    form.subBuildingsum > 1
                                                "
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
                                <div v-show="form.subBuildingsum > 1">
                                    <label class="text-danger"
                                        >***เงื่อนไข
                                        เมื่อกรอกจำนวนอาคารย่อยในพื้นที่โครงการ</label
                                    >
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5">ชื่ออาคาร</div>
                                        <div class="col-sm-3">
                                            จำนวนชั้นของอาคาร
                                        </div>
                                        <div class="col-sm-3">
                                            จำนวนห้องของอาคาร
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex p-0 m-0 flex-fill"
                                        v-for="(item, i) in form.subbuilding"
                                        :key="i"
                                    >
                                        <div class="col-sm-1">
                                            <div class="input-group">
                                                <span
                                                    class="input-group-text"
                                                    >{{ i + 1 }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input
                                                    v-model="item.projectName"
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="กรอกชื่ออาคาร"
                                                    value="0"
                                                    required
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'projectName'
                                                        )
                                                    }"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <number-input
                                                    inline
                                                    v-model="item.floorSum"
                                                    :min="1"
                                                    placeholder="จำนวนชั้นของอาคาร"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'floorSum'
                                                        )
                                                    }"
                                                ></number-input>
                                                <has-error
                                                    :form="form"
                                                    field="floorSum"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <number-input
                                                    inline
                                                    v-model="item.roomSum"
                                                    :min="1"
                                                    required
                                                    placeholder="จำนวนห้องในชั้น"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'floorSum'
                                                        )
                                                    }"
                                                ></number-input>
                                                <has-error
                                                    :form="form"
                                                    field="roomSum"
                                                ></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="text-danger">***</label>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Manager Name</label>
                                            <small>/ชื่อผู้จัดการ</small>
                                            <input
                                                v-model="form.nameManager"
                                                type="text"
                                                class="form-control"
                                                placeholder="ชื่อผู้จัดการ"
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
                                            <label>Manager Tel</label>
                                            <small>/เบอร์ผู้จัดการ</small>
                                            <input
                                                v-model="form.phoneManager"
                                                type="text"
                                                class="form-control"
                                                placeholder="เบอร์ผู้จัดการ"
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
                                            <label>Manager Email</label>
                                            <small>/อีเมลล์ผู้จัดการ</small>
                                            <input
                                                v-model="form.mailManager"
                                                type="text"
                                                class="form-control"
                                                placeholder="อีเมลล์ผู้จัดการ"
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
                                            <small>/ชื่อนิติบุคคล</small>
                                            <input
                                                v-model="form.nameNiti"
                                                type="text"
                                                class="form-control"
                                                placeholder="ชื่อนิติบุคคล"
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
                                            <label>Corporation Tel</label>
                                            <small>/เบอร์นิติบุคคล</small>
                                            <input
                                                v-model="form.phoneNiti"
                                                type="text"
                                                class="form-control"
                                                placeholder="เบอร์นิติบุคคล"
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
                                            <label>Corporation Email</label>
                                            <small>/เมลล์นิติบุคคล</small>
                                            <input
                                                v-model="form.mailNiti"
                                                type="text"
                                                class="form-control"
                                                placeholder="เมลล์นิติบุคคล"
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

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Technician Name</label>
                                            <small>/ชื่อช่าง</small>
                                            <input
                                                v-model="form.nameTechnician"
                                                type="text"
                                                class="form-control"
                                                placeholder="ชื่อช่าง"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'nameTechnician'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="nameTechnician"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Technician Tel</label>
                                            <small>/เบอร์ช่าง</small>
                                            <input
                                                v-model="form.phoneTechnician"
                                                type="text"
                                                class="form-control"
                                                placeholder="เบอร์ช่าง"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'phoneTechnician'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="phoneTechnician"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Technician Email</label>
                                            <small>/เมลล์ช่าง</small>
                                            <input
                                                v-model="form.mailTechnician"
                                                type="text"
                                                class="form-control"
                                                placeholder="เมลล์ช่าง"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'mailTechnician'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="mailTechnician"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>House Number</label>
                                            <small>/บ้านเลขที่</small>
                                            <input
                                                v-model="form.houseNumber"
                                                type="text"
                                                class="form-control"
                                                placeholder="บ้านเลขที่"
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
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Moo.</label>
                                            <small>/หมู่</small>
                                            <input
                                                v-model="form.squadNumber"
                                                type="text"
                                                class="form-control"
                                                placeholder="หมู่"
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
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Alley</label>
                                            <small>/ซอย</small>
                                            <input
                                                v-model="form.alleyName"
                                                type="text"
                                                class="form-control"
                                                placeholder="ซอย"
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
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Road</label>
                                            <small>/ถนน</small>
                                            <input
                                                v-model="form.roadName"
                                                type="text"
                                                class="form-control"
                                                placeholder="ถนน"
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
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Sub-district</label>
                                            <small>/ตำบล</small>
                                            <ThailandAutoComplete
                                                v-model="form.districtName"
                                                type="district"
                                                @select="select"
                                                color="#42b883"
                                                size="default"
                                                autocomplete="chrome-off"
                                                placeholder="ตำบล"
                                            />
                                            <has-error
                                                :form="form"
                                                field="districtName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>District</label>
                                            <small>/อำเภอ</small>
                                            <ThailandAutoComplete
                                                v-model="form.countyName"
                                                type="amphoe"
                                                @select="select"
                                                color="#42b883"
                                                size="default"
                                                autocomplete="chrome-off"
                                                placeholder="อำเภอ"
                                            />
                                            <has-error
                                                :form="form"
                                                field="countyName"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <small>/จังหวัด</small>
                                            <ThailandAutoComplete
                                                v-model="form.provinceName"
                                                type="province"
                                                @select="select"
                                                size="default"
                                                color="#42b883"
                                                autocomplete="chrome-off"
                                                placeholder="จังหวัด"
                                            />
                                            <has-error
                                                :form="form"
                                                field="provinceName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Postalcode</label>
                                            <small>/รหัสไปรษณีย์</small>
                                            <ThailandAutoComplete
                                                v-model="form.postalCode"
                                                type="zipcode"
                                                @select="select"
                                                size="default"
                                                color="#42b883"
                                                autocomplete="chrome-off"
                                                placeholder="รหัสไปรษณีย์"
                                            />
                                            <has-error
                                                :form="form"
                                                field="postalCode"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="row d-flex justify-content-center align-items-center"
                                >
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{
                                                translate("building.latitude")
                                            }}</label>
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{
                                                translate("building.longitude")
                                            }}</label>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="form.longitude"
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter your longitude..."
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'longitude'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="longitude"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-2">
                                        <div
                                            class="form-group mx-auto mt-auto mb-auto"
                                        >
                                            <button
                                                type="button"
                                                class="btn btn-outline-success mx-auto mt-auto mb-auto btn-block"
                                                @click="openMapPickerLocation"
                                            >
                                                <i
                                                    class="mdi mdi-map-marker-radius-outline"
                                                ></i>
                                                Pick
                                            </button>
                                        </div>
                                    </div> -->
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Sale Name</label><br />
                                            <small>/ชื่อเซลล์</small>
                                            <select
                                                class="form-control"
                                                v-model="form.saleFm_id"
                                            >
                                                <option value="" disabled
                                                    >--- Select a Class
                                                    ---</option
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
                                                field="nameSale"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Date Contact Start</label
                                            ><br />
                                            <small>/วันเริ่มทำสัญญา</small>
                                            <input
                                                v-model="form.contractStartDate"
                                                type="date"
                                                class="form-control"
                                                :disabled="editmode"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'contractStartDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="contractStartDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Date Contact End</label
                                            ><br />
                                            <small>/วันสิ้นสุดทำสัญญา</small>
                                            <input
                                                ref="contractEndDate"
                                                v-model="form.contractEndDate"
                                                type="date"
                                                class="form-control"
                                                :disabled="editmode"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'contractEndDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="contractEndDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label
                                                >Income payment format *</label
                                            ><br />
                                            <small>/รูปแบบการชำระรายได้</small>
                                            <select
                                                class="form-control"
                                                v-model="form.paymentType_id"
                                            >
                                                <option disabled value=""
                                                    >--- Select a Class
                                                    ---</option
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
                                                field="paymentType"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Revenue sharing model</label
                                            ><br />
                                            <small>/รูปแบบการชำระรายได้</small>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="form.contractTerm"
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="รูปแบบการชำระรายได้"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'contractTerm'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="contractTerm"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="row"
                                    v-show="
                                        form.paymentType_id == '' ||
                                            form.paymentType_id == '3' ||
                                            form.paymentType_id == '1'
                                    "
                                >
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Price to Pay</label>
                                            <small>/ยอดเงิน</small>
                                            <input
                                                v-model="form.balance"
                                                type="text"
                                                value="0"
                                                class="form-control"
                                                placeholder="ยอดเงิน"
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
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Remark contract</label>
                                            <small>/หมายเหตุรูปแบบสัญญา</small>
                                            <input
                                                v-model="form.remarkContract"
                                                type="text"
                                                class="form-control"
                                                placeholder="หมายเหตุรูปแบบสัญญา"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'remarkContract'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="remarkContract"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>{{
                                                translate("building.area")
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areas_id"
                                            >
                                                <option value="" disabled
                                                    >--- Select a Class
                                                    ---</option
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
                                                field="areas_id"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>{{
                                                translate("building.areabbn")
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.bbns_id"
                                                :disabled="form.areas_id == ''"
                                                required
                                            >
                                                <option value="" disabled
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
                                                field="bbns_id"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>{{
                                                translate("building.areatbb")
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.area3bb_id"
                                            >
                                                <option value="" disabled
                                                    >--- Select a Class
                                                    ---</option
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
                                            <label>{{
                                                translate("building.areatrue")
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaTrue_id"
                                            >
                                                <option value="" disabled
                                                    >--- Select a Class
                                                    ---</option
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
                                            <label>{{
                                                translate("building.areaTnew")
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaTrueNew_id"
                                            >
                                                <option value="" disabled
                                                    >--- Select a Class
                                                    ---</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in areaTrueNews"
                                                    :key="item.id"
                                                >
                                                    {{ item.areaTrueNew }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="areaTrueNew"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>{{
                                                translate("building.areaais")
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaAis_id"
                                            >
                                                <option value="" disabled
                                                    >--- Select a Class
                                                    ---</option
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
                                            <label>{{
                                                translate(
                                                    "building.areafibernet"
                                                )
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaFibernet_id"
                                            >
                                                <option value="" disabled
                                                    >--- Select a Class
                                                    ---</option
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
                                            <label>{{
                                                translate(
                                                    "building.operatingtime"
                                                )
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.workTime_id"
                                            >
                                                <option value="" disabled
                                                    >--- Select a Class
                                                    ---</option
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
                                                field="workTime"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Remark</label>
                                            <small>/รีมาร์ค</small>
                                            <textarea
                                                id="remark"
                                                v-model="form.remark"
                                                class="form-control"
                                                placeholder="-"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'remark'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="remark"
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
                                    type="button"
                                    class="btn btn-success"
                                    @click="updateBuilding()"
                                >
                                    {{ translate("building.actions.update") }}
                                </button>
                                <button
                                    v-show="!editmode"
                                    type="button"
                                    class="btn btn-primary"
                                    @click="createBuilding()"
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
import NumberInput from "../partials/NumberInput.vue";
export default {
    title: "All -",
    components: { NumberInput },
    data() {
        return {
            loader: null,
            openWindowPortal: false,
            editmode: false,
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
                areas_id: "",
                bbns_id: "",
                area3bb_id: "",
                areaTrue_id: "",
                areaTrueNew_id: "",
                areaAis_id: "",
                areaFibernet_id: "",
                projectName: "",
                subBuildingsum: 1,
                floorSum: 0,
                roomSum: 0,
                roadName: "",
                nameManager: "",
                phoneManager: "",
                mailManager: "",
                nameNiti: "",
                phoneNiti: "",
                mailNiti: "",
                nameTechnician: "",
                phoneTechnician: "",
                mailTechnician: "",
                houseNumber: "",
                squadNumber: "",
                alleyName: "",
                roadName: "",
                districtName: "",
                provinceName: "",
                countyName: "",
                postalCode: "",
                latitude: "",
                longitude: "",
                contractStartDate: new Date().toISOString().slice(0, 10),
                paymentType_id: "",
                saleFm_id: "",
                contractTerm: "",
                contractEndDate: new Date().toISOString().slice(0, 10),
                balance: 0,
                workTime_id: "",
                remark: "",
                subbuilding: []
            })
        };
    },
    computed: {
        ...mapGetters(["buildings"]),
        ...mapState(["buildings"]),
        areaID() {
            return this.form.areas_id;
        },
        location() {
            return { lon: this.form.longitude, lat: this.form.latitude };
        },
        subBuildingsum() {
            return this.form.subBuildingsum;
        },
        subbuilding() {
            return this.form.subbuilding.length;
        },
        sumFloorOfSubbuilding() {
            return this.form.subbuilding.reduce((total, obj) => {
                return parseInt(obj.floorSum) + parseInt(total);
            }, 0);
        },
        sumRoomOfSubbuilding() {
            return this.form.subbuilding.reduce((total, obj) => {
                return parseInt(obj.roomSum) + parseInt(total);
            }, 0);
        }
    },
    watch: {
        areaID: function(value) {
            this.form.bbN = "";
            axios.get("/bbns?area_id=" + this.form.areas_id).then(response => {
                // console.log(response.data);
                this.bbns = response.data.data;
            });
        },
        form: {
            deep: true,
            handler(value) {
                if (this.form.subBuildingsum > 1) {
                    this.form.floorSum = this.sumFloorOfSubbuilding;
                    this.form.roomSum = this.sumRoomOfSubbuilding;
                }
            }
        }
    },
    methods: {
        onSubBuildingUpdate(newVal, oldVal) {
            console.log(newVal, oldVal);
            if (this.subbuilding != newVal) {
                if (newVal > oldVal) {
                    const loop = newVal - this.subbuilding;
                    if (loop >= 1) {
                        for (var i = 0; i < loop; i++) {
                            this.form.subbuilding.push({
                                projectName: "",
                                floorSum: 0,
                                roomSum: 0
                            });
                        }
                    }
                } else if (newVal < oldVal) {
                    const loop = this.subbuilding - newVal;
                    console.log("onSubBuildingUpdate else" + loop);
                    if (newVal == 1) {
                        this.form.subbuilding = [];
                    }
                    if (loop >= 1) {
                        for (var i = 0; i < loop; i++) {
                            this.form.subbuilding.pop();
                        }
                    }
                }
            }
        },
        select(address) {
            this.form.districtName = address.district;
            this.form.countyName = address.amphoe;
            this.form.provinceName = address.province;
            this.form.postalCode = address.zipcode;
        },
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
        loadAreaTrueNew() {
            axios.get("/areaTrueNews").then(response => {
                this.areaTrueNews = response.data.data;
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
            this.form.errors.clear();
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
            console.log("createBuilding");
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
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            return (
                                '<span><i class="bi bi-building pr-2"></i>' +
                                data +
                                "</span>"
                            );
                        }
                    },
                    {
                        data: "subBuildingsum",
                        render: function(data, type, row, meta) {
                            return (
                                '<span><i class="bi bi-building pr-2"></i>' +
                                data +
                                " ตึก" +
                                "</span>"
                            );
                        }
                    },
                    {
                        data: "floorSum"
                    },
                    {
                        data: "roomSum"
                    },

                    {
                        data: "nameManager"
                    },
                    {
                        data: "phoneManager"
                    },
                    {
                        data: "mailManager"
                    },
                    {
                        data: "nameNiti"
                    },
                    {
                        data: "phoneNiti"
                    },
                    {
                        data: "mailNiti"
                    },
                    {
                        data: "nameTechnician"
                    },
                    {
                        data: "phoneTechnician"
                    },
                    {
                        data: "mailTechnician"
                    },
                    {
                        data: "houseNumber"
                    },
                    {
                        data: "squadNumber"
                    },
                    {
                        data: "alleyName"
                    },
                    {
                        data: "districtName"
                    },
                    {
                        data: "provinceName"
                    },
                    {
                        data: "countyName"
                    },
                    {
                        data: "postalCode"
                    },
                    {
                        data: "countyName"
                    },
                    {
                        data: "latitude"
                    },
                    {
                        data: "longitude"
                    },
                    {
                        data: "contractStartDate"
                    },
                    {
                        data: "contractTerm"
                    },
                    {
                        data: "contractEndDate"
                    },
                    {
                        data: "balance"
                    },
                    {
                        data: "remarkContract"
                    },
                    {
                        data: "remark"
                    },
                    {
                        data: "created_at",
                        render: function(data, type, row, meta) {
                            return moment(data).format("MM/DD/YYYY HH:MM");
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
        LoadingWait.fire();
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        const vm = this;
        this.loadSaleFm();
        this.loadSpendSpace();
        this.loadArea();
        this.loadArea3BB();
        this.loadAreaTrue();
        this.loadAreaTrueNew();
        this.loadAreaAis();
        this.loadAreaFiberNet();
        this.loadWorkTime();
        this.generateTable();
        // $("#addNew").on("hide.bs.modal", function() {
        //     vm.form.reset();
        // });
        setTimeout(() => {
            LoadingWait.close();
        }, 3000);
        // $("input").attr("autocomplete", this.isChrome ? "chrome-off" : "off");
    }
};
</script>
