@extends('layouts.fe')
@section('title', 'Create Catatan')
@section('header')
@parent
<p>Create Catatan</p>
@endsection

@section('content')
<h2>Tambah Catatan</h2>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/catatanharian" method="POST">
    @csrf
    <div class="row mb-3">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" id="tanggal" name="tanggal">
        </div>
    </div>
    <div class="row mb-3">
        <label for="uraian_kegiatan" class="col-sm-2 col-form-label">Uraian Kegiatan</label>
        <div class="col-sm-4">
            <textarea class="form-control" id="uraian_kegiatan" name="uraian_kegiatan" rows="3"></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2 offset-sm-2">
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </div>
    </div>
</form>
@endsection
