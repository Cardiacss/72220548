@extends('layouts.main')
@section('title','Form Add Laptop')
@section('artikel')
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <form action="/save" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Merek</label>
                <input type="text" name="Merek" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="Nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tahun</label>
                    <input type="number" min="1900" max="2100" name="Tahun" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Spesifikasi</label>
                <input type="text" name="Spek" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="Harga" class="form-control" required>
            </div>
            <div class="form-group">
                <label>gambar</label>
                <input type="file" name="gambar" class="form-control-file" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection