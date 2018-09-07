@extends('layouts.default')

@section('content')
<div class="section">
	<div class="row">
		<div class="col s12 center">
			<h3 class="light-blue-text">Thanks for taking the test.</h3>
			Your have answered correctly <b>{!! $all_results['correct_answer'] !!}</b> out of <b>{!! $all_results['total_questions'] !!}</b> questions.
		</div>
	</div>
</div>
@stop

@section('script')
@stop