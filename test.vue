<template>
    <div id="app">
        <!-- ตำบล/แขวง -->
        <addressinput-subdistrict v-model="subdistrict" />
        <!-- อำเภอ/เขต -->
        <addressinput-district v-model="district" />
        <!-- จังหวัด -->
        <addressinput-province v-model="province" />
        <!-- รหัสไปรษณีย์ -->
        <addressinput-zipcode v-model="zipcode" />
    </div>
</template>
<script>
export default {
    title: "Area Fibernet",
    data() {
        return {
            subdistrict: "",
            district: "",
            province: "",
            zipcode: ""
        };
    },
    mounted() {}
};
</script>
