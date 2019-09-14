@extends('templates.template')
@section('title','home')
@section('body')
<div id="app" class="container">
    <h2>Homepage</h2>
    <hr>
    <br>
    <a type="button" href="#" class="btn btn-primary btn-block">SSC English Version</a>
    <br>
    <a type="button" href="{{ url('app/sscbangla') }}" class="btn btn-primary btn-block">SSC Bangla Version</a>
</div>
@endsection