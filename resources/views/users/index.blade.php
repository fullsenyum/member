@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data User <a class="btn btn-primary" href="{{ route('users.create') }}">Tambah</a></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $users)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$users->nik}}</td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>
                                {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('users.edit', [$users->id]) }}" class='btn btn-default btn-xs'>
                                        Edit
                                    </a>
                                    {!! Form::button('Hapus', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
