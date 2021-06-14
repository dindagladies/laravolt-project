@extends('laravolt::layouts.app')

@section('content')
    <x-titlebar title="Dev">
        <div class="item">
            <x-link url="{{ route('create')}}">
                <i class="icon plus"></i> {{ __('Tambah') }}
            </x-link>
            <x-link class="ui button red" url="{{ route('notification')}}">
                <i class="icon bell"></i> {{ __('Notifikasi') }}
            </x-link>
        </div>
    </x-titlebar>

    <!-- search -->
    <div class="ui borderless menu top attached">
        <div class="item"><h4>Data Magang</h4></div>
            <div class="menu right">
                <div class="item">
                    <form method="GET" action="{{ route('search')}}">
                        <div class="ui action input">
                            <input class="prompt" name="search" type="text" placeholder="Search...">
                            <button type="submit" class="ui basic button icon"><i class="search link icon"></i></button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- table -->
    <table class="ui attached table unstackable responsive">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Skill</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="collection">
            @php $no = 1; @endphp
            @forelse($datas as $data)
            <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['skill'] }}</td>
                    <td data-th="">
                        <x-link class="ui button blue mini icon secondary" url="{{ route('edit', [$data['id']])}}">
                            <i class="icon pencil"></i>
                        </x-link>
                        <x-link class="ui button red mini icon secondary" url="{{ route('delete', [$data['id']])}}">
                            <i class="icon trash"></i>
                        </x-link>
                    </td>
                
            </tr>
            @empty
                <tr class="text-center">
                    <td colspan="4">Data belum tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
