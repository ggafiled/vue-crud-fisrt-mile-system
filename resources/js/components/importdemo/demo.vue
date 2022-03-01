<template>
<div class="container" style="margin-top: 50px;">
<div class="text-center">
<h4>File Upload with VueJS and Laravel</h4><br>
<div style="max-width: 500px; margin: 0 auto;">
<div v-if="success !== ''" class="alert alert-success" role="alert">
{{success}}
</div>
<form @submit="submitForm" enctype="multipart/form-data">
<div class="input-group">
<div class="custom-file">
<input type="file" name="filename" class="custom-file-input" id="inputFileUpload"
v-on:change="onFileChange">
<label class="custom-file-label" for="inputFileUpload">Choose file</label>
</div>
<div class="input-group-append">
<input type="submit" class="btn btn-primary" value="Upload">
</div>
</div>
<br>
<p class="text-danger font-weight-bold">{{filename}}</p>
</form>
</div>
</div>
</div>
</template>
<script>
  export default {
     data() {
        return {
          error: {},
          import_file: '',
        }
      },
      methods: {
         onFileChange(e) {
        this.import_file = e.target.files[0];
    },

    proceedAction() {
        let formData = new FormData();
        formData.append('import_file', this.import_file);

          axios.post('/users/import', formData, {
              headers: { 'content-type': 'multipart/form-data' }
            })
            .then(response => {
                if(response.status === 200) {
                  // codes here after the file is upload successfully
                }
            })
            .catch(error => {
                // code here when an upload is not valid
                this.uploading = false
                this.error = error.response.data
                console.log('check error: ', this.error)
            });
        },
      }
  }
</script>