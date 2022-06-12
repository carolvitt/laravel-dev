@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="row g-5 text-center">
        <h4 class="mb-2">Importar Universidade</h4>
        @if (Session::has('created'))
            
        <p>Universidades importadas com sucesso!</p>
        @else
        <form class="form-group" method="post" action="{{ route('import') }}">
            @csrf
            <button class="w-100 btn btn-primary btn-lg" type="submit">Importar</button>
        </form>
        
        @endif
    </div>
</div>

@endsection
