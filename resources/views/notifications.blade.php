@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Notifications</div>
        <div class="card-body">
            @foreach($notifications as $notification)
                <div class="card">
                    <div class="card-header">
                        You have a new notification for <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}"> "{{$notification->data['discussion']['title']}}"</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
