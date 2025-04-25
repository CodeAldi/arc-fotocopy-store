@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title mt-2 col-8">List Barang</h5>
                    <button class="btn btn-primary col-4">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title mt-2 col-8">List Kategori Barang</h5>
                    <button class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#modalCenter">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama</th>
                            <th>jumlah stok</th>
                            <th>harga satuan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>nama</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoriBarang as $item)
                            <tr>
                                <td>{{ $item->namaKategori }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="submit"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                            <form action="{{ Route('kategoriBarang.hapus',['item'=>$item]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCenter" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ Route('kategoriBarang.tambah') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Kategori Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">nama</label>
                        <input type="text" id="nameWithTitle" class="form-control" name="nama" placeholder="masukan nama kategori baru" />
                        <span class="form-text">nama kategori baru tidak boleh sama dengan yang sudah ada</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection