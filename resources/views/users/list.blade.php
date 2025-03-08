@extends('layout')

@section('content')
    <h1>Users List</h1>

    <a class="btn btn-success" href="/users/form">
        <i class="fa-solid fa-plus"></i>
        Create User
    </a>

    @if (isset($users))
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th class="text-center" width="110px">Action</th>
            </tr>
        </thead>
        <tbody> 
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <form action="/users/remove/{{ $user->id }}" method="post">
                            @csrf
                            @method('delete')

                            <a class="btn btn-primary" href="/users/{{ $user->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <button class="btn btn-danger" type="submit">
                                <i class="fa-solid fa-trash"></i>   
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection