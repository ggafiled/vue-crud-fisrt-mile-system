<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="bi bi-people"></i> User List</h3>
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
                                id="users"
                                ref="users"
                                class="table table-striped table-bordered"
                            >
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Email Verified?</th>
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

            <div v-if="!$gate.isAdmin()">
                <not-found></not-found>
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
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode">
                                Create New User
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update User's Info
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
                                editmode ? updateUser() : createUser()
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
                                    <label>Email</label>
                                    <input
                                        v-model="form.email"
                                        type="text"
                                        name="email"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'email'
                                            )
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="email"
                                    ></has-error>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input
                                        v-model="form.password"
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'password'
                                            )
                                        }"
                                        autocomplete="false"
                                    />
                                    <has-error
                                        :form="form"
                                        field="password"
                                    ></has-error>
                                </div>

                                <div class="form-group">
                                    <label>User Role</label>
                                    <select
                                        name="role"
                                        v-model="form.role"
                                        id="role"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'role'
                                            )
                                        }"
                                    >
                                        <option value="" selected
                                            >Select User Role</option
                                        >
                                        <option
                                            v-for="role in roles.data"
                                            :key="role.id"
                                            :value="role.id"
                                        >
                                            {{ role.display_name }}
                                        </option>
                                    </select>

                                    <has-error
                                        :form="form"
                                        field="role"
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
    </section>
</template>

<script>
export default {
    title: "Management User -",
    data() {
        return {
            editmode: false,
            users: {},
            roles: [],
            selected: "",
            form: new Form({
                id: "",
                role: "",
                name: "",
                email: "",
                password: "",
                email_verified_at: ""
            })
        };
    },
    methods: {
        updateUser() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("api/user/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');

                    this.loadUsers();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        editModal(user) {
            this.editmode = true;
            this.form.reset();
            $("#addNew").modal("show");
            user.role = user.roles[0].id;
            console.log(user);
            this.form.fill(user);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteUser(id) {
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
                        .delete("api/user/" + id)
                        .then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadUsers();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        loadUsers() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                // axios
                //     .get("api/user")
                //     .then(({ data }) => (this.users = data.data));
            }

            this.$Progress.finish();
        },
        loadRoles() {
            axios
                .get("api/role/list")
                .then(({ data }) => (this.roles = data.data));
        },
        createUser() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("api/user")
                .then(response => {
                    $("#addNew").modal("hide");

                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });

                    this.$Progress.finish();
                    this.loadUsers();
                    this.loadRoles();
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
        this.loadUsers();
        this.loadRoles();
        this.$Progress.finish();
    },
    mounted() {
        console.log("User Component mounted.");
        var vm = this;
        var table = $(this.$refs.users).DataTable({
            dom: "Blfrtip",
            ajax: "api/user",
            responsive: true,
            processing: true,
            autoWidth: true,
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
                        text:
                            "<i class='bi bi-x-square'></i> Email not verified yet?",
                        action: function(e, dt, node, config) {
                            dt.column(3)
                                .search("red")
                                .draw();
                        }
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
                ]
            },
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
                    data: "email",
                    render: function(data, type, row, meta) {
                        return (
                            '<span><i class="bi bi-envelope pr-2"></i>' +
                            data +
                            "</span>"
                        );
                    }
                },
                {
                    data: "email_verified_at",
                    render: function(data, type, row, meta) {
                        return data !== null
                            ? '<i class="fas fa-check green"></i><span class="invisible">green</span>'
                            : '<i class="fas fa-times red"></i><span class="invisible">red</span>';
                    }
                },
                {
                    data: "created_at",
                    render: function(data, type, row, meta) {
                        return moment(data).format("MMMM Do YYYY");
                    }
                },

                {
                    data: null,
                    className: "dt-body-center",
                    render: function(data, type, row, meta) {
                        return vm.$gate.iscurrentUser(data.id)
                            ? "<a class='edit-users btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a>"
                            : "<a class='edit-users btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-users btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
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

        $("tbody", this.$refs.users).on("click", ".edit-users", function() {
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.editModal(row.data());
        });

        $("tbody", this.$refs.users).on("click", ".delete-users", function() {
            var tr = $(this).closest("tr");
            var row = table.row(tr);
            vm.deleteUser(row.data().id);
        });
    }
};
</script>
