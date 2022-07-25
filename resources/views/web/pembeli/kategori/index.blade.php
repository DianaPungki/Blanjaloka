@extends('web.master')
@section('content')
    
    <!-- CAROUSEL BANNER -->
    @include('web.partition.banner')
    <!-- END OF CAROUSEL BANNER -->

    <div class="container">
        <div class="row">

            <!-- FILTER SECTION -->
            <div class="col-xl-3" id="filter-section">
                <a class="fw-bold text-decoration-none text-black" id="control-collapse-filter" data-bs-toggle="collapse" href="#collapse-filter" aria-expanded="false" aria-controls="collapse-filter">
                    Filter
                </a>
                <div>
                    <P>penilaian</P>
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex fs-5" style="color: #FFB813;">
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                        </div>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex fs-5" style="color: #FFB813;">
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <span class="text-secondary fs-6 align-self-center">dan ke atas</span>
                        </div>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex fs-5" style="color: #FFB813;">
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <span class="text-secondary fs-6 align-self-center">dan ke atas</span>
                        </div>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex fs-5" style="color: #FFB813;">
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <span class="text-secondary fs-6 align-self-center">dan ke atas</span>
                        </div>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex fs-5" style="color: #FFB813;">
                            <i class="bi bi-star-fill me-3"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <i class="bi bi-star-fill me-3 text-secondary-light"></i>
                            <span class="text-secondary fs-6 align-self-center">dan ke atas</span>
                        </div>
                    </a>
    
                    <hr>
    
                    <h5 class="fs-6 fw-bold">Harga</h5>
                    <input class="form-control border-r-sip mb-2 py-2" type="text" placeholder="Harga Minimum" aria-label="default input example">
                    <input class="form-control border-r-sip mb-2 py-2" type="text" placeholder="Harga Maksimum" aria-label="default input example">
                 </div>
                </div>
             <!-- END OF FILTER SECTION -->

             <script>
                if ($(document).width() <= 988){
                //Munculkan fitur collapse jika diakses di browser mobile
                console.log($("filter-section"));
                $("#filter-section div").addClass("collapse");
                $("#filter-section div").attr("id","collapse-filter");
                $("#control-collapse-filter").addClass("btn");
                $("#control-collapse-filter").addClass("cai-color");
                $("#control-collapse-filter").addClass("text-white");
                }
             </script>
             
            
             <!-- CARD PRODUCT -->
             
            <div class="row col-xl-9 nopadding" id="card-product-by-kategori">
                <div class="d-flex flex-wrap align-items-center mb-2 p-2 align-items-center">
                     <h5 class="fs-6"><span class="cai-color-text">{{ $countkategori }}</span> produk {{ $getkategori->nama_kategori }} ditemukan</h5>
                    <div class="d-inline-flex ms-xl-auto align-items-center">
                        <h5 class="fs-6 me-2">Urutkan</h5>
                        <select class="form-select border-r-sip">
                            <option value="1">Paling Sesuai</option>
                            <option selected>Terbaru</option>
                            <option value="2">Harga Terendah</option>
                            <option value="3">Harga Tertinggi</option>
                            <option value="4">Ulasan Terbaik</option>
                          </select>
                    </div>
                </div>
                
                @foreach ($produkkategori as $p)
                    <div class="card-kategori col-xl-4 col-6">
                        <a href="{{ url('produk/' . $p->id_produk) }}" class="text-decoration-none">
                            <div class="card mb-3">
                                <img src="{{ asset('assets/admin/foto_produk/' . $p->foto_produk) }}" class="card-img-top h-75 h-75" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-black">{{ $p->nama_produk }}</h5>
                                    <div class="d-inline-flex mb-2">
                                        <span class="card-text text-secondary  text-decoration-line-through me-2">Rp. {{ number_format($p->harga) }}</span>
                                        <span class="text-danger d-inline rounded-2 px-2" style="background-color: rgba(239, 42, 54, 0.1);"> {{ ($p->potongan_harga/$p->harga)*100 }} %</span> 
                                    </div>
                                    <p class="card-text fs-5 cai-color-text mb-3">Rp. {{ number_format($p->harga - $p->potongan_harga) }} <span class="text-secondary"> / 1 {{ $p->nama_satuan }}</span></p>
                                    <a href="{{ url('keranjang/'. $p->id_produk) }}" class="btn cai-color-text cai-border w-100">+ Keranjang</a>
                                    {{-- {{ 'web=' . $p->id_produk . ' favorit=' . $favproduk . ' favorit=' . $favuser . ' login=' . session()->get('id_users') }} --}}
                                   @if ($p->id_produk == $favproduk && $favuser == session()->get('id_users'))
                                        <a href="{{ url('favorit/' . $p->id_produk) }}" class="position-absolute top-0 end-0 m-3"> 
                                        <i class="tombol-like bi bi-heart-fill fs-3 text-secondary"></i>
                                    @else
                                        <a href="{{ url('favorit/' . $p->id_produk) }}" class="position-absolute top-0 end-0 m-3"> 
                                        <i class="tombol-like bi bi-heart fs-3 text-secondary"></i>                                        
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                

                 <!-- PAGINATION -->
                 <section id="pagination">
                     <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-5">
                          <li class="page-item">
                            <a class="p-2 pb-1 text-decoration-none text-secondary" href="#" aria-label="Previous">
                              <span class="bi bi-chevron-left" aria-hidden="true"></span>
                            </a>
                          </li>
                          <li class="page-item"><a class="p-2 pb-1 text-decoration-none text-secondary page-active" href="#">1</a></li>
                          <li class="page-item"><a class="p-2 pb-1 text-decoration-none text-secondary" href="#">2</a></li>
                          <li class="page-item"><a class="p-2 pb-1 text-decoration-none text-secondary" href="#">3</a></li>
                          <li class="page-item"><a class="p-2 pb-1 text-decoration-none text-secondary" href="#">4</a></li>
                          <li class="page-item"><a class="p-2 pb-1 text-decoration-none text-secondary" href="#">5</a></li>
                          <li class="page-item"><a class="p-2 pb-1 text-decoration-none text-secondary" href="#">6</a></li>
                          <li class="page-item"><a class="p-2 pb-1 text-decoration-none text-secondary" href="#">7</a></li>
                          <li class="page-item"><a class="p-2 pb-1 text-decoration-none text-secondary" href="#">8</a></li>
                          <li class="page-item">...</li>
                          <li class="page-item"><a class="p-2 pb-1 text-decoration-none text-secondary" href="#">200</a></li>
                          <li class="page-item">
                            <a class="p-2 pb-1 text-decoration-none text-secondary" href="#" aria-label="Next">
                              <span class="bi bi-chevron-right" aria-hidden="true"></span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                 </section>
                 <!-- END OF PAGINATION -->
            </div>
        </div>
    </div>

@endsection