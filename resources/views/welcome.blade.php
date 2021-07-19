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
                                <form method="POST" id="delete-form-{{ $user->id }}"
                                    action="{{ route('delete', $user->id) }}" style="display: none">
                                    {{ csrf_field() }}
                                    {{-- {{ method_field('delete') }} --}}
                                </form>
                                <a href="">
                                    <button class="btn btn-danger" onclick="if (confirm('Are you sure?')) {
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{ $user->id }}').submit(); }
                                                                    else {
                                                                     event.preventDefault();
                                                                     }"> Delete
                                    </button>
                                </a>

                                <a href="{{ route('edit', $user->id) }}">
                                    <button class="btn btn-primary ms-1">Edit</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="container">
        {{ $users->links() }}
    </div>
@endsection
