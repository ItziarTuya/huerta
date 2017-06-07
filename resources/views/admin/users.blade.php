@extends('layouts.navigation')

@section('content')

    <h2>Users</h2>
    <table class="table table-products">
        <thead>
            <tr>
                <th>Name</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}

@endsection