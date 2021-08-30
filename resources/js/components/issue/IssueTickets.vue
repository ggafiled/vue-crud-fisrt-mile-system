<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" v-if="$gate.isAdmin()">
                                <i
                                    class="mdi mdi-ticket-confirmation-outline mr-1"
                                ></i>
                                {{ translate("issue.header") }}
                            </h3>
                            <h3 class="card-title" v-else>
                                <i
                                    class="mdi mdi-ticket-confirmation-outline mr-1"
                                ></i>
                                {{ translate("issue.header_user") }}
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
                                <div
                                    class="form-inline align-content-between justify-content-between flex-fill flex-grow-1"
                                >
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
                                        <div
                                            class="input-group"
                                            style="background-color: #F2F2F2;"
                                        >
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
    title: "Issue Tickets -",
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
                resizable: true,
                suppressSizeToFit: true,
                suppressMenu: true,
                suppressSorting: true
            },
            {
                field: "ticket_id",
                headerName: "#Ticket No",
                sortable: true,
                filter: true,
                width: 120,
                cellRenderer: params => {
                    // put the value in bold
                    return `<a href="/issue-tickets/${
                        params.value
                    }" target="_blank">${"#" + params.value}</a>`;
                }
            },
            {
                field: "title",
                headerName: "Title",
                sortable: true,
                filter: true,
                resizable: true,
                cellRenderer: params => {
                    // put the value in bold
                    return (
                        '<span><i class="bi bi-file-text mr-1"></i>' +
                        params.value +
                        "</span>"
                    );
                }
            },
            {
                field: "message",
                headerName: "Detail",
                sortable: true,
                resizable: true,
                filter: true
            },
            {
                field: "user.name",
                headerName: "User Name",
                sortable: true,
                filter: true,
                cellRenderer: params => {
                    // put the value in bold
                    return (
                        '<span><i class="bi bi-person mr-1"></i>' +
                        params.value +
                        "</span>"
                    );
                }
            },
            {
                field: "category.name",
                headerName: "Category",
                sortable: true,
                filter: true
            },
            {
                field: "priority",
                headerName: "Priority",
                sortable: true,
                filter: true,
                flex: 1,
                cellRenderer: params => {
                    if (params.value.toLowerCase() == "low") {
                        return `<span class="badge badge-pill badge-info text-capitalize">${params.value}</span>`;
                    } else if (params.value.toLowerCase() == "medium") {
                        return `<span class="badge badge-pill badge-warning text-capitalize">${params.value}</span>`;
                    } else if (params.value.toLowerCase() == "high") {
                        return `<span class="badge badge-pill badge-danger text-capitalize">${params.value}</span>`;
                    }
                }
            },
            {
                field: "status",
                headerName: "Status",
                sortable: true,
                sort: 'desc',
                filter: true,
                flex: 1,
                cellRenderer: params => {
                    if (params.value.toLowerCase() == "open") {
                        return `<span class="badge badge-pill badge-success text-capitalize">${params.value}</span>`;
                    } else if (params.value.toLowerCase() == "inprogress") {
                        return `<span class="badge badge-pill badge-warning text-capitalize">${params.value}</span>`;
                    } else if (params.value.toLowerCase() == "cancel") {
                        return `<span class="badge badge-pill badge-secondary text-capitalize">${params.value}</span>`;
                    } else if (params.value.toLowerCase() == "close") {
                        return `<span class="badge badge-pill badge-secondary text-capitalize">${params.value}</span>`;
                    }
                }
            }
        ];
        this.loadTickets();
    },
    methods: {
        loadTickets() {
            axios.get("/tickets").then(response => {
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
            var result = [
                "copy",
                "separator",
                {
                    name: "Open new window",
                    shortcut: 'Alt + T',
                    action: function() {
                        console.log(params.node.data.ticket_id);
                        window.open(`/issue-tickets/${params.node.data.ticket_id}`,'_blank');
                    },
                    icon: '<i class="mdi mdi-open-in-new"></i>',
                    cssClasses: ["redFont", "bold"]
                },
                "separator",
                "chartRange"
            ];
            return result;
        },
        onBtExport() {
            this.gridApi.exportDataAsExcel();
        },
        onIpChange(e) {
            console.log(this.searchText);
            this.gridApi.setQuickFilter(this.searchText);
        },
        clearSearchText() {
            this.searchText = "";
            this.gridApi.setQuickFilter("");
            this.gridApi.setFilterModel(null);
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
