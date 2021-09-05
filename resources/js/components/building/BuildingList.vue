<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-fw bi bi-building"></i>
                            {{ translate("building.all.header") }}
                        </h3>
                    </div>
                    <div
                        class="modal fade"
                        id="nonContractAlert"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="nonContractAlert"
                        aria-hidden="true"
                    >
                        <div
                            class="modal-dialog modal-dialog-centered"
                            role="document"
                        >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="exampleModalLongTitle"
                                    >
                                        {{
                                            translate(
                                                "building.alert.contract_notification"
                                            )
                                        }}
                                        <img
                                            class="mx-auto"
                                            src="https://www.oncb.go.th/welcomePage/welcomepage_canEdit/thainiyom/images/new-gif-image-6.gif"
                                            width="48px"
                                            height="28px"
                                        />
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
                                <div class="modal-body">
                                    <div
                                        v-for="(item,
                                        index) in not_do_contract_yet"
                                        :key="item.id"
                                    >
                                        {{ item.building.projectName }}
                                        <hr
                                            v-if="
                                                index !=
                                                    not_do_contract_yet.length -
                                                        1
                                            "
                                        />
                                    </div>
                                </div>
                                <div
                                    class="modal-footer justify-content-between"
                                >
                                    <div
                                        class="form-check cursor-pointer"
                                        @click="
                                            hideNonContract = !hideNonContract
                                        "
                                    >
                                        <input
                                            class="form-check-input cursor-pointer"
                                            type="checkbox"
                                            value=""
                                            id="hideNonContractCheck"
                                            v-model="hideNonContract"
                                        />
                                        <label
                                            class="form-check-label"
                                            for="defaultCheck1"
                                        >
                                            <span
                                                class="cursor-pointer "
                                                style="user-select: none;"
                                                >{{
                                                    translate(
                                                        "building.alert.do_not_show_today"
                                                    )
                                                }}</span
                                            >
                                        </label>
                                    </div>
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-dismiss="modal"
                                    >
                                        {{
                                            translate("building.actions.close")
                                        }}
                                    </button>
                                </div>
                            </div>
                        </div>
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
                                        <th>Project Name Tot</th>
                                        <th>Project Name 3BB</th>
                                        <th>Project Name True</th>
                                        <th>Project Name Ais</th>
                                        <th>Project Name FiberNet</th>
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
                                        <th>ContractDateEnd</th>
                                        <th>ContractPeriod</th>
                                        <th>ReNewContact</th>
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
    title: "List -",
    data() {
        return {
            not_do_contract_yet: [],
            get hideNonContract() {
                const itemStr = localStorage.getItem("hideNonContract");
                if (!itemStr) {
                    const item = {
                        value: false,
                        expiry: moment
                            .utc()
                            .endOf("day")
                            .unix()
                    };
                    localStorage.setItem(
                        "hideNonContract",
                        JSON.stringify(item)
                    );
                    return false;
                }

                const item = JSON.parse(itemStr);
                const now = new Date();

                // compare the expiry time of the item with the current time
                if (moment().unix() > item.expiry) {
                    const item = {
                        value: false,
                        expiry: moment
                            .utc()
                            .endOf("day")
                            .unix()
                    };
                    localStorage.setItem(
                        "hideNonContract",
                        JSON.stringify(item)
                    );
                    return false;
                }
                return item.value;
            },
            set hideNonContract(value) {
                const item = {
                    value: value,
                    expiry: moment
                        .utc()
                        .endOf("day")
                        .unix()
                };
                localStorage.setItem("hideNonContract", JSON.stringify(item));
            }
        };
    },
    methods: {
        async notdocontractyet() {
            await axios
                .get("/buildinglist/nonContract")
                .then(response => {
                    this.not_do_contract_yet = response.data.data;
                    if (!this.hideNonContract && this.not_do_contract_yet.length > 0) {
                        $("#nonContractAlert").modal("show");
                    }
                })
                .catch(() => console.warn("Oh. Something went wrong"));
        },
        async generateBuildingListTable() {
            console.log("buildings Component mounted.");
            var vm = this;
            var table = await $(this.$refs.buildinglist).DataTable({
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
                        text:
                            "<i class='bi bi-file-earmark-excel mr-1'></i>Excel",
                        exportOptions: {
                            columns: "th:not(.notexport)"
                        }
                    },
                    {
                        extend: "excelHtml5",
                        autoFilter: true,
                        sheetName: "Exported data",
                        className: "dt-button"
                    },
                    {
                        extend: "print",
                        className: "dt-button",
                        text: "<i class='bi bi-printer mr-1'></i>Print"
                    },
                    {
                        className: "bg-danger",
                        text:
                            "<i class='bi bi-file-text mr-1'></i>ยังไม่ทำสัญญา",
                        action: function(e, dt, node, config) {
                            dt.column(44)
                                .search("ยังไม่ได้ทำสัญญา")
                                .draw();
                        }
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
                        className: "dt-body-center"
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
                        title: "TOT Project Name",
                        data: null,
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
                        title: "3BB Project Name",
                        data: null,
                        render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-building pr-2"></i>' +
                            (data.constarution.projectName3bb
                                ? data.constarution.projectName3bb
                                : data.projectName) +
                            "</span>"
                        );
                    }
                    },
                    {
                        title: "True Project Name",
                        data: null,
                        render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-building pr-2"></i>' +
                            (data.constarution.projectNameTrue
                                ? data.constarution.projectNameTrue
                                : data.projectName) +
                            "</span>"
                        );
                    }
                    },
                    {
                        title: "AIS Project Name",
                        data: null,
                        render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-building pr-2"></i>' +
                            (data.constarution.projectNameAis
                                ? data.constarution.projectNameAis
                                : data.projectName) +
                            "</span>"
                        );
                    }
                    },
                    {
                        title: "FiberNet Project Name",
                        data: null,
                        render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-building pr-2"></i>' +
                            (data.constarution.projectNameFibernet
                                ? data.constarution.projectNameFibernet
                                : data.projectName) +
                            "</span>"
                        );
                    }
                    },
                    {
                        data: "fmCode"
                    },
                    {
                        data: "areas.name"
                    },
                    {
                        data: "bbns.name"
                    },
                    {
                        data: "area3bb.name"
                    },
                    {
                        data: "area_true.name"
                    },
                    {
                        data: "areaTrueNew"
                    },
                    {
                        data: "area_ais.name"
                    },
                    {
                        data: "area_fibernet.name"
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
                        data: "nameManager",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger"><i class="bi bi-file-person pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-file-person pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "phoneManager",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger"><i class="bi bi-phone pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-phone pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "mailManager",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger"><i class="bi bi-envelope pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-envelope pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "nameNiti",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger"><i class="bi bi-file-person pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-file-person pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "phoneNiti",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger"><i class="bi bi-phone pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-phone pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "mailNiti",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger"><i class="bi bi-envelope pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-envelope pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "houseNumber",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "squadNumber",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "alleyName",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "roadName",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "districtName",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-warning">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "countyName",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-warning">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "provinceName",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-warning">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "postalCode",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-warning">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "longitude",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-warning">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "latitude",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-warning">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "progress.fm_progress.status",
                        render: function(data, type, row, meta) {
                            if (!data || data == "") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else if (data == "วางโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-success">' +
                                    data +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.tot_progress.status",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "ดำเนิการแล้วเสร็จ") {
                                return (
                                    '<span class="badge badge-primary">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "กำลังดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "รอเข้าดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "TOT วางโครงข่ายเอง") {
                                return (
                                    '<span class="badge badge-primary">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "วางโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data || data == "") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.ais_progress.status",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "ดำเนิการแล้วเสร็จ") {
                                return (
                                    '<span class="badge badge-primary">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "กำลังดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "รอเข้าดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "AIS วางโครงข่ายเอง") {
                                return (
                                    '<span class="badge badge-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "วางโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data || data == "") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.progress3bb.status",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "ดำเนิการแล้วเสร็จ") {
                                return (
                                    '<span class="badge badge-primary">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "กำลังดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "รอเข้าดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "3bb วางโครงข่ายเอง") {
                                return (
                                    '<span class="badge badge-orange">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "วางโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data || data == "") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.sinet_progress.status",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "ดำเนิการแล้วเสร็จ") {
                                return (
                                    '<span class="badge badge-primary">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "กำลังดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "รอเข้าดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "AIS วางโครงข่ายเอง") {
                                return (
                                    '<span class="badge badge-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "วางโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data || data == "") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.fn_progress.status",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "ดำเนิการแล้วเสร็จ") {
                                return (
                                    '<span class="badge badge-primary">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "กำลังดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "รอเข้าดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "fn วางโครงข่ายเอง") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "วางโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data || data == "") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.true_progress.status",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "ดำเนิการแล้วเสร็จ") {
                                return (
                                    '<span class="badge badge-primary">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "กำลังดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "รอเข้าดำเนินการ") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "วางโครงข่ายแล้ว") {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "ทรู วางโครงข่ายเอง") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    data +
                                    "</span>"
                                );
                            } else if (!data || data == "") {
                                return (
                                    '<span class="badge badge-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="badge badge-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "sale_fm.name",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger"><i class="bi bi-file-person pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-file-person pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "contractDate"
                    },
                    {
                        data: "contractDateEnd"
                    },
                    {
                        data: "contractPeriod"
                    },
                    {
                        data: "reNewContact"
                    },
                    {
                        data: "condition"
                    },
                    {
                        data: "balance",
                        render: function(data, type, row, meta) {
                            if (data == "") {
                                return (
                                    '<span class="text-danger"><i class="bi bi-cash pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span><i class="bi bi-cash pr-2"></i>' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "work_time.name",
                        render: function(data, type, row, meta) {
                            return (
                                '<span><i class="bi bi-alarm pr-2"></i>' +
                                data +
                                "</span>"
                            );
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
                order: [[1, "desc"]],
                initComplete: function(settings) {
                    setTimeout(function() {
                        vm.notdocontractyet();
                    }, 0);
                }
            });
        }
    },
   mounted() {
        this.generateBuildingListTable();
    }
};
</script>
