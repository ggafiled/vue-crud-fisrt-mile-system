<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Issue Tickets
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
                                id="issueTicket"
                                ref="issueTicket"
                                class="table table-striped table-bordered"
                            >
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Display Name</th>
                                        <th>Created At</th>
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
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            editmode: false,
        };
    },
    methods: {
        updateTeam() {

        },
        editModal(issueTicket) {
            this.editmode = true;
            this.form.reset();
            $("#addNew").modal("show");
            this.form.fill(issueTicket);
        },
        newModal() {
            this.editmode = false;
            this.form.reset();
            $("#addNew").modal("show");
        },
        deleteTeam(id) {

        },
        createTeam() {

        }
    },
    mounted() {

    }
};
</script>
