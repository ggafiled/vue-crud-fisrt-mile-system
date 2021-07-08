<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            Building Tot Table
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
                                        <th>AreaN</th>
                                        <th>BBN</th>
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
                                        <th>TOT-Progress</th>
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
                    data: "projectName",
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
                    data: "areaN"
                },
                {
                    data: "bbN"
                },
                {
                    data: "nameManager",
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
                    data: "phoneManager",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-phone pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "mailManager",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-envelope pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "nameNiti",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-file-person pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "phoneNiti",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-phone pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "mailNiti",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-envelope pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "houseNumber"
                },
                {
                    data: "squadNumber"
                },
                {
                    data: "alleyName"
                },
                {
                    data: "roadName"
                },
                {
                    data: "districtName"
                },
                {
                    data: "countyName"
                },
                {
                    data: "provinceName"
                },
                {
                    data: "postalCode"
                },
                {
                    data: "buildingSum"
                },
                {
                    data: "floorSum"
                },
                {
                    data: "roomSum"
                },
                {
                    data: "longitude"
                },
                {
                    data: "latitude"
                },
                {
                    data: "progress[0].fmProgress"
                },
                {
                    data: "progress[0].totProgress"
                },
            ]
        });
    }
};
</script>
