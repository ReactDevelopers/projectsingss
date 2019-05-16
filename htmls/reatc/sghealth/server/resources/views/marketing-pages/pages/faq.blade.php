@extends('marketing-pages.layouts.master')

@section('content')
  <section class="faq-banner-section">
                <div class="faq-banner">
                </div>
        </section>
        
        <!-- Inner page content -->
        <section class="faq-section section-padding">
            <div class="container">
                <div class="faq-content">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="main-heading">
                                <h3>Frequently Asked Questions</h3>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="panel-group m-b-0 clearfix" id="accordion1" role="tablist" aria-multiselectable="true">
                                @foreach($faq as $key => $value)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading{{$value['id']}}">
                                            <h4 class="panel-title">
                                           <a class="collapsed" role="button" data-toggle="collapse" data-parent="#{{$value['id']}}" href="#collapse{{$value['id']}}" aria-expanded="false" aria-controls="collapse{{$value['id']}}">{{$value['question']}}
                                             {!!html_entity_decode(@$page->content)!!}</a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{$value['id']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$value['id']}}" aria-expanded="false">
                                            <div class="panel-body">
                                                <p>{{$value['answer']}}
                                                    {!!html_entity_decode(@$page->content)!!}
                                                 </p>    
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection