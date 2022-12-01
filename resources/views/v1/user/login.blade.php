@extends('v1.layouts.user')

@section('form')

@php
  $errors = \Session::has('errors') ? \Session::get('errors') : []; 
@endphp

<h2 class="card-title mb-4">{{ ui::t('Вход на сайт') }}</h2>

<form method="POST" action="{{ url()->current() }}" class="user-form">
    
  {{ csrf_field() }}
    
  <div class="mb-4">
    <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg {{ isset($errors['email']) ? 'is-invalid' : null }}" placeholder="{{ ui::t('E-mail') }}">
    @if(isset($errors['email']))
    <div class="invalid-feedback">{!! ui::errorsRender($errors['email']) !!}</div>
    @endif
  </div>

  <div class="mb-4">
    <input type="password" name="password" class="form-control form-control-lg {{ isset($errors['password']) ? 'is-invalid' : null }}" placeholder="{{ ui::t('Пароль') }}">
    @if(isset($errors['password']))
    <div class="invalid-feedback">{!! ui::errorsRender($errors['password']) !!}</div>
    @endif
  </div>

  <button type="submit" class="btn btn-lg btn-primary">{{ ui::t('Войти') }}</button>
</form>

@endsection