@extends('layout_frontpage.master')
@section('content')
    <div class="row">
        @foreach($posts as $post)
            <x-post :post="$post"/>
        @endforeach
    </div>
    <ul class="pagination pagination-info" style="float: right">
        {{ $posts->links() }}
    </ul>
@endsection