@extends('laravia.user::layouts/app')
@section('contact')
    <h1 class="text-3xl mb-5">{{ Laravia::trans('contact.siteTitleIndex') }}</h1>

    @component('laravia::components.simpletable',
        [
            'package' => 'contact',
            'fields' => [
                'project',
                'from',
                'body'
                'linkToEdit',
            ],
            'data' => $contacts,
        ])
    @endcomponent
@endsection
