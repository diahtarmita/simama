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
                    <h4 class="text-right">Catatan Harian</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nama Lengkap</label><input type="text" class="form-control" placeholder="name" value=""></div>
                    </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Tanggal Upload</label><input type="date" class="form-control" placeholder="Tanggal" value=""></div>
                    <div class="col-md-12"><label class="labels">Status</label><input type="text" class="form-control" placeholder="Status" value=""></div>
                     </div>
                     <label>Uraian Kegiatan</label>
                     <textarea name="Uraian Kegiatan" class="form-control @error('info') is-invalid @enderror">{{old('Uraian Kegiatan') }}</textarea>
                
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
       
</div>
</div>
</div>
<script>
        
            // Menghapus kelas active dari semua tombol
            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.classList.remove('active');
            });
            
            // Menambahkan kelas active pada tombol yang ditekan
            element=document.getElementById('menuch');
            element.classList.add('active');
        
    </script>
@endsection