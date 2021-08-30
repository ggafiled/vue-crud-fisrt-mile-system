<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="mdi mdi-cog-outline mr-1"></i>
                                {{ translate("DataValidation") }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3 pt-2 ">
                            <div class="card-text">
                                <ul class="nav nav-tabs">
                                    <li>
                                        <a
                                            data-toggle="tab"
                                            href="#building"
                                            class="nav-link active"
                                            >Building</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            data-toggle="tab"
                                            href="#constarution"
                                            class="nav-link"
                                            >Constarution</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            data-toggle="tab"
                                            href="#progress"
                                            class="nav-link"
                                            >Progress</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            data-toggle="tab"
                                            href="#planing"
                                            class="nav-link"
                                            >Planning</a
                                        >
                                    </li>
                                </ul>
                                <br />
                                <div class="tab-content">
                                    <div id="building" class="tab-pane active">
                                        <list-group-item
                                            v-for="item in tabs.building"
                                            :key="item.id"
                                            :route="item.route"
                                            :title="item.title"
                                            :details="item.details"
                                        ></list-group-item>
                                    </div>
                                    <div id="progress" class="tab-pane fade">
                                        <list-group-item
                                            v-for="item in tabs.progress"
                                            :key="item.id"
                                            :route="item.route"
                                            :title="item.title"
                                            :details="item.details"
                                        ></list-group-item>
                                    </div>
                                    <div id="constarution" class="tab-pane fade">
                                        <list-group-item
                                            v-for="item in tabs.constarution"
                                            :key="item.id"
                                            :route="item.route"
                                            :title="item.title"
                                            :details="item.details"
                                        ></list-group-item>
                                    </div>
                                    <div id="planing" class="tab-pane fade">
                                        <list-group-item
                                            v-for="item in tabs.planing"
                                            :key="item.id"
                                            :route="item.route"
                                            :title="item.title"
                                            :details="item.details"
                                        ></list-group-item>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <router-view />
    </section>
</template>
<script>
import ListGroupItem from "../partials/ListGroupItem";
export default {
    components: {
        ListGroupItem
    },
    data() {
        return {
            tabs: {
                building: [
                    {
                        id: 1,
                        route: "/settings/contract_sell",
                        title: "Contract Sell(CRED)",
                        details: "แก้ไขข้อมูลชื่อเซลล์ที่ติดต่อ"
                    },

                    {
                        id: 2,
                        route: "/settings/spend_spacetitle",
                        title: "SpendSpace(CRED)",
                        details: "แก้ไขข้อมูลการชำระรายปี"
                    },

                    {
                        id: 3,
                        route: "/settings/area_3bb",
                        title: "Area 3BB(CRED)",
                        details: "แก้ไขข้อมูลพื้นที่ 3บีบี"
                    },

                    {
                        id: 4,
                        route: "/settings/area_true",
                        title: "Area True(CRED)",
                        details: "แก้ไขข้อมูลพื้นที่ทรู"
                    },

                    {
                        id: 5,
                        route: "/settings/area_ais",
                        title: "Area Ais(CRED)",
                        details: "แก้ไขข้อมูลพื้นที่เอไอเอส"
                    },

                    {
                        id: 6,
                        route: "/settings/area_fibernet",
                        title: "Area FiberNet(CRED)",
                        details: "แก้ไขข้อมูลพื้นที่ไฟเบอร์เน็ต"
                    },

                    {
                        id: 7,
                        route: "/settings/operating_time",
                        title: "Operating Time(CRED)",
                        details: "แก้ไขข้อมูลพื้นที่เวลาเข้างาน"
                    }
                ],
                planing: [
                    {
                        id: 1,
                        route: "/settings/problemsolution",
                        title: "Problemsolution(CRED)",
                        details: "แก้ไขข้อมูลปัญหาและวิธีการแก้ไข"
                    },
                    {
                        id: 2,
                        route: "/settings/technician",
                        title: "Technician(CRED)",
                        details: "แก้ไขข้อมูลทีมช่าง"
                    },
                    {
                        id: 3,
                        route: "/settings/callver",
                        title: "Callver(CRED)",
                        details: "แก้ไขข้อมูลจำนวนการติดต่อ"
                    },
                    {
                        id: 4,
                        route: "/settings/callverstatus",
                        title: "Callver Status(CRED)",
                        details: "แก้ไขข้อมูลสถานะการติดต่อ"
                    }
                ],
                progress: [
                     {
                        id: 1,
                        route: "/settings/generatingaction",
                        title: "Generatingaction(CRED)",
                        details: "แก้ไขข้อมูลสถานะการเชื่อมโครงข่าย"
                    }
                ],
                constarution: []
            }
        };
    }
};
</script>
