<div class="form-group">
    {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'I\'ve got something to say!']) }}
</div>
<div class="form-group">
    {{ Form::submit('Post Comment', ['class' => 'btn btn-primary']) }}
</div>
{{ Form::hidden('post_id', $post->id) }}