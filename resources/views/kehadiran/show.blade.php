@extends('layouts.app')

@section('title', 'Detail Tamu')

@section('content')
<div class="container">
    <h3>Detail Tamu</h3>
    <p><strong>Nama:</strong> {{ $kehadiran->tamu->nama_tamu }}</p>
    <p><strong>Acara:</strong> {{ $kehadiran->acara }}</p>
    <p><strong>Waktu Kehadiran:</strong> {{ $kehadiran->waktu_kehadiran }}</p>
    <p><strong>Status Kehadiran:</strong> {{ $kehadiran->status_kehadiran }}</p>
    <a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">Kembali</a>
</div><br>
@endsection
