<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                PLANING MANAGEMENT
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
                                id="planing"
                                ref="planing"
                                class="table table-striped table-bordered"
                            >
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name/Company</th>
                                        <th>LastName</th>
                                        <th>Tel(main)</th>
                                        <th>Tel(reserve)</th>
                                        <th>Building Name</th>
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
                                Create New Planing
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Planing's Info
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
                                editmode ? updatePlaning() : createPlaning()
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
                                                field="buildingId"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->

                                            <label>FM Progress :</label>
                                            <input
                                                v-model="form.fmProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your fmProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fmProgress'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="fmProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label
                                                >วันที่เข้าวางโครงข่าย :</label
                                            >
                                            <input
                                                v-model="form.dateProgress"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your dateProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateProgress'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>TOT Progress :</label>
                                            <input
                                                v-model="form.totProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your totProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'totProgress'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="totProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>TOT วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.totDate"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your totDate..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'totDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="totDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->

                                            <label>AIS Progress :</label>
                                            <input
                                                v-model="form.aisProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your aisProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'aisProgress'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="aisProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>AIS วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.aisDate"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your aisDate..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'aisDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="aisDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>TOT Progress :</label>
                                            <input
                                                v-model="form.Progress3bb"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Progress3bb..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'Progress3bb'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="Progress3bb"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>3BB วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.Date3bb"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your Date3bb..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'Date3bb'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="Date3bb"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->

                                            <label>Sinet Progress :</label>
                                            <input
                                                v-model="form.sinetProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your sinetProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'sinetProgress'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="sinetProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label
                                                >Sinet วันวางโครงข่าย :</label
                                            >
                                            <input
                                                v-model="form.sinetDate"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your sinetDate..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'sinetDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="sinetDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->
                                            <label>FN Progress :</label>
                                            <input
                                                v-model="form.fnProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your fnProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fnProgress'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="fnProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>FN วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.fnDate"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your fnDate..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fnDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="fnDate"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <!-- ******************* EDIT TO SELECTION ******************* -->

                                            <label>True Progress :</label>
                                            <input
                                                v-model="form.trueProgress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your trueProgress..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'trueProgress'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="trueProgress"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>True วันวางโครงข่าย :</label>
                                            <input
                                                v-model="form.trueDate"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your trueDate..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'trueDate'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="trueDate"
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
                name: "",
                lastName: "",
                phoneNumber1: "",
                phoneNumber2: "",
                buildingId: "",
                numberLayer: "",
                floor: "",
                roomNumber: "",
                isp: "",
                ispCode: "",
                memberNumber: "",
                Fees: "",
                confirming: "",
                Team: "",
                date: "",
                time: "",
                status: "",
                subStatus: "",
                dateConnect: "",
                dateDisconnect: ""
            })
        };
    },
    methods: {
        loadPlaning() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                //To DO
            }

            this.$Progress.finish();
        },
        updatePlaning() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("api/planing/" + this.form.id)
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
        },
        editModal(planing) {
            this.editmode = true;
            this.form.reset();
            $("#addNew").modal("show");
            this.form.fill(planing);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deletePlaning(id) {
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
                        .delete("api/planing/" + id)
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
        createPlaning() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("api/planing")
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
        }
    },
    created() {},
    mounted() {
        var vm = this;
        var table = $(this.$refs.planing).DataTable({
            dom: "Blfrtip",
            ajax: "api/planing",
            responsive: true,
            processing: true,
            autoWidth: true,
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
                    data: "name"
                },
                {
                    data: "lastName"
                },
                {
                    data: "phoneNumber1"
                },
                {
                    data: "phoneNumber2"
                },
                {
                    data: "buildingId"
                },
                {
                    data: null,
                    className: "dt-body-center",
                    render: function(data, type, row, meta) {
                        return "<a class='edit-planing' href='#'><i class='fa fa-edit blue'></i> </a> / <a class='delete-planing' href='#'> <i class='fa fa-trash red'></i> </a>";
                    }
                }
            ]
        });

        $("tbody", this.$refs.planing).on("click", ".edit-planing", function() {
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.editModal(row.data());
        });

        $("tbody", this.$refs.planing).on(
            "click",
            ".delete-planing",
            function() {
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deletePlaning(row.data().id);
            }
        );
    }
};
</script>
