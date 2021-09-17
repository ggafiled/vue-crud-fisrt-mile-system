<template>
    <section id="map" style="height: 88vh !important; padding: 0; margin: 0;">
        <longdo-map :zoom="12" :lastView="false" @load="initMap">
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
</template>

<script>
import { LongdoMap, LongdoMapMarker } from "longdo-map-vue";
LongdoMap.init({ apiKey: process.env.MIX_APP_LONGDO_MAP_KEY });
export default {
    title: "Guild Map -",
    ajax: "/api/constarution",
    components: {
        LongdoMap,
        LongdoMapMarker
    },
    data() {
        return {
            loader: null,
            fullPage: false,
            coordinate: []
        };
    },
    methods: {
        initMap(map) {
            map.resize();
            map.Ui.Fullscreen.visible(false);
            map.location(
                { lon: 100.612550, lat: 13.780091 },
                true
            );
            map.Event.bind("ready", function() {
                map.Event.bind("fullscreen", function() {
                    //do somethings
                });
            });
        },
        loadCoordinatePlanningOfBuilding() {
            axios
                .get("planing/loadCoordinatePlanningOfBuilding")
                .then(response => {
                    this.coordinate = response.data.data;
                });
        }
    },
    created() {
        this.loader = this.$loading.show({
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: false
        });
    },
    mounted() {
        this.loadCoordinatePlanningOfBuilding();
        setTimeout(() => {
            this.loader.hide();
        }, 3000)
    }
};
</script>

<style lang="scss" scoped></style>