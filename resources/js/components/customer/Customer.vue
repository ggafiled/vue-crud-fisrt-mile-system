<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-fw bi bi-people"></i>
                            {{ translate("CUSTOMER MANAGEMENT") }}
                        </h2>
                        <div class="card-tools">
                            <a
                                href="/dowloadCustomerTemplate"
                                class="btn btn-sm btn-primary"
                                target="blank"
                            >
                                <i
                                    class="fa fa-download"
                                    aria-hidden="true"
                                ></i>
                                {{ translate("constitution.download") }}
                            </a>
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
                                        <th>
                                            {{
                                                translate(
                                                    "planing.planing_task_number"
                                                )
                                            }}
                                        </th>
                                        <th>Type</th>
                                        <th>ชื่อ/บริษัท</th>
                                        <th>นามสกุล</th>
                                        <th>เบอร์โทร</th>
                                        <th>เบอร์โทร2</th>
                                        <th>ชื่อตึก</th>
                                        <th>บ้านเลขที่</th>
                                        <th>ซอย</th>
                                        <th>หมู่</th>
                                        <th>ถนน</th>
                                        <th>อำเภอ</th>
                                        <th>จังหวัด</th>
                                        <th>ตำบล</th>
                                        <th>รหัสไปรษณีย์</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>จำนวนอาคาร</th>
                                        <th>จำนวนชั้น</th>
                                        <th>จำนวนห้อง</th>
                                        <th>เครือข่ายที่ติดตั้ง</th>
                                        <th>รายละเอียดตัวแทน</th>
                                        <th>เลข circuit</th>
                                        <th>ค่าธรรมเนียมแรกเข้า</th>
                                        <th>ประเภทงาน</th>
                                        <th>วันที่นัดหมาย</th>
                                        <th>เวลานัดหมาย</th>
                                        <th>ช่างทีมที่1</th>
                                        <th>ช่างทีมที่2</th>
                                        <th>เบอร์โทร</th>
                                        <th>อีเมลล์</th>
                                        <th>ผู้ให้บริการ</th>
                                        <th>status</th>
                                        <th>sub-Status</th>
                                        <th>รีมาร์ค (For Admin)</th>
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

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label
                                                ><th>
                                                    {{
                                                        translate(
                                                            "planing.planing_theBuilding"
                                                        )
                                                    }}
                                                </th></label
                                            >
                                            <input
                                                v-model="form.theBuilding"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="
                                                    hasError('theBuilding')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            />
                                            <div
                                                v-if="hasError('theBuilding')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.theBuilding
                                                            .required
                                                    "
                                                >
                                                    Please provide a valid
                                                    theBuilding.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_floor"
                                                )
                                            }}</label>
                                            <input
                                                v-model="form.floor"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your floor..."
                                                :class="
                                                    hasError('floor')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            />
                                            <div
                                                v-if="hasError('floor')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.floor.required
                                                    "
                                                >
                                                    Please provide a valid
                                                    floor.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_room"
                                                )
                                            }}</label>
                                            <input
                                                v-model="form.room"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your room..."
                                                :class="
                                                    hasError('room')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            />
                                            <div
                                                v-if="hasError('room')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.room.required
                                                    "
                                                >
                                                    Please provide a valid room.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>{{
                                                translate("planing.planing_isp")
                                            }}</label>
                                            <select
                                                class="form-control"
                                                :class="
                                                    hasError('isp_id')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                                v-model="form.isp_id"
                                            >
                                                <option value="" disabled>
                                                    --- Select a Class ---
                                                </option>
                                                <option
                                                    :value="item.id"
                                                    v-for="item in isps"
                                                    :key="item.id"
                                                >
                                                    {{ item.isp }}
                                                </option>
                                            </select>
                                            <div
                                                v-if="hasError('isp_id')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.isp_id.required
                                                    "
                                                >
                                                    Please provide a valid
                                                    isp_id.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_agentdetail"
                                                )
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.agentDetail_id"
                                                :class="
                                                    hasError('agentDetail_id')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            >
                                                <option value="" disabled>
                                                    --- Select a Class ---
                                                </option>
                                                <option
                                                    :value="item.id"
                                                    v-for="item in agents"
                                                    :key="item.id"
                                                >
                                                    {{ item.agentDetail }}
                                                </option>
                                            </select>
                                            <div
                                                v-if="
                                                    hasError('agentDetail_id')
                                                "
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.agentDetail_id
                                                            .required
                                                    "
                                                >
                                                    Please provide a valid
                                                    agentDetail_id.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_circuit"
                                                )
                                            }}</label>
                                            <input
                                                v-model="form.circuit"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your circuit..."
                                                :class="
                                                    hasError('circuit')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            />
                                            <div
                                                v-if="hasError('circuit')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.circuit
                                                            .required
                                                    "
                                                >
                                                    Please provide a valid
                                                    circuit.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_entrancefee"
                                                )
                                            }}</label>
                                            <input
                                                v-model="form.entranceFee"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your entrance fee..."
                                                :class="
                                                    hasError('entranceFee')
                                                        ? 'is-invalid'
                                                        : ''
                                                "
                                            />
                                            <div
                                                v-if="hasError('entranceFee')"
                                                class="invalid-feedback"
                                            >
                                                <div
                                                    class="error"
                                                    v-if="
                                                        !$v.form.entranceFee
                                                            .required
                                                    "
                                                >
                                                    Please provide a valid
                                                    entranceFee.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tab-content>
                            <tab-content title="Project Detail">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_jobtype"
                                                )
                                            }}</label>
                                            <select
                                                class="form-control"
                                                v-model="form.jobtype_id"
                                            >
                                                <option value="" disabled>
                                                    --- Select a Class ---
                                                </option>
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_appointmentdate"
                                                )
                                            }}</label>
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
                                            <!-- <datepicker class="form-control" v-model="form.appointmentDate" :language="th"></datepicker> -->
                                            <has-error
                                                :form="form"
                                                field="appointmentDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>{{
                                                translate(
                                                    "planing.planing_appointmenttime"
                                                )
                                            }}</label>
                                            <vue-timepicker
                                                format="HH:mm"
                                                drop-direction="auto"
                                                fixed-dropdown-button
                                                hide-clear-button
                                                v-model="form.appointmentTime"
                                                :minute-interval="10"
                                                class="w-100"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'appointmentTime'
                                                    )
                                                }"
                                            >
                                                <template v-slot:dropdownButton>
                                                    <i class="bi bi-clock"></i>
                                                </template>
                                            </vue-timepicker>
                                            <has-error
                                                :form="form"
                                                field="appointmentTime"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                              
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>ชื่อช่าง Planing</label>
                                            <select
                                                class="form-control"
                                                v-model="form.technician_id"
                                            >
                                                <option value="" disabled>
                                                    --- Select a Class ---
                                                </option>
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
                                                field="technician"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>ชื่อช่าง Planing ทีมที่2</label>
                                            <select
                                                class="form-control"
                                                v-model="form.technician2_id"
                                            >
                                                <option value="" disabled>
                                                    --- Select a Class ---
                                                </option>
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
                                                field="technician2"
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
                                                <option value="" disabled>
                                                    --- Select a Class ---
                                                </option>
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
                                            <label>Remark</label>
                                            <small>/รีมาร์ค</small>
                                            <textarea
                                                id="remark"
                                                v-model="form.reMark"
                                                class="form-control"
                                                placeholder="-"
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
            loader: null,
            editmode: false,
            onprogress: false,
            selected: "",
            building: [],
            technician: [],
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
                technician_id: "",
                technician2_id: "",
                ispId_id: "",
                projectName: "",
                isp: "",
                agentDetail: "",
                jobtype: "",
                technician: "",
                technician2: "",
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
                reMark: "-"
            })
        };
    },
    methods: {
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
                    {
                        data: "task_id",
                        render: function(data, type, row, meta) {
                            return (
                                `<a href="/progress?task=${data}" target="blank">` +
                                `#${data}` +
                                "</a>"
                            );
                        }
                    },
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
                        data: "tel2",
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
                        data: "building.houseNumber",
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
                        data: "building.squadNumber",
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
                        data: "building.alleyName",
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
                        data: "building.roadName",
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
                        data: "building.districtName",
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
                        data: "building.countyName",
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
                        data: "building.provinceName",
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
                        data: "building.postalCode",
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
                        data: "building.longitude",
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
                        data: "building.latitude",
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
                        data: "theBuilding",
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
                        data: "floor",
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
                        data: "room",
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
                        data: null,
                        render: function(data, type, row, meta) {
                            if (data.isp) {
                                return (
                                    '<span class="badge text-white" style="background: ' +
                                    data.isp.isps_color +
                                    '">' +
                                    data.isp.name +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "agent_detail.name",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "entranceFee",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                            if (data == "" || data == null) {
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
                        data: "appointmentTime",
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
                        data: "technician.teamTechnician",
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
                        data: "technician.teamTechnician",
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
                        data: "technician.phoneTechnician",
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
                        data: "technician.emailTechnician",
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
                        data: null,
                        title: "ผู้ให้บริการ",
                        render: function(data, type, row, meta) {
                            if (data.isp_id) {
                                return (
                                    '<span class="badge text-white" style="background: ' +
                                    data.isp_id.isps_color +
                                    '">' +
                                    data.isp_id.name +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "status",
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
                        data: "subStatus",
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
                        data: "reMark",
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
        this.loadTachnician();
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
