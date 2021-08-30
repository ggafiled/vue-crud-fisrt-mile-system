<template>
    <li class="list-group-item bg-transparent">
        <a :href="route" @click.prevent="navigate">{{ title }}</a>
        <div class="d-flex justify-content-between mt-3">
            <small class="text-muted">{{ details }}</small>
            <small class="text-muted"> </small>
        </div>
    </li>
</template>
<script>
export default {
    props: {
        route:{
            type: String,
            required: true
        },
        title: {
            type: String,
            default: ''
        },
        details:{
            type: String,
            default: ''
        }
    },
    methods: {
        navigate(){
            this.$router.push(this.route);
        }
    }
};
</script>
