@extends('layout.template')

@section('content')
    <div class="container mt-4">

        <h2 class="mb-3">Data KRS</h2>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="card-header">
            <form class="d-flex justify-content-end">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input name="search" type="text" class="form-control" placeholder="Cari data">
                    <button class="btn btn-success" type="submit">Cari</button>
                </div>
            </form>
        </div>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>NO</th>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataKRS as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->npm }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>
                            <a href="{{ route('detail-krs', ['id' => $mhs->npm]) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i>
                                Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $dataKRS->links() }}
    </div>
    </div>
    </div>
@endsection