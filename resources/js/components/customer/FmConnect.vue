<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-fw bi bi-table"></i>
                            FM Connect Table
                        </h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="customer"
                                ref="customer"
                                class="display nowrap"
                                style="width: 100%"
                            >
                                <thead>
                                    <tr class="info">
                                        <th></th>
                                        <th>ชื่อ/บริษัท</th>
                                        <th>นามสกุล</th>
                                        <th>เบอร์โทร</th>
                                        <th>เบอร์โทร2</th>
                                        <th>ชื่อตึก</th>
                                        <th>บ้านเลขที่</th>
                                        <th>ซอย</th>
                                        <th>หมู่</th>
                                        <th>ถนน</th>
                                        <th>อำเภอ</th>
                                        <th>จังหวัด</th>
                                        <th>ตำบล</th>
                                        <th>รหัสไปรษณีย์</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>จำนวนอาคาร</th>
                                        <th>จำนวนชั้น</th>
                                        <th>จำนวนห้อง</th>
                                        <th>เครือข่ายที่ติดตั้ง</th>
                                        <th>รายละเอียดตัวแทน</th>
                                        <th>เลข circuit</th>
                                        <th>ค่าธรรมเนียมแรกเข้า</th>
                                        <th>ประเภทงาน</th>
                                        <th>วันที่นัดหมาย</th>
                                        <th>เวลานัดหมาย</th>
                                        <th>ช่าง</th>
                                        <th>เบอร์โทร</th>
                                        <th>อีเมลล์</th>
                                        <th>ผู้ให้บริการ</th>
                                        <th>status</th>
                                        <th>sub-Status</th>
                                        <th>รีมาร์ค (For Admin)</th>
                                        <th>Callver Status</th>
                                        <th>Problemsolution</th>
                                        <th>Confirm Appointment</th>
                                        <th>Appointment Time Customer</th>
                                        <th>ReMark Zone</th>
                                        <th>EquipmentInstall1</th>
                                        <th>SnInstall1</th>
                                        <th>EquipmentInstall2</th>
                                        <th>SnInstall2</th>
                                        <th>EquipmentInstall3</th>
                                        <th>SnInstall3</th>
                                        <th>EquipmentInstall4</th>
                                        <th>SnInstall4</th>
                                        <th>EquipmentInstall5</th>
                                        <th>SnInstall5</th>
                                        <th>EquipmentInstall6</th>
                                        <th>SnInstall6</th>
                                        <th>EquipmentInstall7</th>
                                        <th>SnInstall7</th>
                                        <th>Status Contrater</th>
                                        <th>Date Connect</th>
                                        <th>Date Disconnect</th>
                                        <th>Work Sheet</th>
                                        <th>Remark Account</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import "vue-step-wizard/dist/vue-step-wizard.css";
export default {
    title: "Customer -",

    methods: {
        loadBuildings() {
            axios.get("/building").then(
                response =>
                    (this.building = response.data.data.map(a => {
                        return { text: a.projectName, id: a.id };
                    }))
            );
        },
        loadPlaning() {
            this.$Progress.start();
            if (this.$gate.isAdmin()) {
                this.$store.dispatch("GET_BUILDINGS");
                $("#customer")
                    .DataTable()
                    .ajax.reload();
            }
            this.$Progress.finish();
        },
        generateTable() {
            var vm = this;
            var table = $(this.$refs.customer).DataTable({
                dom: "Blfrtip",
                ajax: "/api/planing",
                responsive: true,
                processing: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 15, 25, 50, -1],
                    [10, 15, 25, 50, "All"]
                ],
                fixedHeader: true,
                fixedColumns: true,
                fixedColumns: {
                    leftColumns: 3,
                    rightColumns: 0
                },
                scrollX: true,
                scrollCollapse: true,
                buttons: [
                    "colvis",
                    "copy",
                    "csv",
                    {
                        extend: "print",
                        text: "<i class='bi bi-printer mr-1'></i>Print"
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
                        className: "bg-success",
                        text: "<i class='bi bi-file-text mr-1'></i>AIS",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("Ais")
                                .draw();
                        }
                    },
                    {
                        className: "bg-danger",
                        text: "<i class='bi bi-file-text mr-1'></i>TRUE",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("TRUE")
                                .draw();
                        }
                    },
                    {
                        className: "bg-primary",
                        text: "<i class='bi bi-file-text mr-1'></i>TOT",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("TOT")
                                .draw();
                        }
                    },
                    {
                        className: "bg-danger",
                        text: "<i class='bi bi-file-text mr-1'></i>FINET",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("Fibernet")
                                .draw();
                        }
                    },
                    {
                        className: "bg-warning",
                        text: "<i class='bi bi-file-text mr-1'></i>FN",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("FN")
                                .draw();
                        }
                    },
                    {
                        className: "bg-danger",
                        text: "<i class='bi bi-file-text mr-1'></i>3BB",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("3BB")
                                .draw();
                        }
                    },
                    {
                        className: "bg-dark",
                        text: "<i class='bi bi-file-text mr-1'></i>TXRX",
                        action: function(e, dt, node, config) {
                            dt.column(21)
                                .search("TXRX")
                                .draw();
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
                        data: "name",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "surname",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "tel",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "tel2",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.projectName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.houseNumber",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.squadNumber",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.alleyName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.roadName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.districtName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.countyName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.provinceName",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.postalCode",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.longitude",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "building.latitude",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "theBuilding",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "floor",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "room",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: null,
                        render: function(data, type, row, meta) {
                            if (data.isp) {
                                return (
                                    '<span class="badge text-white" style="background: ' +
                                    data.isp.isps_color +
                                    '">' +
                                    data.isp.name +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "agent_detail.name",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger"><i class="bi bi-phone pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },

                   {
                        data: "circuit",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "entranceFee",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger"><i class="bi bi-phone pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "฿" + "</span>";
                            }
                        }
                    },
                    {
                        data: "jobtype.name",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger"><i class="bi bi-phone pr-2"></i>' +
                                    "ไม่ได้กรอกข้อมูล" +
                                    "</span>"
                                );
                            } else {
                                return "<span>" + data + "</span>";
                            }
                        }
                    },
                    {
                        data: "appointmentDate",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "appointmentTime",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "technician.teamTechnician",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "technician.phoneTechnician",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "technician.emailTechnician",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: null,
                        title: "ผู้ให้บริการ",
                        render: function(data, type, row, meta) {
                            if (data.isp_id) {
                                return (
                                    '<span class="badge text-white" style="background: ' +
                                    data.isp_id.isps_color +
                                    '">' +
                                    data.isp_id.name +
                                    "</span>"
                                );
                            }
                        }
                    },
                    {
                        data: "status",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "subStatus",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
                        data: "reMark",
                        className: "text-capitalize",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
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
            data: "callverStatus_id",
          },
          {
            data: "problemsolution_id",
          },
          {
            data: "confirmAppointment",
          },
          {
            data: "appointmentTimeCustomer",
          },
          {
            data: "reMarkzone",
          },
          {
            data: "equipmentInstall1",
          },
          {
            data: "snInstall1",
          },
          {
            data: "equipmentInstall2",
          },
          {
            data: "snInstall2",
          },
          {
            data: "equipmentInstall3",
          },
          {
            data: "snInstall3",
          },
          {
            data: "equipmentInstall4",
          },
          {
            data: "snInstall4",
          },
          {
            data: "equipmentInstall5",
          },
          {
            data: "snInstall5",
          },
          {
            data: "equipmentInstall6",
          },
          {
            data: "snInstall6",
          },
          {
            data: "equipmentInstall7",
          },
          {
            data: "snInstall7",
          },
          {
            data: "statusContrater",
          },
          {
            data: "dateConnect",
          },
          {
            data: "dateDisconnect",
          },
          {
            data: "workSheet",
          },
          {
            data: "reMarkAccount",
          },

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
            $("tbody", this.$refs.planing).on(
                "click",
                ".edit-customer",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.editModal(row.data());
                }
            );
            $("tbody", this.$refs.planing).on(
                "click",
                ".delete-customer",
                function(e) {
                    e.preventDefault();
                    var tr = $(this).closest("tr");
                    var row = table.row(tr);
                    vm.deleteCustomer(row.data().id);
                }
            );
        }
    },
    created() {
        this.$Progress.start();
        // LoadingWait.fire();
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        this.generateTable();
    }
};
</script>
