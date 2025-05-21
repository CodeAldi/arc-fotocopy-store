@extends('layouts.landing')
@section('content')

<section class="section mt-5" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Our Latest Products</h2>
                    <span>Check out all of our products.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse ($jasa as $item)
            <div class="col-lg-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            <ul>
                                <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <img src="{{ asset($item->gambar) }}" alt="">
                    </div>
                    <div class="down-content">
                        <h4>{{ $item->namaBarang }}</h4>
                        <span>Rp.{{ $item->hargaJasa }},- (stock : {{ $item->jumlah }})</span>
                        <span>{{ $item->deskripsi }}</span>
                        <ul class="stars">
                            <li><span class="badge">{{ $item->kategori->namaKategori }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            @empty

            @endforelse
        </div>
        <div class="row">
            <div class="mx-auto">
                {{ $jasa->links() }}

            </div>
        </div>
    </div>
</section>
@endsection