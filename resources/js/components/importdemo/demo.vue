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
                                    action="/api/file-import"
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
                                    <input
                                        class="btn btn-primary"
                                        type="submit"
                                        value="Import data"
                                    />
                                    <!-- <a
                                        class="btn btn-success"
                                        href="/api/file-export"
                                        >Export data</a
                                    > -->
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
export default {};
</script>
