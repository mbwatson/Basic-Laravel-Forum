<table width="100%">
    <tr>
        <td class="user-info hidden-xs" width="1%">
            <a href="{{ route('users.show', $post->user) }}"><img src="{{ Gravatar::get($post->user->email, ['size' => 55]) }}" class="avatar"></a>
        </td>
        <td width="70%">
            <div class="title">
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a><br>
            </div>
            <div class="meta">
                Posted: {{ $post->created_at->diffForHumans() }} by <a href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</a><br>
                Latest Activity: {{ $post->updated_at->diffForHumans() }}
            </div>
        </td>
        <td class="channel" style="min-width: 100px;">
            {!! $post->channel->colorBlock() !!}
            <a href="{{ route('posts.channel', $post->channel) }}">{{ $post->channel->title }}</a>
        </td>
        <td class="text-center" style="min-width: 50px;">
            {{ $post->comments->count() }}
        </td>
    </tr>
</table>