{{-- semua view yang dibuat didalam folder web harus di extend kan dengan file master --}}
@extends('web.master')
@section('content')

    <!-- CAROUSEL BANNER -->
    @include('web.partition.banner')
    <!-- END OF CAROUSEL BANNER -->

    <!-- Pilih Lokasi Pasar dan Banner add Kecil -->
    @include('web.pembeli.beranda.pasar')
    <!-- End of Pilih Lokasi Pasar dan Banner add Kecil -->

    <!-- KATEGORI SECTION -->
    @include('web.partition.kategori')
    <!-- END KATEGORI SECTION -->

    <!-- ADS BANNER 2 -->
    <section class="mt-4 mt-xl-5">
        <div class="container">
            <div class="row justify-content-evenly align-items-center">
                <div class="col-xl-6 mb-xl-0 mb-3">
                    <a href="#">
                        <div class="text-white position-relative text-start fw-bold">
                            <div class="position-absolute top-50 start-50 translate-middle d-flex fw-bold ">
                                <p class="">Menyambut Kemerdekaan Indonesia</p>
                                <div class="vr mx-2"></div>
                                <p>Diskon s/d 75%</p>
                            </div>
                            <img class="w-100" src="{{ asset('assets/blanjaloka/img/buahs-exp.png') }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-xl-5 col-12">
                    <a href="#">
                        <div class="text-white position-relative text-center fw-bold ">
                            <p class="position-absolute top-50 start-50 translate-middle fs-xl-2">Dapatkan Voucer gratis
                                ongkir hanya dengan login pada bulan AGUSTUS</p>
                            <img class="w-100" src="{{ asset('assets/blanjaloka/img/modern-market.png') }}"
                                alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF ADS BANNER 2 -->

    <!-- PROMO BULAN AGUSTUS SECTION -->
    <section id="promo-agustus">
        <div class="container">
            <div class="row mb-2">
                <h5 class="col-6">Promo Bulan Agustus</h5>
                <div class="col-6 text-end">
                    <a class="link-text" href="#">
                        <span class="">Lihat Semua</span>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-6">
                    <a href="product.html" class="text-decoration-none text-black">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/semangka.svg') }}"
                                class="card-img-top m-1 h-75 h-75" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Semangka Palembang</h5>
                                <p class="card-text text-danger fw-bold text-decoration-line-through">Rp.30.000</p>
                                <p class="card-text fs-5 fw-bold cai-color-text mb-1">Rp.21.000/1 buah </p>
                                <a href="#" class="btn cai-color text-white w-100">+ Keranjang</a>
                                <div class="disc-rounded position-absolute top-0 end-0 text-danger m-2">
                                    <span class="fw-bold">12%</span>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-6">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/kangkung.svg') }}" class="card-img-top m-1 h-75"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Kangkung</h5>
                                <p class="card-text text-danger fw-bold text-decoration-line-through">Rp.14.000</p>
                                <p class="card-text fs-5 fw-bold cai-color-text mb-1">Rp.7.000/2 ikat </p>
                                <a href="#" class="btn cai-color text-white w-100">+ Keranjang</a>
                                <div class="disc-rounded position-absolute top-0 end-0 text-danger m-2">
                                    <span class="fw-bold">50%</span>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-6">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/durian.svg') }}" class="card-img-top m-1 h-75"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Durian</h5>
                                <p class="card-text text-danger fw-bold text-decoration-line-through">Rp.75.000</p>
                                <p class="card-text fs-5 fw-bold cai-color-text mb-1">Rp.53.000/1 buah </p>
                                <a href="#" class="btn cai-color text-white w-100">+ Keranjang</a>
                                <div class="disc-rounded position-absolute top-0 end-0 text-danger m-2">
                                    <span class="fw-bold">23%</span>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-6">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/pisang.svg') }}" class="card-img-top m-1 h-75"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pisang</h5>
                                <p class="card-text text-danger fw-bold text-decoration-line-through">Rp.25.000</p>
                                <p class="card-text fs-5 fw-bold cai-color-text mb-1">Rp.16.000/1 kg </p>
                                <a href="#" class="btn cai-color text-white w-100">+ Keranjang</a>
                                <div class="disc-rounded position-absolute top-0 end-0 text-danger m-2">
                                    <span class="fw-bold">18%</span>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            </duv>
        </div>
    </section>
    <!-- END OF PROMO BULAN AGUSTUS SECTION -->

    <!-- PRODUK TERLARIS BULAN AGUSTUS SECTION -->
    <section id="produk-terlaris">
        <div class="container">
            <div class="row mb-2">
                <h5 class="col-6">Produk Terlaris Bulan Agustus</h5>
                <div class="col-6 text-end">
                    <a class="link-text" href="#">
                        <span class="">Lihat Semua</span>
                    </a>
                </div>
            </div>

            <duv class="row">
                <div class="col-xl-3 col-6">
                    <a href="product.html" class="text-decoration-none">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/semangka.svg') }}"
                                class="card-img-top m-1 h-75 h-75" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-black">Semangka Palembang</h5>
                                <div class="d-inline-flex mb-2">
                                    <span
                                        class="card-text text-secondary  text-decoration-line-through me-2">Rp.30.000</span>
                                    <span class="text-danger d-inline rounded-2 px-2"
                                        style="background-color: rgba(239, 42, 54, 0.1);">-20%</span>
                                </div>
                                <p class="card-text fs-5 fw-bold cai-color-text">Rp.21.000/1 buah </p>
                                <a href="#" class="position-absolute top-0 end-0 m-3">
                                    <i class="tombol-like bi bi-heart fs-3 text-secondary"></i>
                                </a>
                                <p class="mt-2">2RB+terjual</p>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-6 ">
                    <a href="#" class="text-decoration-none">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/kangkung.svg') }}" class="card-img-top m-1 h-75"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-black">Kangkung</h5>
                                <div class="d-inline-flex mb-2">
                                    <span
                                        class="card-text text-secondary  text-decoration-line-through me-2">Rp.30.000</span>
                                    <span class="text-danger d-inline rounded-2 px-2"
                                        style="background-color: rgba(239, 42, 54, 0.1);">-20%</span>
                                </div>
                                <p class="card-text fs-5 fw-bold cai-color-text">Rp.7.000/2 ikat </p>
                                <a href="#" class="position-absolute top-0 end-0 m-3">
                                    <i class="tombol-like bi bi-heart fs-3 text-secondary"></i>
                                </a>
                                <p class="mt-2">2RB+terjual</p>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/durian.svg') }}" class="card-img-top m-1 h-75"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-black">Durian</h5>
                                <div class="d-inline-flex mb-2">
                                    <span
                                        class="card-text text-secondary  text-decoration-line-through me-2">Rp.30.000</span>
                                    <span class="text-danger d-inline rounded-2 px-2"
                                        style="background-color: rgba(239, 42, 54, 0.1);">-20%</span>
                                </div>
                                <p class="card-text fs-5 fw-bold cai-color-text">Rp.53.000/ 1 buah </p>
                                <a href="#" class="position-absolute top-0 end-0 m-3">
                                    <i class="tombol-like bi bi-heart fs-3 text-secondary"></i>
                                </a>
                                <p class="mt-2">2RB+terjual</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-6">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/pisang.svg') }}" class="card-img-top m-1 h-75"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-black">Pisang</h5>
                                <div class="d-inline-flex mb-2">
                                    <span
                                        class="card-text text-secondary  text-decoration-line-through me-2">Rp.30.000</span>
                                    <span class="text-danger d-inline rounded-2 px-2"
                                        style="background-color: rgba(239, 42, 54, 0.1);">-20%</span>
                                </div>
                                <p class="card-text fs-5 fw-bold cai-color-text">Rp.16.000/ 1 kg </p>
                                <a href="#" class="position-absolute top-0 end-0 m-3">
                                    <i class="tombol-like bi bi-heart fs-3 text-secondary"></i>
                                </a>
                                <p class="mt-2">2RB+terjual</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/semangka.svg') }}"
                                class="card-img-top m-1 h-75 h-75" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-black">Semangka Palembang</h5>
                                <div class="d-inline-flex mb-2">
                                    <span
                                        class="card-text text-secondary  text-decoration-line-through me-2">Rp.30.000</span>
                                    <span class="text-danger d-inline rounded-2 px-2"
                                        style="background-color: rgba(239, 42, 54, 0.1);">-20%</span>
                                </div>
                                <p class="card-text fs-5 fw-bold cai-color-text">Rp.21.000/1 buah </p>
                                <a href="#" class="position-absolute top-0 end-0 m-3">
                                    <i class="tombol-like bi bi-heart fs-3 text-secondary"></i>
                                </a>
                                <p class="mt-2">2RB+terjual</p>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/kangkung.svg') }}" class="card-img-top m-1 h-75"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-black">Kangkung</h5>
                                <div class="d-inline-flex mb-2">
                                    <span
                                        class="card-text text-secondary  text-decoration-line-through me-2">Rp.30.000</span>
                                    <span class="text-danger d-inline rounded-2 px-2"
                                        style="background-color: rgba(239, 42, 54, 0.1);">-20%</span>
                                </div>
                                <p class="card-text fs-5 fw-bold cai-color-text">Rp.7.000/2 ikat </p>
                                <a href="#" class="position-absolute top-0 end-0 m-3">
                                    <i class="tombol-like bi bi-heart fs-3 text-secondary"></i>
                                </a>
                                <p class="mt-2">2RB+terjual</p>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/durian.svg') }}" class="card-img-top m-1 h-75"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-black">Durian</h5>
                                <div class="d-inline-flex mb-2">
                                    <span
                                        class="card-text text-secondary  text-decoration-line-through me-2">Rp.30.000</span>
                                    <span class="text-danger d-inline rounded-2 px-2"
                                        style="background-color: rgba(239, 42, 54, 0.1);">-20%</span>
                                </div>
                                <p class="card-text fs-5 fw-bold cai-color-text">Rp.53.000/ 1 buah </p>
                                <a href="#" class="position-absolute top-0 end-0 m-3">
                                    <i class="tombol-like bi bi-heart fs-3 text-secondary"></i>
                                </a>
                                <p class="mt-2">2RB+terjual</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-6">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="card mb-3">
                            <img src="{{ asset('assets/blanjaloka/img/pisang.svg') }}" class="card-img-top m-1 h-75"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-black">Pisang</h5>
                                <div class="d-inline-flex mb-2">
                                    <span
                                        class="card-text text-secondary  text-decoration-line-through me-2">Rp.30.000</span>
                                    <span class="text-danger d-inline rounded-2 px-2"
                                        style="background-color: rgba(239, 42, 54, 0.1);">-20%</span>
                                </div>
                                <p class="card-text fs-5 fw-bold cai-color-text">Rp.16.000/ 1 kg </p>
                                <a href="#" class="position-absolute top-0 end-0 m-3">
                                    <i class="tombol-like bi bi-heart fs-3 text-secondary"></i>
                                </a>
                                <p class="mt-2">2RB+terjual</p>
                            </div>
                        </div>
                    </a>
                </div>
            </duv>
        </div>
    </section>
    <!-- END OF PRODUK TERLARIS PROMO BULAN AGUSTUS SECTION -->



    <!-- RESEP SECTION -->
    <section id="resep-section">
        <div class="container ">
            <div class="row mb-2">
                <h5 class="col-6">Resep by Blanjaloka</h5>
                <div class="col-6 text-end">
                    <a class="link-text" href="resep.html">
                        <span class="">Lihat Semua</span>
                    </a>
                </div>
            </div>

            <div class="d-flex" style="overflow-x: scroll;">
                <div class="col-6 col-xl-5 p-2 mb-2">
                    <a href="detail-resep.html">
                        <div class="card text-white border-r-sip overflow-hidden">
                            <img src="{{ asset('assets/blanjaloka/img/rsp-ayam-kemangi.svg') }}" class="card-img"
                                alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title position-absolute bottom-0 fs-1 mb-4">Resep <span
                                        class="d-block">Ayam Kemangi</span> </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-5 p-2">
                    <a href="#">
                        <div class="card text-white border-r-sip overflow-hidden">
                            <img src="{{ asset('assets/blanjaloka/img/rsp-soto-betawi.svg') }}" class="card-img"
                                alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title position-absolute bottom-0 fs-1 mb-4">Resep <span
                                        class="d-block">Soto Betawi</span> </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-5 p-2">
                    <a href="#">
                        <div class="card text-white border-r-sip overflow-hidden">
                            <img src="{{ asset('assets/blanjaloka/img/rsp-lontong-sayur-padang.svg') }}"
                                class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title position-absolute bottom-0 fs-1 mb-4">Resep <span
                                        class="d-block">Lontong Sayur Padang</span></h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF RESEP SECTION -->

@endsection
