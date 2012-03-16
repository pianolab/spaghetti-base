/**
 * Prompts Alerts
 */
var Prompts = {
	openAlert: function (type, text, title) {
		var self = $('#prompt-alert-modal');
		self.find('.alert').addClass('alert-' + type);
		self.find('.alert-text').html(text);
		self.find('.alert-heading').html(title);
		self.modal();
	},
	
	promptRemove: function (target) {
		$('#prompt-modal').modal();

		$('.modal-btn-ok').click(function() {
			$('#prompt-modal').modal('hide');
			$('#prompt-modal').on('hidden', function() {
				window.location.href = target;
			});
		});
	}
};

$(function() {
	"use strict";
	
	// Prompt Remove
	$('.prompt-remove').click(function() {
		var target = $(this).attr('href');
		Prompts.promptRemove(target);
		return false;
	});	
});