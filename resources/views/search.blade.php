@extends('layouts.app')
@section('content')

<div class="container">
    <div class="py-5 text-center">
        <h1>Buscar universidade</h1>
    </div>
    <form method="get" action="{{ route('search') }}">
        <div class="d-flex justify-content-center mb-3">
            <div class="row mb-3">
                <div class="col-lg-9 col-sm-12">
                    <input class="form-control" type="search" name="search" placeholder="O que deseja pesquisar?">
                </div>
                <div class="col-lg-3 col-sm-12">
                    <button class="btn btn-success" type="submit">Pesquisar</button>
                </div>
            </div>
        </div>
    </form> 
    <div class="table-responsive">
        <table class="table table-hover mx-auto">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">País</th>
                    <th scope="col">Código</th>
                    <th scope="col">Estado/Província</th>
                    <th scope="col">Domínios</th>
                    <th scope="col">Sites</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @if(isset($results) && !empty($results))
                @foreach($results as $result)
                <tr>
                    <td>
                        {{$result['name']}}
                    </td>
                    <td>
                        {{($result['country'])}}
                    </td>
                    <td>
                        {{($result['alpha_two_code'])}}
                    </td>
                    <td>
                        {{($result['state-province'])}}
                    </td>
                    <td>
                        {{($result['domains'])}}
                    </td>
                    <td>
                        {{($result['web_pages'])}}
                    </td>
                        <td> 
                            <button class="btn btn-secondary inscribe" id="{{$result['id']}}" type="submit">Realizar inscrição</button>
                        </td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
</div>
    

<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            
            $('.inscribe').click(function() {

                var id = $(this).attr('id');

                $.ajax({
                type: "post",
                url: "{{ route('makeInscription') }}",
                dataType: "json",
                data: {'id':id},
                success: function(response){
                  
                        console.log(response)
                    } 
                });
                
                $(this).replaceWith('<p>Inscrição realizada!</p>'); 
            });
    });
           

</script>
@endsection
