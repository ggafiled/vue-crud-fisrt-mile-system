<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Team Managment Table
                            </h3>
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
                                id="team"
                                ref="team"
                                class="table table-striped table-bordered"
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
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode">
                                Create New Team
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                Update Team's Info
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
                                editmode
                                    ? updateTeam()
                                    : createTeam()
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
    </section>
</template>

<script>
import { mapGetters, mapState } from "vuex";
export default {
    data() {
        return {
            editmode: false,
            selected: "",
            form: new Form({
                id: "",
                name: "",
                display_name: "",
                description: "",
                permissions: []
            })
        };
    },
    methods: {
        loadTeam() {
            this.$Progress.start();

            if (this.$gate.isAdmin()) {
                //To DO
            }

            this.$Progress.finish();
        },
        updateTeam() {
            this.$Progress.start();
            // console.log('Editing data');
            this.form
                .put("api/team/" + this.form.id)
                .then(response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');

                    this.loadTeam();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        editModal(team) {
            this.editmode = true;
            this.form.reset();
            $("#addNew").modal("show");
            this.form.fill(team);
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteTeam(id) {
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
                        .delete("api/team/" + id)
                        .then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
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
        createTeam() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("api/team")
                .then(response => {
                    $("#addNew").modal("hide");

                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });

                    this.$Progress.finish();
                    this.loadTeam();
                })
                .catch(() => {
                    Toast.fire({
                        icon: "error",
                        title: "Some error occured! Please try again"
                    });
                });
        }
    },
    created() {},
    mounted() {
        var vm = this;
        var table = $(this.$refs.team).DataTable({
            dom: "Blfrtip",
            ajax: "api/team",
            responsive: true,
            processing: true,
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
                    text: "<i class='bi bi-arrow-repeat mr-1'></i>Clear",
                    action: function(e, dt, node, config) {
                        dt.columns()
                            .search("")
                            .draw();
                    }
                }
            ],
            columns: [
                 {
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
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
                        return vm.$gate.iscurrentUser(data.id)
                            ? "<a class='edit-team' href='#'><i class='fa fa-edit blue'></i> </a>"
                            : "<a class='edit-team' href='#'><i class='fa fa-edit blue'></i> </a> / <a class='delete-team' href='#'> <i class='fa fa-trash red'></i> </a>";
                    }
                }
            ]
        });

        $("tbody", this.$refs.team).on(
            "click",
            ".edit-team",
            function() {
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.editModal(row.data());
            }
        );

        $("tbody", this.$refs.team).on(
            "click",
            ".delete-team",
            function() {
                var tr = $(this).closest("tr");
                var row = table.row(tr);
                vm.deleteTeam(row.data().id);
            }
        );
    }
};
</script>

<style></style>
