/* options */
// $.mask.options.attr = "alt";
// $.mask.options.mask = null;
// $.mask.options.type = "fixed";
// $.mask.options.maxLength = -1;
// $.mask.options.defaultValue = "";
// $.mask.options.textAlign = true;
// $.mask.options.selectCharsOnFocus = true;
// $.mask.options.setSize = false;
// $.mask.options.autoTab = true;
// $.mask.options.fixedChars = "[(),.:/ -]";
// $.mask.options.onInvalid = function(){};
// $.mask.options.onValid = function(){};
// $.mask.options.onOverflow = function(){};

/* rules */
// $.mask.rules["z"] = /[a-z]/;
// $.mask.rules["Z"] = /[A-Z]/;
// $.mask.rules["a"] = /[a-zA-Z]/;
// $.mask.rules["*"] = /[0-9a-zA-Z]/;
// $.mask.rules["@"] = /[0-9a-zA-ZçÇáàãéèíìóòõúùü]/;
// $.mask.rules["0"] = /[0]/;
// $.mask.rules["1"] = /[0-1]/;
// $.mask.rules["2"] = /[0-2]/;
// $.mask.rules["3"] = /[0-3]/;
// $.mask.rules["4"] = /[0-4]/;
// $.mask.rules["5"] = /[0-5]/;
// $.mask.rules["6"] = /[0-6]/;
// $.mask.rules["7"] = /[0-7]/;
// $.mask.rules["8"] = /[0-8]/;
// $.mask.rules["9"] = /[0-9]/;

/* masks */
// $.mask.masks["phone"] = { mask : "(99) 9999-9999" };
// $.mask.masks["phone-us"] = { mask : "(999) 9999-9999" };
// $.mask.masks["cpf"] = { mask : "999.999.999-99" };
// $.mask.masks["cnpj"] = { mask : "99.999.999/9999-99" };
// $.mask.masks["date"] = { mask : "39/19/9999" }, //uk dat;
// $.mask.masks["cep"] = { mask : "99999-999" };
// $.mask.masks["time"] = { mask : "29:69" };
// $.mask.masks["cc"] = { mask : "9999 9999 9999 9999" }, //credit card mas;
// $.mask.masks["integer"] = { mask : "999.999.999.999", type : "reverse" };
// $.mask.masks["decimal"] = { mask : "99,999.999.999.999", type : "reverse", defaultValue: "000" };
// $.mask.masks["decimal-us"] = { mask : "99.999,999,999,999", type : "reverse", defaultValue: "000" };
// $.mask.masks["signed-decimal"] = { mask : "99,999.999.999.999", type : "reverse", defaultValue : "+000" };
// $.mask.masks["signed-decimal-us"] = { mask : "99,999.999.999.999", type : "reverse", defaultValue : "+000" };

$.mask.masks["date-us"] = { mask : "2999-19-39" }; //uk dat;

jQuery(function($) { $("input").setMask(); });
