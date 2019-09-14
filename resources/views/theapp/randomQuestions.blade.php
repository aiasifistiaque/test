@extends('templates.template')
@section('title','SSC BM')
@section('body')
<div id="app" class="container">
    <h3>Solve Random Questions</h3>
    <random-question :userid = {{Auth::user()->id}} ></random-question>
</div>
@endsection