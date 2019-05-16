@extends('marketing-pages.layouts.master')

@section('content')
         <section class="contact-banner-section">
                <div class="contact-banner"></div>
        </section>
        <section class="about-us-section">
           <div class="container">
                <div class="page-content-wrapper" >
                    <div class="main-heading common-content">
                        <h3>{{@$page->title}}</h3>
                        {!!html_entity_decode(@$page->content)!!}
                    </div>
                </div>
            </div>
        </section>
@endsection