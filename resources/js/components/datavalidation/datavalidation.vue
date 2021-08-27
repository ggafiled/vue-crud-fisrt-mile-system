<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i
                                    class="mdi mdi-cog-outline mr-1"
                                ></i>
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
                                            href="#menu2"
                                            class="nav-link disabled"
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
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="/settings/contract_sell"
                                                class="post-title"
                                                >Contract Sell(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลชื่อเซลล์ที่ติดต่อ</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="/settings/spend_space"
                                                class="post-title"
                                                >SpendSpace(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลการชำระรายปี</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a href="/settings/area_3bb" class="post-title"
                                                >Area 3BB(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลพื้นที่
                                                    3บีบี</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="/settings/area_true"
                                                class="post-title"
                                                >Area True(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลพื้นที่
                                                    ทรู</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a href="/settings/area_ais" class="post-title"
                                                >Area Ais(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลพื้นที่
                                                    เอไอเอส</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="/settings/area_fibernet"
                                                class="post-title"
                                                >Area FiberNet(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลพื้นที่
                                                    ไฟเบอร์เน็ต</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="/settings/operating_time"
                                                class="post-title"
                                                >Operating Time(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลพื้นที่
                                                    เวลาเข้างาน</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                    </div>
                                    <div id="progress" class="tab-pane fade">
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="https://codelapan.com/post/cara-install-ssl-certificate-di-xampp"
                                                class="post-title"
                                                >Cara Install SSL Certificate
                                                didsdd5895 XAMPP</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >6 Oktober 2020</small
                                                >
                                                <small class="text-muted"
                                                    >1981 views
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="https://codelapan.com/post/cara-install-ssl-certificate-di-xampp"
                                                class="post-title"
                                                >Cara Install SSL Certificate di
                                                XAMPP</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >6 Oktober 2020</small
                                                >
                                                <small class="text-muted"
                                                    >1981 views
                                                </small>
                                            </div>
                                        </li>
                                    </div>
                                    <div id="planing" class="tab-pane fade">
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="/data/problemsolution"
                                                class="post-title"
                                                >Problemsolution(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลปัญหาและวิธีการแก้ไข</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="/data/technician"
                                                class="post-title"
                                                >Technician(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลทีมช่าง</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="/data/callver"
                                                class="post-title"
                                                >Callver(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลจำนวนการติดต่อ</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item bg-transparent"
                                        >
                                            <a
                                                href="/data/callverstatus"
                                                class="post-title"
                                                >Callver Status(CRED)</a
                                            >
                                            <div
                                                class="d-flex justify-content-between mt-3"
                                            >
                                                <small class="text-muted"
                                                    >แก้ไขข้อมูลสถานะการติดต่อ</small
                                                >
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </li>
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
    </section>
</template>
