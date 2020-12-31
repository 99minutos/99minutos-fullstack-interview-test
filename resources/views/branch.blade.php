@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="list-group" >
                @foreach ($data as $item)
                    <button  class="list-group-item list-group-item-action flex-column align-items-start" @click='click("{{ $item["sha"] }}")' data-toggle="modal" data-target="#exampleModal">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $item['commit']['author']['name'] }}</h5>
                        <small>{{ Carbon\Carbon::parse($item['commit']['author']['date'])->format('d-m-Y') }}</small>
                    </div>
                    <p class="mb-1">{{ Str::substr($item['commit']['message'], 0, 100) }} 
                        @if (strlen($item['commit']['message']) > 100)
                            ...                        
                        @endif
                    </p>
                    </button>
                @endforeach
              </div>
        </div>
    </div>
    <modal-commit 
        v-if="showModal"
        :sha="sha">
    </modal-commit>

@endsection
