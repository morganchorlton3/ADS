@extends('errors::layout')

@section('title', __('Server Error'))
@section('code', '500')
@section('message')
<p style="font-size: 24px;">Sorry we've encountered an error. please try again in a few minutes</p>
@endsection
