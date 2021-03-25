<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Progress Table
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Building Name</th>
                                        <th>Fm-Code</th>
                                        <th>Network Date</th>
                                        <th>TOT</th>
                                        <th>AIS</th>
                                        <th>3BB</th>
                                        <th>SINET</th>
                                        <th>FN</th>
                                        <th>TRUE</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                  
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <v-grid
                                v-if="grid === 1"
                                key="1"
                                theme="compact"
                                :source="rows"
                                :columns="columns"
                            ></v-grid>
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
                networkDate: "",
                tot: "",
                ais: "",
                bb3: "",
                sinet: "",
                fn: "",
                true: ""
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
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
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
    dataTable(){
        $(document).ready(function() {
        $('#example').DataTable();
} );
    }
};
</script>

<style></style>

