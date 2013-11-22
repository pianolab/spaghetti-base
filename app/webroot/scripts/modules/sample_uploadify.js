var SampleUploadify = {
  init: function () {
    this.uploadify();
  },

  uploadify: function () {
    Uploadify.upload($('#sampleId').val(), 'sample', {})
  }
};

$(document).ready( function () { SampleUploadify.init(); });