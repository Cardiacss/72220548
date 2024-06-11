@extends('layouts.main')
@section('title','Form Edit Laptop')
@section('artikel')
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <form action="/update/{{ $mv -> id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Merek</label>
                <input type="text" name="Merek" class="form-control" value ="{{ $mv->Merek }}" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="Nama" class="form-control" value ="{{ $mv->Nama }}" required>
            </div>
            <div class="form-group">
                <label>Tahun</label>
                    <input type="number" min="1900" max="2100" name="Tahun" class="form-control" value ="{{ $mv->Tahun }}" required>
            </div>
            <div class="form-group">
                <label>Spesifikasi</label>
                <input type="text" name="Spek" class="form-control"  value ="{{ $mv->Spek }}"required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="Harga" class="form-control" value ="{{ $mv->Harga }}" required>
            </div>
            <div class="form-group">
                <label>gambar</label>
                <input type="file" name="gambar" class="form-control-file" accept="image/*">
            </div>
            <div class="form-group">
                <img src="{{ asset("/storage/" .$mv->gambar) }}" alt="{{ $mv->gambar }}" height="80" width="80">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection