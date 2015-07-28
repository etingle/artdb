@extends('_master')

@section('script')
<script>
$(function(){
    $("#front_page").hide().fadeIn(2000);
    
});
</script>
@stop
@section('content')
<div id="front_page">
<h1>Welcome to ArtDB</h1>
</div>
@stop
