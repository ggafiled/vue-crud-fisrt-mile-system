<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Agenda Schedule</h3>
                            <span class="ml-3 ml-xs-auto text-black-50"
                                >{{ eventCount }} Events (today)</span
                            >

                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-sm btn-primary"
                                    @click="newModal"
                                >
                                    <i class="fa fa-plus-square"></i>
                                    Add New
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <FullCalendar
                                ref="fullCalendar"
                                :options="calendarOptions"
                            />
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div v-if="!$gate.isAdmin()">
                <not-found></not-found>
            </div>
        </div>
    </section>
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
export default {
    components: {
        FullCalendar
    },
    data() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin],
                initialView: "dayGridMonth",
                dateClick: this.handleDateClick,
                events: [
                    { title: "event 1", date: "2019-04-01" },
                    { title: "event 2", date: "2019-04-02" }
                ]
            }
        };
    },
    methods: {
        handleDateClick: function(arg) {
            alert("date click! " + arg.dateStr);
        }
    },
    mounted() {},
    computed: {
        eventCount: function() {
            return Object.keys(this.calendarOptions.events).length;
        }
    },
    created() {
        this.$Progress.start();
        this.$Progress.finish();
    }
};
</script>
