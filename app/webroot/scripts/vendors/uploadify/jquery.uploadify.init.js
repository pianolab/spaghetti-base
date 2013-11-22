var Uploadify = {
  upload: function (params) {
    paramsDefault = {
      debug: this.valid(params.debug) ? params.debug :false,
      formData: {
        parent_id: this.valid(params.formData.parent_id) ? params.formData.parent_id : 0, 
        parent_name: this.valid(params.formData.parent_name) ? params.formData.parent_name : 'attachment'
      },
      buttonText: this.valid(params.buttonText) ? params.buttonText : 'Escolher imagens',
      buttonClass: this.valid(params.buttonClass) ? params.buttonClass : 'btn btn-success',
      upload_url: base_url + (this.valid(params.upload_url) ? params.upload_url : 'uploadify/multiple'),
      flash_url: base_url + 'scripts/vendors/uploadify/uploadify.swf',
      onUploadSuccess: function(file, data, response) {
        $('#newAttachments').append(data);
      },
      onUploadError: function(file, errorCode, errorMsg, errorString) {}
    };

    $('.uploadify').uploadify(paramsDefault);

    $('.uploadify-button').removeAttr('style');
  },

  valid: function (str) {
    return (!(!str || 0 === str.length) && (!str || /^\s*$/.test(str)));
  }
};