var Contact = {
  formId: $("#form-contact"),

  init: function () {
    this.validations();
  },

  validations: function () {
    this.formId.validate({
      rules: {
        'name': {
          required: true
        },
        'email': {
          required: true
        },
        'phone': {
          required: true
        },
        'message': {
          required: true
        },
        'born_in': {
          required: true,
          dateBR: true
        }
      }
    });
  }

};

$(document).ready( function () { Contact.init(); });