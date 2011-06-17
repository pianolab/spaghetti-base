/**
 * Utils methods
 */
(function(){
	
	/**
	 * Useful to standard target blank links
	 */
	$('.target-blank').click(function(){
		$(this).attr('target', '_blank').click();
		return false;
	});
	
})();