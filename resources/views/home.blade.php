@extends('layouts.fe')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <title>Bootstrap 5 Simple Admin Dashboard</title> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
            integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <style>
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 100;
                padding: 90px 0 0;
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
                z-index: 99;
            }

            @media (max-width: 767.98px) {
                .sidebar {
                    top: 11.5rem;
                    padding: 0;
                }
            }

            .navbar {
                box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
            }

            @media (min-width: 767.98px) {
                .navbar {
                    top: 0;
                    position: sticky;
                    z-index: 999;
                }
            }

            .sidebar .nav-link {
                color: #333;
            }

            .sidebar .nav-link.active {
                color: #0d6efd;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-light bg-light p-3">
            <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">

                <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                    data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="row my-4">
                <div class="col-12">
                    <h3>Selamat datang, {{ auth()->user()->name }}</h3>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0"> {{-- Merubah class dari "col-lg-3" -> "col-lg-4"  --}}
                    <div class="card">
                        <h5 class="card-header">Jumlah Catatan</h5>
                        <div class="card-body">
                            {{ $totalCatatan }}
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-4"> {{-- Merubah class dari "col-lg-3" -> "col-lg-4"  --}}
                    <div class="card">
                        <h5 class="card-header">Laporan Akhir</h5>
                        <div class="card-body">
                            {{-- Logika percabangan untuk memunculkan keterangan dari laporan sertifikat --}}
                            @if ($laporanAkhir)
                            Laporan tersedia
                            @else
                            Ups.. Belum ada Laporan Akhir
                            @endif
                            {{-- end Logika percabangan untuk memunculkan keterangan dari laporan sertifikat --}}
                        </div>
                    </div>
                </div>
                {{-- {{dd($peserta_id)}} --}}
                <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-4"> {{-- Merubah class dari "col-lg-3" -> "col-lg-4"  --}}
                    <div class="card">
                        <h5 class="card-header">Sertifikat</h5>
                        <div class="card-body">
                            {{-- Logika percabangan untuk memunculkan button unduh sertifikat --}}
                            @if ($sertifikat)
                                <p><svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.0303 10.0303C16.3232 9.73744 16.3232 9.26256 16.0303 8.96967C15.7374 8.67678 15.2626 8.67678 14.9697 8.96967L10.5 13.4393L9.03033 11.9697C8.73744 11.6768 8.26256 11.6768 7.96967 11.9697C7.67678 12.2626 7.67678 12.7374 7.96967 13.0303L9.96967 15.0303C10.2626 15.3232 10.7374 15.3232 11.0303 15.0303L16.0303 10.0303Z" fill="#1C274C"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="#1C274C"/>
                                    </svg> Sertifikat tersedia. Tekan unduh untuk melihat!</p>
                                <a href="{{ route('download.sertifikat', auth()->id()) }}" class="btn
                                    btn-success">Unduh Sertifikat</a>
                            @else
                                Ups.. Belum ada sertifikat
                            @endif
                            {{-- end Logika percabangan untuk memunculkan button unduh sertifikat--}}
                        </div>
                    </div>
                </div>
            </div>


    </body>

    </html>
@endsection
