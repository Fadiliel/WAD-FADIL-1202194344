@extends('templates.master')

@section('title') Home @endsection
@section('content')
<div class="container">
    <div class="mt-5 mb-5">
        <h1 class="text-center">ABOUT US</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/home-image.jpeg') }}" class="img-fluid rounded mx-auto d-block"
                alt="homepage image">
        </div>
        <div class="col-md-6">
            <p>Vaksin dibuat untuk mencegah penyakit. Vaksin COVID-19 adalah harapan terbaik untuk menekan penularan
                virus corona. Mendapatkan vaksin COVID-19 maka bisa melindungi tubuh dengan menciptakan respons antibodi
                di tubuh tanpa harus sakit karena virus corona. Vaksin COVID-19 mampu mencegah seseorang terkena virus
                corona. Atau, apabila kamu tertular COVID-19, vaksin dapat mencegah tubuh dari sakit parah atau potensi
                hadirnya komplikasi serius. Dengan mendapatkan vaksin, kamu juga akan membantu melindungi orang-orang di
                sekitar dari virus corona. Terutama orang-orang yang berisiko tinggi terkena penyakit parah akibat
                COVID-19.
            </p>
        </div>
    </div>
</div>
@endsection