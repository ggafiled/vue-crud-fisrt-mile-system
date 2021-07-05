<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Building List Table</h2>
                    </div>
                    <div class="card-header">
                        <h2 class="card-title">มีสัญญา</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="buildinglist"
                                ref="buildinglist"
                                class="display nowrap"
                                style="width: 100%"
                            >
                                <thead>
                                    <tr class="info">
                                        <th></th>
                                        <th>Project Name</th>
                                        <th>Fm Code</th>
                                        <th>AreaN</th>
                                        <th>BBN</th>
                                        <th>Area3BB</th>
                                        <th>AreaTrue</th>
                                        <th>AreaTrueNew</th>
                                        <th>AreaAis</th>
                                        <th>AreaFiberNet</th>
                                        <th>Building Sum</th>
                                        <th>Floor Sum</th>
                                        <th>Room Sum</th>
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
                                        <th>Fm-Progress</th>
                                        <th>TOT-Progress</th>
                                        <th>AIS-Progress</th>
                                        <th>3BB-Progress</th>
                                        <th>SINET-Progress</th>
                                        <th>FN-Progress</th>
                                        <th>TRUE-Progress</th>
                                        <th>ContractSell</th>
                                        <th>ContractDate</th>
                                        <th>SpendSpace</th>
                                        <th>ContractPeriod</th>
                                        <th>Condition</th>
                                        <th>Balance</th>
                                        <th>OperatingTime</th>
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
    computed: {
        not_do_contract_yet() {
            return $(this.$refs.buildinglist)
                .DataTable()
                .column(38)
                .data()
                .filter(function(value, index) {
                    return value == "ยังไม่ได้ทำสัญญา" ? true : false;
                }).length;
        }
    },
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
                    {extend: "excelHtml5", autoFilter: true,
                    sheetName: "Exported data",className: "dt-button"},
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
                    data: "building[0].fmCode"
                },
                {
                    data: "building[0].areaN"
                },
                {
                    data: "building[0].bbN"
                },
                {
                    data: "building[0].area3BB"
                },
                {
                    data: "building[0].areaTrue"
                },
                {
                    data: "building[0].areaTrueNew"
                },
                {
                    data: "building[0].areaAis"
                },
                {
                    data: "building[0].areaFiberNet"
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
                    data: "building[0].longitude"
                },
                {
                    data: "building[0].latitude"
                },
                {
                    data: "fmProgress"
                },
                {
                    data: "totProgress"
                },
                {
                    data: "aisProgress"
                },
                {
                    data: "Progress3bb"
                },
                {
                    data: "sinetProgress"
                },
                {
                    data: "fnProgress"
                },
                {
                    data: "trueProgress"
                },
                {
                    data: "building[0].contractSell",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-person-badge pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "building[0].contractDate"
                },
                {
                    data: "building[0].spendSpace",
                    render: function(data, type, row, meta) {
                        if (data == "ยังไม่ได้ทำสัญญา") {
                            return (
                                '<span class="text-danger">' + data + "</span>"
                            );
                        } else {
                            return data;
                        }
                    }
                },
                {
                    data: "building[0].condition"
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
                },
                {
                    data: "building[0].operatingTime",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-alarm pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                }
            ]
        });
    }
};
</script>
