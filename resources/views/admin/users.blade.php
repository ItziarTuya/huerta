@extends('layouts.navigation')

@section('content')

    <h2>Users</h2>
    <table class="table table-products">
        <thead>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr @if ($user->trashed()) class="danger" @endif>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $roleNames[$user->role] }}</td>
                    <td>
                        @if (!$user->trashed())
                            <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-info">Edit</a>
                            <form method="POST" action="{{ url('/admin/users/'.$user->id) }}" class="form-button">
                                <input type="hidden" name="_method" value="DELETE" >
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}

@endsection