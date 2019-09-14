@extends('templates.template')
@section('title','SSC Board Question')
@section('body')
<br><br>
<div class="container">
    <form method="POST" action='/addsscquestion' enctype="multipart/form-data">
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
          <br>
          <label for="subject">Choose the subject</label>
          <select class="custom-select" name="subject" required>
                  <option disabled selected value> -- select a subject -- </option>    
                  <option value="physics">Physics</option>
                  <option value="chemistry">Chemistry</option>
                  <option value="biology">Biology</option>
                  <option value="social science">Social Science</option>
                  <option value="ict">ICT</option>
            </select><br>
            <br>
            <label for="board">Choose the board</label>
          <select class="custom-select" name="board" required>
                <option disabled selected value> -- select a board -- </option>    
                <option value="dhaka">Dhaka</option>
                <option value="chattogram">Chattogram</option>
                <option value="cumilla">Cumilla</option>
                <option value="sylhet">Sylhet</option>
                <option value="barishal">Barishal</option>
                <option value="jessore">Jessore</option>
            </select>
            <br>
            <label for="year">Choose the years</label>
            <select class="custom-select" name="year" required>
                    <option disabled selected value> -- select a year -- </option>    
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select><br>
        
        <button type="submit" class="btn btn-block btn-success mt-3">submit</button>
    </form>
</div><br><br>


@endsection