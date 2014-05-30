var SampleUploadify = {
  init: function () {
    this.uploadify();
  },

  uploadify: function () {
    Uploadify.upload($("#sampleId").val(), "sample", {})
  }
};

$(document).on("ready", function () { SampleUploadify.init(); });