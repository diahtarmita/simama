@extends('layouts.fe')

@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://i.pinimg.com/564x/2a/44/70/2a4470faf7531c07471552b876444553.jpg"><span class="font-weight-bold">User</span><span class="text-black-50">useremail@gmail.com</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nama Lengkap</label><input type="text" class="form-control" placeholder="name" value=""></div>
                    </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Nomor Handphone</label><input type="text" class="form-control" placeholder="Masukkan no hp " value=""></div>
                    <div class="col-md-12"><label class="labels">Alamat Email</label><input type="text" class="form-control" placeholder="Alamat Email anda" value=""></div>
                    <div class="col-md-12"><label class="labels">Judul Proyek</label><input type="text" class="form-control" placeholder="Judul Proyek" value=""></div>
                    <div class="col-md-12"><label class="labels">Nama Pembimbing Lembaga Pendidikan</label><input type="text" class="form-control" placeholder="Nama Pembimbing Lembaga Pendidikan" value=""></div>
                    <div class="col-md-12"><label class="labels">No telepon Pembimbing</label><input type="text" class="form-control" placeholder="No telepon pembimbing" value=""></div>
                     </div>
                     <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">otw laporan akhir</label><input type="file" class="form-control" value="" placeholder="laprak" ><input type="submit" name="proses" value="Upload"></div>
                    
                    <div class="col-md-6"><label class="labels">otw sertifikat , gnti select</label><input type="file" class="form-control" value="" placeholder="sertifikat"><input type="submit" name="proses" value="Upload"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                
                <div class="form-group">
                    <label for="">OPD</label>
                    <select name="catatanharian" class="form-control">
                    <option value="">-Pilih-</option>
                    
                </select>
                </div>

                <div class="form-group">
                    <label for="">Bidang</label>
                    <select name="catatanharian" class="form-control">
                    <option value="">-Pilih-</option>
                    
                </select>
                </div>

                <div class="form-group">
                    <label for="">Lembaga Pendidikan</label>
                    <select name="catatanharian" class="form-control">
                    <option value="">-Pilih-</option>
                    
                </select>
                </div>
        </div>
                
                </Select>
                </select>
        </div>
    </div>
    </div>
</div>
</div>
</div>

@endsection
