<template>
    <section class="content">
        <div class="container-fluid" v-if="$gate.isAdmin()">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Role List</h3>

                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-sm btn-primary"
                                    @click="newModal"
                                >
                                    <i class="fa fa-plus-square"></i>
                                    Add New
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-2">
                            <table
                                class="table table-striped table-bordered"
                                ref="permission"
                                id="permission"
                            >
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Display Name</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
                <div class="modal-dialog" role="dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode">
                                Create New Role
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Role's Info
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

                        <!-- <form @submit.prevent="createRole"> -->

                        <form
                            @submit.prevent="
                                editmode ? updateRole() : createRole()
                            "
                        >
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'name'
                                            )
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="name"
                                    ></has-error>
                                </div>
                                <div class="form-group">
                                    <label>Display Name</label>
                                    <input
                                        v-model="form.display_name"
                                        type="text"
                                        name="display_name"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'display_name'
                                            )
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="display_name"
                                    ></has-error>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input
                                        v-model="form.description"
                                        type="text"
                                        name="description"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'description'
                                            )
                                        }"
                                        autocomplete="false"
                                    />
                                    <has-error
                                        :form="form"
                                        field="description"
                                    ></has-error>
                                </div>
                                <div class="form-group">
                                    <label>Permissions</label>
                                    <vue-tags-input
                                        v-model="permission"
                                        :tags="form.permissions"
                                        :autocomplete-items="filteredItems"
                                        @tags-changed="
                                            newTags =>
                                                (form.permissions = newTags)
                                        "
                                    />
                                    <has-error
                                        :form="form"
                                        field="permissions"
                                    ></has-error>
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
                                <button
                                    v-show="editmode"
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    Update
                                </button>
                                <button
                                    v-show="!editmode"
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Create
                                </button>
                            </div>
                        </form>
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
import VueTagsInput from "@johmun/vue-tags-input";
export default {
    title: "Permission -",
    components: {
        VueTagsInput
    },
    data() {
        return {
            editmode: false,
            roles: {},
            selected: "",
            form: new Form({
                id: "",
                name: "",
                display_name: "",
                description: "",
                permissions: []
            }),
            permission: "",
            autocompleteItems: []
        };
    },
    methods: {
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteRole(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete("api/role/" + id)
                        .then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadRoles();
                            this.loadPermissions();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        updateRole() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("api/role/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');

                    this.loadRoles();
                    this.loadPermissions();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        editModal(role) {
            this.editmode = true;
            this.form.reset();
            $("#addNew").modal("show");
            // user.role = user.roles[0].id;
            // this.form.permission = role.permissions;
            // console.log(role);
            this.form.fill(role);
        },
        loadRoles() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                axios
                    .get("api/role")
                    .then(({ data }) => (this.roles = data.data));
            }

            this.$Progress.finish();
        },
        loadPermissions() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                axios
                    .get("/api/permission/list")
                    .then(response => {
                        this.autocompleteItems = response.data.data.map(a => {
                            return { text: a.name, id: a.id };
                        });
                    })
                    .catch(() => console.warn("Oh. Something went wrong"));
            }

            this.$Progress.finish();
        },
        createRole() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("api/role")
                .then(response => {
                    $("#addNew").modal("hide");

                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });

                    this.$Progress.finish();
                    this.form.reset();
                    this.loadRoles();
                    this.loadPermissions();
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
        this.loadRoles();
        this.loadPermissions();
        this.$Progress.finish();
    },
    computed: {
        filteredItems() {
            return this.autocompleteItems.filter(i => {
                return (
                    i.text
                        .toLowerCase()
                        .indexOf(this.permission.toLowerCase()) !== -1
                );
            });
        }
    },
    mounted() {
        console.log("Permission/Role Component mounted.");
        var vm = this;
        var table = $(this.$refs.permission).DataTable({
            dom: "Blfrtip",
            ajax: "api/role",
            responsive: true,
            processing: true,
            autoWidth: true,
            pageLength: 15,
            lengthMenu: [
                [10, 15, 25, 50, -1],
                [10, 15, 25, 50, "All"]
            ],
            buttons: [
                "colvis",
                "copy",
                "csv",
                {
                    extend: "print",
                    text: "<i class='bi bi-printer mr-1'></i>Print"
                },
                {
                    text:
                        "<i class='bi bi-list-check mr-1'></i>แสดงที่เลือกไว้",
                    action: function(e, dt, node, config) {
                        console.info("button: Display Select Item");
                        var rowsel = dt
                            .rows({ selected: true })
                            .data()
                            .map(function(item) {
                                return item.id;
                            })
                            .join(",");
                        if (!rowsel.length) {
                            return Swal.fire({
                                title: "ไม่มีเรดคอร์ดที่เลือก",
                                text: "กรุณาเลือกเรดคอร์ดก่อน",
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
                    data: "name",
                    className: "text-capitalize"
                },
                {
                    data: "display_name"
                },
                {
                    data: "description"
                },
                {
                    data: "created_at",
                    render: function(data, type, row, meta) {
                        return moment(data.created_at).format("MMMM Do YYYY");
                    }
                },
                {
                    data: null,
                    className: "dt-body-center",
                    render: function(data, type, row, meta) {
                        return "<a class='edit-permission' href='#'><i class='fa fa-edit blue'></i> </a> / <a class='delete-permission' href='#'> <i class='fa fa-trash red'></i> </a>";
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

        $("tbody", this.$refs.permission).on(
            "click",
            ".edit-permission",
            function() {
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.editModal(row.data());
            }
        );

        $("tbody", this.$refs.permission).on(
            "click",
            ".delete-permission",
            function() {
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deleteRole(row.data().id);
            }
        );
    }
};
</script>
