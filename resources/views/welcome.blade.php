@extends('layouts.main')
@section('content')
    <div class="container">
        <h1 class="text-center m-4"> Home Page </h1>
        <div class="d-flex justify-content-center">
            @if (session('SuccessMsg'))
                <div class="alert alert-success" role="alert">
                    {{ session('SuccessMsg') }}
                </div>
            @endif
            <table class="table table-striped table-hover">
                <thead class="table-danger">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <th scope="row"> {{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>
                                <button class="btn btn-danger">Delete</button>
                                <a href="{{ route('edit', $user->id) }}">
                                    <button class="btn btn-primary ms-1">Edit</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
