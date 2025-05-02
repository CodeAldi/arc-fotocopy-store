@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title mt-2 col-8">List Barang</h5>
                    <button class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title mt-2 col-8">List Kategori Barang</h5>
                    <button class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">Tambah</button>
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
                            <th>Kategori</th>
                            <th>jumlah stok</th>
                            <th>harga satuan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barang as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->namaBarang }}</td>
                                <td>{{ $item->kategori->namaKategori }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->hargaBarang }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            {{-- <button class="dropdown-item" type="submit"><i class="bx bx-edit-alt me-1"></i> Edit</button> --}}
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
                                            {{-- <button class="dropdown-item" type="submit"><i class="bx bx-edit-alt me-1"></i> Edit</button> --}}
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
<div class="modal fade" id="modalTambahKategori" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
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
<div class="modal fade" id="modalTambahBarang" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ Route('Barang.tambah') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nameWithTitle" class="form-label">nama</label>
                            <input type="text" id="nameWithTitle" class="form-control" name="nama"
                                placeholder="masukan nama barang" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nameWithTitle" class="form-label">kategori</label>
                            <select name="kategori" id="kategori" class="form-select text-secondary"> 
                                <option value="#">Pilih Kategori Barang</option>
                                @forelse ($kategoriBarang as $item)
                                    <option value="{{ $item->id }}">{{ $item->namaKategori }}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="jumlah" class="form-label">jumlah</label>
                            <input type="number" name="jumlah" class="form-control" id="jumlah" min="0" placeholder="0">
                        </div>
                        <div class="col">
                            <label for="jumlah" class="form-label">harga satuan</label>
                            <div class="input-group">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="harga" class="form-control" id="jumlah" min="0" placeholder="0">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" placeholder="masukan deskripsi singkat barang" id="deskripsi" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="gambar" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="gambar" name="gambar" />
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