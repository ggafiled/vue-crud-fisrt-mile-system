<template>
    <section class="content">
        <div class="container-fluid pt-0">
            <div ref="haveContent" v-show="!isTicketEmpty">
                <div class="row pt-0 pb-0 mb-0">
                    <div class="col-12 col-xl-6 col-lg-6">
                        <div class="card h-100" id="infoLeft" ref="infoLeft">
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
                                <div class="row">
                                    <h5 class="card-title pl-3 pr-3 text-wrap">
                                        {{ ticket.title }}
                                    </h5>
                                </div>
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
                                            >{{ ticket.assigned_to ? `${ticket.assigned_to.name} : ${ticket.assigned_to.email}`  : '~' }}
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
                                        <span class="card-text">
                                            <span
                                                v-if="ticket.status === 'open'"
                                                class="badge badge-pill badge-success text-uppercase"
                                                >{{ ticket.status }}</span
                                            >
                                            <span
                                                v-else-if="
                                                    ticket.status ===
                                                        'inprogress'
                                                "
                                                class="badge badge-pill badge-warning text-uppercase"
                                                >{{ ticket.status }}</span
                                            >
                                            <span
                                                v-else-if="
                                                    ticket.status === 'cancel'
                                                "
                                                class="badge badge-pill badge-secondary text-uppercase"
                                                >{{ ticket.status }}</span
                                            >
                                            <span
                                                v-else-if="
                                                    ticket.status === 'close'
                                                "
                                                class="badge badge-pill badge-secondary text-uppercase"
                                                >{{ ticket.status }}</span
                                            >
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-12 col-xl-6 col-lg-6">
                        <div class="card h-100" id="infoRight" ref="infoRight">
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
                                {{ $shortText(ticket.message,800,'...') }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row pt-0 mt-0">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools p-0 pb-2 text-right">
                                    <button
                                        type="button"
                                        class="btn btn-md btn-danger mr-1"
                                        :class="{
                                            disabled: !isAviable,
                                            'd-none':
                                                ticket.status === 'close' ||
                                                ticket.status === 'cancel'
                                        }"
                                        @click="closeTicket(ticket)"
                                    >
                                        <i class="mdi mdi-clock-end"></i>
                                        {{
                                            translate(
                                                "issue.actions.close_ticket"
                                            )
                                        }}
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-md btn-success"
                                        :class="!isAviable ? 'disabled' : ''"
                                        @click="toggleChatPopup"
                                    >
                                        <i class="bi bi-chat-left-text"></i>
                                        {{
                                            translate(
                                                "issue.actions.reply_message"
                                            )
                                        }}
                                    </button>
                                </div>
                                <h3 class="card-title">
                                    <i class="mdi mdi-console-line"> </i>
                                    {{
                                        translate("issue.header_activity_show")
                                    }}
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-3 pt-2">
                                <vue-timeline-update
                                    :date="new Date(ticket.created_at)"
                                    title="Ticket has created"
                                    :description="
                                        `Today ${ticket.user.name} am open ticket #${ticket.ticket_id} ${ticket.title}`
                                    "
                                    category="announcement"
                                    icon="outlined_flag"
                                    theme="light"
                                    color="green"
                                />
                                <vue-timeline-update
                                    v-if="ticket.assigned_to !== null"
                                    :date="new Date(ticket.created_at)"
                                    title="Assign ticket"
                                    :description="
                                        `Assigned to ${ticket.assigned_to.name} : ${ticket.assigned_to.email}`
                                    "
                                    category="announcement"
                                    icon="assignment_ind"
                                    theme="light"
                                    color="purple"
                                />
                                <vue-timeline-update
                                    v-if="
                                        ticket.status === 'inprogress' ||
                                            ticket.status === 'close'
                                    "
                                    :date="new Date(ticket.updated_at)"
                                    title="The ticket is inprogress."
                                    description="The tickets is inprogress."
                                    category="announcement"
                                    icon="loop"
                                    theme="light"
                                    color="orange"
                                />
                                <vue-timeline-update
                                    v-if="ticket.status === 'cancel'"
                                    :date="new Date(ticket.updated_at)"
                                    title="The ticket was cancel."
                                    description="The tickets was cancel by owner."
                                    category="announcement"
                                    icon="cancel"
                                    theme="light"
                                    color="black"
                                    is-last=true
                                />
                                <vue-timeline-update
                                    v-if="ticket.status === 'close'"
                                    :date="new Date(ticket.updated_at)"
                                    title="The ticket was close."
                                    description="The tickets was already to solve. If you still have the problem please open new ticket."
                                    category="announcement"
                                    icon="gavel"
                                    theme="light"
                                    color="red"
                                    is-last=true
                                />
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <chat-popup :conversation="ticket"></chat-popup>
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
import ChatPopup from "../partials/ChatPopup";
export default {
    components: {
        VueEditor,
        ChatPopup
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
            console.log(
                statusAviable.some(substring =>
                    this.ticket.status.includes(substring)
                )
            );
            return statusAviable.some(substring =>
                this.ticket.status.includes(substring)
            );
        }
    },
    methods: {
        loadTicketsByID(id) {
            if (this.$route.params.id !== id) return;
            axios.get(`/api/tickets/${id}`).then(async response => {
                this.ticket = response.data.data[0];
                console.log(this.ticket);
            });
        },
        toggleChatPopup() {
            if (this.isAviable) {
                this.$emit("toggle-chat-popup");
                return;
            }
            return false;
        },
        closeTicket(item) {
            Swal.fire({
                title: window.translate("คุณต้องการปิดงานนี้ใช่หรือไม่"),
                text:
                    window.translate("การกระทำนี้จะไม่สามารถย้อนกลับได้") +
                    ` [${item.ticket_id}]`,
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                cancelButtonText: window.translate("ยกเลิก"),
                confirmButtonText: window.translate("ตกลง")
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    axios
                        .delete("api/ticket/" + item.id)
                        .then(() => {
                            Swal.fire(
                                window.translate(
                                    "permission.alert.comfirm_delete_title"
                                ),
                                window.translate(
                                    "permission.alert.confirm_delete_message"
                                ),
                                "success"
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadUsers();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        }
    },
    mounted() {
    }
};
</script>
<style lang="scss">
.badge {
    padding: 6px 15px 6px 15px !important;
}
.gb-vue-timeline-update {
    min-height: 84px !important;
    height: fit-content !important;
    .gb-vue-timeline-update__information {
        h2 {
            &.gb-vue-timeline-update__title {
                font-size: 16px !important;
                font-weight: 100 !important;
            }
        }

        .gb-vue-timeline-update__category {
            font-size: 10px;
        }
    }

    p {
        &.gb-vue-timeline-update__description {
            font-size: 16px !important;
        }
    }
}
</style>
