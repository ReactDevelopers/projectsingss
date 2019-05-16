@extends('front.layouts.master')

@section('section')
    <!-- AboutUs Section Start -->
    <div class="static-section">
        
        <div class="static-content-box">
            <div class="sub-head">
                <h2>{!!$page->title!!}</h2>
            </div>
            <div class="static-text">
                {!!$page->content!!}
            </div>
        </div>
    </div>
    <!-- AboutUs Section End -->

@endsection