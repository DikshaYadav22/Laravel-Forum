@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <img src="{{asset('storage/'.$discussion->user->image)}}" width="50" height="50" style="border-radius:50%" alt="">
           <strong>{{$discussion->user->name}}</strong>
        </div>
        <div class="card-body">
            <h6>{{$discussion->title}}</h6><hr>
            {!! $discussion->content !!}
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    Replies...
                </div>
                <div class="card-body">
                    <div class="card">
                        @foreach($discussion->replies as $reply)
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <img src=" {{asset('storage/' .$reply->user->image)}} "  width="30" height="30" alt="">
                                        <span class="ml-2">{!! $reply->content !!}</span>
                                    </div>
                                    <div>
                                        <form action="{{route('reply.destroy', [$discussion->slug, $reply->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header ">Reply</div>
        <div class="card-body"> 
            
            @auth
                <form action="{{ route('reply.store', $discussion->slug)}}" method="POST">
                    @csrf
                    <input type="hidden" name="reply" id="reply">
                    <trix-editor input="reply"></trix-editor>
                    <button class="btn btn-secondary" type="submit">Add</button> 
                </form>
            @else
                <a href="{{ route('login')  }}" class="btn btn-primary">Sign in to add a reply</a>
            @endauth
        </div>
    </div>
@endsection

@section('css') 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection