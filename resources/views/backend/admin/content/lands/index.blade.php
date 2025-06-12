@extends('backend/admin/layout/main')
@section('content')
    <div class="container">
        <h2 class="mb-4">List Lahan</h2>

        <a href="{{ route('lands.create') }}" class="btn btn-primary rounded-pill mb-3">Tambah Lahan</a>

        <form action="{{ route('lands.index') }}" method="GET" class="form-inline mb-3">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Cari lahan...">
            <button type="submit" class="btn btn-secondary">🔍 Cari</button>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Lahan</th>
                <th>Lokasi</th>
                <th>Luas Lahan</th>
                <th>Jenis Tanah</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($lands as $index => $land)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $land->name }}</td>
                    <td>{{ $land->location }}</td>
                    <td>{{ $land->area }}</td>
                    <td>{{ $land->soil_type }}</td>
                    <td>
                        <a href="{{ route('lands.edit', $land->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('lands.destroy', $land->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
