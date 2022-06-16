@extends('layouts.ui')
@section('css')
<style>
  body {
    
    background-image: url('../public/img/bg.png');
    background-size: cover;
  }
  footer {
    margin-top:100px;
  }

  </style>
@endsection
@section('content')
<div class="d-flex justify-content-end p-4 mx-4 my-2">       
<div class="text-center m-5 p-5">
    <h1 class="display-4 fw-normal" style="color:white; text-shadow: black 0.1em 0.1em 0.2em">Seja bem-vindo(a)!</h1>
    <p class="lead fw-normal" style="color:white; text-shadow: black 0.1em 0.1em 0.2em">Neste portal, você terá acesso às melhores<br> universidades dos Estados Unidos.</p>
</div>
</div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>


@endsection

