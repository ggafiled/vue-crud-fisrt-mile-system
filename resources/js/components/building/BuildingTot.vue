<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-fw bi bi-building"></i>
                            {{ translate("building.tot.header") }}
                        </h3>
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
                                        <th>Project TOT Name</th>
                                        <th>AreaTOT</th>
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
    title: "AIS -",
    mounted() {
        console.log("buildings Component mounted.");
        var vm = this;
        var table = $(this.$refs.buildinglist).DataTable({
            dom: "Blfrtip",
            ajax: "/api/buildinglist",
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
            buttons: [
                "colvis",
                {
                    extend: "copy",
                    text: "<i class='bi bi-clipboard mr-1'></i>Copy",
                    exportOptions: {
                        columns: "th:not(.notexport)"
                    }
                },
                {
                    extend: "excelHtml5",
                    autoFilter: true,
                    sheetName: "Building",
                    text: "<i class='bi bi-file-earmark-excel mr-1'></i>Excel",
                    exportOptions: {
                        columns: "th:not(.notexport)"
                    }
                },
                {
                    extend: "print",
                    className: "dt-button",
                    text: "<i class='bi bi-printer mr-1'></i>Print"
                },
                {
                    text:
                        "<i class='bi bi-list-check mr-1'></i>" +
                        window.translate(
                            "datatables.alert.display_selected_record_title"
                        ) +
                        "",
                    action: function(e, dt, node, config) {
                        var rowsel = dt
                            .rows({ selected: true })
                            .data()
                            .map(function(item) {
                                return item.id;
                            })
                            .join(",");
                        if (!rowsel.length) {
                            return Swal.fire({
                                title: window.translate(
                                    "datatables.alert.display_selected_record_empty_title"
                                ),
                                text: window.translate(
                                    "datatables.alert.display_selected_record_empty_text"
                                ),
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                        }
                        $.fn.dataTable.ext.search.pop();
                        $.fn.dataTable.ext.search.push(function(
                            settings,
                            data,
                            dataIndex
                        ) {
                            return $(table.row(dataIndex).node()).hasClass(
                                "selected"
                            )
                                ? true
                                : false;
                        });

                        table.draw();
                    }
                },
                {
                    text: "<i class='bi bi-arrow-repeat mr-1'></i>Refresh",
                    action: function(e, dt, node, config) {
                        console.info("button: Clear");
                        $.fn.dataTable.ext.search.pop();
                        dt.search("").draw();
                        dt.columns()
                            .search("")
                            .draw();
                        dt.rows().deselect();
                        dt.ajax.reload();
                    }
                }
            ],
            columns: [
                {
                    data: null,
                    defaultContent: "",
                    className: "dt-body-center notexport"
                },
                {
                    data: "projectName",
                    className: "text-capitalize",
                    render: function(data, type, row, meta) {
                        if (!data) {
                            return "ไม่ได้ระบุ";
                        } else {
                            return (
                                '<span><i class="bi bi-building pr-2"></i>' +
                                data +
                                "</span>"
                            );
                        }
                    }
                },
                {
                    title: "TOT Project Name", // EDIT
                    data: null,
                    defaultContent: "",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-building pr-2"></i>' +
                            (data.constarution.projectNameTot
                                ? data.constarution.projectNameTot
                                : data.projectName) +
                            "</span>"
                        );
                    }
                },
                {
                    data: "areas.name" // EDIT
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
                    data: "progress.fm_progress.status", // EDIT
                    render: function(data, type, row, meta) {
                        if (!data) {
                            return "ไม่ได้ระบุ";
                        } else {
                            return data;
                        }
                    }
                },
                {
                    data: "progress.tot_progress.status", // EDIT
                    render: function(data, type, row, meta) {
                        if (!data) {
                            return "ไม่ได้ระบุ";
                        } else {
                            return data;
                        }
                    }
                }
            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    orderable: false,
                    className: "dt-body-center",
                    checkboxes: {
                        selectRow: true
                    }
                }
            ],
            select: { selector: "td:not(:last-child)", style: "os" },
            order: [[1, "desc"]]
        });
    }
};
</script>
