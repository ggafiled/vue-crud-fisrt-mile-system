<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i
                                    class="mdi mdi-ticket-confirmation-outline mr-1"
                                ></i>
                                {{ translate("Details of last ran backup") }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3 pt-2">
                            <div class="card-text" v-if="!backup">
                                <div class="row">
                                    <div class="col-12">
                                        >> Seems you not backup database yet?
                                    </div>
                                </div>
                            </div>
                            <div class="card-text" v-else>
                                <div class="row">
                                    <div class="col-8">
                                        <p>
                                            Assuming that this timestamp is in
                                            <b>{{
                                                backup.created_at
                                                    | moment("from", "now")
                                            }}</b>
                                            <b>GMT:</b>
                                            {{
                                                backup.created_at
                                                    | moment(
                                                        "dddd, MMMM Do YYYY, h:mm:ss a"
                                                    )
                                            }}
                                        </p>
                                        <p>
                                            <b>Your time zone:</b>
                                            {{
                                                backup.created_at
                                                    | moment(
                                                        "dddd, MMMM Do YYYY, h:mm:ss a"
                                                    )
                                            }}
                                            <b>Relative:</b>
                                            {{
                                                backup.created_at
                                                    | moment("from", "now")
                                            }}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <div
                                            class="icon-status float-right pr-5"
                                        >
                                            <svg
                                                v-show="
                                                    backup.status == 'success'
                                                "
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="56"
                                                height="56"
                                                fill="green"
                                                class="bi bi-shield-check"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"
                                                />
                                                <path
                                                    d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"
                                                />
                                            </svg>

                                            <svg
                                                v-show="
                                                    backup.status == 'failure'
                                                "
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="56pt"
                                                height="56pt"
                                                viewBox="0 0 56 56"
                                                version="1.1"
                                            >
                                                <g id="surface1">
                                                    <path
                                                        style=" stroke:none;fill-rule:nonzero;fill:rgb(84.313725%,15.686275%,15.686275%);fill-opacity:1;"
                                                        d="M 56 28 C 56 43.464844 43.464844 56 28 56 C 12.535156 56 0 43.464844 0 28 C 0 12.535156 12.535156 0 28 0 C 43.464844 0 56 12.535156 56 28 Z M 56 28 "
                                                    />
                                                    <path
                                                        style=" stroke:none;fill-rule:nonzero;fill:rgb(90.196078%,90.196078%,90.196078%);fill-opacity:1;"
                                                        d="M 25.375 43.75 L 30.625 43.75 L 30.625 38.5 L 25.375 38.5 Z M 25.375 10.5 L 25.375 33.25 L 30.625 33.25 L 30.625 10.5 Z M 25.375 10.5 "
                                                    />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <ag-grid-vue
                        id="myGrid"
                        style="width: 100%;height: 300px"
                        class="ag-theme-balham"
                        rowSelection="multiple"
                        :enableRangeSelection="true"
                        :allowContextMenuWithControlKey="true"
                        :pagination="true"
                        :paginationPageSize="15"
                    >
                    </ag-grid-vue>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import "ag-grid-enterprise";
import { AgGridVue } from "ag-grid-vue";
export default {
    title: "Console -",
    components: { AgGridVue },
    data() {
        return {
            backup: {}
        };
    },
    methods: {
        async checkHealthy() {
            await axios.get("api/backup").then(response => {
                this.backup = response.data.data;
            });
        }
    },
    mounted() {
        this.checkHealthy();
    }
};
</script>

<style lang="scss" scoped>
@import "~ag-grid-community/dist/styles/ag-grid.css";
@import "~ag-grid-community/dist/styles/ag-theme-balham.css";
.card-text {
    p {
        padding: 0;
        margin: 0;
    }
}
.vl {
    border-left: 1px solid rgb(187, 187, 187);
    height: 100%;
}
</style>
