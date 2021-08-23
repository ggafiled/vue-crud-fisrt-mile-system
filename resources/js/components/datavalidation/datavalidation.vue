<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <!-- <i
                                    class="mdi mdi-ticket-confirmation-outline mr-1"
                                ></i> -->
                                {{ translate("Data Valiidation") }}
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
                                            href="#menu3"
                                            class="nav-link"
                                            >Progress</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            data-toggle="tab"
                                            href="#planning"
                                            class="nav-link"
                                            >Planning</a
                                        >
                                    </li>
                                </ul>
                                <br />
                                <div class="tab-content">
                                    <div id="building" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div
                                                                class="col-1"
                                                            >
                                                                Column
                                                            </div>
                                                            <div
                                                                class="col-10"
                                                            >
                                                                Column
                                                            </div>
                                                            <div
                                                                class="col-1"
                                                            >
                                                                Column
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu3" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="planning" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="tab-content">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a
                                                class="nav-link active"
                                                href="#building"
                                                >Building</a
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                href="#constarution"
                                                >Constarution</a
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#Progress"
                                                >Progress</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <br />
                                <div class="tab-content">
                                    <div
                                        id="building"
                                        class="tab-pane fade in active"
                                    >
                                        <h3>HOME</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipisicing elit, sed do
                                            eiusmod tempor incididunt ut labore
                                            et dolore magna aliqua.
                                        </p>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h3>Menu 1</h3>
                                        <p>
                                            Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris
                                            nisi ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3>Menu 2</h3>
                                        <p>
                                            Sed ut perspiciatis unde omnis iste
                                            natus error sit voluptatem
                                            accusantium doloremque laudantium,
                                            totam rem aperiam.
                                        </p>
                                    </div>
                                    <div id="menu3" class="tab-pane fade">
                                        <h3>Menu 3</h3>
                                        <p>
                                            Eaque ipsa quae ab illo inventore
                                            veritatis et quasi architecto beatae
                                            vitae dicta sunt explicabo.
                                        </p>
                                    </div>
                                </div> -->
                                <!-- <div
                                    id="Building"
                                    class="tab-pane fade in active"
                                >
                                    <div class="tab-content ">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                    <hr />
                                                    <div
                                                        class="card-body"
                                                    ></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <ag-grid-vue
                        id="myGrid"
                        style="width: 100%;height: 300px"
                        class="ag-theme-balham"
                        rowSelection="multiple"
                        :enableRangeSelection="true"
                        :allowContextMenuWithControlKey="true"
                        :pagination="true"
                        :paginationPageSize="15"
                    >
                    </ag-grid-vue>
                </div>
            </div>
        </div>
    </section>
</template>
