<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-fw bi bi-people"></i>
                            CONTRACTOR MANAGEMENT
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

                                        <th>ประเภทงาน</th>
                                        <th>ชื่อ/บริษัท</th>
                                        <th>นามสกุล</th>
                                        <th>เบอร์โทร</th>
                                        <th>โทรยืนยัดนัดหมาย</th>
                                        <th>เวลานัดหมายในระบบ</th>
                                        <th>สถานะการยืนยันนัดหมาย</th>
                                        <th>ทีมช่าง</th>
                                        <th>ID ที่ต้องใช้</th>
                                        <th>สถานะงาน</th>
                                        <th>วันนัดหมาย</th>
                                        <th>เวลานัดหมาย</th>
                                        <th>รีมาร์ค (For Zone)</th>
                                        <th>อุปกรณ์ที่ใช้ติดตั้ง1</th>
                                        <th>S/Nที่ใช้ติดตั้ง1</th>
                                        <th>อุปกรณ์ที่ใช้ติดตั้ง2</th>
                                        <th>S/Nที่ใช้ติดตั้ง2</th>
                                        <th>อุปกรณ์ที่ใช้ติดตั้ง3</th>
                                        <th>S/Nที่ใช้ติดตั้ง3</th>
                                        <th>อุปกรณ์ที่ใช้ติดตั้ง4</th>
                                        <th>S/Nที่ใช้ติดตั้ง4</th>
                                        <th>อุปกรณ์ที่ใช้ติดตั้ง5</th>
                                        <th>S/Nที่ใช้ติดตั้ง5</th>
                                        <th>อุปกรณ์ที่ใช้ติดตั้ง6</th>
                                        <th>S/Nที่ใช้ติดตั้ง6</th>
                                        <th>อุปกรณ์ที่ใช้ติดตั้ง7</th>
                                        <th>S/Nที่ใช้ติดตั้ง7</th>
                                        <th>Create At</th>
                                        <th>Updated At</th>
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
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Tpye*</label>
                                            <select
                                                type="text"
                                                class="form-control"
                                                disabled
                                                placeholder="FM-Progress"
                                                :class="
                                                    hasError('type')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                                v-model="form.type"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="ติดตั้ง"
                                                    >ติดตั้ง</option
                                                >
                                                <option value=" ซ่อม"
                                                    >ซ่อม</option
                                                >
                                                <option value="Blow Fiber"
                                                    >Blow Fiber</option
                                                >
                                                <option value="ซ่อมแซมฝ้า"
                                                    >ซ่อมแซมฝ้า</option
                                                >
                                            </select>
                                            <div
                                                v-if="hasError('type')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.type.required
                                                    "
                                                >
                                                    Please provide a valid type.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_name"
                                                )
                                            }}</label>
                                            <input
                                                type="text"
                                                disabled
                                                class="form-control"
                                                placeholder="Enter your Name..."
                                                :class="
                                                    hasError('name')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                                v-model="form.name"
                                            />
                                            <div
                                                v-if="hasError('name')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.name.required
                                                    "
                                                >
                                                    Please provide a valid name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_surname"
                                                )
                                            }}</label>
                                            <input
                                                v-model="form.surname"
                                                disabled
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your surname..."
                                                :class="
                                                    hasError('surname')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            />
                                            <div
                                                v-if="hasError('surname')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.surname
                                                            .required
                                                    "
                                                >
                                                    Please provide a valid
                                                    surname.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>{{
                                                translate("planing.planing_tel")
                                            }}</label>
                                            <input
                                                v-model="form.tel"
                                                disabled
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your tel..."
                                                :class="
                                                    hasError('tel')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            />
                                            <div
                                                v-if="hasError('tel')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="!$v.form.tel.required"
                                                >
                                                    Please provide a valid tel.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_tel2"
                                                )
                                            }}</label>
                                            <input
                                                v-model="form.tel2"
                                                disabled
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your tel2..."
                                                :class="
                                                    hasError('tel2')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            />
                                            <div
                                                v-if="hasError('tel2')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.tel2.required
                                                    "
                                                >
                                                    Please provide a valid tel2.
                                                </div>
                                            </div>
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
                                            <label>{{
                                                translate(
                                                    "planing.building_project"
                                                )
                                            }}</label>
                                            <Select2
                                                v-model="form.building_id"
                                                disabled
                                                :options="building"
                                                :settings="settings"
                                                :class="
                                                    hasError('building_id')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            >
                                            </Select2>
                                            <div
                                                v-if="hasError('building_id')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.building_id
                                                            .required
                                                    "
                                                >
                                                    Please provide a valid
                                                    building_id.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tab-content>

                            <tab-content title="Progress">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Callver</label>
                                            <small>/โทรยืนยัดนัดหมาย</small>
                                            <select
                                                class="form-control"
                                                v-model="form.callver_id"
                                            >
                                                <option disabled value=""
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
                                            <label>Appointment Time</label>
                                            <small>/เวลานัดหมาย ในระบบ</small>
                                            <input
                                                v-model="
                                                    form.appointmentTimeCustomer
                                                "
                                                type="time"
                                                class="form-control"
                                                placeholder="เวลานัดหมาย ในระบบ"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'appointmentTimeCustomer'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="appointmentTimeCustomer"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Callver Status</label>
                                            <small
                                                >/สถานะการยืนยันนัดหมาย</small
                                            >
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
                                                field="callverStatus"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>ID Required</label>
                                            <small>/ID ที่ต้องใช้</small>
                                            <input
                                                v-model="form.idRequired"
                                                type="text"
                                                class="form-control"
                                                placeholder="ID ที่ต้องใช้"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'idRequired'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="idRequired"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Problemsolution</label>
                                            <small>/สถานะงาน</small>
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
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Confirm Appointment</label>
                                            <small>/วันนัดหมาย</small>
                                            <input
                                                v-model="
                                                    form.confirmAppointment
                                                "
                                                type="date"
                                                class="form-control"
                                                placeholder="สถานะการยืนยันนัดหมาย"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'confirmAppointment'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="confirmAppointment"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label
                                                >Confirm Appointment Time</label
                                            >
                                            <small>/เวลานัดหมาย</small>
                                            <input
                                                v-model="
                                                    form.confirmAppointmentTime
                                                "
                                                type="time"
                                                class="form-control"
                                                placeholder="สถานะการยืนยันนัดหมาย"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'confirmAppointmentTime'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="confirmAppointmentTime"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Remark (For Zone)</label>
                                            <small>/รีมาร์ค</small>
                                            <textarea
                                                v-model="form.reMarkzone"
                                                class="form-control"
                                                placeholder="-"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'reMarkzone'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="reMarkzone"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                            </tab-content>
                            <tab-content title="Sale Detail">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Installation equipment 1</label
                                            >
                                            <small
                                                >/อุปกรณ์ที่ใช้ติดตั้ง 1</small
                                            >
                                            <input
                                                v-model="form.equipmentInstall1"
                                                type="text"
                                                class="form-control"
                                                placeholder="อุปกรณ์ที่ใช้ติดตั้ง 1"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'equipmentInstall1'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="equipmentInstall1"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>S/N used to install 1</label>
                                            <small>/ S/N ที่ใช้ติดตั้ง 1</small>
                                            <input
                                                v-model="form.snInstall1"
                                                type="text"
                                                class="form-control"
                                                placeholder="S/N ที่ใช้ติดตั้ง 1"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'snInstall1'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="snInstall1"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Installation equipment 2</label
                                            >
                                            <small
                                                >/อุปกรณ์ที่ใช้ติดตั้ง 2</small
                                            >
                                            <input
                                                v-model="form.equipmentInstall2"
                                                type="text"
                                                class="form-control"
                                                placeholder="อุปกรณ์ที่ใช้ติดตั้ง 2"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'equipmentInstall2'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="equipmentInstall2"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>S/N used to install 2</label>
                                            <small>/S/N ที่ใช้ติดตั้ง 2</small>
                                            <input
                                                v-model="form.snInstall2"
                                                type="text"
                                                class="form-control"
                                                placeholder="S/N ที่ใช้ติดตั้ง 2"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'snInstall2'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="snInstall2"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Installation equipment 3</label
                                            >
                                            <small
                                                >/อุปกรณ์ที่ใช้ติดตั้ง 3</small
                                            >
                                            <input
                                                v-model="form.equipmentInstall3"
                                                type="text"
                                                class="form-control"
                                                placeholder="อุปกรณ์ที่ใช้ติดตั้ง 3"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'equipmentInstall3'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="equipmentInstall3"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>S/N used to install 3</label>
                                            <small>/S/N ที่ใช้ติดตั้ง 3</small>
                                            <input
                                                v-model="form.snInstall3"
                                                type="text"
                                                class="form-control"
                                                placeholder="S/N ที่ใช้ติดตั้ง 3"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'snInstall3'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="snInstall3"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Installation equipment 4</label
                                            >
                                            <small
                                                >/อุปกรณ์ที่ใช้ติดตั้ง 4</small
                                            >
                                            <input
                                                v-model="form.equipmentInstall4"
                                                type="text"
                                                class="form-control"
                                                placeholder="อุปกรณ์ที่ใช้ติดตั้ง 4"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'equipmentInstall4'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="equipmentInstall4"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>S/N used to install 4</label>
                                            <small>/S/N ที่ใช้ติดตั้ง 4</small>
                                            <input
                                                v-model="form.snInstall4"
                                                type="text"
                                                class="form-control"
                                                placeholder="S/N ที่ใช้ติดตั้ง 4"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'snInstall4'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="snInstall4"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Installation equipment 5</label
                                            >
                                            <small
                                                >/อุปกรณ์ที่ใช้ติดตั้ง 5</small
                                            >
                                            <input
                                                v-model="form.equipmentInstall5"
                                                type="text"
                                                class="form-control"
                                                placeholder="อุปกรณ์ที่ใช้ติดตั้ง 5"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'equipmentInstall5'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="equipmentInstall5"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>S/N used to install 5</label>
                                            <small>/S/N ที่ใช้ติดตั้ง 5</small>
                                            <input
                                                v-model="form.snInstall5"
                                                type="text"
                                                class="form-control"
                                                placeholder="S/N ที่ใช้ติดตั้ง 5"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'snInstall5'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="snInstall5"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Installation equipment 6</label
                                            >
                                            <small
                                                >/อุปกรณ์ที่ใช้ติดตั้ง 6</small
                                            >
                                            <input
                                                v-model="form.equipmentInstall6"
                                                type="text"
                                                class="form-control"
                                                placeholder="อุปกรณ์ที่ใช้ติดตั้ง 6"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'equipmentInstall6'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="equipmentInstall6"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>S/N used to install 6</label>
                                            <small>/S/N ที่ใช้ติดตั้ง 6</small>
                                            <input
                                                v-model="form.snInstall6"
                                                type="text"
                                                class="form-control"
                                                placeholder="S/N ที่ใช้ติดตั้ง 6"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'snInstall6'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="snInstall6"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Installation equipment 7</label
                                            >
                                            <small
                                                >/อุปกรณ์ที่ใช้ติดตั้ง 7</small
                                            >
                                            <input
                                                v-model="form.equipmentInstall7"
                                                type="text"
                                                class="form-control"
                                                placeholder="อุปกรณ์ที่ใช้ติดตั้ง 7"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'equipmentInstall7'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="equipmentInstall7"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>S/N used to install 7</label>
                                            <small>/S/N ที่ใช้ติดตั้ง 7</small>
                                            <input
                                                v-model="form.snInstall7"
                                                type="text"
                                                class="form-control"
                                                placeholder="S/N ที่ใช้ติดตั้ง 7"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'snInstall7'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="snInstall7"
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
                snInstall7: ""
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
                .post("/plannings/import", formData, {
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
        goToImportPanel() {
            this.$router.push({ path: "importData" });
        },
        dowloadExcelTemplate() {
            const workbook = ExcelJS.Workbook();
            workbook.creator = "Firstmile System";
            workbook.created = new Date();
            workbook.modified = new Date();
            const customerSheet = workbook.addWorksheet("customer");
            customerSheet.columns = [
                { header: "Name", key: "name" },
                { header: "Surname", key: "surname" },
                { header: "Tel.", key: "tel" },
                { header: "Tel2.", key: "tel2" }
            ];
            workbook.xlsx.writeFile("customer");
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
                    leftColumns: 3,
                    rightColumns: 3
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
                        className: "bg-success",
                        text: "<i class='bi bi-file-text mr-1'></i>AIS",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("Ais")
                                .draw();
                        }
                    },
                    {
                        className: "bg-danger",
                        text: "<i class='bi bi-file-text mr-1'></i>TRUE",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("TRUE")
                                .draw();
                        }
                    },
                    {
                        className: "bg-primary",
                        text: "<i class='bi bi-file-text mr-1'></i>TOT",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("TOT")
                                .draw();
                        }
                    },
                    {
                        className: "bg-danger",
                        text: "<i class='bi bi-file-text mr-1'></i>FINET",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("Fibernet")
                                .draw();
                        }
                    },
                    {
                        className: "bg-warning",
                        text: "<i class='bi bi-file-text mr-1'></i>FN",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("FN")
                                .draw();
                        }
                    },
                    {
                        className: "bg-danger",
                        text: "<i class='bi bi-file-text mr-1'></i>3BB",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("3BB")
                                .draw();
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
                    // {
                    //     data: "task_id",
                    //     render: function(data, type, row, meta) {
                    //         return (
                    //             `<a href="/progress?task=${data}" target="blank">` +
                    //             `#${data}` +
                    //             "</a>"
                    //         );
                    //     }
                    // },
                    {
                        data: "type",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "ซ่อม") {
                                return (
                                    '<span class="badge rounded-pill bg-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "ติดตั้ง") {
                                return (
                                    '<span class="badge rounded-pill bg-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "ซ่อมแซมฝ้า") {
                                return (
                                    '<span class="badge rounded-pill bg-info text-dark">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "Blow Fiber") {
                                return (
                                    '<span class="badge rounded-pill bg-primary">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "building.projectName",
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
                        data: "name",
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
                        data: "surname",
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
                        data: "tel",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "callver_id",
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
                        data: "callverStatus_id",
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
                        data: "problemsolution_id",
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
                        data: "appointmentTimeCustomer",
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
                        data: "idRequired",
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
                        data: "confirmAppointment",
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
                        data: "confirmAppointmentTime",
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
                        data: "reMarkzone",
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
                        data: "equipmentInstall1",
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
                        data: "snInstall1",
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
                        data: "equipmentInstall2",
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
                        data: "snInstall2",
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
                        data: "equipmentInstall3",
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
                        data: "snInstall3",
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
                        data: "equipmentInstall4",
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
                        data: "snInstall4",
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
                        data: "equipmentInstall5",
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
                        data: "snInstall5",
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
                        data: "equipmentInstall6",
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
                        data: "snInstall6",
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
                        data: "equipmentInstall7",
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
                        data: "snInstall7",
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
