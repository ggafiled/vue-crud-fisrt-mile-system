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
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Name/Company</label>
                                            <input
                                                v-model="form.name"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your name..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'name'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="name"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>LastName</label>
                                            <input
                                                v-model="form.lastName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your lastName..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'lastName'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="lastName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Phone Number(1)</label>
                                            <input
                                                v-model="form.phoneNumber1"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your phoneNumber1..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'phoneNumber1'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="phoneNumber1"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Phone Number(2)</label>
                                            <input
                                                v-model="form.phoneNumber2"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your phoneNumber2..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'phoneNumber2'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="phoneNumber2"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Name/Company</label>
                                            <input
                                                v-model="form.buildingId"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your buildingId..."
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
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Building No</label>
                                            <input
                                                v-model="form.numberLayer"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your Building No..."
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>FLOOR</label>
                                            <input
                                                v-model="form.buildingId"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your floor no..."
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>ROOM</label>
                                            <input
                                                v-model="form.roomNumber"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your roomNumber..."
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
                                        <div class="form-group">
                                            <label>ISP</label>
                                            <input
                                                v-model="form.isp"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your ISP..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'isp'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="isp"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>ISP CODE</label>
                                            <input
                                                v-model="form.ispCode"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your ISP CODE..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'ispCode'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="ispCode"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>MEMBER NUMBER</label>
                                            <input
                                                v-model="form.memberNumber"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your memberNumber..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'memberNumber'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="memberNumber"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>FEES</label>
                                            <input
                                                v-model="form.Fees"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your Fees..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'Fees'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="Fees"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>CONFIRMING</label>
                                            <input
                                                v-model="form.confirming"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your confirming..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'confirming'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="confirming"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>TEAM</label>
                                            <input
                                                v-model="form.Team"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Team..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'Team'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="Team"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>DATE</label>
                                            <input
                                                v-model="form.date"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your date..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'date'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="date"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>TIME</label>
                                            <input
                                                v-model="form.time"
                                                type="time"
                                                class="form-control"
                                                placeholder="Enter your time..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'time'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="time"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>REMARK</label>
                                            <input
                                                v-model="form.remark"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your remark..."
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

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>STATUS</label>
                                            <input
                                                v-model="form.status"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your status..."
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
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>SUP STATUS</label>
                                            <input
                                                v-model="form.supStatus"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your supStatus..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'supStatus'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="supStatus"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>DATE CONNECT</label>
                                            <input
                                                v-model="form.dateConnect"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your dateConnect..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateConnect'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateConnect"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>DATE DISCONNECT</label>
                                            <input
                                                v-model="form.dateDisconnect"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your dateDisconnect..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dateDisconnect'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dateDisconnect"
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
            buttons: [
                "colvis",
                "copy",
                "csv",
                {
                    extend: "print",
                    text: "<i class='bi bi-printer mr-1'></i>Print"
                },
                {
                    text: "<i class='bi bi-arrow-repeat mr-1'></i>Clear",
                    action: function(e, dt, node, config) {
                        dt.columns()
                            .search("")
                            .draw();
                    }
                }
            ],
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
