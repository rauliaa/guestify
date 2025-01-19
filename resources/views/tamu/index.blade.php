@extends('layouts.app')

@section('title', 'Daftar Tamu')

@section('content')
<div class="container">
    <h3>Daftar Tamu</h3>
    <a href="{{ route('tamu.create') }}" class="btn btn-primary mb-3">Tambah Tamu</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tamus as $index => $tamu)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tamu->nama_tamu }}</td>
                    <td>{{ $tamu->email_tamu }}</td>
                    <td>{{ $tamu->nomor_telepon }}</td>
                    <td>
                        <a href="{{ route('tamu.show', $tamu->id_tamu) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('tamu.edit', $tamu->id_tamu) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tamu.destroy', $tamu->id_tamu) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
