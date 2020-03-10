<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>{{ config('app.name', 'Laravel') }}</title>
  @php $favicon = getSetting('favicon'); @endphp
  @if(isset($favicon) && $favicon!=''  && file_exists(public_path().config('constants.SETTING_IMAGE_URL').$favicon))
  <link rel="shortcut icon" href="{{ asset(config('constants.SETTING_IMAGE_URL').$favicon) }}">
  @endif
  <!-- Custom fonts for this template-->
  <link href="{{asset('admin-theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{asset('admin-theme/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin-theme/css/custom.css')}}" rel="stylesheet">
  @yield('css')
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.layouts.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                  @if($flash = (session('error') ?: session('danger')))            
                      <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           {{ $flash }}
                      </div>
                  @endif
                  @if($flash = session('success'))      
                      <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           {{ $flash }}
                      </div>
                  @endif
                </div>

                @yield('content')
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ config('app.name', 'Laravel') }} {{date('Y')}}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form id="frm-logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <a href="{{ route('admin.logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
<!-- Bootstrap core JavaScript-->

<!-- Bootstrap core JavaScript-->
<script src="{{asset('admin-theme/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin-theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('admin-theme/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('admin-theme/js/sb-admin-2.min.js')}}"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var formValidationOptions = {
    errorElement: 'strong', //default input error message container
    errorClass: 'help-block', // default input error message class
    focusInvalid: true, // do not focus the last invalid input
    ignore: "",
    errorPlacement: function (error, element) { // render error placement for each input type
        if (element.attr("data-error-container")) { 
            error.appendTo(element.attr("data-error-container"));
        }else{
            error.insertAfter(element); // for other inputs, just perform default behavior
        }
    },
    highlight: function (element) { // hightlight error inputs
        jQuery(element)
            .closest('.form-group').addClass('{{ config("constants.ERROR_FORM_GROUP_CLASS") }}').removeClass('has-success'); // set error class to the control group
    },
    unhighlight: function (element) { // revert the change done by hightlight
        jQuery(element)
            .closest('.form-group').removeClass('{{ config("constants.ERROR_FORM_GROUP_CLASS") }}'); // set error class to the control group
    },
    success: function (label) {
        label
        .closest('.form-group').removeClass('{{ config("constants.ERROR_FORM_GROUP_CLASS") }}'); // set success class to the control group
    }
};

jQuery('.autoFillOff').attr('readonly', true);
setTimeout(function(){
    jQuery('.autoFillOff').attr('readonly', false)
}, 1000);
jQuery(document).ready(function(){
    if(jQuery.validator)
        jQuery.validator.setDefaults(formValidationOptions);

    var url = window.location;
    var element = $('ul#accordionSidebar a').filter(function() {
        return this.href == url.href || url.href.indexOf(this.href) == 0 || this.href.indexOf(url.href) == 0;
    }).addClass('active').closest('li');

    if(element.is('li')){
      element.addClass('active');
      element.find('a').trigger('click');
    }
});
</script>
@yield('js')
</body>
</html>