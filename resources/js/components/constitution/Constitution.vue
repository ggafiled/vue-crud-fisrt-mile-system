<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-fw bi bi-aspect-ratio"></i>
                            {{ translate("constitution.header") }}
                        </h2>
                        <div class="card-tools">
                            <button
                                type="button"
                                class="btn btn-sm btn-primary"
                                @click="dowloadExcelTemplate"
                            >
                                <i
                                    class="fa fa-download"
                                    aria-hidden="true"
                                ></i>
                                {{ translate("constitution.download") }}
                            </button>
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
                                id="constarution"
                                ref="constarution"
                                class="display nowrap"
                                style="width: 100%"
                            >
                                <thead>
                                    <tr class="info">
                                        <th></th>
                                        <th>Project Name</th>
                                        <th>Project Name ToT</th>
                                        <th>Project Name 3BB</th>
                                        <th>Project Name True</th>
                                        <th>Project Name Ais</th>
                                        <th>Project Name FiberNet</th>
                                        <th>Building Sum</th>
                                        <th>Building Number</th>
                                        <th>Building Floor</th>
                                        <th>Unit Floor</th>
                                        <th>Fm Progress</th>
                                        <th>Team Serway</th>
                                        <th>Surwey Date</th>
                                        <th>Ifccc Type</th>
                                        <th>Ifccc Status</th>
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Project Name ToT /
                                                ชื่อโครงการของทีโอที</label
                                            >
                                            <br />
                                            <label class="radio-inline">
                                                <input
                                                    type="radio"
                                                    name="totName"
                                                    checked
                                                />ชื่อเดียวกัน
                                            </label>
                                            <label class="radio-inline">
                                                <input
                                                    type="radio"
                                                    name="totName"
                                                />ต่างชื่อกัน
                                            </label>
                                            <input
                                                v-model="form.projectNameTot"
                                                type="text"
                                                class="form-control"
                                                placeholder="ชื่อโครงการของทีโอที"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectNameTot'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Project Name Ais /
                                                ชื่อโครงการของเอไอเอส</label
                                            >
                                            <br />
                                            <label class="radio-inline">
                                                <input
                                                    type="radio"
                                                    name="aisName"
                                                    checked
                                                />ชื่อเดียวกัน
                                            </label>
                                            <label class="radio-inline">
                                                <input
                                                    type="radio"
                                                    name="aisName"
                                                />ต่างชื่อกัน
                                            </label>
                                            <input
                                                v-model="form.projectNameAis"
                                                type="text"
                                                class="form-control"
                                                placeholder="ชื่อโครงการของทีเอไอเอส"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectNameAis'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Project Name 3BB /
                                                ชื่อโครงการของสามบีบี</label
                                            >
                                            <br />
                                            <label class="radio-inline">
                                                <input
                                                    type="radio"
                                                    name="tbbName"
                                                    checked
                                                />ชื่อเดียวกัน
                                            </label>
                                            <label class="radio-inline">
                                                <input
                                                    type="radio"
                                                    name="tbbName"
                                                />ต่างชื่อกัน
                                            </label>
                                            <input
                                                v-model="form.projectName3bb"
                                                type="text"
                                                class="form-control"
                                                placeholder="ชื่อโครงการของสามบีบี"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectName3bb'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                >Project Name True /
                                                ชื่อโครงการของทรู</label
                                            >
                                            <br />
                                            <label class="radio-inline">
                                                <input
                                                    type="radio"
                                                    name="trueName"
                                                    checked
                                                />ชื่อเดียวกัน
                                            </label>
                                            <label class="radio-inline">
                                                <input
                                                    type="radio"
                                                    name="trueName"
                                                />ต่างชื่อกัน
                                            </label>
                                            <input
                                                v-model="form.projectNameTrue"
                                                type="text"
                                                class="form-control"
                                                placeholder="ชื่อโครงการของทรู"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'projectNameTrue'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </tab-content>
                            <tab-content title="Progress">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>FM-Progress*</label>
                                            <select
                                                v-model="form.fmProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="FM-Progress"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fmProgress'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="Now Building"
                                                    >Now Building</option
                                                >
                                                <option value="Old Building"
                                                    >Old Building</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="fmProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Surwey/Design</label>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="form.teamserway"
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Surwey/Design"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'teamserway'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="teamserway"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Date Surwey/Design</label>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="form.surweyDate"
                                                    type="date"
                                                    class="form-control"
                                                    placeholder="DateSurwey/Design"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'surweyDate'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="surweyDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>IFCCC Type(ODF) *</label>
                                            <select
                                                v-model="form.ifcccType"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'ifcccType'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="120">120</option>
                                                <option value="288">288</option>
                                                <option value="576">576</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="ifcccType"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>IFCCC Status (ODF) *</label>
                                            <select
                                                v-model="form.ifcccStatus"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'ifcccStatus'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="Waiting"
                                                    >Waiting</option
                                                >
                                                <option value="Completed"
                                                    >Completed</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="ifcccStatus"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Wall Box Type *</label>
                                            <select
                                                v-model="form.wallboxType"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'wallboxType'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="24">24</option>
                                                <option value="48">48</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="wallboxType"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Wall Box Status *</label>
                                            <select
                                                v-model="form.wallboxStatus"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'wallboxStatus'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="Waiting"
                                                    >Waiting</option
                                                >
                                                <option value="Completed"
                                                    >Completed</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="wallboxStatus"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                            </tab-content>
                            <tab-content title="Type">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Microduct Type *</label>
                                            <small>/ประเภทท่อ</small>
                                            <select
                                                v-model="form.microductType"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductType'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="FiberBlow"
                                                    >FiberBlow</option
                                                >
                                                <option
                                                    value="FiberConvertional"
                                                >
                                                    FiberConvertional
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="microductType"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Microduct Status*</label>
                                            <small>/สถานะของท่อ</small>
                                            <select
                                                v-model="form.microductStatus"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductStatus'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="Waiting"
                                                    >Waiting</option
                                                >
                                                <option value="Completed"
                                                    >Completed</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="microductStatus"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                            </tab-content>
                            <tab-content title="FiberBlow & Fiber Convertional">
                                <div
                                    class="row"
                                    v-show="
                                        form.microductType == '' ||
                                            form.microductType == 'FiberBlow'
                                    "
                                >
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Microduct Type1</label>
                                            <select
                                                v-model="form.microductType1"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductType1'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="4">4</option>
                                                <option value="7">7</option>
                                                <option value="12">12</option>
                                                <option value="19">19</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="microductType1"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Microduct Type2</label>
                                            <select
                                                v-model="form.microductType2"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductType2'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="4">4</option>
                                                <option value="7">7</option>
                                                <option value="12">12</option>
                                                <option value="19">19</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="microductType2"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Microduct Size</label>
                                            <small>/ขนาดท่อ</small>
                                            <select
                                                v-model="form.microductSize"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductSize'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="4/2.5"
                                                    >4/2.5</option
                                                >
                                                <option value="5/3">5/3</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="microductSize"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Microduct Floor</label>
                                            <small>/ชั้น</small>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="
                                                        form.microductFloor
                                                    "
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Microduct Floor"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'microductFloor'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="microductFloor"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="row"
                                    v-show="
                                        form.microductType == '' ||
                                            form.microductType == 'FiberBlow'
                                    "
                                >
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Blow Status</label>
                                            <select
                                                v-model="form.blowStatus"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'blowStatus'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="Wailing"
                                                    >4/2.5</option
                                                >
                                                <option value="5/3">5/3</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="blowStatus"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Blow Core</label>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="form.blowCore"
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Blow Core"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'blowCore'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="blowCore"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="row"
                                    v-show="
                                        form.microductType == '' ||
                                            form.microductType ==
                                                'FiberConvertional'
                                    "
                                >
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Convertional Type</label>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="
                                                        form.convertionalType
                                                    "
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Convertional Type"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'convertionalType'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="convertionalType"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Convertional Floor</label>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="
                                                        form.convertionalFloor
                                                    "
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Convertional Floor"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'convertionalFloor'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="convertionalFloor"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Vertically</label>
                                            <select
                                                v-model="form.vertically"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'vertically'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="มี">มี</option>
                                                <option value="ไม่มี"
                                                    >ไม่มี</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="vertically"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Vertically Type</label>
                                            <select
                                                v-model="form.verticallyType"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your type..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'verticallyType'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Type ---</option
                                                >
                                                <option value="Fiber Drop"
                                                    >FiberDrop</option
                                                >
                                                <option value="Fiber Blow"
                                                    >Fiber Blow</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="verticallyType"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="row"
                                    v-show="
                                        form.microductType == '' ||
                                            form.microductType ==
                                                'FiberConvertional'
                                    "
                                >
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Building status</label>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="
                                                        form.buildingStatus
                                                    "
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Building status"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'buildingStatus'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="buildingStatus"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Building Date</label>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="form.buildingDate"
                                                    type="date"
                                                    class="form-control"
                                                    placeholder=""
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'buildingDate'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="buildingDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Splice Status</label>
                                            <select
                                                v-model="form.spliceStatus"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your splice..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'spliceStatus'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >--- Select Status
                                                    ---</option
                                                >
                                                <option value="Waiting"
                                                    >Waiting</option
                                                >
                                                <option value="Completed"
                                                    >Completed</option
                                                >
                                            </select>
                                        </div>
                                        <has-error
                                            :form="form"
                                            field="spliceStatus"
                                        ></has-error>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Splice Core</label>
                                            <div class="input-group mb-3">
                                                <input
                                                    v-model="form.spliceCore"
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Splice Core"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'spliceCore'
                                                        )
                                                    }"
                                                />
                                            </div>
                                            <has-error
                                                :form="form"
                                                field="spliceCore"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                            </tab-content>
                            <tab-content title="Project Images">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Select a Images </label>
                                            <div class="input-group">
                                                <uploader
                                                    v-model="fileList"
                                                    title="Images"
                                                    limit="24"
                                                    multiple
                                                ></uploader>
                                            </div>
                                        </div>
                                        <has-error
                                            :form="form"
                                            field="spliceStatus"
                                        ></has-error>
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
                                        @click.native="createConstarution()"
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
            generatingactions: [],
            teamserways: [],
            fileList: [],
            settings: {
                placeholder: { id: "-1", text: "-----กรุณาเลือกโครงการ-----" },
                allowClear: false,
                dropdownParent: ".modal"
            },
            sportsData: ["Badminton", "Cricket", "Football", "Golf", "Tennis"],
            form: new Form({
                id: "",
                //Relationship In TableConstarution
                building_id: "", //modelBuilding->modelConstarution GET field projectName
                // desingBy_id: "", //modelTeamserway->modelConstarution GET field nameSerway
                // surveyDesing_id: "", //modelGeneratingaction->modelConstarution GET field nameSerway
                // ifcc_id: "", //modelGeneratingaction->modelConstarution GET field status
                // wallBox_id: "", //modelGeneratingaction->modelConstarution GET field status
                // microductD_id: "", //modelGeneratingaction->modelConstarution GET field status
                // microductK_id: "", //modelGeneratingaction->modelConstarution GET field status
                // fiberConvertion_id: "", //modelGeneratingaction->modelConstarution GET field status
                projectName: "",
                projectNameTot: "",
                projectName3bb: "",
                projectNameTrue: "",
                projectNameAis: "",
                projectNameFiberNet: "",
                buildingSum: "",
                buildingNumber: "",
                buildingFloor: "",
                unitFloor: "",
                fmProgress: "",
                teamserway: "",
                surweyDate: new Date().toISOString().slice(0, 10),
                ifcccType: "",
                ifcccStatus: "",
                wallboxType: "",
                wallboxStatus: "",
                microductType: "",
                microductStatus: "",
                microductType1: "",
                microductType2: "",
                microductSize: "",
                blowStatus: "",
                blowCore: "",
                convertionalType: "",
                convertionalFloor: "",
                vertically: "",
                verticallyType: "",
                buildingStatus: "",
                buildingDate: new Date().toISOString().slice(0, 10),
                spliceStatus: "",
                spliceCore: ""
                // microductDateK: new Date().toLocaleDateString("th").toString("d/m/Y"),
                // microductK: "",
                // surveyDesingDate: new Date().toLocaleDateString("th").toString("d/m/Y"),
                // ifccDate: new Date().toLocaleDateString("th").toString("d/m/Y"),
                // wallBoxDate: new Date().toLocaleDateString("th").toString("d/m/Y"),
                // type: "",
                // microductDateD: new Date().toLocaleDateString("th").toString("d/m/Y"),
                // fiberConvertionDateD: new Date()
                //   .toLocaleDateString("th")
                //   .toString("d/m/Y"),
                // blow: "",
                // splice: "",
            })
        };
    },
    methods: {
        goToImportPanel(){
            this.$router.push({  path: "importData"});
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
        setSameProjectName() {
            let name = this.building.filter(
                obj => obj.id == this.form.building_id
            )[0];
            this.form.projectNameTot = this.form.projectName3bb = this.form.projectNameTrue = this.form.projectNameAis = this.form.projectNameFiberNet =
                name.text;
            Toast.fire({
                title: translate("Copy to clipboard and pate already."),
                timerProgressBar: false
            });
        },
        loadGeneratingaction() {
            axios.get("/generatingactions").then(response => {
                this.generatingactions = response.data.data;
            });
        },
        loadTeamserway() {
            axios.get("/teamserways").then(response => {
                this.teamserways = response.data.data;
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
        loadConstarution() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                $("#constarution")
                    .DataTable()
                    .ajax.reload();
            }

            this.$Progress.finish();
        },
        async updateConstarution() {
            this.$Progress.start();
            // console.log('Editing data');
            this.onprogress = true;
            await this.form
                .put("/constarution/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');

                    this.loadConstarution();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            setTimeout(() => {
                this.onprogress = false;
            }, 2000);
        },
        editModal(constarution) {
            this.editmode = true;
            this.form.reset();
            this.form.errors.clear();
            console.log(constarution);
            $("#addNew").modal("show");
            this.form.fill(constarution);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteConstarution(item) {
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
                        .delete("/constarution/" + item.id)
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
                            this.loadConstarution();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        async createConstarution() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.onprogress = true;
            await this.form
                .post("/constarution")
                .then(response => {
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.loadConstarution();
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
            var table = $(this.$refs.constarution).DataTable({
                dom: "Blfrtip",
                ajax: "/api/constarution",
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
                        data: "projectNameTot",
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
                        data: "projectName3bb",
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
                        data: "projectNameTrue",
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
                        data: "projectNameAis"
                    },
                    {
                        data: "projectNameFiberNet",
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
                        data: "buildingNumber",
                        render: function(data, type, row, meta) {
                            if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                        // visible: false
                    },
                    {
                        data: "buildingFloor",
                        render: function(data, type, row, meta) {
                            if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "unitFloor",
                        render: function(data, type, row, meta) {
                            if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "fmProgress",
                        render: function(data, type, row, meta) {
                            if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "teamserway",
                        render: function(data, type, row, meta) {
                            if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                        // visible: false
                    },
                    {
                        data: "surweyDate",
                        render: function(data, type, row, meta) {
                            if (!data) {
                                return "ไม่ได้ระบุ";
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "ifcccType"
                        // visible: false
                    },
                    {
                        data: "ifcccStatus"
                        // visible: false
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
                            return "<a class='edit-constarution btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-constarution btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
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

            $("tbody", this.$refs.constarution).on(
                "click",
                ".edit-constarution",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.editModal(row.data());
                }
            );

            $("tbody", this.$refs.constarution).on(
                "click",
                ".delete-constarution",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.deleteConstarution(row.data());
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
        this.loadGeneratingaction();
        this.generateTable();
        this.loadTeamserway();
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
