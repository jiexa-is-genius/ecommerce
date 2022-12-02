<div class="bg-header header-box">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 col-8 header-logo-box">
                <a href="/">
                    <img src="/img/logoWhite.png" alt="">
                </a>
            </div>
            <div class="col-xl-6 col-md-5 text-center">
                @include('v1.layouts.blocks.search')
            </div>
            <div class="col-lg-4 col-md-3 col-4 text-end header-buttons-box">
                @include('v1.layouts.blocks.headerUser')
                @include('v1.layouts.blocks.headerCart')
            </div>
            
        </div>
    </div>
</div>