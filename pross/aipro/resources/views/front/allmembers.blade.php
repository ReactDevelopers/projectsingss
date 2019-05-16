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
            
<section class="ls page_portfolio section_padding_top_50 section_padding_bottom_0 columns_padding_0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="filters isotope_filters darklinks">
                                <a href="#" class="selected" data-filter="*">All</a>
                                @foreach($categories as $key => $val)
                                <a href="#" data-filter=".{{$key}}">{{$val}}</a>
                                @endforeach
                                <!-- <a href="#" data-filter=".animation">Animation</a>
                                <a href="#" data-filter=".events">Events</a>
                                <a href="#" data-filter=".factual">Factual</a>
                                <a href="#" data-filter=".fiction">Fiction</a>
                                <a href="#" data-filter=".film">Film</a>
                                <a href="#" data-filter=".online">Online</a>
                                <a href="#" data-filter=".variety">Variety</a> -->
                            </div>
                           
                            <div class="isotope_container isotope row masonry-layout" id="load-data" data-filters=".isotope_filters">
                                 @foreach($comdata as $comVal)
                                <div class="isotope-item col-lg-3 col-md-4 col-sm-6 <?php echo str_replace(",", " ", $comVal['categories']) ?>">
                                    <article class="vertical-item content-padding post format-standard text-center">

                                        <div class="item-media">
                                            <a href="membercompany.html">
                                            <img src="images/gallery/02.jpg" alt="">
                                            </a>
                                        </div>

                                        <div class="item-content">
                                            <header class="entry-header">
                                                <p class="categories-links small-text"><a href="{{url('membercompany/'.$comVal['user_id'])}}">{{$comVal['com_name']}}
                                               </a></p>
                                            </header>
                                        </div>

                                    </article>
                                </div>
                                @endforeach
                            </div>
                            <!-- eof .isotope_container.row -->

                        </div>
                    </div>
                </div>
            </section>
                
<section class="ls section_padding_top_30 section_padding_bottom_130">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <!-- <a href="#" class="theme_button color1 wide_button margin_0">Load More</a> -->
                             <button id="btn-more" data-id="7" class="theme_button color1 wide_button margin_0"> Load More 
                        </div>
                    </div>
                </div>
            </section>
<!-- /Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');

$(document).ready(function(){
    $(document).on('click','#btn-more',function(){
        var id = $(this).data('id');
        // alert(id);
        // alert('hello');
        // $("#btn-more").html("Loading....");
        $.ajax({
           url : "{!! url('allmembers') !!}",
           method : "POST",
           data : {id:id, _token:"{{csrf_token()}}"},
           dataType : "text",
           success : function (data)
           {
              if(data != '') 
              {
                  // $('#remove-row').remove();
                  alert(data);
                  $('#load-data').append(data);
                  // init Isotope
                    jQuery('.isotope_container').each(function(index) {
                        var $container = jQuery(this);
                        var layoutMode = ($container.hasClass('masonry-layout')) ? 'masonry' : 'fitRows';
                        var columnWidth = ($container.find('.col-lg-20').length) ? '.col-lg-20' : '';
                        $container.isotope({
                            percentPosition: true,
                            layoutMode: layoutMode,
                            masonry: {
                                //for big first element in grid - giving smaller element to use as grid
                                columnWidth: columnWidth
                            }
                        });

                        var $filters = jQuery(this).attr('data-filters') ? jQuery(jQuery(this).attr('data-filters')) : $container.prev().find('.filters');
                        // bind filter click
                        if ($filters.length) {
                            $filters.on( 'click', 'a', function( e ) {
                                e.preventDefault();
                                var $thisA = jQuery(this);
                                var filterValue = $thisA.attr('data-filter');
                                $container.isotope({ filter: filterValue });
                                $thisA.siblings().removeClass('selected active');
                                $thisA.addClass('selected active');
                            });
                            //for works on select
                            $filters.on( 'change', 'select', function( e ) {
                                e.preventDefault();
                                var filterValue = jQuery(this).val();
                                $container.isotope({ filter: filterValue });
                            });
                        }
                    });
                  alert(data);
              }
              else
              {
                  $('#btn-more').html("No Data");
              }
           }
        });
    });  
}); 

</script>
@endpush