@extends('layouts.app')

@section('content')
    <form method="POST" action="/pull-request" id="form">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Leave a comment</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Leave a comment" rows="3" name="comment"></textarea>
        </div>
        <div class="form-group">
            <label for="head">Head</label>
            <select class="form-control" id="head" name="head">
                @foreach ($data as $item)
                    <option>{{ $item['name'] }}</option>    
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="base">Base</label>
            <select class="form-control" id="base" name="base">
                @foreach ($data as $item)
                    <option>{{ $item['name'] }}</option>    
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary mb-2" name="create" value="Create" onclick="validaDatos()"/>
        <input type="submit" class="btn btn-primary mb-2" name="merge" value="Create and merge" onclick="validaDatos()"/>
    </form>

@endsection

<script>
    function validaDatos(){
        if(document.getElementById('title').value == ''){
            alert('Complete todos los campos.');
            event.preventDefault();
        }
        else if (document.getElementById('head').value == document.getElementById('base').value){
            alert('Head y Base tienen que ser diferentes.');
            event.preventDefault();  
        } 
        
    }
</script>