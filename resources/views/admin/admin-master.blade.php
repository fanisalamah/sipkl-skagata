<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPKL - Dashboard</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>

</head>

<body>
    <div id="app">
       @include('admin.body.sidebar')
        <div id="main" class='layout-navbar'>
           @include('admin.body.header')
          @yield('admin')
            @include('admin.body.footer')
        </div>
    </div>
  

    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
  
    <script type="text/javascript">
    function sweetConfirm(url, title) {
		   let endpointUrl = url;
		   swal({
			   title: `Hapus data ${title}?`,
			   text: `Data yang terhapus tidak dapat dikembalikan lagi`,
			   type: "warning",
			   showCancelButton: !0,
			   confirmButtonColor: "#DD6B55",
			   confirmButtonText: "Hapus",
			   cancelButtonText: "Cancel",
		   }).then(function(isConfirm) {
            
			   if (isConfirm.value === true) {
				   $.ajax({
					   headers: {
						   'X-CSRF-TOKEN': "{{csrf_token()}}",
					   },
					   type: "post",

					   data: {
					   '_method': 'deleteUser'
					   },
					   url: endpointUrl,
					   data: isConfirm.value,
					   statusCode: {
						   200: function(result) {
							   swal({
								   title: "Data terhapus!",
								   text: `Data ${title} telah berhasil dihapus`,
								   type: "success",
								   showConfirmButton: false
							   }, setTimeout(function () {
								   location.reload(true);
							   }, 1700)

							   );
						   }
					   },
					   error: function(result) {
						   swal("Error !!", `Failed to delete ${title} !!`, "error")
					   }
				   });
			   }
		   });
	}

    </script>




    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
    <script>
        @if(Session::has('message')) 
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch(type) {
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
            
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
            
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;   
            
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break; 
        }
        @endif
    </script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('assets/selectpicker/script.js') }}"> </script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>
