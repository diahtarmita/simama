@extends('layouts.fe')
@section('title', 'Model dan Eloquent')
@section('header')
@parent
<p>Catatan Harian</p>
@endsection

@section('content')
<a href="/ch/create" class="btn btn-success">Tambah</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Peserta</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Uraian Kegiatan</th>
            <th scope="col">Disetujui</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{dd($nama)}} --}}
        @foreach ($ch as $c)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
                @if(isset($nama))
                {{ $nama }}
                @endif
            </td>
            <td>{{ $c['tanggal'] }}</td>
            <td>{{ $c['uraian_kegiatan'] }}</td>
            <td>
                
                <input type="checkbox" disabled {{ $c['disetujui'] == 1 ? 'checked' : '' }}>
            </td>
            <td>{{ $c['aksi'] }}
                <a href="{{ route('ch.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('ch.destroy', $c->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>

            <td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection