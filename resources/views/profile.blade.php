@extends('layouts.fe')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px"
                        src="https://i.pinimg.com/564x/2a/44/70/2a4470faf7531c07471552b876444553.jpg">
                    <span class="font-weight-bold">User</span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                    <form action="/profile" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $peserta['id'] }}">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"
                                    value="{{ $peserta['nama'] }}">
                                    
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Nomor Handphone</label>
                                <input type="text" class="form-control" name="no_telp_peserta"
                                    placeholder="Masukkan No HP " value="{{ $peserta['no_telp_peserta'] }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Alamat Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Alamat Email"
                                    value="{{ $peserta['email'] }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Judul Proyek</label>
                                <input type="text" class="form-control" name="judul_proyek" placeholder="Judul Proyek"
                                    value="{{ $peserta['judul_proyek'] }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Nama Pembimbing Lembaga Pendidikan</label>
                                <input type="text" class="form-control" name="pembimbing_lemdik"
                                    placeholder="Nama Pembimbing Lembaga Pendidikan" value="{{ $peserta['pembimbing_lemdik'] }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">No telepon Pembimbing</label>
                                <input type="text" class="form-control" name="no_telp_pembimbing"
                                    placeholder="No Telepon Pembimbing" value="{{ $peserta['no_telp_pembimbing'] }}">
                            </div>
                        </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label class="labels">OPD</label>
                        <select name="opd_id" class="form-control" onchange="gantiDaftarBidang()" id="selectopd">
                            <option value="" disabled {{ old('opd') ? '' : 'selected' }}>-Pilih-</option>
                            @foreach ($opds as $opd)
                                  <option value="{{ $opd->id }}" {{ (old('opd_id') ?? session('opd_id')) == $opd->id ? 'selected' : '' }}>{{ $opd->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="labels">Bidang</label>
                        <select name="bidang_id" class="form-control" id="selectbidang">
                            <option value="" disabled>-Pilih-</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="labels">Lembaga Pendidikan</label>
                        <select name="lemdik_id" class="form-control">
                            <option value="" disabled>-Pilih-</option>
                            @foreach ($lemdiks as $lemdik)
                                <option value="{{ $lemdik->id }}" {{ $peserta['lemdik_id'] == $lemdik->id ? 'selected' : '' }}>{{ $lemdik->lemdik }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button">Save Profile</button>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
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
            selectbidang.length = 1; // clear options but keep the placeholder
            @foreach ($bidangs as $bidang)
                if ({{ $bidang->opd_id }} == opd) {
                    let selected = ({{$peserta->bidang_id}} == {{$bidang->id}}) ? true : false;
                    let option = new Option("{{ $bidang->nama }}", {{ $bidang->id }}, false, selected);
                    selectbidang.add(option);
                }
            @endforeach

            // Set the old value for bidang if it exists
            let oldBidang = "{{ old('bidang_id') }}";
            if (oldBidang) {
                $('#selectbidang').val(oldBidang);
            }
        }
    </script>
@endsection
