@extends('layouts.app')

@section('content')
    <div class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/cover1.png" class="carousel-image img-fluid"
                                    alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>ตรวจทุเรียน</h1>

                                    <p>RBRU</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="images/cover2.png"
                                    class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>CSIT RBRU</h1>

                                    <p>มหาลัยราชภัฎรำไรพรรณี</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="images/cover3.png"
                                    class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>ลิงกินทุเรียน</h1>

                                    <p>เคยเห็นไหม ลิงกินทุเรียน</p>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">


        <div class="section-padding">
            <div class="row">

                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h2 class="mb-5">ยินดีต้อนรับ</h2>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="{{route('showcreate')}}" class="d-block">
                            <img src="images/icons/digital-signature.png" class="featured-block-image img-fluid" alt="" width="200px">

                            <p class="featured-block-text">ลง <strong>ทะเบียน</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="{{route('info')}}" class="d-block">
                            <img src="images/icons/ssl.png" class="featured-block-image img-fluid" alt="" width="200px">

                            <p class="featured-block-text"><strong>ดู</strong>ข้อมูลของคุณ</p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="#" class="d-block">
                            <img src="images/icons/check.png" class="featured-block-image img-fluid" alt="" width="200px">

                            <p class="featured-block-text">ตรวจสอบ<strong>สถานะ</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="images/icons/certificate-authority.png" class="featured-block-image img-fluid" alt="" width="200px">

                            <p class="featured-block-text"><strong>แก้ไข</strong>ข้อมูลของคุณ</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
