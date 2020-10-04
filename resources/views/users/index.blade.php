@php
$judul = ['No','Id Users','Nama Lengkap','Tanggal Lahir','Jenis Kelamin','Agama','Email dari Users','Action'];
@endphp

@extends('layouts.default')

@section('content')
<div class="header">
    <h1 class="text-center p-5">User CRUD LARAVEL</h1>
    {{-- <a href="{{url('/supplier/create')}}" class="btn btn-success float-right ml-2">Tambah Data Supplier</a> --}}
    <a href="{{ url('/userprofil/create')}}" class="btn btn-success float-right mb-2">Tambah Data User</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            @foreach ($judul as $j)
            <th scope="col">{{$j}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($userprofil as $p)

        <tr>
            <td>{{$loop -> iteration}}</td>
            <td>{{$p ->users_id}}</td>
            <td>{{$p ->nl}}</td>
            <td>{{$p ->tgl}}</td>
            <td>{{$p ->jk}}</td>
            <td>{{$p ->agama}}</td>
            <td>{{$p ->email}}</td>
            <td>
                <a href="{{route('userprofil.edit', $p ->id)}}" class="btn btn-warning">Edit</a>
                <a href="/userprofil/{{$p ->id}}/delete" class="btn btn-danger"
                    onclick="return confirm('Yakin ingin di hapus')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
