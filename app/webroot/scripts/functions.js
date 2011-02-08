$(function(){
	
	/**
	 * DEFAULTS
	 **/
	
	// Alert/Flash Message
	setTimeout(hideAlert,4000);
	$("#alert-message").click(function(){
	    hideAlert();
	});
	function hideAlert(){
	    if ($("#alert-message")[0]) { $("#alert-message").slideUp('fast'); }
	}
	
	// END
	
	/**
	 * TARGET BLANK
	 */
	$('.target-blank').click(function(){
		$(this).attr('target', '_blank').click();
		return false;
	});
	
})