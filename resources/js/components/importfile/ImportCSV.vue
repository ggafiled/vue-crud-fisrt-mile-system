<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Improt File Excel</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="card">
                <div class="card-header">Constralution Import</div>
                <div class="card-body">

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <form class="form-inline ">
                          
                            <label
                              for="colFormLabelSm"
                              class="col-form-label"
                              >Import Template Excel :</label
                            >
                       
                          <div class="form-group mx-sm-2 ">
                            <input
                              class="form-control"
                              type="file"
                              id="excelTemp"
                            />
                          </div>
                          <button type="submit" class="btn btn-primary ">
                            Import
                          </button>
                        </form>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <form class="form-inline ">
                          
                            <label
                              for="colFormLabelSm"
                              class="col-form-label"
                              >Import Excel :</label
                            >
                       
                          <div class="form-group mx-sm-2 ">
                            <input
                              class="form-control"
                              type="file"
                              id="excelTemp"
                            />
                          </div>
                          <button type="submit" class="btn btn-primary ">
                            Import
                          </button>
                        </form>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="addNew"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addNew"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!editmode">
                {{ translate("area3bb.create.header") }}
              </h5>
              <h5 class="modal-title" v-show="editmode">
                {{ translate("area3bb.update.header") }}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>