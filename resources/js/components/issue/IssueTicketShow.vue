<template>
    <section class="content">
        <div class="container-fluid pt-0">
            <div ref="haveContent" v-show="!isTicketEmpty">
                <div class="row pt-0 pb-0 mb-0">
                    <div class="col-12 col-xl-6 col-lg-6">
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
                            <div class="card-body p-3 pt-2">
                                <div class="card-tools p-0 pb-2"></div>
                                <h5 class="card-title text-wrap">
                                    {{ ticket.title }}
                                </h5>
                                <div class="row mt-0">
                                    <div class="col-6 align-left">
                                        <span class="card-text text-bold">
                                            <i class="bi bi-person mr-1"></i>
                                            Customer
                                        </span>
                                    </div>
                                    <div class="col-6 align-left">
                                        <span class="card-text"
                                            >{{ ticket.user.name }} :
                                            {{ ticket.user.email }}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-0">
                                    <div class="col-6 align-left">
                                        <span class="card-text text-bold">
                                            <i class="mdi mdi-tag-outline"></i>
                                            Assigned to
                                        </span>
                                    </div>
                                    <div class="col-6 align-left">
                                        <span class="card-text"
                                            >{{ ticket.user.name }}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-0">
                                    <div class="col-6 align-left">
                                        <span class="card-text text-bold">
                                            <i
                                                class="mdi mdi-flag-variant-outline"
                                            ></i>
                                            Status
                                        </span>
                                    </div>
                                    <div class="col-6 align-left">
                                        <span class="card-text text-capitalize"
                                            >
                                            <span v-if="ticket.status === 'open'" class="badge badge-pill badge-success text-capitalize">{{ ticket.status }}</span>
                                            <span v-else-if="ticket.status === 'inprogress'" class="badge badge-pill badge-warning text-capitalize">{{ ticket.status }}</span>
                                            <span v-else-if="ticket.status === 'cancel'" class="badge badge-pill badge-secondary text-capitalize">{{ ticket.status }}</span>
                                            <span v-else-if="ticket.status === 'close'" class="badge badge-pill badge-secondary text-capitalize">{{ ticket.status }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-12 col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i
                                        class="mdi mdi-ticket-confirmation-outline mr-1"
                                    ></i>
                                    {{
                                        translate(
                                            "issue.header_description_show"
                                        )
                                    }}
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div
                                class="card-body p-3 pt-2"
                                v-if="!isTicketEmpty"
                            >
                                {{ ticket.message }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row pt-0 mt-0">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{
                                        translate(
                                            "issue.header_activity_show"
                                        )
                                    }}
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div
                                class="card-body p-3 pt-2"
                            >
                                <vue-editor v-model="contentReply" v-if="isAviable"></vue-editor>
                                <div class="text-center" v-else>
                                    <h3>Disable chat interact.</h3>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="card-tools p-0 pb-2 text-right">
                                    <button
                                    type="button"
                                    class="btn btn-md btn-success"
                                    :class="!isAviable? 'disabled':''"
                                >
                                    <i class="bi bi-reply"></i>
                                    {{ translate("issue.actions.reply_message") }}
                                </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <div ref="notHaveContent" class="row pt-0" v-show="isTicketEmpty">
                <div class="col-12 pt-0 mt-0">
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
                        <not-found></not-found>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { VueEditor, Quill } from "vue2-editor";
export default {
    components: {
    VueEditor
  },
    data() {
        return {
            ticketId: null,
            ticket: {},
            contentReply: ""
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
        isTicketEmpty: function() {
            return !Object.keys(this.ticket).length;
        },
        isAviable: function() {
            const statusAviable = ["open", "inprogress"];
            console.log(statusAviable.some(substring=>this.ticket.status.includes(substring)));
            return statusAviable.some(substring=>this.ticket.status.includes(substring))
        }
    },
    methods: {
        loadTicketsByID(id) {
            if (this.$route.params.id !== id) return;
            axios.get(`/api/tickets/${id}`).then(async response => {
                this.ticket = response.data.data[0];
                console.log(this.ticket);
            });
        }
    },
    mounted() {}
};
</script>
