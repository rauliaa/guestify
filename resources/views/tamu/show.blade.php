@extends('layouts.app')

@section('title', 'Detail Tamu')

@section('content')
<div class="container">
    <h3>Detail Tamu</h3>
    <p><strong>Nama:</strong> {{ $tamu->nama_tamu }}</p>
    <p><strong>Email:</strong> {{ $tamu->email_tamu }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $tamu->nomor_telepon }}</p>
    <p><strong>Kode Unik:</strong> {{ $tamu->kode_unik }}</p>
    <a href="{{ route('tamu.index') }}" class="btn btn-secondary">Kembali</a>
</div><br>
@endsection
