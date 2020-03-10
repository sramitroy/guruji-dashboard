<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin-theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{asset('admin-theme/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <style type="text/css">
    .error {
     color: red;
     font-size: unset; 
     border-color: red;
     position: relative; 
     line-height:  unset; 
     width: unset; 
     
   }
   form.user .form-control-user {
    width: 340px;
   }
  </style>
</head>
<body class="bg-gradient-primary">
 @yield('content')
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin-theme/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin-theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('admin-theme/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('admin-theme/js/sb-admin-2.min.js')}}"></script>
@yield('scripts')
</body>
</html>
