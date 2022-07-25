@extends('web.master')
@section('content')
    
    @include('web.partition.banner')
    
    <section>
        <div class="container">
            <h3 class="mb-3">Favorit Saya</h3>
        </div>
    </section>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="row col-xl-9 nopadding" id="card-product-by-kategori">
                    @foreach ($favorit as $p)
                    <div class="card-kategori col-xl-4 col-6">
                        <a href="{{ url('produk/' . $p->id_produk) }}" class="text-decoration-none">
                            <div class="card mb-3">
                                <img src="{{ asset('assets/admin/foto_produk/' . $p->foto_produk) }}" class="card-img-top h-75 h-75" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-black">{{ $p->nama_produk }}</h5>
                                    <div class="d-inline-flex mb-2">
                                        <span class="card-text text-secondary  text-decoration-line-through me-2">Rp. {{ number_format($p->harga) }}</span>
                                        {{-- <span class="text-danger d-inline rounded-2 px-2" style="background-color: rgba(239, 42, 54, 0.1);"> {{ ($p->potongan_harga/$p->harga)*100 }} %</span>  --}}
                                    </div>
                                    <p class="card-text fs-5 cai-color-text mb-3">Rp. {{ number_format($p->harga - $p->potongan_harga) }} <span class="text-secondary"> / 1 {{ $p->nama_satuan }}</span></p>
                                    <a href="#" class="btn cai-color-text cai-border w-100">+ Keranjang</a>
                                    
                                    <a href="{{ url('favorit/' . $p->id_produk) }}" class="position-absolute top-0 end-0 m-3"> 
                                        <i class="tombol-like bi bi-heart-fill fs-3 text-secondary"></i>
                                    </a>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>

    
    
@endsection