@extends('templates.template')
@section('title','Add a Question')
@section('body')
<br><br>
<div class="container">
    <form method="POST" action='/addaquestion' enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="question">Enter the question here</label>
        <textarea name="question" id="question" cols="2" rows="2" class="form-control" required></textarea><br>
        <input type="text" name="optionOne" id="optionOne" class="form-control" placeholder="option A" required><br>
        <input type="text" name="optionTwo" id="optionTwo" class="form-control" placeholder="option B" required><br>
        <input type="text" name="optionThree" id="optionThree" class="form-control" placeholder="option C" required><br>
        <input type="text" name="optionFour" id="optionFour" class="form-control" placeholder="option D" required><br>
        <label for="correctAnswer">Please type in the correct answer below</label>
        {{-- <input type="text" name="correctAnswer" id="correctAnswer" class="form-control" placeholder="correct answer" required><br> --}}
        <select class="custom-select" name="correctAnswer" required>
            <option disabled selected value> -- select an option -- </option>    
            <option value="1">A</option>
            <option value="2">B</option>
            <option value="3">C</option>
            <option value="4">D</option>
          </select>
        <label for="course">Please type the name of the course</label>
        <input type="text" id="course" class="form-control" placeholder="course"><br>
        <button type="submit" class="btn btn-block btn-success mt-3">submit</button>
    </form>
</div>


@endsection