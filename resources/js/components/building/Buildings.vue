<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
<<<<<<< HEAD
                            <h3 class="card-title">Building Managment Table</h3>
=======
                            <h3 class="card-title">Building Managment</h3>
>>>>>>> 4c71bd8b4cd0949c07d35609a0c1e7878836dc9f

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
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Building Name</th>
                                        <th>Fm-Code</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        colspan="6"
                                        v-cloak
                                        v-if="!buildings"
                                        class="align-content-center p-2"
                                    >
                                        No record on systems.
                                    </tr>
                                    <tr
                                        v-for="(building,
                                        index) in buildings.data"
                                        :key="building.id"
                                    >
                                        <td>{{ index + 1 }}</td>
                                        <td class="text-capitalize">
                                            {{ building.buildingId }}
                                        </td>
                                        <td>{{ building.fmCode }}</td>

                                        <td>{{ building.contactName }}</td>

                                        <td>
                                            <a
                                                href="#"
                                                @click.prevent="
                                                    editModal(building)
                                                "
                                            >
                                                <i class="fa fa-edit blue"></i>
                                            </a>
                                            <slot
                                                v-if="
                                                    $gate.iscurrentUser(
                                                        building.id
                                                    )
                                                "
                                            >
                                                /
                                                <a
                                                    href="#"
                                                    @click.prevent="
                                                        deleteBuilding(
                                                            building.id
                                                        )
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-trash red"
                                                    ></i>
                                                </a>
                                            </slot>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <pagination
                                :data="buildings"
                                @pagination-change-page="getResults"
                            ></pagination>
                        </div>
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
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Contact Name</label>
                                            <input
                                                v-model="form.contactName"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your contact name..."
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
                                            <label>Phone</label>
                                            <input
                                                v-model="form.phone"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your phone..."
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
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input
                                                v-model="form.email"
                                                type="email"
                                                class="form-control"
                                                placeholder="Enter your Email..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'email'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="email"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
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
                                            <label>Layer Number</label>
                                            <input
                                                v-model="form.numberLayer"
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter your number layer..."
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
                                                pattern="/^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$/"
                                                class="form-control"
                                                placeholder="Enter your postalcode..."
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
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Note</label>
                                            <input
                                                v-model="form.note"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your note..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'note'
                                                    )
                                                }"
                                            />
                                        </div>
                                        <has-error
                                            :form="form"
                                            field="note"
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
                fmCode: "",
                contactName: "",
                phone: "",
                email: "",
                area: "",
                floor: "",
                roomNumber: "",
                numberLayer: "",
                detailAdress: "",
                province: "",
                city: "",
                postalCode: "",
                latitude: "",
                longtude: "",
                priceSquare: "",
                workingTime: "",
                blance: "",
                developer: "",
                grade: "",
                note: ""
            })
        };
    },
    computed: {
        ...mapGetters(["buildings"]),
        ...mapState(["buildings"])
    },
    methods: {
        getResults(page = 1) {
            this.$Progress.start();

            axios
                .get("api/building?page=" + page)
                .then(({ data }) => (this.$store.state.buildings = data.data));

            this.$Progress.finish();
        },
        loadBuildings() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                this.$store.dispatch("GET_BUILDINGS");
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
    mounted() {
        let pusher = new Pusher("914457", {
            cluster: "ap1",
            encrypted: false
        });

        //Subscribe to the channel we specified in our Adonis Application
        let channel = pusher.subscribe("building-channel");

        channel.bind("new-building", data => {
            this.$store.commit("ADD_BUILDINGS", data.building);
        });
    },
    created() {
        this.$Progress.start();
        this.loadBuildings();
        this.$Progress.finish();
    }
};
</script>

<style></style>
