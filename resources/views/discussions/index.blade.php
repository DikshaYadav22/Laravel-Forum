@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>Discussions</h4>
                @auth
                <a href=" {{route('discussions.create')}} " class="btn btn-primary">Add Discussion</a>
                @endauth
            </div> 
        </div>
        <div class="card-body">
            @foreach($discussions as $discussion) 
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">
                            
                                <img src="{{ asset('storage/' .$discussion->user->image) }}" style="border-radius:50%;" width="30" height="30" alt="">
                                {{ $discussion->user->name }}
                            
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <strong> <a href=" {{route('discussions.show', $discussion->slug)}} "> {{ $discussion->title }}</a></strong>
                    </div>
                </div>
            @endforeach

            {{ $discussions->appends(['channel' => request()->query('channel') ])->links() }}
            </div>
        </div>
@endsection
