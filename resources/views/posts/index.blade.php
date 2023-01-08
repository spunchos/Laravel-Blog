@extends('layout.app')

@section('title', 'posts sooqa')

@section('content')

    @include('partials.header')

    <div class="grid grid-cols-3 gap-0 mt-10 mb-20">
        @foreach($posts as $post)
            @include('partials.item', ["post" => $post])
        @endforeach

        {{ $posts->links()}}
    </div>
@endsection
