<!DOCTYPE html>
<html lang="en">
	@include('share.head')
<body>
    @include('share.main-header')

    @yield('content')

	@include('share.main-footer')
	
	<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ URL::asset('vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ URL::asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ URL::asset('vendor/select2/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
		$(document).ready(function (){
			$('button[name="down"]').click(function() {
				var rowid = $(this).attr('id');
				$.ajax({
					url: 'minus/'+rowid,
					type: 'POST',
					data: {_token: '{{csrf_token()}}'},
					error: function(xhr, error){
					console.debug(xhr); console.debug(error);
					},
					success: function(data) {
						var string = data + "VND";
				 		$('.total').html(string);
					}
				});
				 var qty = $(this).parent().find('.num-product').val();
				 $(this).parent().find('.num-product').val(parseInt(qty)-1);			
			});
			$('button[name="up"]').click(function() {
				var rowid = $(this).attr('id');
				$.ajax({
					url: 'plus/'+rowid,
					type: 'POST',
					data: {_token: '{{csrf_token()}}'},
					error: function(xhr, error){
					console.debug(xhr); console.debug(error);
					},
					success: function(data) {
						var string = data + "VND";
				 		$('.total').html(string);
					}
				});
				 var qty = $(this).parent().find('.num-product').val();
				 $(this).parent().find('.num-product').val(parseInt(qty)+1);
				
				 
				 			
			});
		});

	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{asset('js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ URL::asset('vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<!-- <script type="text/javascript" src="{{ URL::asset('vendor/lightbox2/js/lightbox.min.js') }}"></script> -->
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ URL::asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "Đã thêm vào giỏ hàn thành công !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-price').html();
			$(this).on('click', function(){
				swal(nameProduct, "Thêm sản phẩm vào ưa thích !", "info");
			});
		});
		$('document').ready(function(){
    
			var modal1 = document.getElementById('1');
			var modal2 = document.getElementById('2');
			var modal3 = document.getElementById('3');
			var modal4 = document.getElementById('4');
			
			//When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal1 ) {
					modal1.style.display = "none";
				}
				if (event.target == modal2) {
					modal2.style.display = "none";
				}
				if (event.target == modal3 ) {
					modal1.style.display = "none";
					modal2.style.display = "block";
				}
				if (event.target == modal4) {
					modal1.style.display = "block";
					modal2.style.display = "none";
				}
			}
		});
		$('.header-wrapicon1').click(function(){
			$('body').addClass('body-overflow-y');
		});
		$('.login').click(function(){
			$('body').removeClass('body-overflow-y');
		});

	</script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	
<script type="text/javascript">
		
</script>

<script  src="{{asset('js/index.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('js/main.js')}}"></script>


</body>
</html>