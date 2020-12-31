@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="list-group ">
                @foreach ($data as $item)
                    <a href="/branch/{{ $item['commit']['sha'] }}" class="list-group-item list-group-item-action">
                    {{ $item['name'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection