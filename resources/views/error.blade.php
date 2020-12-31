@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                @if (session('code'))
                    <h5 class="card-header">Error {{ session('code') }}</h5>
                @endif
                @if (session('message'))
                    <div class="card-body">
                        <p class="card-text">{{ session('message') }}</p>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
@endsection