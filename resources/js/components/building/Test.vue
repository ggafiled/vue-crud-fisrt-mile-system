<template>
  <section class="content">
    <div class="container-fluid">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">
              <i class="fas fa-fw bi bi-aspect-ratio"></i>
              {{ translate("constitution.header") }}
            </h2>
            <div class="card-tools">
              <button
                type="button"
                class="btn btn-sm btn-primary"
                @click="newModal"
              >
                <i class="fa fa-plus-square"></i>
                {{ translate("constitution.addnew") }}
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="container">
              <div class="panel panel-sm">
                <div class="panel-heading">
                  <h4>CSV Import</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label
                      for="csv_file"
                      class="control-label col-sm-3 text-right"
                      >CSV file to import</label
                    >
                    <div class="col-sm-9">
                      <input
                        type="file"
                        id="csv_file"
                        name="csv_file"
                        class="form-control"
                        @change="loadCSV($event)"
                      />
                    </div>
                  </div>
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox-inline">
                      <label for="header_rows"
                        ><input type="checkbox" id="header_rows" /> File
                        contains header row?</label
                      >
                    </div>
                  </div>

                  <div class="col-sm-offset-3 col-sm-9">
                    <a href="#" class="btn btn-primary">Parse CSV</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
        data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!editmode">
                {{ translate("constitution.create.header") }}
              </h5>
              <h5 class="modal-title" v-show="editmode">
                {{ translate("constitution.update.header") }}
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
<script>
</script>
<!-- <style scoped>
html,
body {
  margin: 0;
  padding: 0;
}
body {
  margin: 32px auto;
}
.panel {
  border: 2px solid #dfdfdf;
  box-shadow: rgba(0, 0, 0, 0.15) 0 1px 0 0;
  margin: 10px;
}
.panel.panel-sm {
  max-width: 700px;
  margin: 10px auto;
}
.panel-heading {
  border-bottom: 2px solid #dfdfdf;
}
.panel-heading h1,
.panel-heading h2,
.panel-heading h3,
.panel-heading h4,
.panel-heading h5,
.panel-heading h6 {
  margin: 0;
  padding: 0;
}
.panel-body .checkbox-inline {
  padding: 15px 20px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td,
th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style> -->
