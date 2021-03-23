<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Building List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <v-grid
                                v-if="grid === 1"
                                key="1"
                                theme="compact"
                                :source="rows"
                                :columns="columns"
                            ></v-grid>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import VGrid from "@revolist/vue-datagrid";
export default {
    name: "App",
    data() {
        return {
            columns: [
                {
                    prop: "name",
                    name: "First"
                },
                {
                    prop: "details",
                    name: "Second"
                }
            ],
            rows: [
                {
                    name: "1",
                    details: "Item 1"
                }
            ]
        };
    },
    components: {
        VGrid
    }
};
</script>
