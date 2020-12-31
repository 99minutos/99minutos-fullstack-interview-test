@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <ul  class="list-group ">
                @foreach ($data as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="cursor: pointer" @click='clickPull("{{ $item["number"] }}")'   data-toggle="modal" data-target="#exampleModal">
                        <div>
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $item['title'] }}</h5>
                                <small>{{ $item['user']['login'] }}</small>
                            </div>
                            <p class="mb-1">{{ Str::substr($item['body'], 0, 100) }} 
                                @if (strlen($item['body']) > 100)
                                    ...                        
                                @endif
                            </p>   
                        </div>
                        @if ($item['state'] == 'open')
                            <span class="btn btn-primary btn-sm mr-2">open</span>    
                        @elseif ($item['merged_at'] != null)
                            <span class="btn btn-warning     btn-sm mr-2">merged</span>   
                        @elseif ($item['state'] == 'closed')
                            <span class="btn btn-danger btn-sm mr-2">closed</span>                                
                        @endif
                        
                        @if ($item['state'] == 'open')
                            <a class="btn btn-danger btn-sm" href="/pull-request-close/{{ $item['number'] }}" role="button">Cerrar</a>
                        @endif
                    </li>
                @endforeach
            </ul >
        </div>
    </div>

    <modal-pull 
        v-if="showModal"
        :number=number>
    </modal-pull>
    
@endsection
