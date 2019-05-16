@extends('marketing-pages.layouts.master')

@section('content')
   
  <section class="contact-banner-section">
                <div class="contact-banner"></div>
        </section>

        <section class="contact-us-section">
           <div class="container">
                <div class="page-content-wrapper" >
                    <div class="main-heading">
                        <h3>Contact Us</h3>
                    </div>

                     <form method="POST" action="{{ route('contact-us.store')}}"autocomplete="off"> 
                         {{ csrf_field()}}

                        <div class="form-container">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>FULL NAME</label>
                                        <input type="text" name="name" class="form-control" id="" placeholder="Enter your name" autocomplete="off">
                                        {{$errors->first('name')}}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                         <label>EMAIL ADDRESS</label>
                                        <input type="email" name="email" class="form-control" id="" placeholder=" Enter your email id">
                                        {{$errors->first('email')}}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>COUNTRY CODE</label>
                                        <span class="dropdown-arrow">
                                           <select class="form-control" name="country_code">
                                            @foreach($country_data as $key => $value)
                                              <option value="{{$value['code']}}">{{$value['code']}}</option>
                                            @endforeach
                                            </select>
                                            {{$errors->first('country_code')}}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>PHONE NUMBER</label>
                                        <input type="Number" name="phone_number" class="form-control" id="" placeholder="Enter your phone number">
                                        {{$errors->first('phone_number')}}
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>MESSAGE</label>
                                        <textarea class="form-control" rows="3" name="body" placeholder="Your Message"></textarea>
                                        @if ($errors->has('body'))
                                             <div class="error">{{ $errors->first('body') }}</div>
                                         @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 btn-padding">

                                    <button class="btn btn-defult">Cancel</button>

                                    <button class="btn btn-yellow">SUBMIT</button>
                                    



                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
@endsection