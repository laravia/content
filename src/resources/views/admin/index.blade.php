@extends('laravia.user::layouts/app')
@section('content')
    <h1 class="text-3xl mb-5">{{ Laravia::trans('content.siteTitleIndex') }}</h1>

    <form action="{{ route('laravia.content::store') }}" method="post">
        @csrf
        {!! Laravia::form()->type('text')->name('title')->required(true)->render() !!}
        {!! Laravia::form()->type('parsedown')->name('body')->render() !!}
        {!! Laravia::form()->type('tags')->name('tags')->render() !!}

        <div class="grid grid-cols-3 gap-3">
            <div>
                {!! Laravia::form()->type('dateTime')->name('onlineFrom')->render() !!}
            </div>
            <div>
                {!! Laravia::form()->type('dateTime')->name('onlineTo')->render() !!}
            </div>
            <div>
                {!! Laravia::form()->type('checkbox')->name('active')->value(1)->render() !!}
            </div>
        </div>

        {!! Laravia::form()->type('submit')->name('submit')->text(Laravia::trans('core.btnSave'))->render() !!}
    </form>


    @component('laravia::components.simpletable',
        [
            'package' => 'content',
            'fields' => ['id', 'created_at', 'title', 'onlineFrom', 'onlineTo', 'linkToEdit'],
            'data' => $contents,
        ])
    @endcomponent
@endsection
