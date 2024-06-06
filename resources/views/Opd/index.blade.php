@extends('layouts.app')
@section('title', 'OPD')
@section('header')
@parent
@endsection
@section('content')
@foreach ($opds as $p)
<p>{{ $loop->iteration.'. '.$p['nama'] }}</p>
@endforeach
@endsection