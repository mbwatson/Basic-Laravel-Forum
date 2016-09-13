<div class="form-group">
    {{ Form::select('channel_id', $channels, isset($post) ? $post->channel_id : null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) }}
</div>
<div class="form-group">
    {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter Body']) }}
</div>
<div class="form-group">
    {{ Form::submit('Save Post', ['class' => 'btn btn-primary']) }}
</div>
