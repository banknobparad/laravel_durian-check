@extends('layouts.app')

@section('title', '403 Forbidden')

@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <img src="{{ asset('images/error-outline.svg') }}" width="230" height="230"
                    class="d-inline-block align-top" alt="">
                <h1 class="display-4">420</h1>
                <p class="lead">คุณไม่ได้รับอนุญาตให้เข้าถึงหน้านี้นะ </p>
            </div>
        </div>
    </div>
@endsection
