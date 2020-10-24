@extends('layouts.app')

@section('avatar')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

@section('custom')
    <link rel="stylesheet" href="css/custom.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Perfil de {{ $user->name }}</h2>
                {{-- {{ dd(session()) }} --}}
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}  
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0 bg-light mb-3 shadow-sm">
                    <img src="/upload/avatars/{{ $user->avatar }}" alt="{{ $user->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5><small>{{ __('Update image profile') }}</small></h5>
                        <form enctype="multipart/form-data" action="{{ route('users.edit', $user) }}" method="POST">
                            @csrf
                            <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input form-control-sm" id="exampleFormControlFile1">
                                <label class="custom-file-label" for="customFile">Archivo...</label>
                            </div>
                            <input type="submit" value="{{ __('Save') }}" class="btn btn-sm btn-primary float-right mt-3">
                        </form>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card border-0 bg-light mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Personal information') }}</h5>
                        <form method="post" action="{{ route('users.update',$user) }}" >
                            @method('PATCH')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="txtFirstName">{{ __('First Name:') }}</label>
                                    <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" value="{{ $user->first_name }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txtLastName">{{ __('Last Name:') }}</label>
                                    <input type="text" class="form-control" id="txtLastName" name="txtLastName" value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="txtUserName">{{ __('Username:') }}</label>
                                    <input type="text" class="form-control" id="txtUserName" name="txtUserName" value="{{ $user->name }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txtEmail">{{ __('Email:') }}</label>
                                    <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="{{ $user->email }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary float-right" href="{{ route('home') }}">{{ __('Cancel') }}</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection