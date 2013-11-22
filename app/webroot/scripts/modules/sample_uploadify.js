var SampleUploadify = {
  init: function () {
    this.uploadify();
  },

  uploadify: function () {
    Uploadify.upload({ 
      formData: {
        parent_id: $('#sampleId').val(), 
        parent_name: 'sample'
      }
    });
  }
};

$(document).ready( function () { SampleUploadify.init(); });