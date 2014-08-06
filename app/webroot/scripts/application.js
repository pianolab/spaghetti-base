Application = {
  init: function () {
  	//VENDORS
  	//minify click delay
	FastClick.attach(document.body);
  }
};

$(document).on("ready", function () { Application.init(); });