@extends('index')

@section('content')
<form>
    <div class="mb-3">
        <input type="text" class="form-control" id="name" placeholder="Name...">
    </div>
    <button type="submit" class="btn btn-primary">Send ticket</button>
</form>
@stop