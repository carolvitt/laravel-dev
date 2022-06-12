@extends('layouts.app')
@section('content')

<div class="container">
      <div class="py-5 text-center">
          <h1>Minhas inscrições</h1>
      </div>
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
             {{-- @php
                 var_dump($query);
                 die();
             @endphp --}}
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
                  {{-- <form method="post" action="{{ route('/') }}"> --}}
                        {{-- @csrf --}}
                      <td>
                          <button class="btn btn-outline-secondary inscribe" id="{{$result['id']}}" type="submit">Remover inscrição</button>
                      </td>
                  {{-- </form> --}}
              </tr>
              @endforeach
          </tbody>
          @endif
      </table>
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