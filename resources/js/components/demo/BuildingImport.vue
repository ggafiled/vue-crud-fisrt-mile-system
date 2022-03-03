<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body m-0">
                                <div class="row">
                                    <div class="row">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label
                                                    class="form-control-label"
                                                    for="input-file-import"
                                                    >Building Import</label
                                                >
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input
                                                            type="file"
                                                            class="custom-file-input"
                                                            :class="{
                                                                ' is-invalid':
                                                                    error.message
                                                            }"
                                                            id="input-file-import"
                                                            name="file_import"
                                                            ref="import_file"
                                                            @change="
                                                                onFileChange
                                                            "
                                                        />
                                                        <label
                                                            class="custom-file-label"
                                                            >Choose file</label
                                                        >
                                                    </div>
                                                    <div
                                                        class="input-group-append"
                                                    >
                                                        <button
                                                            v-on:click="proceedAction()"
                                                            type="button"
                                                            class="btn btn-primary"
                                                        >Upload
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                .post("/buildings/import", formData, {
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
