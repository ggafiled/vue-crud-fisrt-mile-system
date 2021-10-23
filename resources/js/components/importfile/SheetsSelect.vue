<template>
    <div class="card bg-gray-light col-sm-12" style="height: 420px">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-9 col-12">
                            <div class="form-group">
                                <FormRadioPlugin />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { FormRadioPlugin } from 'bootstrap-vue';
export default {
    props: ["sheets"],
    components: {
        FormRadioPlugin
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
