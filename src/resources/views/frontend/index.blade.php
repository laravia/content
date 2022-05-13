@extends('homepage::'.Route::getDomain().'/app')
@section('content')
    <div>
        @foreach ($postings as $posting)
            <span class="text-2xl">{{ $posting->title }}</span>
            <br /> ({{ $posting->updated_at }})
            <br />
            {!! \Str::parsedown($posting->body) !!}
            <hr>
        @endforeach

        {!! $postings->links() !!}
    </div>
@endsection
