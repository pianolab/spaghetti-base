$.validator.setDefaults({
  errorElement: 'span',
  highlight: function(element) {
    $(element).closest('.control-group')
      .removeClass('success').addClass('error');
  },
  success: function(element) {
    var icon;
    icon = $('<i>').addClass('icon-ok');
    element.html(icon).addClass('valid').closest('.control-group')
      .removeClass('error').addClass('success').text('ok');
  }
});

$.validator.addMethod(
  'dateBR', function(value, element) {
    return value.match(/^([0-2]\d|[3][0-1])\/(0\d|1[0-2])\/([1-2]\d{3})$/);
  },
  "Please enter a date in the format dd/mm/yyyy."
);

$.extend($.validator.messages, {
  required: "Este campo é obrigatório.",
  remote: "Por favor, corrija este campo.",
  email: "Por favor, digite um email válido.",
  url: "Por favor, digite uma URL válida.",
  date: "Por favor, digite uma data válida (mm/dd/yyyy)",
  dateISO: "Por favor, digite uma data válida (yyyy-mm-dd)",
  dateISO: "Por favor, digite uma data válida (dd/mm/yyyy)",
  number: "Por favor, digite um número válida.",
  digits: "Por favor, digite somente dígitos.",
  creditcard: "Por favor, digite um cartão de crédito válido.",
  equalTo: "Por favor, digite o mesmo valor novamente.",
  accept: "Por favor, digite um valor com uma extensão válida.",
  maxlength: $.validator.format("Por favor, digite não mais que {0} caracteres."),
  minlength: $.validator.format("Por favor, digite ao menos {0} caracteres."),
  rangelength: $.validator.format("Por favor, digite um valor entre {0} e {1} caracteres de comprimento."),
  range: $.validator.format("Por favor, digite um valor entre {0} e {1}."),
  max: $.validator.format("Por favor, digite um valor menor ou igual a {0}."),
  min: $.validator.format("Por favor, digite um valor maior ou igual a {0}.")
});