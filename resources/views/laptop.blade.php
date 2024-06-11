@extends('layouts/main')
@section('title',"laptop")
@section('artikel')
<div class="card">
    <div class="card-header">
        <a href="/laptop/add-form" class="btn btn-primary"><i class="bi bi-plus-square"></i> Laptop</a>
    </div>
    <div class="card-body">
        @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('alert') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        {{-- TABEL DISINI --}}
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merek</th>
                    <th>Nama</th>
                    <th>Tahun</th>
                    <th>Spesifikasi</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lp as $idx=> $m)
                <tr>
                    <td>{{$idx+1 }}</td>
                    <td>{{ $m ->Merek}}</td>
                    <td>{{ $m ->Nama }}</td>
                    <td>{{ $m ->Tahun }}</td>
                    <td>{{ $m ->Spek }}</td>
                    <td>{{ $m ->Harga }}</td>
                    <td>                        
                        <img src="{{ asset("/storage/" .$m->gambar) }}" alt="{{ $m->gambar }}" height="80" width="80">
                    </td>
                    <td>
                        <a href="/laptop/edit-form/{{ $m -> id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="/delete/{{ $m -> id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection