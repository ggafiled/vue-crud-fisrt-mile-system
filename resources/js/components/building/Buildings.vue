<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Building Managment Table</h3>
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
                                id="buildings"
                                ref="buildings"
                                class="table table-striped table-bordered"
                            >
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Building Name</th>
                                        <th>Fm-Code</th>
                                        <th>Content</th>
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
                                Create New Building
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Bulding's Info
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
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Project Building</label>
                                            <input
                                                v-model="form.buildingName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your building..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'buildingName'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Fm Code</label>
                                            <input
                                                v-model="form.fmCode"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your code..."
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
                                </div>

                                <div class="row">
                                    <div class="col-sm-3" v-show="editmode">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Contact Name</label>
                                            <input
                                                v-model="form.contactName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your contact name..."
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
                                    <div class="col-sm-3" v-show="editmode">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input
                                                v-model="form.phone"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your phone..."
                                                readonly
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'phone'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="phone"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Area</label>
                                            <input
                                                v-model="form.area"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your area..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'area'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="area"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
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
                                        <div class="form-group">
                                            <label>Room Number</label>
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
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Town Number</label>
                                            <input
                                                v-model="form.townNumber"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your number layer..."
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
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Working Time</label>
                                            <input
                                                type="date"
                                                v-model="form.workingTime"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'workingTime'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="workingTime"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="container-fluid">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Address Detail</label>
                                            <input
                                                v-model="form.detailAdress"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your address..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'detailAdress'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="detailAdress"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <input
                                                v-model="form.province"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your province..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'province'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="province"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input
                                                v-model="form.city"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your city..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'city'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="city"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>PostalCode</label>
                                            <input
                                                v-model="form.postalCode"
                                                type="text"
                                                required
                                                pattern="/^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$/"
                                                class="form-control"
                                                placeholder="Enter your
                                            postalcode..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'postalCode'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="postalCode"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
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
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Longtude</label>
                                            <input
                                                v-model="form.longtude"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your longtude..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'longtude'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="longtude"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Price Square</label>
                                            <input
                                                v-model="form.priceSquare"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your price square..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'priceSquare'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="priceSquare"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Blance</label>
                                            <input
                                                v-model="form.blance"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your price blance..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'blance'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="blance"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Developer</label>
                                            <input
                                                v-model="form.developer"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your developer..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'developer'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="developer"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Grade</label>
                                            <input
                                                v-model="form.grade"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your grade..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'grade'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="grade"
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
                fmCode: "",
                member_id: "",
                contactName: "",
                phone: "",
                buildingName: "",
                detailAdress: "",
                province: "",
                city: "",
                postalCode: "",
                zone: "",
                area: "",
                townNumber: "",
                floor: "",
                roomNumber: "",
                contract: "",
                contractTime: "",
                latitude: "",
                longtude: "",
                priceSquare: "",
                workingTime: "",
                blance: "",
                developer: "",
                grade: ""
            })
        };
    },
    computed: {
        ...mapGetters(["buildings"]),
        ...mapState(["buildings"])
    },
    methods: {
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
                .put("api/building/" + this.form.id)
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
            building.contactName = building.member[0].name;
            building.phone = building.member[0].phone1;
            building.workingTime = moment(building.workingTime).format("YYYY-MM-DD");
            console.log(building);
            $("#addNew").modal("show");
            this.form.fill(building);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteBuilding(id) {
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
                        .delete("api/building/" + id)
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
        createBuilding() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("api/building")
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
        }
    },
    created() {
        this.$Progress.start();
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        var vm = this;
        var table = $(this.$refs.buildings).DataTable({
            dom: "Blfrtip",
            ajax: "api/building",
            responsive: true,
            processing: true,
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
                    data: "buildingName"
                },
                {
                    data: "fmCode"
                },
                {
                    data: "member[0].name"
                },
                {
                    data: null,
                    className: "dt-body-center",
                    render: function(data, type, row, meta) {
                        return "<a class='edit-building' href='#'><i class='fa fa-edit blue'></i> </a> / <a class='delete-building' href='#'> <i class='fa fa-trash red'></i> </a>";
                    }
                }
            ]
        });

        $("tbody", this.$refs.buildings).on("click", ".edit-building", function(
            e
        ) {
            e.preventDefault();
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.editModal(row.data());
        });

        $("tbody", this.$refs.buildings).on(
            "click",
            ".delete-building",
            function(e) {
                e.preventDefault();
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deleteBuilding(row.data().id);
            }
        );
    }
};
</script>

<style></style>
