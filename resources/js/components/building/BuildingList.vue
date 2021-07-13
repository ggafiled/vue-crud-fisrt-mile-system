<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Building List Table</h2>
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
                                        แจ้งเตือนทำสัญญา
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
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-dismiss="modal"
                                    >
                                        Close
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
                                        <th>SpendSpace</th>
                                        <th>ContractPeriod</th>
                                        <th>reNewContact</th>
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
    data() {
        return {
            not_do_contract_yet: []
        };
    },
    methods: {
        async notdocontractyet() {
            await axios
                .get("/api/buildinglist/nonContract")
                .then(response => {
                    this.not_do_contract_yet = response.data.data;
                    $("#nonContractAlert").modal("show");
                })
                .catch(() => console.warn("Oh. Something went wrong"));
        },
        async generateProgessTable() {
            console.log("buildings Component mounted.");
            var vm = this;
            var table = await $(this.$refs.buildinglist).DataTable({
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
                                dt.columns(38)
                                    .search("ยังไม่ได้ทำสัญญา")
                                    .draw();
                            }
                        },
                        {
                            text:
                                "<i class='bi bi-arrow-repeat mr-1'></i>Clear",
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
                        data: "projectNameTot"
                    },
                    {
                        data: "projectName3bb"
                    },
                    {
                        data: "projectNameTrue"
                    },
                    {
                        data: "projectNameAis"
                    },
                    {
                        data: "projectNameFiberNet"
                    },
                    {
                        data: "fmCode"
                    },
                    {
                        data: "areaN"
                    },
                    {
                        data: "bbN"
                    },
                    {
                        data: "area3BB"
                    },
                    {
                        data: "areaTrue"
                    },
                    {
                        data: "areaTrueNew"
                    },
                    {
                        data: "areaAis"
                    },
                    {
                        data: "areaFiberNet"
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
                        data: "progress.fmProgress",
                        render: function(data, type, row, meta) {
                            if (data == "วางโครงข่ายแล้ว") {
                                return (
                                    '<span class="text-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="text-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.totProgress",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="text-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="text-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.aisProgress",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="text-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="text-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.Progress3bb",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="text-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="text-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.sinetProgress",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="text-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="text-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.fnProgress",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="text-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="text-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "progress.trueProgress",
                        render: function(data, type, row, meta) {
                            if (data == "เชื่อมโครงข่ายแล้ว") {
                                return (
                                    '<span class="text-success">' +
                                    data +
                                    "</span>"
                                );
                            } else if (data == "") {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return (
                                    '<span class="text-warning">' +
                                    data +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "contractSell",
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
                        data: "spendSpace",
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
                        data: "operatingTime",
                        render: function(data, type, row, meta) {
                            return (
                                '<span><i class="bi bi-alarm pr-2"></i>' +
                                data +
                                "</span>"
                            );
                        }
                    }
                ],
                initComplete: function(settings) {
                    setTimeout(function() {
                        vm.notdocontractyet();
                    }, 0);
                }
            });
        }
    },
    async mounted() {
        await this.generateProgessTable();
    }
};
</script>
