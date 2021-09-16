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
                                            <th>{{ translate("building.building_project") }}</th>
                                            <th>{{ translate("building.building_fmcode") }}</th>
                                            <th>{{ translate("building.building_areatot") }}</th>
                                            <th>{{ translate("building.building_areabbn") }}</th>
                                            <th>{{ translate("building.building_3bb") }}</th>
                                            <th>{{ translate("building.building_areatrue") }}</th>
                                            <th>{{ translate("building.building_areatrueNew") }}</th>
                                            <th>{{ translate("building.building_areaais") }}</th>
                                            <th>{{ translate("building.building_areafibernet") }}</th>
                                            <th>{{ translate("building.building_buildingsum") }}</th>
                                            <th>{{ translate("building.building_floorsum") }}</th>
                                            <th>{{ translate("building.building_roomsum") }}</th>
                                            <th>{{ translate("building.building_managername") }}</th>
                                            <th>{{ translate("building.building_managerphone") }}</th>
                                            <th>{{ translate("building.building_manageremail") }}</th>
                                            <th>{{ translate("building.building_corporationname") }}</th>
                                            <th>{{ translate("building.building_corporationphone") }}</th>
                                            <th>{{ translate("building.building_corporationemail") }}</th>
                                            <th>{{ translate("building.building_housenumber") }}</th>
                                            <th>{{ translate("building.building_swine") }}</th>
                                            <th>{{ translate("building.building_alley") }}</th>
                                            <th>{{ translate("building.building_road") }}</th>
                                            <th>{{ translate("building.building_districtdistrict") }}</th>
                                            <th>{{ translate("building.building_province") }}</th>
                                            <th>{{ translate("building.building_Sub-district") }}</th>
                                            <th>{{ translate("building.building_postalcode") }}</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th>{{ translate("building.building_salename") }}</th>
                                            <th>{{ translate("building.building_datecontact") }}</th>
                                            <th>{{ translate("building.building_datecontactend") }}</th>
                                            <th>{{ translate("building.building_spendspace") }}</th>
                                            <th>{{ translate("building.building_incomemodel") }}</th>
                                            <th>{{ translate("building.building_contractperiod") }}</th>
                                            <th>{{ translate("building.building_condition") }}</th>
                                            <th>{{ translate("building.building_pricetopay") }}</th>
                                            <th>{{ translate("building.building_operatingtime") }}</th>
                                            <th>create</th>
                                            <th>updated</th>
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
                                            <label>{{ translate("building.building_project") }}</label>
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
                                            <label>{{ translate("building.building_fmcode") }}</label>
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
                                            <label>{{ translate("building.building_buildingsum") }}</label>
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
                                            <label>{{ translate("building.building_floorsum") }}</label>
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
                                            <label>{{ translate("building.building_roomsum") }}</label>
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
                                            <label>{{ translate("building.building_managername") }}</label>
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
                                            <label>{{ translate("building.building_managerphone") }}</label>
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
                                            <label>{{ translate("building.building_manageremail") }}</label>
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
                                            <label>{{ translate("building.building_corporationname") }}</label>
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
                                            <label>{{ translate("building.building_corporationphone") }}</label>
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
                                            <label>{{ translate("building.building_corporationemail") }}</label>
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
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{ translate("building.building_housenumber") }}</label>
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
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{ translate("building.building_swine") }}</label>
                                            <input
                                                v-model="form.squadNumber"
                                                type="text"
                                                class="form-control"
                                                placeholder="House number..."
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
                                            <label>{{ translate("building.building_alley") }}</label>
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
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{ translate("building.building_road") }}</label>
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
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <ThailandAutoComplete
                                                v-model="form.districtName"
                                                type="district"
                                                @select="select"
                                                label="Sub-district"
                                                color="#42b883"
                                                size="default"
                                                autocomplete="chrome-off"
                                                placeholder="sub district..."
                                            />
                                            <has-error
                                                :form="form"
                                                field="districtName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <ThailandAutoComplete
                                                v-model="form.countyName"
                                                type="amphoe"
                                                @select="select"
                                                color="#42b883"
                                                label="districtdistrict"
                                                size="default"
                                                autocomplete="chrome-off"
                                                placeholder="District..."
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
                                            <ThailandAutoComplete
                                                v-model="form.provinceName"
                                                type="province"
                                                @select="select"
                                                label="province"
                                                size="default"
                                                color="#42b883"
                                                autocomplete="chrome-off"
                                                placeholder="Province..."
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
                                            <ThailandAutoComplete
                                                v-model="form.postalCode"
                                                type="zipcode"
                                                @select="select"
                                                size="default"
                                                color="#42b883"
                                                label="postalcode"
                                                autocomplete="chrome-off"
                                                placeholder="Postal Code..."
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Longtude</label>
                                            <div class="input-group mb-3">
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
                                            <label>{{ translate("building.building_salename") }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.saleFm_id"
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
                                                field="nameSale"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>{{ translate("building.building_datecontact") }}</label>
                                            <input
                                                ref="contractDate"
                                                v-model="form.contractDate"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your contract date..."
                                                :disabled="editmode"
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
                                            <label>{{ translate("building.building_datecontactend") }}</label>
                                            <input
                                                ref="contractDateEnd"
                                                v-model="form.contractDateEnd"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your contract date..."
                                                :disabled="editmode"
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
                                            <label>*รูปแบบการชำระรายได้</label>
                                            <select
                                                class="form-control"
                                                v-model="form.paymentType_id"
                                            >
                                                <option disabled value=""
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
                                                field="paymentType"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>{{ translate("building.building_incomemodel") }}</label>
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
                                                type="date"
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
                                            <label>{{ translate("building.building_contractperiod") }}</label>
                                            <input
                                                v-model="form.reNewContact"
                                                type="date"
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
                                            <label>{{ translate("building.building_pricetopay") }}</label>
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
                                            <label>{{ translate("building.building_areatot") }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areas_id"
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
                                                field="areas_id"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>{{ translate("building.building_areabbn") }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.bbns_id"
                                                :disabled="form.areas_id == ''"
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
                                                field="bbns_id"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>{{ translate("building.building_3bb") }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.area3bb_id"
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
                                            <label>{{ translate("building.building_areatrue") }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaTrue_id"
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
                                            <label>{{ translate("building.building_areatrueNew") }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaTrueNew_id"
                                            >
                                                <option value=""
                                                    >Select a Class</option
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
                                            <label>{{ translate("building.building_areaais") }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaAis_id"
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
                                            <label>{{ translate("building.building_areafibernet") }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.areaFibernet_id"
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
                                            <label>{{ translate("building.building_operatingtime") }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.workTime_id"
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
    components: {

    },
    data() {
        return {
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
                saleFm_id: "",
                paymentType_id: "",
                areas_id: "",
                bbns_id: "",
                area3bb_id: "",
                areaTrue_id: "",
                areaTrueNew_id: "",
                areaAis_id: "",
                areaFibernet_id: "",
                workTime_id: "",
                projectName: "",
                buildingSum: "",
                floorSum: "",
                roomSum: "",
                fmCode: "",
                roadName: "",
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
                provinceName: "",
                countyName: "",
                postalCode: "",
                longitude: "",
                latitude: "",
                contractDate: new Date().toISOString().slice(0, 10),
                contractDateEnd: new Date().toISOString().slice(0, 10),
                condition: "",
                contractPeriod: new Date().toISOString().slice(0, 10),
                reNewContact: new Date().toISOString().slice(0, 10),
                balance: ""
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
        }
    },
    watch: {
        areaID: function(value) {
            this.form.bbN = "";
            axios.get("/bbns?area_id=" + this.form.areas_id).then(response => {
                // console.log(response.data);
                this.bbns = response.data.data;
            });
        }
    },
    methods: {
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
                    rightColumns: 3
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
                        data: "areas.name",
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
                        data: "bbns.name",
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
                        data: "area3bb.name",
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
                        data: "area_true.name",
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
                        data: "area_true_new.name"
                    },
                    {
                        data: "area_ais.name",
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
                        data: "area_fibernet.name",
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
                        data: "buildingSum"
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
                        data: "houseNumber"
                    },
                    {
                        data: "squadNumber"
                    },
                    {
                        data: "alleyName"
                    },
                    {
                        data: "roadName"
                    },
                    {
                        data: "districtName"
                    },
                    {
                        data: "countyName"
                    },
                    {
                        data: "provinceName"
                    },
                    {
                        data: "postalCode"
                    },
                    {
                        data: "longitude"
                    },
                    {
                        data: "latitude"
                    },
                    {
                        data: "sale_fm.name",
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
                        data: "contractDate"
                    },
                    {
                        data: "contractDateEnd"
                    },
                    {
                        data: "payment_type.name",
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
                        data: "condition"
                    },
                    {
                        data: "contractPeriod"
                    },
                    {
                        data: "reNewContact"
                    },
                    {
                        data: "balance",
                        render: function(data, type, row, meta) {
                            if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return (
                                    "฿" +
                                    data
                                        .toString()
                                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                );
                            }
                        }
                    },
                    {
                        data: "work_time.name",
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
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
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
        this.loadMap();
        // $("input").attr("autocomplete", this.isChrome ? "chrome-off" : "off");
    }
};
</script>
