
<h2>Channels List</h2>

    @foreach($channels as $channel)
        {{ $channel->name }}<br>
        
        {{ $channel->slug }}
    @endforeach