@extends('layouts.app')

@section('title', 'Daftar Kehadiran')

@section('content')
    <div class="container">
        <h3>Daftar Kehadiran</h3>
        <a href="{{ route('kehadiran.create') }}" class="btn btn-primary mb-3">Catat Kehadiran</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Acara</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kehadiran as $index => $k)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $k->tamu->nama_tamu }}</td>
                        <td>{{ $k->acara }}</td>
                        <td>{{ $k->status_kehadiran }}</td>
                        <td>
                            <a href="{{ route('kehadiran.show', $k->id_kehadiran) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('kehadiran.edit', $k->id_kehadiran) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kehadiran.destroy', $k->id_kehadiran) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
