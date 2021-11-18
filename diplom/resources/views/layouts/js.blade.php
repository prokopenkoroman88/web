{{-- для редактора и файлового менеджера --}}
{{-- 
	<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<!-- -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
 --}}
	<script>


$(document).ready( function () {



		//+10.3.20 texarea   https://unisharp.github.io/laravel-filemanager/integration
	  var options = {
	    filebrowserImageBrowseUrl: '/filemanager?type=Images',
	    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
	    filebrowserBrowseUrl: '/filemanager?type=Files',
	    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
	  };

		//https://unisharp.github.io/laravel-filemanager/integration		
		
		//$('textarea').ckeditor(options);//+10.3.20 'textarea[name=describe]'
		CKEDITOR.replace('descr', options);//#describe
		//?//
//		$('#lfm').filemanager('image');//+5.3.20  
//		$('.select').select2();



});

	</script>


{{-- 

	<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
	<script>
		//https://unisharp.github.io/laravel-filemanager/integration		
		 $('#lfm').filemanager('image');//+5.3.20  

	</script>
	
 --}}