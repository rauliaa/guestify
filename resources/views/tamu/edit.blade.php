@extends('layouts.app')

@section('title', 'Edit Tamu')

@section('content')
<div class="container">
    <h3>Edit Tamu</h3>
    
    <form action="{{ route('tamu.update', $tamu->id_tamu) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Tamu</label>
            <input type="text" name="nama_tamu" class="form-control" value="{{ $tamu->nama_tamu }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email_tamu" class="form-control" value="{{ $tamu->email_tamu }}" required>
        </div>
        <div class="mb-3">
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" value="{{ $tamu->nomor_telepon }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
