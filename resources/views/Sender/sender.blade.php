@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2> Batata Sender </h2>
            <form method="post" enctype="multipart/form-data" action="{{ route('form-validation') }}" autocomplete="off">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if(count($errors))
                        <div class="alert alert-danger">
                            <strong>Errors !</strong> There were some problems with your input.
                            <br/>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
         
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group {{ $errors->has('apikey') ? 'has-error' : '' }}">
                    <label for="apikey">Api Key</label>
                    <input type="texte" class="form-control" id="apikey" name="apikey" placeholder="Key">
                    <span class="text-danger">{{ $errors->first('apikey') }}</span>
                </div>
                <div class="input-group mb-3 {{ $errors->has('inputFile') ? 'has-error' : '' }}">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="inputFile" accept="txt" id="inputFile">
                        <label class="custom-file-label" for="inputFile">Choose file</label>
                    </div>                  
                </div> 
                <div>              
                    <span class="text-danger">{{ $errors->first('inputFile') }}</span>
               </div>
               
                <button type="submit" class="btn btn-success">Send Sms</button>
            </form>
        </div>
    </div>
</div>
@endsection
