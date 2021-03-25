<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Building List Table
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Building Name</th>
                                        <th>Fm-Code</th>
                                        <th>Content</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Area</th>
                                        <th>Floor</th>
                                        <th>Room</th>
                                        <th>Tower</th>
                                        <th>province</th>
                                        <th>City</th>
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

                                        <td>{{ building.phone }}</td>

                                        <td>{{ building.email }}</td>

                                        <td>{{ building.area }}</td>

                                        <td>{{ building.floor }}</td>

                                        <td>{{ building.roomNumber }}</td>

                                        <td>{{ building.numberLayer }}</td>

                                        <td>{{ building.province }}</td>

                                        <td>{{ building.city }}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

export default {
    data() {
        return {
            editmode: false,
            buildings: {},
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
    methods: {
        getResults(page = 1) {
            this.$Progress.start();

            axios
                .get("api/building?page=" + page)
                .then(({ data }) => (this.buildings = data.data));

            this.$Progress.finish();
        },
        loadBuildings() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                axios
                    .get("api/building")
                    .then(({ data }) => (this.buildings = data.data));
            }

            this.$Progress.finish();
        },
        mounted() {
            console.log("User Component mounted.");
        }
    },
    created() {
        this.$Progress.start();
        this.loadBuildings();
        this.$Progress.finish();
    },
     mounted(){
        $('example').DataTable();
    }
};
</script>

<style></style>

