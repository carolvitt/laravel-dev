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
                 var_dump($data['name']);
                 die();
             @endphp --}}
          @if(isset($data) and !empty($data))
             
              <tr>
                  <td>
                      {{$data['name']}}
                  </td>
                  <td>
                      {{($data['country'])}}
                  </td>
                  <td>
                      {{($data['alpha_two_code'])}}
                  </td>
                  <td>
                      {{($data['state-province'])}}
                  </td>
                  <td>
                      {{($data['domains'])}}
                  </td>
                  <td>
                      {{($data['web_pages'])}}
                  </td>
                  {{-- <form method="post" action="{{ route('/') }}"> --}}
                        {{-- @csrf --}}
                      <td>
                          {{-- <input type="hidden" value="{{$value['id']}}"> --}}
                          <button class="btn btn-outline-secondary" type="submit" onclick="removeInscription()">Remover inscrição</button>
                      </td>
                  {{-- </form> --}}
              </tr>
           
          </tbody>
          @endif
      </table>
      </div>

@endsection
<script>
      $(document).ready(function(){
  
      )};
</script>