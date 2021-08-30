<template>
    <div>
        <div class="form-group">
            <div class="col-sm-10">
                <label>AREA *</label>
                <select class="form-control" v-model="areaN">
                    <option value="">Select a Class</option>
                    <option
                        :value="item.id"
                        v-for="item in areas"
                        :key="item.id"
                        >{{ item.name }}</option
                    >
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
                <label>BBN *</label>
                <select class="form-control" required>
                    <option value="">Select a Section</option>
                    <option v-for="bbn in bbns" :key="bbn.id" :value="bbn.id">{{
                        bbn.name
                    }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
                areas: {},
                bbns: {},
                areaN: "",
                bbN: ""
        };
    },
    watch: {
        areaN: function(value) {
            axios.get("/bbns?area_id=" + this.areaN).then(response => {
                // console.log(response.data);
                this.bbns = response.data.data;
            });
        }
    },
    mounted() {
        axios.get("/areas").then(response => {
            this.areas = response.data.data;
        });
    }
};
</script>
