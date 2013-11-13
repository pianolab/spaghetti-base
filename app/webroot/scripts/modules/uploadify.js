var Uploadify = {
  formId: $("#form-uploadify"),

  init: function () {
    this.uploadify();
  },

  uploadify: function () {

    $('.uploadify').uploadify({
      debug: false,
      buttonText: 'Escolher imagens',
      buttonClass: 'btn btn-success',
      upload_url: base_url + '/uploadify',
      flash_url: base_url + '/scripts/vendors/uploadify/uploadify.swf',
      onUploadSuccess: function(file, data, response) {
        $('#new-attachments').append('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data + '<hr />');
      },
      onUploadError: function(file, errorCode, errorMsg, errorString) {
        console.log(file);
        console.log('errorCode: ' + errorCode);
        console.log('errorMsg: ' + errorMsg);
        console.log('errorString: ' + errorString);
      }
    });

    $('.uploadify-button').removeAttr('style');
  }

};

$(document).ready( function () { Uploadify.init(); });