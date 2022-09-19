@extends('laravia.user::layouts/app')
@section('contact')
    <div>
        <a href="javascript:history.back()"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ Laravia::trans('core.btnBack') }}</a>
    </div>

    <h1 class="text-3xl mb-5 mt-3">{{ Laravia::trans('contact.siteTitleEdit') }}</h1>
    {!! Laravia::form()->type('hidden')->name('id')->value($contact->id)->package('contact')->hideLabel()->render() !!}
    {!! Laravia::form()->type('text')->name('from')->value($contact->from)->package('contact')->render() !!}
    {!! Laravia::form()->type('textarea')->name('body')->value($contact->body)->package('contact')->render() !!}
@endsection
