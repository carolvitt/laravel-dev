@extends('layouts.app')
@section('content')

<div class="container">
      <div class="py-5 text-center">
          <h1>Minhas inscrições</h1>
      </div>
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
            @if(isset($results))
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
                            <button class="btn btn-secondary inscribe" id="{{$result['university_id']}}" type="submit">Remover inscrição</button>
                        </td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){
        
       
        $('.inscribe').click(function() {
    
            var id = $(this).attr('id');
            
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                
                
            $.ajax({
                type: "post",
                url: "{{ route('removeInscription') }}",
                dataType: "json",
                data: {'id':id},
                success: function(response){
                    console.log(response);
                }
            });
            
            $(this).replaceWith('<p>Inscrição removida!</p>'); 

        });

    });
</script>
@endsection