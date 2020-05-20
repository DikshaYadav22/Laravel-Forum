@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header font-weight-bold">Add Channel</div>
    <div class="card-body">
        <form action="{{route('channels.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>

    </div>
</div>
    
@endsection