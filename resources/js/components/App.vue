<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <router-view></router-view>
    </div>
</template>

<script>
export default {};
</script>

<style>
.vue-tags-input .ti-tag {
    position: relative;
    background: #b0bec5 !important;
    color: #37474f !important;
}
.DTFC_LeftHeadWrapper th {
    background-color: white;
}
.DTFC_RightHeadWrapper th {
    background-color: white;
}
.cursor-pointer {
    cursor: pointer;
}
.modal.modal-fullscreen .modal-dialog {
    width: 100vw;
    height: 100vh;
    margin: 0;
    padding: 0;
    max-width: none;
    overflow: scroll;
}

.modal.modal-fullscreen .modal-content {
    height: auto;
    height: 100;
    border-radius: 0;
    border: none;
}

.modal.modal-fullscreen .modal-body {
    overflow-y: auto;
}

.select2 {
    padding: 0;
    min-width: 100px !important;
    width: 100% !important;
}
.select2-selection {
    display: flex !important;
    min-height: 30px !important;
    height: 100% !important;
    vertical-align: middle !important;
}
</style>
