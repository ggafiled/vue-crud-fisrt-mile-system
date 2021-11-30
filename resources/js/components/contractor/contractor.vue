<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-fw bi bi-aspect-ratio"></i>
                            Contractor Management
                        </h2>
                        <div class="card-tools">
                            <button
                                type="button"
                                class="btn btn-sm btn-primary"
                                @click="newModal"
                            >
                                <i class="fa fa-plus-square"></i>
                                {{ translate("constitution.addnew") }}
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="contractor"
                                ref="contractor"
                                class="display nowrap"
                                style="width: 100%"
                            >
                                <thead>
                                    <tr class="info">
                                        <th></th>
                                        <th>Project Name</th>
                                        <th>Callver</th>
                                        <th>Appointment Time Customer</th>
                                        <th>Callver Status</th>
                                        <th>Technicians</th>
                                        <th>ID Required</th>
                                        <th>Problemsolution</th>
                                        <th>Confirm Appointment</th>
                                        <th>Confirm Appointment Time</th>
                                        <th>ReMark Zone</th>
                                        <th>EquipmentInstall1</th>
                                        <th>SnInstall1</th>
                                        <th>EquipmentInstall2</th>
                                        <th>SnInstall2</th>
                                        <th>EquipmentInstall3</th>
                                        <th>SnInstall3</th>
                                        <th>EquipmentInstall4</th>
                                        <th>SnInstall4</th>
                                        <th>EquipmentInstall5</th>
                                        <th>SnInstall5</th>
                                        <th>EquipmentInstall6</th>
                                        <th>SnInstall6</th>
                                        <th>EquipmentInstall7</th>
                                        <th>SnInstall7</th>
                                        <th>Update At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
                                {{ translate("constitution.create.header") }}
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                {{ translate("constitution.update.header") }}
                            </h5>
                            <div
                                class="
                  d-flex
                  flex-row
                  justify-space-between
                  align-items-center
                  text-wrap
                "
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
                            <tab-content title="Project Names" :selected="true">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <small>/ชื่อโปรเจ็ค</small>
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
                                                    v-for="item in callver"
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
                                                <option disabled value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in callverStatus"
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
                            </tab-content>
                            <tab-content title="Progress">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Technician</label>
                                            <small>/ทีมช่าง</small>
                                            <select
                                                class="form-control"
                                                v-model="form.technicians_id"
                                            >
                                                <option disabled value=""
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
                                                field="technicians"
                                            ></has-error>
                                        </div>
                                    </div>
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
                                                <option disabled value=""
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
                                            <label>Confirm Appointment Time</label>
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
                                        @click.native="updateConstarution()"
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
                                        @click.native="createContractor()"
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
import Select2 from "v-select2-component";
import Uploader from "vux-uploader-component";
import { mapGetters, mapState } from "vuex";
import NumberInput from "../partials/NumberInput.vue";

export default {
    title: "Constarution -",
    components: { Select2, Uploader, NumberInput },

    data() {
        return {
            loader: null,
            openWindowPortal: false,
            editmode: false,
            onprogress: false,
            selected: "",
            building: [],
            callver: [],
            callverStatus: [],
            technicians: [],
            problemsolution: [],
            fileList: [],
            settings: {
                placeholder: { id: "-1", text: "-----กรุณาเลือกโครงการ-----" },
                allowClear: false,
                dropdownParent: ".modal"
            },
            sportsData: ["Badminton", "Cricket", "Football", "Golf", "Tennis"],
            form: new Form({
                id: "",
                building_id: "",
                projectName: "",
                customer_id: "",
                callver_id: "",
                callver: "",
                callverStatus_id: "",
                callverStatus: "",
                problemsolution_id: "",
                problemsolution: "",
                technicians_id: "",
                technicians: "",
                confirmAppointment: "",
                confirmAppointmentTime: "",
                appointmentTimeCustomer: "",
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
        loadcallver() {
            axios.get("/callvers").then(response => {
                this.callver = response.data.data;
            });
        },
        loadcallverStatus() {
            axios.get("/callverstatuses").then(response => {
                this.callverStatus = response.data.data;
            });
        },
        loadTechnicians() {
            axios.get("/technicians").then(response => {
                this.technicians = response.data.data;
            });
        },
        loadProblemsolution() {
            axios.get("/problemsolutions").then(response => {
                this.problemsolutions = response.data.data;
            });
        },
        loadBuildings() {
            axios.get("/constarution/retrieveBuilding").then(
                response =>
                    (this.building = response.data.data.map(a => {
                        return { text: a.projectName, id: a.id };
                    }))
            );
        },
        loadContractor() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                $("#contractor")
                    .DataTable()
                    .ajax.reload();
            }

            this.$Progress.finish();
        },
        async updateContractor() {
            this.$Progress.start();
            // console.log('Editing data');
            this.onprogress = true;
            await this.form
                .put("/contractor/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');

                    this.loadContractor();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            setTimeout(() => {
                this.onprogress = false;
            }, 2000);
        },
        editModal(Contractor) {
            this.editmode = true;
            this.form.reset();
            this.form.errors.clear();
            console.log(Contractor);
            $("#addNew").modal("show");
            this.form.fill(Contractor);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteContractor(item) {
            Swal.fire({
                title: window.translate(
                    "constitution.alert.delete_building_title"
                ),
                text:
                    window.translate(
                        "constitution.alert.delete_building_text"
                    ) + ` [${item.building.projectName}]`,
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                cancelButtonText: window.translate(
                    "constitution.alert.delete_building_cancel_button_text"
                ),
                confirmButtonText: window.translate(
                    "constitution.alert.delete_building_confirm_button_text"
                )
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete("/contractor/" + item.id)
                        .then(() => {
                            Swal.fire(
                                window.translate(
                                    "constitution.alert.comfirm_delete_title"
                                ),
                                window.translate(
                                    "constitution.alert.confirm_delete_message"
                                ),
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadBuildings();
                            this.loadContractor();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        async createContractor() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.onprogress = true;
            await this.form
                .post("/contractor")
                .then(response => {
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.loadContractor();
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
            var table = $(this.$refs.contractor).DataTable({
                dom: "Blfrtip",
                ajax: "/api/contractor",
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
                        data: "building.projectName"
                    },
                    {
                        data: "callver_id"
                    },
                    {
                        data: "appointmentTimeCustomer"
                    },
                    {
                        data: "callverStatus_id"
                    },
                    {
                        data: "technicians_id"
                    },
                    {
                        data: "idRequired"
                    },
                    {
                        data: "problemsolution_id"
                    },
                    {
                        data: "confirmAppointment"
                    },
                    {
                        data: "confirmAppointmentTime"
                    },
                    {
                        data: "reMarkzone"
                    },
                    {
                        data: "equipmentInstall1"
                    },
                    {
                        data: "snInstall1"
                    },
                    {
                        data: "equipmentInstall2"
                    },
                    {
                        data: "snInstall2"
                    },
                    {
                        data: "equipmentInstall3"
                    },
                    {
                        data: "snInstall3"
                    },
                    {
                        data: "equipmentInstall4"
                    },
                    {
                        data: "snInstall4"
                    },
                    {
                        data: "equipmentInstall5"
                    },
                    {
                        data: "snInstall5"
                    },
                    {
                        data: "equipmentInstall6"
                    },
                    {
                        data: "snInstall6"
                    },
                    {
                        data: "equipmentInstall7"
                    },
                    {
                        data: "snInstall7"
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
                            return "<a class='edit-Contractor btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-Contractor btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
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

            $("tbody", this.$refs.Contractor).on(
                "click",
                ".edit-Contractor",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.editModal(row.data());
                }
            );

            $("tbody", this.$refs.Contractor).on(
                "click",
                ".delete-Contractor",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.deleteContractor(row.data());
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
        this.generateTable();
        this.loadcallver();
        this.loadcallverStatus();
        this.loadTechnicians();
        this.loadProblemsolution();
        $(".datepicker").datepicker({
            language: "th-th",
            format: "dd/mm/yyyy",
            autoclose: true
        });
        setTimeout(() => {
            LoadingWait.close();
        }, 2000);
    }
};
</script>
