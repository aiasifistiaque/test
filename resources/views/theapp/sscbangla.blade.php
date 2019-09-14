@extends('templates.template')
@section('title','SSC BM')
@section('body')
<div id="app" class="container">
    <h2>SSC Preparation for Bengali Medium Students</h2>
    <hr>
    <br>
    <a type="button" class="btn btn-primary btn-block" href="{{ url('app/randomquestion') }}">Solve Random Questions</a>
    <br>
    <a type="button" class="btn btn-primary btn-block" href="#">Solve Board Questions</a>
    <br>
    <a type="button" class="btn btn-primary btn-block" href="#">Solve School Questions</a>
</div>
@endsection