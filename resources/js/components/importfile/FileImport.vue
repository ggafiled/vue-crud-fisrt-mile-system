<template>
    <div class="card bg-gray-light col-sm-12" style="height: 420px">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-9 col-12">
                            <div class="form-group">
                                <div
                                    class="card bg-light"
                                    style="height: 360px"
                                >
                                    <vue-dropzone
                                            ref="fileImport"
                                            id="fileImport"
                                            :options="dropzoneOptions"
                                            v-on:vdropzone-file-added="selectedFile"
                                        ></vue-dropzone>
                                    <p class="p-1">
                                        *Supported file formats are xls,xlsx,csv
                                        & txt. Maximum file size allowed is 3MB
                                        (Megea Bytes). Please click
                                        <a
                                            href="https://www.facebook.com/photo/?fbid=4102790519819775&set=a.102925693139631"
                                            >this link</a
                                        >
                                        to know more
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 d-none d-xl-block">
                            <div class="form-group">
                                <div class="card d-none d-xl-block">
                                    <div
                                        class="card-header text-white bg-danger"
                                    >
                                        <h4>File Import</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            By clicking the image or dropping
                                            the file directly to this left
                                            section will start the import
                                            process for your transactions Quick
                                            Tour ITomplate
                                        </p>
                                    </div>
                                </div>
                                <div class="card d-none d-xl-block">
                                    <div
                                        class="card-header text-white bg-danger"
                                    >
                                        <h4>
                                            Sample Excel Template
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            Template Please download the below
                                            sample Excel template for your
                                            upload. To know more,Kindly click on
                                            <a
                                                href="/dowloadCustomerTemplate"
                                                target="blank"
                                            >
                                                this link
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dropzoneOptions: {
                url: "/api/import/getInfo",
                autoProcessQueue: false,
                clickable: true,
                thumbnailWidth: 150,
                maxFilesize: 0.5,
                maxFiles: 1,
                duplicateCheck: true,
                addRemoveLinks: true,
                acceptedFiles:".csv,.xlsx,.xls",
                dictDefaultMessage: "<div class='row g-1'><div class='col-md-4'><img src='https://i.pinimg.com/originals/26/05/43/26054324d69957afdbc56e4c113592b5.png' class='img-fluid'/></div><div class='col-md-6'><div class='card-body'><br /><br /><br /><h1>Click or Drop</h1><p class='normal'style='color: Gray'>To upload your files</p></div></div></div>"
            }
        };
    },
    methods: {
        selectedFile(file){
            this.$emit('selectedFile', file);
        },
        removeFile(){
            this.$refs.fileImport.removeAllFiles();
        }
    }
};
</script>

<style lang="scss" scoped>
h1 {
    font-size: 80px;
    font-weight: bold;
}

p.normal {
    font-size: 30px;
    font-weight: bold;
}

p.normal2 {
    font-size: 15px;
}
</style>
