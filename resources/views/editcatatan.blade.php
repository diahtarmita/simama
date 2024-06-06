@extends('layouts.fe')
@section('title', 'Edit Catatan')
@section('header')
@parent
<p>Edit Catatan</p>
@endsection

@section('content')
<h2>Edit Catatan</h2>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/ch/{{ $ch->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $ch->tanggal }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="uraian_kegiatan" class="col-sm-2 col-form-label">Uraian Kegiatan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="uraian_kegiatan" name="uraian_kegiatan" value="{{ $ch->uraian_kegiatan }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
