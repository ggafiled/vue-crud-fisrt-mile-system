<template>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Import File Excel to Data Base
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="container mt-5 text-center">
                                <h2 class="mb-4">
                                    Laravel 7 Import and Export CSV & Excel to
                                    Database Example
                                </h2>
                                <form
                                    action=""
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
                                    <div
                                        class="form-group mb-4"
                                        style="max-width: 500px; margin: 0 auto;"
                                    >
                                        <div class="custom-file text-left">
                                            <input
                                                type="file"
                                                name="file"
                                                class="custom-file-input"
                                                id="customFile"
                                            />
                                            <label
                                                class="custom-file-label"
                                                for="customFile"
                                                >Choose file</label
                                            >
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">
                                        Import data
                                    </button>
                                    <a class="btn btn-success">Export data</a>
                                </form>
                            </div>
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
            error: {},
            import_file: ""
        };
    },
    methods: {
        onFileChange(e) {
            this.import_file = e.target.files[0];
        },

        proceedAction() {
            let formData = new FormData();
            formData.append("import_file", this.import_file);

            axios
                .post("/users/import", formData, {
                    headers: { "content-type": "multipart/form-data" }
                })
                .then(response => {
                    if (response.status === 200) {
                        // codes here after the file is upload successfully
                    }
                })
                .catch(error => {
                    // code here when an upload is not valid
                    this.uploading = false;
                    this.error = error.response.data;
                    console.log("check error: ", this.error);
                });
        }
    }
};
</script>
