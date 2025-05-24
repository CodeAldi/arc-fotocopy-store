@extends('layouts.landing')
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Halaman Detail Produk</h2>
                    <span>detail produk dan pesanan</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->
    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-images">
                        <img src="{{ asset($barang->gambar) }}" alt="">
                        {{-- <img src="assets/images/single-product-02.jpg" alt=""> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>{{ $barang->namaBarang }}</h4>
                        <span class="price" id="hargaSatuan">Rp.{{ $barang->hargaBarang }},-</span>
                        {{-- <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul> --}}
                        <span>{{ $barang->deskripsi }}</span>
                        {{-- <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                        </div> --}}
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>No. of Orders</h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus">
                                    <input type="number" step="1" min="1"
                                        max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4"
                                        pattern="" inputmode="" id="jumlahBeli" onchange="hitungHarga({{ $barang }})">
                                        <input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <h4 id="hargaTotal">total bayar : Rp. 3000</h4>
                            <div class="main-border-button"><a href="#">Add To Cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
    <script>
        function hitungHarga(item) {
            const myjson = item;
            let hargasatuannya = myjson.hargaBarang;
            let jumlahBeli = document.getElementById("jumlahBeli").value;
            let total = parseInt(jumlahBeli) * hargasatuannya;
            document.getElementById("hargaTotal").textContent = "total bayar : Rp. " + total;
            // console.log(hargasatuannya,jumlahBeli,);
            
        }
    </script>
@endsection