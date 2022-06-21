@extends('layout_frontpage.master')
@section('content')
@foreach($posts as $post)
    <x-post :post="$post"/>
@endforeach
@endsection