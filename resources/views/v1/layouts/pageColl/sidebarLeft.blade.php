@extends('v1.layouts.body')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4 col-8">
            @include('v1.layouts.blocks.sidebar')
        </div>
        <div class="col-xl-10 col-lg-9 col-md-8 col-4">
            @yield('content')
        </div>
    </div>
</div>
@endsection