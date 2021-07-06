<template>
    <section class="content">
        <div class="container-fluid" v-if="$gate.isAdmin()">
            <div class="row ">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"
                            ><i class="fas fa-city"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">Building Managment</h5>
                            <div>
                                <a href="/building" class="small-box-footer"
                                    >Click
                                    <i class="fas fa-arrow-circle-right"></i
                                ></a>
                                <div class="float-right">
                                    {{
                                        dashboardInfo.building
                                            .toString()
                                            .replace(
                                                /\B(?=(\d{3})+(?!\d))/g,
                                                ","
                                            )
                                    }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-secondary elevation-1"
                            ><i class="fas fa-car-battery"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                Constarution Managment
                            </h5>
                            <div>
                                <a href="/constarution" class="small-box-footer"
                                    >Click
                                    <i class="fas fa-arrow-circle-right"></i
                                ></a>
                                <div class="float-right">
                                    {{
                                        dashboardInfo.constarution
                                            .toString()
                                            .replace(
                                                /\B(?=(\d{3})+(?!\d))/g,
                                                ","
                                            )
                                    }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"
                            ><i class="fas fa-cog"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                Progress Managment
                            </h5>
                            <div>
                                <a href="/progress" class="small-box-footer"
                                    >Click
                                    <i class="fas fa-arrow-circle-right"></i
                                ></a>
                                <div class="float-right">
                                    {{
                                        dashboardInfo.progress
                                            .toString()
                                            .replace(
                                                /\B(?=(\d{3})+(?!\d))/g,
                                                ","
                                            )
                                    }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"
                            ><i class="fas fa-users"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">Planning Managment</h5>
                            <a href="/commingsoon" class="small-box-footer"
                                >Coming Soon...
                                <i class="fas fa-arrow-circle-right"></i
                            ></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- MAP & BOX PANE -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    id="buildinglist"
                                    ref="buildinglist"
                                    class="display nowrap"
                                    style="width:100%"
                                >
                                    <thead>
                                        <tr class="info">
                                            <th>ProjectName</th>
                                            <th>DateContact</th>
                                            <th>SpendSpace</th>
                                            <th>ContractPeriod</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-info">
                        <span class="info-box-icon"
                            ><i class="far fa-building"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Progress All</span>
                            <span class="info-box-number">5,200</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="info-box mb-3 bg-secondary">
                        <span class="info-box-icon"
                            ><i class="fas fa-car-battery"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Constarution</span>
                            <span class="info-box-number">163,921</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"
                            ><i class="fas fa-cog"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Progress</span>
                            <span class="info-box-number">163,921</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="info-box mb-3 bg-warning">
                        <span class="info-box-icon"
                            ><i class="fas fa-address-card"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Planing</span>
                            <span class="info-box-number">114,381</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"
                            ><i class="bi bi-cash"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Balance</span>
                            <span class="info-box-number">92,050</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-danger">
                        <span class="info-box-icon"
                            ><i class="fas fa-users"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">User</span>
                            <span class="info-box-number">114,381</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
        <div class="container-fluid" v-else>
            Hello.
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            dashboardInfo: []
        };
    },
    methods: {
        async getDashboardInfo() {
            await axios
                .get("/api/dashboard")
                .then(response => {
                    this.dashboardInfo = response.data.data;
                })
                .catch(() => console.warn("Oh. Something went wrong"));
        },
        async generateDashboardTable() {
            console.log("buildings Component mounted.");
            var vm = this;
            var table = await $(this.$refs.buildinglist).DataTable({
                ajax: "api/buildinglist",
                pageLength: 10,
                lengthMenu: [
                    [10, 15, 25, 50, -1],
                    [10, 15, 25, 50, "All"]
                ],
                // paging:false,
                ordering: false,
                info: false,
                // searching: false,
                columns: [
                    {
                        data: "building[0].projectName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            return (
                                '<span><i class="bi bi-building pr-2"></i>' +
                                data +
                                "</span>"
                            );
                        }
                    },
                    {
                        data: "building[0].contractDate",
                        render: function(data, type, row, meta) {
                            return (
                                '<span><i class="bi bi-alarm pr-2"></i>' +
                                data +
                                "</span>"
                            );
                        }
                    },
                    {
                        data: "building[0].spendSpace",
                        render: function(data, type, row, meta) {
                            if (data == "ยังไม่ได้ทำสัญญา") {
                                return (
                                    '<span class="text-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: "building[0].contractPeriod"
                    },
                    {
                        data: "building[0].balance",
                        render: function(data, type, row, meta) {
                            return (
                                '<span><i class="bi bi-cash pr-2"></i>' +
                                data +
                                "</span>"
                            );
                        }
                    }
                ]
            });
        }
    },
    async mounted() {
        await this.getDashboardInfo();
        await this.generateDashboardTable();
    }
};
</script>
