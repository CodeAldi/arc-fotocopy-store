@extends('layouts.landing')
@section('content')
<div class="main-banner" id="top">
    <div class="container">
        <div class="row">
            <h2>Keranjang</h2>
        </div>
        <div class="col-12">
            <div class="card my-2 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">no</div>
                        <div class="col">nama barang</div>
                        <div class="col">jumlah</div>
                        <div class="col">total</div>
                        <div class="col">aksi</div>
                    </div>
                </div>
            </div>
        </div>
        @forelse ($keranjang as $item)
        <div class="col-12">
            <div class="card my-2 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">{{ $loop->iteration }}</div>
                        <div class="col">{{ $item->barang->namaBarang }}</div>
                        <div class="col">{{ $item->jumlah }}</div>
                        <div class="col">Rp.{{ $item->barang->hargaBarang * $item->jumlah }}</div>
                        <div class="col">
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            
        @endforelse
    </div>
</div>
@endsection