<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            Building Ais Table
                        </h2>
                    </div>
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
                                        <th></th>
                                        <th>Project Name</th>
                                        <th>AreaAis</th>
                                        <th>Manager Name</th>
                                        <th>Phone</th>
                                        <th>Mail</th>
                                        <th>Corporation Name</th>
                                        <th>Phone</th>
                                        <th>Mail</th>
                                        <th>House Number</th>
                                        <th>Swine</th>
                                        <th>Alley</th>
                                        <th>Road</th>
                                        <th>District</th>
                                        <th>Province</th>
                                        <th>County</th>
                                        <th>PostalCode</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Building Sum</th>
                                        <th>Floor Sum</th>
                                        <th>Room Sum</th>
                                        <th>Fm-Progress</th>
                                        <th>AIS-Progress</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>
    </section>
</template>

<script>
export default {
    mounted() {
        console.log("buildings Component mounted.");
        var vm = this;
        var table = $(this.$refs.buildinglist).DataTable({
            dom: "Blfrtip",
            ajax: "api/buildinglist",
            responsive: true,
            processing: true,
            autoWidth: true,
            fixedHeader: true,
            fixedColumns: true,
            fixedColumns: {
                leftColumns: 2
            },
            scrollX: true,
            scrollCollapse: true,
            select: true,
            pageLength: 15,
            lengthMenu: [
                [10, 15, 25, 50, -1],
                [10, 15, 25, 50, "All"]
            ],
            buttons: {
                buttons: [
                    { extend: "colvis", className: "dt-button" },
                    { extend: "copy", className: "dt-button" },
                    { extend: "csv", className: "dt-button" },
                    {
                        extend: "print",
                        className: "dt-button",
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
                ]
            },
            columns: [
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
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
                    data: "building[0].areaAis"
                },
                {
                    data: "building[0].nameManager",
                    className: "text-capitalize",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-file-person pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "building[0].phoneManager",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-phone pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "building[0].mailManager",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-envelope pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "building[0].nameNiti",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-file-person pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "building[0].phoneNiti",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-phone pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "building[0].mailNiti",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-envelope pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "building[0].houseNumber"
                },
                {
                    data: "building[0].squadNumber"
                },
                {
                    data: "building[0].alleyName"
                },
                {
                    data: "building[0].roadName"
                },
                {
                    data: "building[0].districtName"
                },
                {
                    data: "building[0].countyName"
                },
                {
                    data: "building[0].provinceName"
                },
                {
                    data: "building[0].postalCode"
                },
                {
                    data: "building[0].buildingSum"
                },
                {
                    data: "building[0].floorSum"
                },
                {
                    data: "building[0].roomSum"
                },
                {
                    data: "building[0].longitude"
                },
                {
                    data: "building[0].latitude"
                },
                {
                    data: "fmProgress"
                },
                {
                    data: "aisProgress"
                }
            ]
        });
    }
};
</script>
