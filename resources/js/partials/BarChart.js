import { Bar, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins

export default {
    extends: Bar,
    mixins: [reactiveProp],
    props: ['options'],
    mounted() {
        // this.chartData is created in the mixin.
        // If you want to pass options please create a local options object
        let chart = {
            labels: ['January', 'February'],
            datasets: [{
                label: 'Data One',
                backgroundColor: '#f87979',
                data: [40, 20]
            }]
        }
        this.renderChart(chart, this.options)
    }
}
