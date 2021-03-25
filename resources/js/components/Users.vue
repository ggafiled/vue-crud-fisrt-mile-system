<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User List</h3>

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
                        <div class="card-body table-responsive p-0">
                            <table
                                id="example"
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
                                <tbody>
                                    <tr
                                        colspan="6"
                                        v-cloak
                                        v-if="!users"
                                        class="align-content-center p-2"
                                    >
                                        No record on systems.
                                    </tr>
                                    <tr
                                        v-for="(user, index) in users.data"
                                        :key="user.id"
                                    >
                                        <td>{{ index + 1 }}</td>
                                        <td class="text-capitalize">
                                            {{ user.name }}
                                        </td>
                                        <td>{{ user.email }}</td>
                                        <td
                                            :inner-html.prop="
                                                user.email_verified_at | yesno
                                            "
                                        ></td>
                                        <td>{{ user.created_at | myDate }}</td>

                                        <td>
                                            <a
                                                href="#"
                                                @click.prevent="editModal(user)"
                                            >
                                                <i class="fa fa-edit blue"></i>
                                            </a>
                                            <slot
                                                v-if="
                                                    $gate.iscurrentUser(user.id)
                                                "
                                            >
                                                /
                                                <a
                                                    href="#"
                                                    @click.prevent="
                                                        deleteUser(user.id)
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-trash red"
                                                    ></i>
                                                </a>
                                            </slot>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <pagination
                                :data="users"
                                @pagination-change-page="getResults"
                            ></pagination>
                        </div>
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
        getResults(page = 1) {
            this.$Progress.start();

            axios
                .get("api/user?page=" + page)
                .then(({ data }) => (this.users = data.data));

            this.$Progress.finish();
        },
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
                axios
                    .get("api/user")
                    .then(({ data }) => (this.users = data.data));
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
    mounted() {
        console.log("User Component mounted.");
    },

    created() {
        this.$Progress.start();
        this.loadUsers();
        this.loadRoles();
        this.$Progress.finish();
    },
    mounted(){
        $('example').DataTable();
    }
};
</script>
