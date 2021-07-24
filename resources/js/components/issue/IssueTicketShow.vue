<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i
                                    class="mdi mdi-ticket-confirmation-outline mr-1"
                                ></i>
                                {{ translate("issue.header_show") }} #{{
                                    ticketId
                                }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div
                            class="card-body p-3 pt-2"
                            v-if="!isTicketEmpty"
                        >
                            <div class="card-tools p-0 pb-2"></div>
                        </div>
                        <not-found v-else></not-found>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            ticketId: null,
            ticket: []
        };
    },
    beforeRouteEnter(to, from, next) {
        document.title = `Tickets #${to.params.id} - Fist Mile ERP System`;
        next();
    },
    beforeMount() {
        this.ticketId = this.$route.params.id;
        this.loadTicketsByID(this.ticketId);
    },
    computed: {
        isTicketEmpty: function(){
            return !Object.keys(this.ticket).length;
        }
    },
    methods: {
        loadTicketsByID(id) {
            if (this.$route.params.id !== id) return;
            axios.get(`/api/tickets/${id}`).then(response => {
                this.ticket = response.data.data;
            });
        }
    },
    mounted() {}
};
</script>
