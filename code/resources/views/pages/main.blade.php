@extends('index')

@section('content')
<form>
    <div class="mb-3">
        <input type="text" class="form-control" id="name" placeholder="Name...">
    </div>
    <div class="mb-3">
        <textarea class="form-control" id="message" row="7" placeholder="Message..."></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send ticket</button>
</form>
@stop