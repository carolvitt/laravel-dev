@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row g-5">
        <h4 class="mb-2">Adicionar Universidade</h4>
        <form class="needs-validation" novalidate>
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="firstName" class="form-label">Código</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                </div>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
                <div class="col-auto">
                    <label for="lastName" class="form-label">País</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                </div>
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="firstName" class="form-label">Domínio</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                </div>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
                <div class="col-auto">
                    <label for="lastName" class="form-label">Nome</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                </div>
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <label for="lastName" class="form-label">Site</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                </div>
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
                <div class="col-auto">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
