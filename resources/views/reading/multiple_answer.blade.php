@extends('layouts.default')

@section('content')
<div class="section">
	<form method="POST" action="{!! route('post-answer');  !!}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="blade_type" value="{!! $questions[$page_num-1]->type !!}">
		<input type="hidden" name="page_num" value="{!! $page_num+1 !!}">
		<input type="hidden" name="correct_answer" value="{!! $questions[$page_num-1]->answer !!}">
		<input type="hidden" name="answer" value="{!! $questions[$page_num-1]->answer !!}">
		
		<div class="row">
			<div class="col s6">
				<h3 class="light-blue-text">Question {{ $page_num }} of {{ count($questions) }}</h3>
			</div>
			<div class="col s6 question-pages">
				<div class="right">
					@if($page_num != 1)
						<a href="{!! route('previous-page', ['page_num' => $page_num-1]); !!}" class="waves-effect waves-light btn red lighten-1"><i class="material-icons left">arrow_back</i>Previous</a>
					@endif

					@if($page_num == count($questions))
						<button type="submit" class="waves-effect waves-light btn blue">
						  <i class="material-icons left">flag</i>Finish
						</button>
					@else
						<button type="submit" class="waves-effect waves-light btn">
						  <i class="material-icons right">arrow_forward</i>Next
						</button>
					@endif
				</div>
			</div>
		</div>

		<div class="divider"></div>
		<p><b><i>Read the text and answer the question by selecting all the correct responses. More than one response is correct. </i></b></p>

		<div class="row">
			<p class="light">
				{!! $questions[$page_num-1]->question !!}
			</p>


			<div class="col s12">
				@foreach($questions[$page_num-1]->choices as $choice)
				<p>
					<label>
						<input type="checkbox" class="filled-in" name="answer" value="{!! $choice->id !!}" />
						<span>{!! $choice->given !!}</span>
					</label>
				</p>
				@endforeach
			</div>
		</div>
	</form>
</div>
@stop

@section('script')
	<script type="text/javascript">
		$("form").submit(function(e) {
			var answer = $('input[name=answer]:checkbox:checked').map( function(){
				return $(this).val()
			}).get().join();

	    	$(this).find("input[name=answer]").val(answer);
		});
	</script>
@stop