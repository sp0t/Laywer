(function($){
	$.showWorking = function(msg, colour){
	   	if($('#workingOverlay').length){
			// A working is already shown on the page:
			return false;
		}
		var prg_colour = 'progress-bar-success';
		prg_colour = typeof colour !== 'undefined' ? 'progress-bar-' + colour  : 'progress-bar-success';

        var markup1 = '<div id="workingOverlay" class="modal-backdrop fade show"></div>';
        var markup2 ='<div id="prgress" class="modal-scrollable" style="z-index: 100000; display:none;">	<div class="loading-spinner in" style="width: 200px; margin-left: -100px; z-index: 100010;"><div class="loading-spinner-text">' + msg + '</div><div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 100%;height: 10px;"></div></div></div>';
		
		$(markup1).appendTo('body');
		$(markup2).appendTo('body').fadeIn();
		// $('#prgress').modal('show');
	}
	$.hideWorking = function(){
		$('#prgress').fadeOut(200,function(){
			/*$('#prgress').fadeOut(200,function(){
				$(this).remove()
			});*/
			$('#workingOverlay').remove();
			$(this).remove();
		});
	}
})(jQuery);