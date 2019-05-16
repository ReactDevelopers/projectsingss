@extends('layouts.master')
@section('content')
<!-- Main Content -->
<section class="page_breadcrumbs cs section_padding_50 table_section table_section_md">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left">
                <h2 class="small">{!!$title!!}</h2>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ol class="breadcrumb">
                    <li><a href="./">Back</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
            

            <section class="ls page_portfolio section_padding_top_100 section_padding_bottom_130">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            @if(count($comdata)>0)
                            <div class="isotope_container isotope row masonry-layout columns_margin_bottom_20" data-filters=".isotope_filters">
                                @foreach($comdata as $comVal)
                                @if($comVal['status']=='Active')
                                <div class="isotope-item col-lg-6 col-md-6 col-sm-12 category3">
                                    <div class="side-item content-padding with_border ">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="item-media">
                                                    <img src="{!!asset('images/team/'.$comVal['image'])!!}" alt="{{$comVal['name']}}">
                                                    <div class="media-links">
                                                        <a class="abs-link" title="" href="{{url('memberbearer/'.$comVal['id'])}}"></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="item-content">

                                                    <p class="small-text semibold highlight bottommargin_0">{{$comVal['designation']}}</p>
                                                    <h4 class="topmargin_0 ">
                                                        <a href="{{url('memberbearer/'.$comVal['id'])}}">{{$comVal['name']}}</a>
                                                    </h4>
                                                    <p>{{$comVal['short_desc']}}</p>
                                                    <p class="greylinks">
                                                    @if($comVal['facebook'])
                                                    <a target="_blank" class="fa fa-facebook-official fa-facebook rightpadding_10" href="{!!$comVal['facebook']!!}" title="Facebook" style="color: #3b5598"></a>
                                                    @endif
                                                    @if($comVal['twitter'])
                                                    <a target="_blank" class="fa fa-twitter rightpadding_10 leftpadding_20" href="<?php echo 'https://twitter.com/'.$comVal['twitter']?>" title="Twitter" style="color: #00aced"></a>
                                                    @endif
                                                    @if($comVal['linkedin'])
                                                    <a target="_blank" class="fa fa-linkedin rightpadding_10 leftpadding_20" href="{!!$comVal['linkedin']!!}" title="LinkedIn" style="color: #0077bf"></a>
                                                    @endif
                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endif
                                    @endforeach

@else
<?php echo 'No data available in table'; ?>
@endif
                            </div>
                            <!-- eof .isotope_container.row -->

                        </div>
                    </div>
                </div>
            </section>





                
<!-- /Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');
</script>
@endpush