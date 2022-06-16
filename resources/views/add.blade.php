@extends('layouts.app')
@section('content')
@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif
<div class="container">
    <div class="row py-5 justify-content-center text-center">
        <div class="col-md-8">
            <h1>Adicionar sugestão de universidade</h1>
            <div class="card mt-3">
                <div class="card-body">
                    <form method="POST" action="{{ route('add') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome da universidade(*)') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Código do país') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('País') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="domains" class="col-md-4 col-form-label text-md-end">{{ __('Domínios') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="domains" value="{{ old('domains') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="web_pages" class="col-md-4 col-form-label text-md-end">{{ __('Sites') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="web_pages" value="{{ old('web_pages') }}">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Adicionar sugestão') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
