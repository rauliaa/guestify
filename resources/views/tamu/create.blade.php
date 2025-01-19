@extends('layouts.app')

@section('title', 'Tambah Tamu')

@section('content')
<div class="container">
    <h3>Tambah Tamu</h3>
    
    <form action="{{ route('tamu.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Tamu</label>
            <input type="text" name="nama_tamu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email_tamu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
