@extends('admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('Profile') }}</h1>
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Profile') }}</h6>
        </div>
        <div class="card-body">
            {!! Form::open(['method' => 'POST', 'files'=>true, 'route' => ['admin.profile.store'], 'class' => 'form-horizontal', 'id' => 'frmProfile']) !!}
                    @csrf
                    <div class="form-group {{$errors->has('name') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-3 control-label" for="name">{{ __('Name') }} <span style="color:red">*</span></label>
                        <div class="col-md-9">
                            {!! Form::text('name', old('name', $user->name), ['class' => 'form-control', 'placeholder' => __('Name')]) !!}
                            @if($errors->has('name'))
                            <strong for="name" class="help-block">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('email') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-3 control-label" for="email">{{ __('Email') }} <span style="color:red">*</span></label>
                        <div class="col-md-9">
                            {!! Form::text('email', old('email', $user->email), ['class' => 'form-control', 'placeholder' => __('Email')]) !!}
                            @if($errors->has('email'))
                            <strong for="email" class="help-block">{{ $errors->first('email') }}</strong>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{$errors->has('reset_password') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-3 control-label" for="reset_password">
                            {!! Form::checkbox('reset_password', '1', old('reset_password'), ['id'=>'reset_password']) !!} {{ __('Reset Password') }}</label>
                    </div>

                    <div id="passwordCont">
                        <div class="form-group {{$errors->has('old_password') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                            <label class="col-md-3 control-label" for="old_password">{{ __('Old Password') }} <span style="color:red">*</span></label>
                            <div class="col-md-9">
                                {!! Form::password('old_password', ['class' => 'form-control autoFillOff', 'placeholder' => __('Old Password')]) !!}
                                @if($errors->has('old_password'))
                                <strong for="old_password" class="help-block">{{ $errors->first('old_password') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('password') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                            <label class="col-md-3 control-label" for="password">{{ __('Password') }} <span style="color:red">*</span></label>
                            <div class="col-md-9">
                                {!! Form::password('password', ['class' => 'form-control autoFillOff', 'placeholder' => __('Password'), 'id'=>'password']) !!}
                                @if($errors->has('password'))
                                <strong for="password" class="help-block">{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('confirm_password') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                            <label class="col-md-3 control-label" for="confirm_password">{{ __('Confirm Password') }} <span style="color:red">*</span></label>
                            <div class="col-md-9">
                                {!! Form::password('password_confirmation', ['class' => 'form-control autoFillOff', 'placeholder' => __('Confirm Password')]) !!}
                                @if($errors->has('confirm_password'))
                                <strong for="password_confirmation" class="help-block">{{ $errors->first('confirm_password') }}</strong>
                                @endif
                            </div>
                        </div>
                    </div>


                    @php $profile_picture = isset($user->profile_picture)?$user->profile_picture:''; @endphp
                    @if(isset($profile_picture) && $profile_picture!=''  && file_exists(public_path(config('constants.USERS_UPLOADS_PATH')).$profile_picture)) 
                    <div class="form-group">
                        <div class="col-md-9">                            
                            <img width="50" height="50" src="{{ asset(config('constants.USERS_UPLOADS_PATH').$profile_picture) }}">
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('profile_picture') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-3 control-label" for="title">{{__('Profile Picture') }} </label>
                        <div clstoreass="col-md-9">
                            {{ Form::file('profile_picture') }}
                            @if($errors->has('profile_picture'))
                            <strong for="profile_picture" class="help-block">{{ $errors->first('profile_picture') }}</strong>
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-responsive btn-primary btn-sm">{{ __('Submit') }}</button>
                            <a href="{{route('admin.dashboard')}}"  class="btn btn-responsive btn-danger btn-sm">{{ __('Cancel') }}</a>
                        </div>
                    </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#reset_password').change(function(){
        var checked = jQuery(this).prop('checked');
        jQuery('#passwordCont').hide();

        if(checked==true)
            jQuery('#passwordCont').show();
    }).trigger('change');

    jQuery('#frmProfile').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email:true
            },
            old_password: {
                required: function(){
                    if(jQuery('#frmProfile #reset_password').prop('checked')==false){
                        return false;
                    }else{
                        return true;
                    }
                }
            },
            password: {
                required: function(){
                    if(jQuery('#frmProfile #reset_password').prop('checked')==false){
                        return false;
                    }else{
                        return true;
                    }
                }
            },
            password_confirmation: {
                required: function(){  
                    if(jQuery('#frmProfile #reset_password').prop('checked')==false){
                        return false;
                    }else{
                        return true;
                    }
                },
                equalTo: "#password"
            }
        }
    });
});
</script>
@endsection