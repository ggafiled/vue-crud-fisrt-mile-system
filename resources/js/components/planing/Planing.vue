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
                                        <th>Building Name</th>
                                        <th>Contact Name</th>
                                        <th>Tel(Main)</th>
                                        <th>Tel(Reserve)</th>
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
                                <div class="row" v-if="editmode">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>MEMBER ID</label>
                                            <input
                                                v-model="form.member_id"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your member id..."
                                                readonly
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'member_id'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="member_id"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Contact Name</label>
                                            <input
                                                v-model="form.contactName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your contactName..."
                                                readonly
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'contactName'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="contactName"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Phone Number(1)</label>
                                            <input
                                                v-model="form.phone1"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your phone number1..."
                                                readonly
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'phone1'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="phone1"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Phone Number(2)</label>
                                            <input
                                                v-model="form.phone2"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your phone number2..."
                                                readonly
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'phone2'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="phone2"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Building No</label>
                                            <input
                                                v-model="form.townNumber"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your townNumber..."
                                                readonly
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'townNumber'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="townNumber"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Building Name</label>
                                            <input
                                                v-model="form.buildingName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your buildingName..."
                                                readonly
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'buildingName'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="buildingName"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>FLOOR</label>
                                            <input
                                                v-model="form.floor"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your floor no..."
                                                readonly
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
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>ROOM</label>
                                            <input
                                                v-model="form.roomNumber"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your roomNumber..."
                                                readonly
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
                                            <label>FEES</label>
                                            <input
                                                v-model="form.fees"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your Fees..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'fees'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="fees"
                                            ></has-error>
                                        </div>
                                    </div>
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
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Operator Team</label>
                                            <select
                                                name="team_id"
                                                v-model="form.team_id"
                                                id="team_id"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'team_id'
                                                    )
                                                }"
                                            >
                                                <option value="" selected
                                                    >Select Operator
                                                    Team</option
                                                >
                                                <option
                                                    v-for="team in teams"
                                                    :key="team.id"
                                                    :value="team.id"
                                                >
                                                    {{ team.name }}
                                                </option>
                                            </select>

                                            <has-error
                                                :form="form"
                                                field="team_id"
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
            teams: [],
            form: new Form({
                id: "",
                building_id: "",
                buildingName: "",
                contactName: "",
                townNumber: "",
                floor: "",
                roomNumber: "",
                contract: "",
                contractTime: "",
                member_id: "",
                phone1: "",
                phone2: "",
                isp: "",
                ispCode: "",
                fees: "",
                confirming: "",
                team_id: "",
                team: "",
                remark: "",
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
        loadTeams() {
            this.$Progress.start();
            if (this.$gate.isAdmin()) {
                axios
                    .get("api/team/list")
                    .then(({ data }) => (this.teams = data.data));
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
            // planing.buildingName = planing.building[0].buildingName;
            planing.contactName =
                planing.building[0].member[0].name +
                "" +
                planing.building[0].member[0].lastName;
            planing.team = planing.teams[0].name;
            planing = {
                ...planing,
                ...planing.building[0],
                ...planing.building[0].member[0]
            };
            planing.time = moment(planing.time).format("HH:mm:ss");
            planing.date = moment(planing.date).format("YYYY-MM-DD");
            planing.dateConnect = moment(planing.dateConnect).format(
                "YYYY-MM-DD"
            );
            planing.dateDisconnect = moment(planing.dateDisconnect).format(
                "YYYY-MM-DD"
            );
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
    created() {
        this.loadTeams();
    },
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
                {
                    extend: "csv",
                    exportOptions: {
                        columns: [2, 3, 4, ":visible"]
                    }
                },
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
                    data: "building[0].buildingName"
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return (
                            data.building[0].member[0].name +
                            " " +
                            data.building[0].member[0].lastName
                        );
                    }
                },
                {
                    data: "building[0].member[0].phone1"
                },
                {
                    data: "building[0].member[0].phone2"
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
        $("tbody", this.$refs.planing).on("click", ".edit-planing", function(
            e
        ) {
            e.preventDefault();
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.editModal(row.data());
        });
        $("tbody", this.$refs.planing).on("click", ".delete-planing", function(
            e
        ) {
            e.preventDefault();
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.deletePlaning(row.data().id);
        });
    }
};
</script>
