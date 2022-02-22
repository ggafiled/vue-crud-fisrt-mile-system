<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="mdi mdi-cog-outline mr-1"></i>
                                {{ translate("DataValidation") }}
                            </h3>
                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-card-widget="collapse"
                                >
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3 pt-2 ">
                            <div class="card-text">
                                <ul class="nav nav-tabs">
                                    <li>
                                        <a
                                            data-toggle="tab"
                                            href="#zone"
                                            class="nav-link active"
                                            >Zone</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            data-toggle="tab"
                                            href="#teamzone"
                                            class="nav-link"
                                            >Team Zone</a
                                        >
                                    </li>
                                </ul>
                                <br />
                                <div class="tab-content">
                                    <div id="zone" class="tab-pane active">
                                        <list-group-item
                                            v-for="item in tabs.zone"
                                            :key="item.id"
                                            :route="item.route"
                                            tab="zone"
                                            :title="item.title"
                                            :details="item.details"
                                        ></list-group-item>
                                    </div>
                                    <div id="teamzone" class="tab-pane fade">
                                        <list-group-item
                                            v-for="item in tabs.teamzone"
                                            :key="item.id"
                                            :route="item.route"
                                            tab="teamzone"
                                            :title="item.title"
                                            :details="item.details"
                                        ></list-group-item>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <router-view />
    </section>
</template>
<script>
import ListGroupItem from "../partials/ListGroupItem";
export default {
    title: "",
    components: {
        ListGroupItem
    },
    data() {
        return {
            tabs: {
                zone: [
                    {
                        id: 1,
                        route: "/zones/zone_management",
                        title: "Zone Management(CRED)",
                        details: "เพิ่มลบแก้ไขโซน"
                    },
                ],
                teamzone: [
                    {
                        id: 1,
                        route: "/settings/generatingaction",
                        title: "Team Zone Management(CRED)",
                        details: "เพิ่มลบแก้ไขทีมประจำโซน"
                    }
                ],
            }
        };
    },
    methods: {
        activaTab(tab) {
            if ($('.nav-tabs a[href="#' + tab + '"]').length) {
                $('.nav-tabs a[href="#' + tab + '"]').tab("show");
            } else {
                this.$router.replace({
                    query: {
                        tab: $(".nav-tabs a")
                            .first()
                            .attr("href")
                            .toString()
                            .replace("#", "")
                    }
                });
                $(".nav-tabs a")
                    .first()
                    .tab("show");
            }
        },
        deactivaTab(tab) {
            $(".nav-tabs a").removeClass("active");
        }
    },
    mounted() {
        console.log(this.$route.query.tab);
        this.deactivaTab();
        this.activaTab(this.$route.query.tab);
    },
    unmounted() {
        this.deactivaTab();
    }
};
</script>
