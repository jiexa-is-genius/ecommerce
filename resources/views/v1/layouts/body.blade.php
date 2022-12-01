@extends('v1.layouts.html')

@section('html')
    <div class="page-separator">
        <div class="page-separator-top">
           
            <main>
                @yield('body')
            </main>
        </div>
        <div class="page-separator-bottom">
            Footer
        </div>
    </div>
@endsection