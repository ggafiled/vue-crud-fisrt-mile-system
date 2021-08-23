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
                            <div class="card-text">
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
                                                v-if="
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
                                                v-else
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="56"
                                                height="56"
                                                fill="red"
                                                class="bi bi-shield-check"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M250 583 c-41 -38 -241 -389 -247 -433 -5 -43 25 -96 63 -110 33 -13
                                                    475 -13 508 0 38 14 68 67 63 110 -6 45 -206 394 -247 433 -23 20 -41 27 -70
                                                    27 -29 0 -47 -7 -70 -27z m100 -33 c17 -9 222 -354 234 -396 4 -13 -1 -30 -15
                                                    -47 l-20 -27 -229 0 -229 0 -20 27 c-14 17 -19 34 -15 47 11 38 216 386 233
                                                    396 21 12 38 12 61 0z"
                                                />
                                                <path
                                                    d="M297 424 c-9 -9 -9 -156 -1 -178 3 -9 14 -16 25 -16 23 0 31 41 27
                                                    130 -3 57 -6 65 -23 68 -12 2 -24 0 -28 -4z"
                                                />
                                                <path
                                                    d="M294 186 c-10 -26 4 -48 28 -44 17 2 23 10 23 28 0 18 -6 26 -23 28
                                                    -13 2 -25 -3 -28 -12z"
                                                />
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
