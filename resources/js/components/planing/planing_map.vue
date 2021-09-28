<template>
    <section>
        <div class="row">
            <div class="col-lg-12">
                <form
                    class="d-flex flex-row flex-grow-1 align-items-bottom bg-white rounded p-2 m-0"
                >
                    <div class="form-inline">
                        <div class="form-group mr-lg-2">
                            <label class="mr-lg-2" for="chooseArea"
                                >Team Area</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="chooseArea"
                                value="All Area"
                            />
                        </div>
                        <div class="form-group mr-lg-2">
                            <label class="mr-lg-2" for="chooseTeam">Team</label>
                            <input
                                type="text"
                                class="form-control"
                                id="chooseTeam"
                            />
                        </div>
                        <div class="form-group mr-lg-2">
                            <label class="mr-lg-2" for="chooseTeam"
                                >Task Type</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="chooseTeam"
                            />
                        </div>
                        <div class="form-group mr-lg-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="mr-1">
                                            Request No.
                                        </span>
                                        <i class="bi bi-caret-down-fill"></i>
                                    </div>
                                </div>
                                <input
                                    type="text"
                                    class="form-control input-sm"
                                    id="chooseTeam"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="form-inline ml-auto">
                        <div class="form-group mr-lg-2">
                            <div class="form-check">
                                <label
                                    class="form-check-label mr-2"
                                    for="todayCheck"
                                >
                                    Today
                                </label>
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="todayCheck"
                                />
                            </div>
                        </div>
                        <button type="button" class="btn btn-success mr-lg-2">
                            Search
                        </button>
                        <button type="button" class="btn btn-success mr-lg-2">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" style="height: clac(100vh-100px);">
            <div
                class="d-flex flex-row flex-grow-1 p-3 justify-content-between"
            >
                <div class="left mr-3" style="width: 30vw;">
                    <div class="card" style="height: 20%;">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-center align-items-center flex-nowrap p-0 m-0"
                            >
                                <div class="align-self-center text-center">
                                    <h2 class="p-0 m-0 text-bold">
                                        {{ taskTotal | numberFormat }}
                                    </h2>
                                    <span class="text-muted p-0 m-0"
                                        >Tasks</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Provider</h4>
                            <small>/ผู้ให้บริการ</small>
                        </div>
                        <div
                            class="card-body"
                            :class="{ 'p-0 m-0': providerList.length > 0 }"
                        >
                            <template v-if="providerList.length > 0">
                                <div
                                    class="row p-0 m-0"
                                    v-for="(item, i) in providerList"
                                    :key="i"
                                >
                                    <div
                                        class="col-6 border p-2 m-0 text-right"
                                    >
                                        {{ item.isp }}
                                    </div>
                                    <div class="col-6 border p-2 m-0">
                                        <img
                                            id="preview"
                                            class="rounded"
                                            :src="item.isps_map_icon"
                                            alt="Maker Icon"
                                        />
                                    </div>
                                </div>
                            </template>
                            <Skeleton width="100%" count="5" v-else />
                        </div>
                    </div>
                </div>
                <div class="right">
                    <ul class="nav nav-tabs">
                        <li>
                            <a
                                data-toggle="tab"
                                href="#gis"
                                class="nav-link active"
                                >GIS
                            </a>
                        </li>
                        <li>
                            <a
                                data-toggle="tab"
                                href="#schedule"
                                class="nav-link"
                                >Schedule
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="gis" class="tab-pane active">
                            <section
                                style="height: 70vh !important; width: 65vw !important; padding: 3; margin: 0;"
                            >
                                <longdo-map
                                    id="map"
                                    :zoom="12"
                                    :lastView="false"
                                    @load="initMap"
                                >
                                    <longdo-map-marker
                                        v-for="(item, i) in coordinate"
                                        :key="i"
                                        :location="item.location"
                                        :title="item.title"
                                        :detail="item.detail"
                                        :icon="item.icon"
                                    />
                                </longdo-map>
                            </section>
                        </div>
                        <div id="schedule" class="tab-pane">
                            <section
                                style="height: 65vh !important; width: 65vw !important; padding: 3; margin: 0;"
                            ></section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { Skeleton } from "vue-loading-skeleton";
import { LongdoMap, LongdoMapMarker } from "longdo-map-vue";
LongdoMap.init({ apiKey: process.env.MIX_APP_LONGDO_MAP_KEY });
export default {
    title: "Guild Map -",
    ajax: "/api/constarution",
    components: {
        LongdoMap,
        LongdoMapMarker,
        Skeleton
    },
    data() {
        return {
            tab: "GIS",
            map: null,
            loader: null,
            fullPage: false,
            taskTotal: 0,
            coordinate: [],
            providerList: [],
            form: new Form({
                formDate: "",
                endDate: ""
            })
        };
    },
    methods: {
        initMap(map) {
            this.map = map;
            map.resize();
            map.Ui.Fullscreen.visible(false);
            map.Ui.Toolbar.visible(true);
            map.Ui.LayerSelector.visible(false);
            map.location({ lon: 100.61255, lat: 13.780091 }, true);
            map.Event.bind("ready", function() {
                map.Event.bind("fullscreen", function() {
                    //do somethings
                });
            });
        },
        loadCoordinatePlanningOfBuilding() {
            axios
                .get("planing/loadCoordinatePlanningOfBuilding", {
                    data: this.form
                })
                .then(response => {
                    this.coordinate = response.data.data.coordinate;
                    this.taskTotal = response.data.data.taskTotal;
                });
        },
        loadproviderList() {
            axios
                .get("/isps", {
                    data: this.form
                })
                .then(response => {
                    this.providerList = response.data.data;
                });
        },
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
    created() {
        this.loader = this.$loading.show({
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: false
        });
    },
    mounted() {
        const vm = this;
        this.loadCoordinatePlanningOfBuilding();
        this.loadproviderList();
        this.deactivaTab();
        this.activaTab(this.$route.query.tab);
        $('a[data-toggle="tab"]').on("shown.bs.tab", function(e) {
            var target = $(e.target).attr("href"); // activated tab
            vm.$router.replace({
                    query: {
                        tab: target.replace("#", "")
                    }
            });
            if(target.replace("#", "") == "gis"){
                vm.map.resize();
            }
        });
        setTimeout(() => {
            this.loader.hide();
        }, 3000);
    },
    unmounted() {
        this.deactivaTab();
    }
};
</script>

<style lang="scss" scoped>
#preview {
    max-height: 32px;
    max-width: 32px;
    height: auto;
    width: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
    padding: 5px;
}
</style>
