@extends('layouts.app')

@section('content')
<div class="js-fullheight" style="background-image: url(images/night-img.jpg);margin-top:-15px;">
    <div class="row justify-content-center" >
        <div class="col-md-8 form-sender">
            <h2> Batata Sender </h2>
            <form method="post" enctype="multipart/form-data" action="{{ route('form-validation') }}" >
             <input type="hidden" name="_token" value="{{ csrf_token() }}">           

                @isset($numbers)
                   <div class="alert alert-danger">
                     <strong>Error !</strong> The following numbers have not been sent.
                        <br/>
                         <ul>                               
                         @foreach ($errorNumbers as $number)
                            <li>{{ $number }}</li>
                         @endforeach
                        </ul>
                    </div>
                @endisset
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
                <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                    <label for="number">Twilio phone number</label>
                    <input type="texte" class="form-control" id="number" name="number" placeholder="Phone Number">
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                </div>
                <div class="form-group {{ $errors->has('sid') ? 'has-error' : '' }}">
                    <label for="sid">Account SID</label>
                    <input type="texte" class="form-control" id="sid" name="sid" placeholder="SID">
                    <span class="text-danger">{{ $errors->first('sid') }}</span>
                </div>
                <div class="form-group {{ $errors->has('twilio_token') ? 'has-error' : '' }}">
                    <label for="twilio_token">Twilio token</label>
                    <input type="texte" class="form-control" id="twilio_token" name="twilio_token" placeholder="Token">
                    <span class="text-danger">{{ $errors->first('twilio_token') }}</span>
                </div>
                <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                    
                <label for="message">Message you want to send</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Message</span>
                    </div>
                    <textarea class="form-control" name="message" aria-label="With textarea"></textarea>
                </div>
                <span class="text-danger">{{ $errors->first('message') }}</span>
                </div>
                
                <div class="form-group">
                <label for="inputFile">List of phone numbers</label>
                    <div class="input-group mb-3 {{ $errors->has('inputFile') ? 'has-error' : '' }}">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputFile" accept="txt" id="inputFile">
                            <label class="custom-file-label" for="inputFile">Choose file</label>
                        </div>                  
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
