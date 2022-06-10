@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="row g-5">
        <h4 class="mb-2" style="text-align: center">Importar Universidade</h4>
        <form class="form-group" method="post" action="{{ route('import') }}">
            @csrf
                <button class="w-100 btn btn-primary btn-lg" type="submit">Importar</button>
        </form>
    </div>
</div>

@endsection
