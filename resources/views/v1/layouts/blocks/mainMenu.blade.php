<div class="bg-header main-menu">
    
    
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 col-8">
                @include('v1.layouts.blocks.sidebarTitle')
            </div>
            <div class="col-xl-10 col-md-8 ">
                <nav>
                    <ul>
                        @foreach(Config::get('menuMain') as $item)
                        <li><a href="{{ $item['href'] }}">{{ $item['caption'] }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
</div>