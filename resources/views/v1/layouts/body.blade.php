@extends('v1.layouts.html')

@section('html')
    <div class="page-separator">
        <div class="page-separator-top">
           
            <main>
                @yield('body')
            </main>
        </div>
        <div class="page-separator-bottom">
            <footer>
                @include('v1.layouts.blocks.subFooter')
                @include('v1.layouts.blocks.footer')
            </footer>
        </div>
    </div>
@endsection