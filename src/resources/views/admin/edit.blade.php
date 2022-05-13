@extends('laravia.user::layouts/app')
@section('content')
    <div>
        <a href="javascript:history.back()"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ Laravia::trans('core.btnBack') }}</a>
    </div>

    <h1 class="text-3xl mb-5 mt-3">{{ Laravia::trans('content.siteTitleEdit') }}</h1>
    {{ Laravia::trans('core.createdAt') }}: {{ $content->created_at }} | {{ Laravia::trans('core.updatedAt') }}:
    {{ $content->updated_at }}

    <form action="{{ route('laravia.content::update') }}" method="post">
        @csrf
        {!! Laravia::form()->type('hidden')->name('id')->value($content->id)->hideLabel()->render() !!}
        {!! Laravia::form()->type('text')->name('title')->value($content->title)->render() !!}
        {!! Laravia::form()->type('parsedown')->name('body')->value($content->body)->render() !!}

        <div class="grid grid-cols-3 gap-3">
            <div>
                {!! Laravia::form()->type('dateTime')->name('onlineFrom')->value($content->onlineFrom)->render() !!}
            </div>
            <div>
                {!! Laravia::form()->type('dateTime')->name('onlineTo')->value($content->onlineTo)->render() !!}
            </div>
            <div>
                {!! Laravia::form()->type('checkbox')->name('active')->value($content->active)->render() !!}
            </div>
        </div>

        {!! Laravia::form()->type('tags')->name('tags')->value($content->getTagNameListForJavascript())->render() !!}

        {!! Laravia::form()->type('submit')->name('submit')->text(Laravia::trans('core.btnSave'))->render() !!}
    </form>
@endsection
