<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Constarution Managment Table
                            </h3>
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
                                id="constarution"
                                ref="constarution"
                                class="table table-striped table-bordered"
                            >
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Building Name</th>
                                        <th>Tower</th>
                                        <th>Floor</th>
                                        <th>Room</th>
                                        <th>Survey&Desing</th>
                                        <th>SurveyBy</th>
                                        <th>SurveyDate</th>
                                        <th>SurveyPlan</th>
                                        <th>SurveyPlanDate</th>
                                        <th>IFCC</th>
                                        <th>InstalledBy</th>
                                        <th>InstallDate</th>
                                        <th>WallBox</th>
                                        <th>InstalledBy</th>
                                        <th>InstallDate</th>
                                        <th>Microduct(vertical)</th>
                                        <th>InstalledBy</th>
                                        <th>InstallDate</th>
                                        <th>Microduct(diagonal)</th>
                                        <th>InstalledBy</th>
                                        <th>InstallDate</th>
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
                                Create New Constarution
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Constarution's Info
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
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Project Building ID</label>
                                            <input
                                                v-model="form.id"
                                                type="text"
                                                class="form-control disabled"
                                                placeholder="Enter your building id..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'id'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Building Name</label>
                                            <input
                                                v-model="form.buildingId"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'buildingId'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="fmCode"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tower</label>
                                            <input
                                                v-model="form.numberLayer"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your tower..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'numberLayer'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="numberLayer"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Floor</label>
                                            <input
                                                v-model="form.floor"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your floor..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'floor'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="floor"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Room</label>
                                            <input
                                                v-model="form.roomNumber"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your room number..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'roomNumber'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="roomNumber"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Survey&Desing</label>
                                            <input
                                                v-model="form.exploreDesign"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your explore design..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'exploreDesign'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="exploreDesign"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>SurveyBy</label>
                                            <input
                                                type="text"
                                                v-model="form.exploreDesignTeam"
                                                placeholder="Enter your survey by..."
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'exploreDesignTeam'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="exploreDesignTeam"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>SurveyDate</label>
                                            <input
                                                v-model="form.exploreDesignDate"
                                                type="date"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'exploreDesignDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="exploreDesignDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>SurveyPlan</label>
                                            <input
                                                v-model="form.exploreDesignBy"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your explore DesignBy..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'exploreDesignBy'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="exploreDesignBy"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>SurveyPlanDate</label>
                                            <input
                                                v-model="
                                                    form.exploreDesignDateBy
                                                "
                                                type="date"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'exploreDesignDateBy'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="exploreDesignDateBy"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>IFCC</label>
                                            <input
                                                v-model="form.ifcc"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your ifcc..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'ifcc'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="ifcc"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>InstalledBy</label>
                                            <input
                                                v-model="form.ifccTeam"
                                                type="text"
                                                required
                                                class="form-control"
                                                placeholder="Enter your ifccTeam..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'ifccTeam'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="ifccTeam"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>InstallDate</label>
                                            <input
                                                v-model="form.ifccDate"
                                                type="date"
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
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Wallbox</label>
                                            <input
                                                v-model="form.wallBox"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your wallBox..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'wallBox'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="wallBox"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>WallBoxTeam</label>
                                            <input
                                                v-model="form.wallBoxTeam"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your wallBoxTeam..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'wallBoxTeam'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="wallBoxTeam"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>WallBoxDate</label>
                                            <input
                                                v-model="form.wallBoxDate"
                                                type="date"
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
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Microduct(vertical)</label>
                                            <input
                                                v-model="form.microductD"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your microductD..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductD'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="microductD"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>InstalledBy</label>
                                            <input
                                                v-model="form.microductTeamD"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your microductTeamD..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductTeamD'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="microductTeamD"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>InstallDate</label>
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
                                                field="microductDateD"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>Microduct(diagonal)</label>
                                            <input
                                                v-model="form.microductK"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your microductK..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductK'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="microductK"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>InstalledBy</label>
                                            <input
                                                v-model="form.microductTeamK"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your microductTeamK..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'microductTeamK'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="microductTeamK"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>InstallDate</label>
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
                                        </div>
                                        <has-error
                                            :form="form"
                                            field="microductDateK"
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
                buildingId: "",
                numberLayer: "",
                roomNumber: "",
                floor: "",
                exploreDesign: "",
                exploreDesignTeam: "",
                exploreDesignDate: "",
                exploreDesignBy: "",
                exploreDesignDateBy: "",
                ifcc: "",
                ifccTeam: "",
                ifccDate: "",
                wallBox: "",
                wallBoxDate: "",
                wallBoxTeam: "",
                microductD: "",
                microductTeamD: "",
                microductDateD: "",
                microductK: "",
                microductTeamK: "",
                microductDateK: ""
            })
        };
    },
    methods: {
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
                .put("api/constarution/" + this.form.id)
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
            $("#addNew").modal("show");
            this.form.fill(constarution);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteConstarution(id) {
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
                        .delete("api/constarution/" + id)
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
        createConstarution() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("api/constarution")
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
    created() {},
    mounted() {
        var vm = this;
        var table = $(this.$refs.constarution).DataTable({
            dom: "Blfrtip",
            ajax: "api/constarution",
            responsive: true,
            processing: true,
            pageLength: 15,
            lengthMenu: [
                [10, 15, 25, 50, -1],
                [10, 15, 25, 50, "All"]
            ],
            buttons: ["colvis", "copy", "csv", "print"],
            columns: [
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: "buildingId"
                },
                {
                    data: "numberLayer"
                },
                {
                    data: "roomNumber"
                },
                {
                    data: "floor"
                },
                {
                    data: "exploreDesign"
                },
                {
                    data: "exploreDesignTeam",
                    visible: false
                },
                {
                    data: "exploreDesignDate",
                    visible: false
                },
                {
                    data: "exploreDesignBy",
                    visible: false
                },
                {
                    data: "exploreDesignDateBy",
                    visible: false
                },
                {
                    data: "ifcc",
                    visible: false
                },
                {
                    data: "ifccTeam",
                    visible: false
                },
                {
                    data: "ifccDate",
                    visible: false
                },
                {
                    data: "wallBox",
                    visible: false
                },
                {
                    data: "wallBoxDate",
                    visible: false
                },
                {
                    data: "wallBoxTeam",
                    visible: false
                },
                {
                    data: "microductD",
                    visible: false
                },
                {
                    data: "microductTeamD",
                    visible: false
                },
                {
                    data: "microductDateD",
                    visible: false
                },
                {
                    data: "microductK"
                },
                {
                    data: "microductTeamK"
                },
                {
                    data: "microductDateK"
                },
                {
                    data: null,
                    className: "dt-body-center",
                    render: function(data, type, row, meta) {
                        return "<a class='edit-constarution' href='#'><i class='fa fa-edit blue'></i> </a> / <a class='delete-constarution' href='#'> <i class='fa fa-trash red'></i> </a>";
                    }
                }
            ]
        });

        $("tbody", this.$refs.constarution).on(
            "click",
            ".edit-constarution",
            function() {
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.editModal(row.data());
            }
        );

        $("tbody", this.$refs.constarution).on(
            "click",
            ".delete-constarution",
            function() {
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deleteConstarution(row.data().id);
            }
        );
    }
};
</script>

<style></style>
