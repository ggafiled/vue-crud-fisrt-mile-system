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
                                id="constarution"
                                ref="constarution"
                                class="display nowrap"
                                style="width: 100%"
                            >
                                <thead>
                                    <tr class="info">
                                        <th></th>
                                        <th>Project Name</th>
                                        <th>DesingBy</th>
                                        <th>SurveyDesing</th>
                                        <th>IFCC</th>
                                        <th>WallBox</th>
                                        <th>Microduct(แนวดิ่ง)</th>
                                        <th>Microduct(ขว้าง)</th>
                                        <th>FiberConvertion</th>
                                        <th>Blow</th>
                                        <th>Splice</th>
                                        <th>Update</th>
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

                        <form
                            @submit.prevent="
                                editmode
                                    ? updateConstarution()
                                    : createConstarution()
                            "
                        >
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-2" v-show="editmode">
                                        <div class="form-group">
                                            <label>Project Building ID</label>
                                            <input
                                                v-model="form.id"
                                                type="text"
                                                class="form-control disabled"
                                                placeholder=""
                                                disabled
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'id'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        :class="
                                            editmode ? 'col-sm-10' : 'col-sm-12'
                                        "
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
                                </div>
                                <div class="row">
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
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Desing By</label>
                                            <select
                                                v-model="form.desingBy"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your DesingBy..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'desingBy'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >ทีมสำรวจ</option
                                                >
                                                <option
                                                    value="คุณโอ๋ : 061 995 5389"
                                                >
                                                    คุณโอ๋ : 061 995 5389
                                                </option>
                                                <option
                                                    value="คุณอ๋อง : 087 003 0777"
                                                >
                                                    คุณอ๋อง : 087 003 0777
                                                </option>
                                                <option
                                                    value="คุณบอย : 094 826 5323"
                                                >
                                                    คุณบอย : 094 826 5323
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="desingBy"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Survey&Desing</label>
                                            <select
                                                v-model="form.surveyDesing"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your SurveyDesing..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'surveyDesing'
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
                                                >
                                                    ดำเนิการแล้วเสร็จ
                                                </option>
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                >
                                                    กำลังสร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                >
                                                    สร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                >
                                                    เชื่อมโครงข่ายแล้ว
                                                </option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="surveyDesing"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>SurveyDesingDate</label>
                                            <input
                                                v-model="form.surveyDesingDate"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your surveyDesingDate..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'surveyDesingDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="surveyDesingDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>IFCC</label>
                                            <select
                                                v-model="form.ifcc"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your ifcc..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'ifcc'
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
                                                >
                                                    ดำเนิการแล้วเสร็จ
                                                </option>
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                >
                                                    กำลังสร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                >
                                                    สร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                >
                                                    เชื่อมโครงข่ายแล้ว
                                                </option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="ifcc"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>IFCC-Date</label>
                                            <input
                                                type="date"
                                                v-model="form.ifccDate"
                                                placeholder="Enter your survey by..."
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'ifccDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="ifccDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>WallBox</label>
                                            <select
                                                v-model="form.wallBox"
                                                type="text"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'wallBox'
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
                                                >
                                                    ดำเนิการแล้วเสร็จ
                                                </option>
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                >
                                                    กำลังสร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                >
                                                    สร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                >
                                                    เชื่อมโครงข่ายแล้ว
                                                </option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="wallBox"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Wallbox-Date</label>
                                            <input
                                                type="date"
                                                v-model="form.wallBoxDate"
                                                placeholder="Enter your survey by..."
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'wallBoxDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="wallBoxDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input
                                                type="text"
                                                v-model="form.type"
                                                placeholder="Enter your type..."
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'type'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="type"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Microduct(แนวดิ่ง)</label>
                                            <select
                                                v-model="form.microductD"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your microductD..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductD'
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
                                                >
                                                    ดำเนิการแล้วเสร็จ
                                                </option>
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                >
                                                    กำลังสร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                >
                                                    สร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                >
                                                    เชื่อมโครงข่ายแล้ว
                                                </option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="microductD"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label
                                                >Microduct Date(แนวดิ่ง)</label
                                            >
                                            <input
                                                v-model="form.microductDateD"
                                                type="date"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductDateD'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="exploreDesignDateBy"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Microduct (แนวขว้าง)</label>
                                            <select
                                                v-model="form.microductK"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your microductK..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductK'
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
                                                >
                                                    ดำเนิการแล้วเสร็จ
                                                </option>
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                >
                                                    กำลังสร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                >
                                                    สร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                >
                                                    เชื่อมโครงข่ายแล้ว
                                                </option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="microductK"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label
                                                >Microduct Date(แนวขว้าง)</label
                                            >
                                            <input
                                                v-model="form.microductDateK"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your microductDateK..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductDateK'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="microductDateK"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>FiberConvertion</label>
                                            <select
                                                v-model="form.fiberConvertion"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your fiberConvertion..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fiberConvertion'
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
                                                >
                                                    ดำเนิการแล้วเสร็จ
                                                </option>
                                                <option value="วางโครงข่ายแล้ว"
                                                    >วางโครงข่ายแล้ว</option
                                                >
                                                <option
                                                    value="กำลังสร้างพร้อมโครงการฯ"
                                                >
                                                    กำลังสร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="สร้างพร้อมโครงการฯ"
                                                >
                                                    สร้างพร้อมโครงการฯ
                                                </option>
                                                <option
                                                    value="เชื่อมโครงข่ายแล้ว"
                                                >
                                                    เชื่อมโครงข่ายแล้ว
                                                </option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="microductD"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label
                                                >FiberConvertionDate
                                                (แนวดิ่ง)</label
                                            >
                                            <input
                                                v-model="
                                                    form.fiberConvertionDate
                                                "
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your fiberConvertionDate ..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fiberConvertionDate '
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="fiberConvertionDate "
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Blow</label>
                                            <select
                                                v-model="form.blow"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your blow..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'blow'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >Y/N Question</option
                                                >
                                                <option value="Completed"
                                                    >Completed</option
                                                >
                                                <option value="On Progress"
                                                    >On Progress</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="blow"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Splice</label>
                                            <select
                                                v-model="form.splice"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your splice..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'splice'
                                                    )
                                                }"
                                            >
                                                <option disabled value=""
                                                    >Y/N Question</option
                                                >
                                                <option value="Completed"
                                                    >Completed</option
                                                >
                                                <option value="On Progress"
                                                    >On Progress</option
                                                >
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                        <has-error
                                            :form="form"
                                            field="splice"
                                        ></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal"
                                >
                                    {{
                                        translate("constitution.actions.close")
                                    }}
                                </button>
                                <button
                                    v-show="editmode"
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    {{
                                        translate("constitution.actions.update")
                                    }}
                                </button>
                                <button
                                    v-show="!editmode"
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    {{
                                        translate("constitution.actions.create")
                                    }}
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
    title: "Constarution -",
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
                desingBy: "",
                surveyDesing: "",
                surveyDesingDate: "",
                surveyDesingDateBy: "",
                ifcc: "",
                ifccDate: "",
                wallBox: "",
                wallBoxDate: "",
                type: "",
                microductD: "",
                microductDateD: "",
                microductK: "",
                microductDateK: "",
                fiberConvertion: "",
                fiberConvertionDateD: "",
                blow: "",
                splice: ""
            })
        };
    },
    methods: {
        loadBuildings() {
            axios.get("/building").then(
                response =>
                    (this.building = response.data.data.map(a => {
                        return { text: a.projectName, id: a.id };
                    }))
            );
        },
        loadConstarution() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                //To DO
            }

            this.$Progress.finish();
        },
        updateConstarution() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
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
        },
        editModal(constarution) {
            this.editmode = true;
            this.form.reset();
            constarution.projectName = constarution.building[0].projectName;
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
            item.projectName = item.building[0].projectName;
            Swal.fire({
                title: window.translate(
                    "constitution.alert.delete_building_title"
                ),
                text:
                    window.translate(
                        "constitution.alert.delete_building_text"
                    ) + ` [${item.projectName}]`,
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
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        createConstarution() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("/constarution")
                .then(response => {
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });

                    this.$Progress.finish();
                    this.loadConstarution();
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
        var table = $(this.$refs.constarution).DataTable({
            dom: "Blfrtip",
            ajax: "/constarution",
            responsive: true,
            processing: true,
            pageLength: 15,
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
                    text: "<i class='bi bi-file-earmark-excel mr-1'></i>Excel",
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
                    data: "building[0].projectName"
                },
                {
                    data: "desingBy",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return data;
                        }
                    }
                },
                {
                    data: "surveyDesing",
                    render: function(data, type, row, meta) {
                        if (data == "") {
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
                    data: "ifcc",
                    render: function(data, type, row, meta) {
                        if (data == "") {
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
                    data: "wallBox",
                    render: function(data, type, row, meta) {
                        if (data == "") {
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
                    data: "microductD",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return "<span>" + data + "</span>";
                        }
                    }
                    // visible: false
                },
                {
                    data: "microductK",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return "<span>" + data + "</span>";
                        }
                    }
                    // visible: false
                },
                {
                    data: "fiberConvertion",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return "<span>" + data + "</span>";
                        }
                    }
                    // visible: false
                },
                {
                    data: "blow",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return "<span>" + data + "</span>";
                        }
                    }
                    // visible: false
                },
                {
                    data: "splice",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ไม่ได้กรอกข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return "<span>" + data + "</span>";
                        }
                    }
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
};
</script>
