@extends('front_template.layouts.template')
@section('title','user profile')
@section('content')
    <h1>Welcome , {{Auth::user()->name}}!</h1>
@endsection
