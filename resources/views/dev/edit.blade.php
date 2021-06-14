@extends(config('laravolt.lookup.view.layout'))

@section('content')
    <x-titlebar title="Dev">
        <x-backlink url="{{ route('dev')}}">Kembali ke Index</x-backlink>
    </x-titlebar>

    <x-panel title="Edit Data Magang">
        @foreach($datas as $data)
        {!! form()->post(route('update')) !!}
            <!-- input -->
            {!! form()->hidden('id', $data['id']) !!}
            {!! form()->text('name')->label('Nama Lengkap')->value($data['name']) !!}
            {!! form()->text('skill')->label('Skill')->value($data['skill']) !!}
            <!-- button -->
            {!! form()->action([
                form()->submit(__('Save')),
                form()->link(__('Cancel'), route('dev'))
            ]) !!}
        {!! form()->close() !!}
        @endforeach
    </x-panel>
@endsection
