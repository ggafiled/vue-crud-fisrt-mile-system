<template>
    <section id="map" style="height: 88vh !important; padding: 0; margin: 0;">
        <longdo-map :zoom="10" :lastView="false" @load="initMap">
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
    components: {
        LongdoMap,
        LongdoMapMarker
    },
    data() {
        return {
            loader: null,
            fullPage: false,
            coordinate: [
                {
                    location: {
                        lon: 100.58434210713955,
                        lat: 13.729530376110512
                    },
                    title:
                        "The Reserve Sukhumvit 61 (เดอะ รีเซิร์ฟ สุขุมวิท 61)",
                    detail:
                        "78 ซ. สุขุมวิท 61 แขวง คลองตันเหนือ เขตวัฒนา กรุงเทพมหานคร 10110",
                    icon: {
                        url: "https://map.longdo.com/mmmap/images/pin_mark.png",
                        offset: { x: 12, y: 45 }
                    }
                },
                {
                    location: {
                        lon: 100.56503,
                        lat: 13.736242
                    },
                    title: "แขวงคลองเตยเหนือ",
                    detail:
                        "ซอยสุขุมวิท 27 (ซอยประภัทศร) แขวงคลองเตยเหนือ เขตวัฒนา",
                    icon: {
                        url: "https://map.longdo.com/mmmap/images/pin_mark.png",
                        offset: { x: 12, y: 45 }
                    }
                },
                {
                    location: {
                        lon: 100.565030,
                        lat: 13.736242
                    },
                    title:
                        "แขวงคลองเตยเหนือ",
                    detail:
                        "isp:ทรู ซอยสุขุมวิท 27 (ซอยประภัทศร) แขวงคลองเตยเหนือ เขตวัฒนา",
                    icon: {
                        url: "https://map.longdo.com/mmmap/images/pin_mark.png",
                        offset: { x: 12, y: 45 }
                    }
                }
            ]
        };
    },
    methods: {
        initMap(map) {
            map.resize();
            map.Ui.Fullscreen.visible(false);
            map.location(
                { lon: 100.58434210713955, lat: 13.729530376110512 },
                true
            );
            map.zoom(15);

            map.Event.bind("ready", function() {
                map.Event.bind("fullscreen", function() {
                    //do somethings
                });
            });
        },
        async loadCoordinatePlanningOfBuilding() {
            await axios
                .get("/loadCoordinatePlanningOfBuilding")
                .then(response => {
                    this.coordinate = response.data;
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
        }, 1000)
    }
};
</script>

<style lang="scss" scoped></style>
