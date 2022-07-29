@extends('index')

@section('content')
<form>
    <div class="mb-3">
        <input type="text" class="form-control" id="name" placeholder="Name...">
    </div>
    <div class="mb-3">
    <input type="email" class="form-control" id="email" placeholder="Email...">
    </div>
    <div class="mb-3">
        <textarea class="form-control" id="message" row="7" placeholder="Message..."></textarea>
    </div>
    <button type="button" id="sendTicket" class="btn btn-primary">Send ticket</button>
</form>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/tickets.js"></script>
@stop