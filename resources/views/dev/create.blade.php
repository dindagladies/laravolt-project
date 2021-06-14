@extends(config('laravolt.lookup.view.layout'))

@section('content')
    <x-titlebar title="Dev">
        <x-backlink url="{{ route('dev')}}">Kembali ke Index</x-backlink>
    </x-titlebar>

    <x-panel title="Tambah Data Magang">
        <!-- form -->
        {!! form()->post(route('store')) !!}
            <!-- input -->
            {!! form()->text('name')->label('Nama Lengkap') !!}
            {!! form()->text('skill')->label('Skill') !!}
            <!-- button -->
            {!! form()->action([
                form()->submit(__('Save')),
                form()->link(__('Cancel'), route('dev'))
            ]) !!}
        {!! form()->close() !!}
    </x-panel>
@endsection
