<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ translate("zone.header") }}
                            </h3>
                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-sm btn-primary"
                                    @click="newModal"
                                >
                                    <i class="fa fa-plus-square"></i>
                                    {{ translate("zone.addnew") }}
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    id="items"
                                    ref="items"
                                    class="display nowrap"
                                    style="width: 100%"
                                >
                                    <thead>
                                        <tr class="info">
                                            <th></th>
                                            <th>Zone</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Date</th>
                                            <th>Tel</th>
                                            <th>Tel2</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Remark</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Avaiable</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div
                class="modal fade"
                id="addNew"
                tabindex="-1"
                role="dialog"
                aria-labelledby="addNew"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode">
                                {{ translate("zone.create.header") }}
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                {{ translate("zone.update.header") }}
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

                        <!-- <form @submit.prevent="createUser"> -->
                        <form
                            @submit.prevent="
                                editmode ? updateItem() : createItem()
                            "
                        >
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Zone Progress</label>
                                            <select
                                                class="form-control"
                                                v-model="form.zone_id"
                                            >
                                                <option disabled value=""
                                                    >Select a Class</option
                                                >
                                                <option
                                                    :value="item.id"
                                                    v-for="item in zones"
                                                    :key="item.id"
                                                >
                                                    {{ item.zoneName }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="zone"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input
                                                v-model="form.name"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your zone name..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'name'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Surname</label>
                                            <input
                                                v-model="form.surname"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your zone surname..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'surname'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input
                                                v-model="form.date"
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter your  date..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'date'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tel</label>
                                            <input
                                                v-model="form.tel"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your zone tel..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'tel'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tel2</label>
                                            <input
                                                v-model="form.tel2"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your zone tel2..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'tel2'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input
                                                v-model="form.email"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your zone email..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'email'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input
                                                v-model="form.status"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your zone status..."
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'status'
                                                    )
                                                }"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Remark Contract</label>
                                            <textarea
                                                id="remark"
                                                class="form-control"
                                                placeholder="-"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'remark'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="remark"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal"
                                >
                                    {{ translate("zone.actions.close") }}
                                </button>
                                <button
                                    v-show="editmode"
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    {{ translate("zone.actions.update") }}
                                </button>
                                <button
                                    v-show="!editmode"
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    {{ translate("zone.actions.create") }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    title: "Area 3BB -",
    data() {
        return {
            error: {},
            import_file: "",
            loader: null,
            zones: [],
            editmode: false,
            selected: "",
            zones: [],
            settings: {
                placeholder: { id: "-1", text: "-----กรุณาเลือกหน้าร้าน-----" },
                allowClear: false,
                dropdownParent: ".modal"
            },
            sportsData: ["Badminton", "Cricket", "Football", "Golf", "Tennis"],
            form: new Form({
                id: "",
                zone_id: "",
                zone: "",
                name: "",
                surname: "",
                date: "",
                tel: "",
                tel2: "",
                email: "",
                status: "",
                remark: "",
                created_at: "",
                updated: "",
                deleted_at: ""
            })
        };
    },
    methods: {
        loadZone() {
            axios.get("/zones").then(response => {
                this.zones = response.data.data;
            });
        },
        loadItem() {
            this.$Progress.start();
            $("#items")
                .DataTable()
                .ajax.reload();
            this.$Progress.finish();
        },
        updateItem() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("/teamzone/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.loadItem();
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        editModal(item) {
            this.editmode = true;
            this.form.reset();
            this.form.errors.clear();
            $("#addNew").modal("show");
            this.form.fill(item);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        loadZone() {
            axios.get("/zones").then(response => {
                this.zones = response.data.data;
            });
        },
        deleteItem(item) {
            Swal.fire({
                title: window.translate("teamzone.alert.delete_building_title"),
                text:
                    window.translate("teamzone.alert.delete_building_text") +
                    ` [${item.teamzone}]`,
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                cancelButtonText: window.translate(
                    "teamzone.alert.delete_building_cancel_button_text"
                ),
                confirmButtonText: window.translate(
                    "teamzone.alert.delete_building_confirm_button_text"
                )
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete("/teamzone/" + item.id)
                        .then(() => {
                            Swal.fire(
                                window.translate(
                                    "teamzone.alert.comfirm_delete_title"
                                ),
                                window.translate(
                                    "teamzone.alert.confirm_delete_message"
                                ),
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadItem();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        createItem() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("/teamzone")
                .then(response => {
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.loadItem();
                })
                .catch(() => {
                    Toast.fire({
                        icon: "error",
                        title: "Some error occured! Please try again"
                    });
                });
        },
        generateTable() {
            var vm = this;
            var table = $(this.$refs.items).DataTable({
                dom: "Blfrtip",
                ajax: "/api/teamzone",
                responsive: true,
                processing: true,
                autoWidth: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 15, 25, 50, -1],
                    [5, 10, 15, 25, 50, "All"]
                ],
                scrollX: true,
                scrollCollapse: true,
                select: true,
                buttons: [
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
                        data: "zone.zoneName"
                    },
                    {
                        data: "name"
                    },
                    {
                        data: "surname"
                    },
                    {
                        data: "date"
                    },
                    {
                        data: "tel"
                    },
                    {
                        data: "tel2"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "status"
                    },
                    {
                        data: "remark"
                    },
                    {
                        data: "created_at",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ปรากฏ" +
                                    "</span>"
                                );
                            } else {
                                return moment(data).format("MM/DD/YYYY HH:MM");
                            }
                        }
                    },
                    {
                        data: "updated_at",
                        render: function(data, type, row, meta) {
                            if (data == "" || data == null) {
                                return (
                                    '<span class="text-danger">' +
                                    "ไม่ปรากฏ" +
                                    "</span>"
                                );
                            } else {
                                return moment(data).format("MM/DD/YYYY HH:MM");
                            }
                        }
                    },
                    {
                        data: "deleted_at",
                        render: function(data, type, row, meta) {
                            return data !== null
                                ? '<i class="fas fa-times red"></i><span class="invisible">disable</span>'
                                : '<i class="fas fa-check green"></i><span class="invisible">enable</span>';
                        }
                    },
                    {
                        data: null,
                        className: "dt-body-center notexport",
                        render: function(data, type, row, meta) {
                            return "<a class='edit-items btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-items btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
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
            $("tbody", this.$refs.items).on("click", ".edit-items", function(
                e
            ) {
                e.preventDefault();
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.editModal(row.data());
            });
            $("tbody", this.$refs.items).on("click", ".delete-items", function(
                e
            ) {
                e.preventDefault();
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deleteItem(row.data());
            });
        }
    },
    created() {
        this.$Progress.start();
        this.$Progress.finish();
    },
    mounted() {
        this.generateTable();
        this.loadZone()
    }
};
</script>
