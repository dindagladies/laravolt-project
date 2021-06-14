@extends(config('laravolt.lookup.view.layout'))

@section('content')
    <x-titlebar title="Notification">
    </x-titlebar>

        <table class="ui table definition">
            <tbody>
                <!-- notification -->
                @forelse($user->notifications as $notification)
                    <tr>
                        <td>{{ $notification->data['name'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td>No Record found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
@endsection
