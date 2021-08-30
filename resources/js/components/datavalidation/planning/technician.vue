<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ translate("Technician") }}
                            </h3>
                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-sm btn-primary"
                                    @click="newModal"
                                >
                                    <i class="fa fa-plus-square"></i>
                                    {{ translate("building.addnew") }}
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    id="buildings"
                                    ref="buildings"
                                    class="display nowrap"
                                    style="width: 100%"
                                >
                                    <thead>
                                        <tr class="info">
                                            <th></th>
                                            <th>Technician</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Created_at</th>
                                            <th>Updated</th>
                                            <th>Deleted_at</th>
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
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode">
                                {{ translate("building.create.header") }}
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                {{ translate("building.update.header") }}
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
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Technician</label>
                                        <input
                                            v-model="form.teamTechnician"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your name area team technician..."
                                            :class="{
                                                'is-invalid': form.errors.has(
                                                    'teamTechnician'
                                                )
                                            }"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input
                                            v-model="form.phoneTechnician"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your name area phone technician..."
                                            :class="{
                                                'is-invalid': form.errors.has(
                                                    'phoneTechnician'
                                                )
                                            }"
                                        />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input
                                            v-model="form.emailTechnician"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your name area email technician..."
                                            :class="{
                                                'is-invalid': form.errors.has(
                                                    'emailTechnician'
                                                )
                                            }"
                                        />
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
                                {{ translate("building.actions.close") }}
                            </button>
                            <button
                                v-show="editmode"
                                type="submit"
                                class="btn btn-success"
                            >
                                {{ translate("building.actions.update") }}
                            </button>
                            <button
                                v-show="!editmode"
                                type="submit"
                                class="btn btn-primary"
                            >
                                {{ translate("building.actions.create") }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { mapGetters, mapState } from "vuex";
export default {
    title: "All -",
    data() {
        return {
            editmode: false,
            selected: "",
            form: new Form({
                id: "",
                teamTechnician: "",
                phoneTechnician: "",
                emailTechnician: "",
                created_at: "",
                updated: "",
                deleted_at: ""
            })
        };
    },
    computed: {
        ...mapGetters(["buildings"]),
        ...mapState(["buildings"])
    },
    methods: {
        loadBuildings() {
            this.$Progress.start();
            if (this.$gate.isAdmin()) {
                this.$store.dispatch("GET_BUILDINGS");
                $("#buildings")
                    .DataTable()
                    .ajax.reload();
            }
            this.$Progress.finish();
        },
        updateBuilding() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("/technician/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');
                    this.loadBuildings();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        editModal(building) {
            this.editmode = true;
            this.form.reset();
            console.log(building);
            $("#addNew").modal("show");
            this.form.fill(building);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteBuilding(item) {
            Swal.fire({
                title: window.translate("building.alert.delete_building_title"),
                text:
                    window.translate("building.alert.delete_building_text") +
                    ` [${item.teamTechnician}]`,
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                cancelButtonText: window.translate(
                    "building.alert.delete_building_cancel_button_text"
                ),
                confirmButtonText: window.translate(
                    "building.alert.delete_building_confirm_button_text"
                )
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete("/technician/" + item.id)
                        .then(() => {
                            Swal.fire(
                                window.translate(
                                    "building.alert.comfirm_delete_title"
                                ),
                                window.translate(
                                    "building.alert.confirm_delete_message"
                                ),
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadBuildings();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        createTechnician() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("/technician")
                .then(response => {
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    this.loadBuildings();
                })
                .catch(() => {
                    Toast.fire({
                        icon: "error",
                        title: "Some error occured! Please try again"
                    });
                });
        }
    },
    created() {
        this.$Progress.start();
        this.loadBuildings();
        this.$Progress.finish();
    },
    mounted() {
        var vm = this;
        var table = $(this.$refs.buildings).DataTable({
            dom: "Blfrtip",
            ajax: "/api/technician",
            responsive: true,
            processing: true,
            autoWidth: true,
            pageLength: 10,
            lengthMenu: [
                [10, 15, 25, 50, -1],
                [10, 15, 25, 50, "All"]
            ],
            scrollX: true,
            scrollCollapse: true,
            select: true,

            columns: [
                {
                    data: null,
                    defaultContent: "",
                    className: "dt-body-center notexport"
                },
                {
                    data: "teamTechnician"
                },
                {
                    data: "phoneTechnician"
                },
                {
                    data: "emailTechnician"
                },
                {
                    data: "created_at",
                    render: function(data, type, row, meta) {
                        if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ยังไม่มีข้อมูล" +
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
                        if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ยังไม่มีข้อมูล" +
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
                        if (data == "") {
                            return (
                                '<span class="text-danger">' +
                                "ยังไม่มีข้อมูล" +
                                "</span>"
                            );
                        } else {
                            return moment(data).format("MM/DD/YYYY HH:MM");
                        }
                    }
                },
                {
                    data: null,
                    className: "dt-body-center notexport",
                    render: function(data, type, row, meta) {
                        return "<a class='edit-building btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-building btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
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
        $("tbody", this.$refs.buildings).on("click", ".edit-building", function(
            e
        ) {
            e.preventDefault();
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.editModal(row.data());
        });
        $("tbody", this.$refs.buildings).on(
            "click",
            ".delete-building",
            function(e) {
                e.preventDefault();
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deleteBuilding(row.data());
            }
        );
    }
};
</script>
