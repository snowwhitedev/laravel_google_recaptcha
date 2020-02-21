@extends('layouts.layout')

@section('content')
    <div>
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><span>Home</span></a></li>
                <li class="breadcrumb-item"><a href="{{ route('contact') }}"><span>Contact & Feedback</span></a></li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-offset-1  justify-content-center" style="margin-top: 2rem;">
                    <h3>Please tell us your feedback! Have an idea? Frustrated? Tell us!</h3>
                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('contact') }}" method="post" id="fpp-contact-form">
                        @csrf

                            <!-- Name input-->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="name" name="name" type="text" placeholder="Name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <input id="email" name="email" type="email" placeholder="Email" class="form-control" required>
                                </div>
                            </div>


                            <!-- Message body -->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="message" name="message" placeholder="What’s on your mind?" rows="5" required></textarea>
                                </div>
                            </div>


                        {!! app('captcha')->display() !!}
                        <!-- Form actions -->
                            <div class="form-group row align-content-center">
                                <div class="col-md-12 align-content-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
    {!! NoCaptcha::renderJs() !!}
@endsection
