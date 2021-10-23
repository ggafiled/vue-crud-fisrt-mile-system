<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Improt File Excel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0 m-0">
                            <form-wizard
                                ref="wizard"
                                :title="null"
                                :subtitle="null"
                                nextButtonText="Continue"
                                color="#4051B7"
                                shape="eclipse"
                                stepSize="xs"
                            >
                                <wizard-step
                                    slot-scope="props"
                                    slot="step"
                                    :tab="props.tab"
                                    :transition="props.transition"
                                    :index="props.index"
                                >
                                </wizard-step>
                                <tab-content
                                    title="File Import"
                                    :selected="true"
                                    :before-change="getTemplateInfo"
                                >
                                    <FileImport
                                        ref="import"
                                        @selectedFile="selectedFile"
                                    />
                                </tab-content>
                                <tab-content title="Select Sheet">
                                    <SheetsSelect :sheets="sheets"/>
                                </tab-content>
                                <tab-content title="Map Fields">
                                    <MapSheet/>
                                </tab-content>
                                <tab-content title="Review&Upload">
                                    <ReviewUpload/>
                                </tab-content>
                                <template slot="footer" slot-scope="props">
                                    <div class="wizard-footer-left">
                                        <wizard-button
                                            v-if="props.activeTabIndex > 0"
                                            @click.native="props.prevTab()"
                                            :style="props.fillButtonStyle"
                                            >Previous</wizard-button
                                        >
                                    </div>
                                    <div class="wizard-footer-right">
                                        <wizard-button
                                            v-if="!props.isLastStep"
                                            @click.native="props.nextTab()"
                                            class="wizard-footer-right"
                                            :style="props.fillButtonStyle"
                                            >Next</wizard-button
                                        >
                                        <wizard-button
                                            v-show="props.isLastStep"
                                            class="wizard-footer-right finish-button"
                                            :style="props.fillButtonStyle"
                                            :disabled="onprogress"
                                        >
                                            <span
                                                v-show="onprogress"
                                                class="spinner-border spinner-border-sm"
                                                role="status"
                                                aria-hidden="true"
                                            ></span>
                                            {{ translate("Upload") }}
                                        </wizard-button>
                                    </div>
                                </template>
                            </form-wizard>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import FileImport from "./FileImport.vue";
import SheetsSelect from "./SheetsSelect.vue";
import MapSheet from "./MapSheet.vue";
import ReviewUpload from "./ReviewUpload.vue";
export default {
    components: {
        FileImport,
        SheetsSelect,
        MapSheet,
        ReviewUpload
    },
    data() {
        return {
            onprogress: false,
            spreadsheet: [],
            file: null
        };
    },
    methods: {
        async getTemplateInfo() {
            if (this.file == null) {
                alert("กรุณานำเข้าไฟล์งาน ก่อนไปขั้นตอนถัดไปค่ะ!");
                return false;
            }

            var form = new FormData();
            form.append("file", this.file);
            const headers = { "Content-Type": "multipart/form-data" };
            LoadingWait.fire();
            await axios.post("/import/getInfo", form, { headers }).then(response => {
                console.log(response.data.data);
                // this.file = null;
                // this.$refs.import.removeFile();
            });
            setTimeout(() => {
                LoadingWait.close();
            },2000);
            return true;
        },
        selectedFile(file) {
            this.file = file;
        }
    }
};
</script>

<style lang="scss" scoped></style>
