@if(Request::is('/') OR Request::is('placement-detail/*'))
<div class="bannerWrapper" style="background-image:url('{{ asset('uploads/banner/'.$banner->banner_image)}}')">
    <!-- For Mobile Banner -->
    <div class="bannerBgMobile hideOnDesktop">
        <img src="{{ asset('uploads/banner/'.$banner->banner_image)}}" alt="">
        <h1 class="text-center colorWhite hideOnDesktop">{{ $banner->banner_title }}</h1>
    </div>
    <div class="container">
        <div class="advanceSearch">
            <h1 class="text-center colorWhite hideOnMobile hideOnTablet">{{ $banner->banner_title }}</h1>
            <div class="searchForm">
                <form action="" method="" name="" id="" class="form-inline">
                    <div class="form-group">
                        <?php echo get_dropdown_for_search('opportunity'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo get_dropdown_for_search('level'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo get_dropdown_for_search('discipline','with_search'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo get_dropdown_for_search('country','with_search'); ?>
                    </div>
                    <button type="button" class="btn btn-submit hideOnMobile hideOnTablet searchPost">Search</button>
                    <div class="moreFields">
                        <div class="form-group">
                            <?php echo get_dropdown_for_search('funding'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo get_dropdown_for_search('duration'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo get_dropdown_for_search('provider','with_search'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="" placeholder="Keyword" class="form-control" id="search_with_keyword">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-submit hideOnDesktop">Search</button>
                    <span class="moreButton">
                        <a href="javascript:void(0);" class="hideMore">Hide Options</a>
                    </span>
                </form>
                <div class="moreButton">
                    <a href="javascript:void(0);" class="addMore">+More Options</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(\Request::is('about'))
    <div class="innersection-banner" style="background-image:url('{{ asset('uploads/banner/'.$banner->banner_image)}}')">
        <!-- For Mobile Banner -->
        <div class="bannerBgMobile hideOnDesktop">
            <img src="{{ asset('uploads/banner/'.$banner->banner_image)}}" alt="">
            <h1 class="hideOnDesktop">{{ $banner->banner_title }}</h1>
        </div>
        <div class="container">
            <h1 class="hideOnMobile hideOnTablet">{{ $banner->banner_title }}</h1>
        </div>
    </div>
@endif

@if(\Request::is('news') OR \Request::is('archives/*') OR \Request::is('blogs'))
<div class="bannerWrapper blog-banner">
    <!-- For Mobile Banner -->
    <div class="bannerBgMobile hideOnDesktop" style="background-image:url('{{ asset('uploads/banner/'.$banner->banner_image)}}">
        <img src="{{ asset('uploads/banner/'.$banner->banner_image)}}" alt="">
        <h1 class="text-center colorWhite hideOnDesktop">{{ $title }}</h1>
    </div>
    <div class="container">
        <h1 class="text-center colorWhite hideOnMobile hideOnTablet">{{ $title }}</h1>
        @if(\Request::is('blogs'))
        <div class="search-box">
                <input type="text" name="" placeholder="Search" class="form-control">
                <button type="button" class="btn btn-search">Search</button>
        </div>
        @endif
    </div>
</div>
@endif

@if(\Request::is('provider-profile/*'))
    <div class="bannerWrapper providers-banner" style="background-image:url('{{ asset('uploads/provider/'.$provider_org->provider_header) }}')">
        <!-- For Mobile Banner -->
        <div class="bannerBgMobile hideOnDesktop">
            <img src="{{ asset('uploads/provider/'.$provider_org->provider_header) }}" alt="">
        </div>
    </div>
@endif
</div>