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
                                {{ translate("issue.header") }}
                            </h3>
                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-sm btn-primary"
                                    @click="newModal"
                                >
                                    <i class="fa fa-plus-square"></i>
                                    {{ translate("issue.addnew") }}
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3 pt-2">
                            <div class="card-tools p-0 pb-2">
                                <div class="form-inline align-content-between justify-content-between flex-fill flex-grow-1">
                                    <button
                                        type="button"
                                        class="btn btn-md btn-outline-success"
                                        @click="onBtExport"
                                    >
                                        <i
                                            class="bi bi-file-earmark-excel mr-1"
                                        ></i>
                                        Excel
                                    </button>
                                    <div class="form-inline">
                                        <div class="input-group" style="background-color: #F2F2F2;">
                                            <input
                                                class="form-control"
                                                type="search"
                                                placeholder="Type: ticket name"
                                                v-model="searchText"
                                                @input="onIpChange"
                                            />

                                            <div class="input-group-append">
                                                <button
                                                    class="btn btn-light"
                                                    style="border: 1px solid gray;"
                                                    @click="onIpChange"
                                                >
                                                    <i
                                                        class="fas fa-search"
                                                    ></i>
                                                </button>
                                                <button
                                                    class="btn btn-light"
                                                    style="border: 1px solid gray;border-radius: 0px 8px 8px 0px;"
                                                    @click="clearSearchText"
                                                >
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ag-grid-vue
                                id="myGrid"
                                style="width: 100%;height: 300px"
                                class="ag-theme-balham"
                                :gridOptions="gridOptions"
                                :columnDefs="columnDefs"
                                :rowData="rowData"
                                rowSelection="multiple"
                                :enableRangeSelection="true"
                                :allowContextMenuWithControlKey="true"
                                :getContextMenuItems="getContextMenuItems"
                                :pagination="true"
                                :paginationPageSize="15"
                            >
                            </ag-grid-vue>
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
import "ag-grid-enterprise";
import { AgGridVue } from "ag-grid-vue";
export default {
    components: {
        AgGridVue
    },
    data() {
        return {
            searchText: "",
            editmode: false,
            gridApi: null,
            columnDefs: null,
            rowData: null,
            gridOptions: {},
            vm: null
        };
    },
    beforeMount() {
        this.columnDefs = [
            {
                headerCheckboxSelection: true,
                checkboxSelection: true,
                width: 50,
                suppressSizeToFit: true,
                suppressMenu: true,
                suppressSorting: true
            },
            {
                field: "projectName",
                headerName: "Project Name",
                sortable: true,
                filter: true,
                cellRenderer: params => {
                    // put the value in bold
                    return (
                        '<span><i class="bi bi-building pr-2"></i>' +
                        params.value +
                        "</span>"
                    );
                }
            },
            {
                field: "buildingSum",
                headerName: "Building Sum",
                sortable: true,
                filter: true
            },
            {
                field: "floorSum",
                headerName: "Floor Sum",
                sortable: true,
                filter: true
            },
            {
                field: "roomSum",
                headerName: "Room Sum",
                sortable: true,
                filter: true
            },
            {
                field: "fmCode",
                headerName: "FM-CODE",
                sortable: true,
                filter: true
            },
            {
                field: "nameManager",
                headerName: "Name Manager",
                sortable: true,
                filter: true
            },
            {
                field: "phoneManager",
                headerName: "Phone Manager",
                sortable: true,
                filter: true
            }
        ];
        this.loadTickets();
    },
    methods: {
        loadTickets() {
            axios.get("api/building").then(response => {
                this.rowData = response.data.data;
            });
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
        getContextMenuItems(params) {
            var result = ["copy", "separator", "chartRange"];
            return result;
        },
        onBtExport() {
            this.gridApi.exportDataAsExcel();
        },
        onIpChange(e){
            console.log(this.searchText);
            this.gridApi.setQuickFilter(this.searchText);
        },
        clearSearchText(){
            this.searchText = "";
            this.gridApi.setQuickFilter("");
        }
    },
    mounted() {
        this.vm = this;
        this.gridApi = this.gridOptions.api;
        this.gridApi.setDomLayout("autoHeight");
        this.gridApi.sizeColumnsToFit();
        document.querySelector("#myGrid").style.height = "";
    }
};
</script>

<style lang="scss">
@import "~ag-grid-community/dist/styles/ag-grid.css";
@import "~ag-grid-community/dist/styles/ag-theme-balham.css";
</style>
