import { Bar, mixins } from "vue-chartjs";
import zoomPlugin from "chartjs-plugin-zoom";

Chart.plugins.unregister(zoomPlugin);

export default {
    extends: Bar,
    mixins: [mixins.reactiveProp],
    props: ["data", "options"],
    mounted() {
        // Overwriting base render method with actual data.
        this.addPlugin(zoomPlugin);
        this.renderChart(this.data, this.options);
    }
};