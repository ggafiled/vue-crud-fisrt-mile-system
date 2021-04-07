<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">
                                Building List Table
                            </h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <table
                                table
                                id="buildings"
                                class="table table-striped table-bordered"
                                style="width:100%"
                            >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Building Name</th>
                                        <th>Fm-Code</th>
                                        <th>Contact Name</th>
                                        <th>Phone</th>
                                        <th>Area</th>
                                        <th>Floor</th>
                                        <th>Room</th>
                                        <th>Tower</th>
                                        <th>province</th>
                                        <th>City</th>
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
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({
                id: "",
                fmCode: "",
                member_id: "",
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
    methods: {},
    created() {},
    mounted() {
        this.$Progress.start();
        var vm = this;
        $("#buildings").DataTable({
            dom: "Blfrtip",
            ajax: "api/buildinglist",
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
                { data: "buildingName" },
                { data: "fmCode" },
                { data: "member[0].name" },
                { data: "member[0].phone1" },
                { data: "area" },
                { data: "floor" },
                { data: "roomNumber" },
                { data: "townNumber" },
                { data: "province" },
                { data: "city" }
            ]
        });
        this.$Progress.finish();
    }
};
</script>
