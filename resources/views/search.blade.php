@extends('layouts.app')
@section('content')

<div class="container">
    <div class="py-5 text-center">
        <h1>Buscar universidade</h1>
    </div>
    <form method="get" action="{{ route('search') }}">
        <div class="d-flex justify-content-center mb-3">
            <div class="row mb-3">
                <div class="col-sm-9">
                    <input class="form-control" type="search" name="search" placeholder="O que deseja pesquisar?">
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </div>
            </div>
        </div>
    </form> 
</div>
<div class="d-flex m-4">
    <table class="table table-striped mx-auto" style="max-width: 80%">
        <thead>
            <tr>
                <th width=25%">Nome</th>
                <th width=10%">País</th>
                <th width=5%">Código</th>
                <th width=15%">Estado/Província</th>
                <th width=15%">Domínios</th>
                <th width=15%">Sites</th>
                <th width=10%"></th>
            </tr>
        </thead>
        <tbody>
        @if(isset($query))
            @foreach($query as $value)
            <tr>
                <td>
                    {{$value['name']}}
                </td>
                <td>
                    {{($value['country'])}}
                </td>
                <td>
                    {{($value['alpha_two_code'])}}
                </td>
                <td>
                    {{($value['state-province'])}}
                </td>
                <td>
                    {{($value['domains'])}}
                </td>
                <td>
                    {{($value['web_pages'])}}
                </td>
                {{-- <form method="post" action="{{ route('inscription') }}"> --}}
                    @csrf
                   
                    <td id="{{$value['name']}}">
                        <input type="hidden" name="data" value="{{$value}}">
                        <button class="btn btn-outline-secondary" id="{{$value['id']}}" type="submit">Inscrever-se</button>
                    </td>
                    
                {{-- </form> --}}
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</div>

</div>
    

<script type="text/javascript">
    $(document).ready(function() {

        $("button").click(function () {
            $(this).hide();
            $("td").html('<p style="color: #50d149">Inscrição realizada!</p>');
        });
    });

</script>
@endsection
