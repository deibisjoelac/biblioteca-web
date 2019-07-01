@extends('errors::illustrated-layout')

@section('code', '403')
@section('title', __('403 - Acceso prohibido'))

@section('image')
    <div style="background-image: url({{ asset('/svg/403.svg') }});" 
	class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

{{-- @section('message', __($exception->getMessage() ?: 'Sorry, you are forbidden from accessing this page.')) --}}
@section('message', __('Sorry, you are forbidden from accessing this page.'))
