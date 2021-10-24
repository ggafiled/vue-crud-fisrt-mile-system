<template>
    <div class="card bg-gray-light col-sm-12" style="height: 420px">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="row">
                        <div
                            class="card bg-gray-light col-sm-12 col-xl-12 overflow-auto"
                            style="height: 420px"
                        >
                            <div class="row sheet-panel">
                                <div class="col-sm-12 mt-0 pt-0">
                                    <div class="form-group">
                                        <h4 class="navbar-brand">
                                            Please select worksheet to import.
                                        </h4>
                                        <div
                                            class="d-flex flex-row flex-wrap justify-space-between p-2"
                                        >
                                            <div
                                                class="d-flex flex-column mr-4"
                                                v-for="(item, i) in sheetsList"
                                                :key="i"
                                            >
                                                <label>
                                                    <input
                                                        type="radio"
                                                        name="radio"
                                                        :value="item"
                                                        v-model="selectedSheet"
                                                    />
                                                    <div class="box">
                                                        <div
                                                            class="d-flex flex-column justify-content-center align-items-center"
                                                        >
                                                            <i
                                                                class="fas bi bi-file-excel fa-3x mb-2"
                                                            ></i>
                                                            <span
                                                                class="d-inline-block text-break p-1"
                                                                >{{
                                                                    item
                                                                }}</span
                                                            >
                                                        </div>
                                                    </div>
                                                </label>
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
</template>

<script>
export default {
    props: ["sheetsList"],
    components: {},
    data() {
        return {
            selectedSheet: ""
        };
    },
    methods: {
        selectedFile(file) {
            this.$emit("selectedFile", file);
        },
        removeFile() {
            this.$refs.fileImport.removeAllFiles();
        }
    },
    watch: {
        sheetsList: function(newVal, oldVal) {
            this.selectedSheet = this.sheetsList[0];
        },
        selectedSheet: function(newVal, oldVal) {
            this.$emit("selectedSheet", newVal);
        }
    }
};
</script>
<style scoped lang="scss">
input[type="radio"] {
    display: none;
    &:checked {
        + .box {
            background-color: #9e9e9e;
            i {
                color: white;
            }
            span {
                color: white;
                // transform: translateY(70px);
                &:before {
                    transform: translateY(0px);
                    opacity: 1;
                }
            }
        }
    }
}
.sheet-panel {
    background-color: #f5f5f5;
}
.box {
    width: 150px;
    height: 150px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 8px;
    background-color: #eeeeee;
    border: 1px solid #8d90a0;
    transition: all 250ms ease;
    will-change: transition;
    text-align: center;
    cursor: pointer;
    font-weight: 900;
    &:active {
        transform: translateY(10px);
        i {
            color: white;
        }
        span {
            color: white;
        }
    }
    span {
        left: 0;
        right: 0;
        transition: all 300ms ease;
        user-select: none;
        color: #aeaeae;
    }
}
</style>
