<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="icon" href="assets/images/favicon.png" >
		<!--Page title-->
		<title>Durbar School - Admin</title>
        
		<!--bootstrap-->
		<link rel="stylesheet" href="{{asset('public/admins/css/bootstrap.min.css')}}">
		<!--font awesome-->
		<link rel="stylesheet" href="{{asset('public/admins/css/all.min.css')}}">
		<!-- metis menu -->
		<link rel="stylesheet" href="{{asset('public/admins/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/admins/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css')}}">
        <!-- chart -->
        <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
		<!-- donut-chart -->
        <link rel="stylesheet" href="{{asset('public/admins/plugins/donut-chart/dist/style.css')}}">

        <link rel="stylesheet" href="{{asset('public/admins')}}/plugins/dist/css/dropify.min.css">


		<!--Custom CSS-->
		<link rel="stylesheet" href="{{asset('public/admins/css/style.css')}}">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
		<link href="{{asset('public/admins/plugins/datatables/dataTables.min.css')}}" rel="stylesheet" type="text/css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	</head>
	<body id="page-top">
		<!-- preloader -->
		<div class="preloader">
		<img src="{{asset('public/admin/images/preloader.gif')}}" alt="">
		</div>
		<!-- wrapper -->
		<div class="wrapper">
            
            <!-- include top header -->
            @include('admin.include.header_top')

            <!-- include menu  -->
            @include('admin.include.menu')

			
            <!-- content wrpper -->
			<div class="content_wrapper">
				@yield('content')
			</div><!--/ content wrapper -->
			@include('admin.include.footer')
		</div><!--/ wrapper -->


		
		<!-- jquery
		
		<!-- popper Min Js -->
		<script src="{{asset('public/admins/js/jquery.min.js')}}"></script>
		<script src="{{asset('public/admins/js/popper.min.js')}}"></script>
		<!-- Bootstrap Min Js -->
		<script src="{{asset('public/admins/js/bootstrap.min.js')}}"></script>
		<!-- Fontawesome-->
		<script src="{{asset('public/admins/js/all.min.js')}}"></script>
		   <!-- custom js -->
		<script src="{{asset('public/admins/js/custom.js')}}"></script>
        <!-- metis menu -->
		<script src="https://unpkg.com/metismenu"></script>
		

		<script src="{{asset('public/admins/plugins/metismenu-3.0.4/assets/js/metismenu.js')}}"></script>
        <script src="{{asset('public/admins/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js')}}"></script>
		<!-- nice scroll bar -->
		<script src="{{asset('public/admins/plugins/scrollbar/jquery.nicescroll.min.js')}}"></script>
		<script src="{{asset('public/admins/plugins/scrollbar/scroll.active.js')}}"></script>
		<!-- counter -->
		<script src="{{asset('public/admins/plugins/counter/js/counter.js')}}"></script>
		<!-- chart -->
		<script src="{{asset('public/admins/plugins/chartjs-bar-chart/Chart.min.js')}}"></script>
		<script src="{{asset('public/admins/plugins/chartjs-bar-chart/chart.js')}}"></script>
		<!-- pie chart -->
        <script src="{{asset('public/admins/plugins/pie_chart/chart.loader.js')}}"></script>
        
       
        
		<script src="{{asset('public/admins/plugins/pie_chart/pie.active.js')}}"></script>
		<!-- basic-donut-chart -->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>
  		<script  src="{{asset('public/admins/plugins/basic-donut-chart/dist/script.js')}}"></script>

		<!-- donut-chart -->
		<script  src="{{asset('public/admins/plugins/donut-chart/dist/script.js')}}"></script>
		<script  src="{{asset('public/admins/ajaxjs.js')}}"></script>

				<!-- DataTable Js -->
        <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
        <script src="{{asset('public/admins')}}/plugins/datatables/dataTables-active.js"></script>

            <!-- drofify -->
       <script src="{{asset('public/admins')}}/plugins/dist/js/dropify.min.js"></script>


       	<!-- ckeditor Js -->
        <script src="{{asset('public/admins')}}/plugins/ckeditor/ckeditor.js"></script>
        <script src="{{asset('public/admins')}}/plugins/ckeditor/ckeditor-active.js"></script>
       <script>
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove:  'Supprimer',
                    error:   'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element){
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e){
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
		

		
		<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


		

		@stack('scripts')


    <script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure to delete?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
    <script>
        $(document).on("submit", "#multiple_delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure to delete all?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('multiple_delete').submit();
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
		
		

		
		






		<!-- Main js -->
		<script src="{{asset('public/admins/js/main.js')}}"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

		<script>
				@if(Session::has('messege'))
				var type = "{{Session::get('alert-type','info')}}"
				switch (type) {
						case 'info':
								toastr.info("{{ Session::get('messege') }}");
								break;
						case 'success':
								toastr.success("{{ Session::get('messege') }}");
								break;
						case 'warning':
								toastr.warning("{{ Session::get('messege') }}");
								break;
						case 'error':
								toastr.error("{{ Session::get('messege') }}");
								break;
				}
				@endif
		</script>


	   @stack('scripts')



	</body>
</html>