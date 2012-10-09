/**
 * Validations
 */
var Contact = {};

Contact.init = function() { 
  Contact.validations();
};

Contact.validations = function() { 
  var v = $('#form-contact').jcheck({language: 'pt-br'});
  v.validates('name', 'message', {presence: true});
  v.validates('email', {format: {'with': 'email'}});
  v.validates('message', {length: {minimum: 20}});
};

$(document).ready( function() { Contact.init(); });