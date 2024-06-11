@extends('layouts.fe')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px"
                        src="https://i.pinimg.com/564x/2a/44/70/2a4470faf7531c07471552b876444553.jpg">
                    <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Peserta</h4>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="/profile" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $peserta->id }}">
                        <div class="row mt-2">
                            <div class="col-md-12"> {{-- Change class from 'col-md-6' to 'col-md-12' by Arvin --}}
                                <label class="labels"><b>Nama Lengkap</b></label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"
                                    value="{{ old('nama', $peserta->nama) }}" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels"><b>Nomor Handphone</b></label>
                                <input type="text" class="form-control" name="no_telp_peserta"
                                    placeholder="Masukkan No HP "
                                    value="{{ old('no_telp_peserta', $peserta->no_telp_peserta) }}" maxlength="13"> {{-- add 'maxlength' for limit the input by arvin --}}
                            </div>
                            <div class="col-md-6">
                                <label class="labels"><b>Email</b></label>
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    value="{{ old('email', $peserta->email) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels"><b>Jenis Peserta</b></label>
                                <select name="jenis_id" class="form-control">
                                    <option value="" disabled>-Pilih-</option>
                                    @foreach ($jeniss as $jenis)
                                        <option value="{{ $jenis->id }}"
                                            {{ old('jenis_id', $peserta->jenis_id) == $jenis->id ? 'selected' : '' }}>
                                            {{ $jenis->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="labels"><b>Judul Proyek</b></label>
                                <input type="text" class="form-control" name="judul_proyek" placeholder="Judul Proyek"
                                    value="{{ old('judul_proyek', $peserta->judul_proyek) }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels"><b>Nama Pembimbing Lembaga Pendidikan</b></label>
                                <input type="text" class="form-control" name="pembimbing_lemdik"
                                    placeholder="Nama Pembimbing Lembaga Pendidikan"
                                    value="{{ old('pembimbing_lemdik', $peserta->pembimbing_lemdik) }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels"><b>No telepon Pembimbing Lembaga Pendidikan</b></label>
                                <input type="text" class="form-control" name="no_telp_pembimbing"
                                    placeholder="No Telepon Pembimbing"
                                    value="{{ old('no_telp_pembimbing', $peserta->no_telp_pembimbing) }}" maxlength="13"> {{-- add 'maxlength' for limit the input by arvin --}}
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <label class="labels"><b>OPD</b></label>
                                    <select name="opd_id" class="form-control" onchange="gantiDaftarBidang()"
                                        id="selectopd">
                                        <option value="" disabled {{ old('opd_id') ? '' : 'selected' }}>-Pilih-
                                        </option>
                                        @foreach ($opds as $opd)
                                            <option value="{{ $opd->id }}"
                                                {{ old('opd_id', $peserta->opd_id) == $opd->id ? 'selected' : '' }}>
                                                {{ $opd->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-1">
                                    <div class="col-md-12">
                                        <label class="labels"><b>Bidang</b></label>
                                        <select name="bidang_id" class="form-control" id="selectbidang">
                                            <option value="" disabled {{ $peserta->bidang_id ? '' : 'selected' }}>
                                                -Pilih-</option>
                                        </select>
                                    </div>
                                    <div class="mt-1">
                                        <div class="col-md-12">
                                            <label class="labels"><b>Lembaga Pendidikan</b></label>
                                            <select name="lemdik_id" class="form-control">
                                                <option value="" disabled>-Pilih-</option>
                                                @foreach ($lemdiks as $lemdik)
                                                    <option value="{{ $lemdik->id }}"
                                                        {{ old('lemdik_id', $peserta->lemdik_id) == $lemdik->id ? 'selected' : '' }}>
                                                        {{ $lemdik->lemdik }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-1"></div>

                                        <div class="col-md-12">
                                            <label for="upload" class="form-label"><b>Upload Laporan Akhir</b></label>
                                            <div class="mt-1">
                                                <input class="form-control" type="file" id="upload"
                                                    name="laporan_akhir" multiple>
                                            </div>

                                            <div class="mb-1"></div>

                                            {{-- <div class="col-md-12">
                                                <label for="download" class="form-label"><b>Download
                                                        Sertifikat</b></label>
                                                <div class="mt-1">
                                                    <a href="{{ route('download.sertifikat', $peserta->id) }}"
                                                        class="btn btn-success">Download</a>
                                                </div>
                                            </div> --}}
                                        </div>



                                        <div class="mt-5 text-center">
                                            <button class="btn btn-primary profile-button">Save Profile</button>
                                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            gantiDaftarBidang();
        });

        function gantiDaftarBidang() {
            let opd = document.getElementById('selectopd').value;
            let selectbidang = document.getElementById('selectbidang');

            // Set the old value for bidang if it exists
            let oldBidang = {{ $peserta->bidang_id?? '' }};

            selectbidang.length = 1; // clear options but keep the placeholder
            @foreach ($bidangs as $bidang)
                if ({{ $bidang->opd_id }} == opd) {
                    //Logika percabangan untuk memastikan variabel "$peserta->bidang_id" memiliki value ;)
                    @if ($peserta->bidang_id)
                        let selected = ({{$peserta->bidang_id}} == {{ $bidang->id }}) ? true : false;
                        let option = new Option("{{ $bidang->nama }}", {{ $bidang->id }}, false, selected);
                    @else
                        let option = new Option("{{ $bidang->nama }}", {{ $bidang->id }});
                    @endif

                    selectbidang.add(option);
                }
            @endforeach
        }
        
        if (oldBidang) {
            $('#selectbidang').val(oldBidang);
        }
    </script>
@endsection
