@extends('layouts.default')

@section('content')
<style type="text/css">
	.sortable {
	    min-height: 30px;
	    margin: 10px;
	    padding:10px;
	    width:100%;
	    vertical-align:top;
	    display:inline-block;
	}

	li.choices {
		background-color:#ffcb05;
	    margin:10px 5px;
	    padding:10px;
	    cursor:move;
	    list-style-type: none;
	}
</style>

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

		<div class="row">
			<p><b><i>The text boxes in the left panel have been placed in a random order. Restore the original order by dragging the text boxes from the left panel to the right panel. </i></b></p>

			<p class="given">
				{!! $questions[$page_num-1]->question !!}
			</p>

			<div class="col s12">
				<div class="row">
		            <div class="col s5" style="">
	                	<h4>Source</h4>
		                <div class="sortable blue lighten-3 given">
		                	@foreach($questions[$page_num-1]->choices as $choice)
			                    <li rel="{!! $choice->id !!}" class="choices red lighten-2 white-text">{!! $choice->given !!}</li>
							@endforeach
		                </div>
		            </div>
		            <div class="col s1" style="display: flex; align-items: center; justify-content: center;">
		            	<p>
			            	<span class="material-icons left">arrow_back</span>
							<span class="material-icons right">arrow_forward</span>
						</p>
		            </div>
		            <div class="col s6" style="">
	                	<h4>Target</h4>
		                <div class="sortable blue lighten-3 answers">
		                </div>
		            </div>
	            </div>
			</div>
		</div>
	</form>
</div>
@stop

@section('script')
<script type="text/javascript">
	$('.sortable').sortable({
      connectWith: '.sortable'
    });

    $("form").submit(function(e) {
    	var answer = $('.answers li').map(function(){
    		return $(this).attr('rel');
    	}).get().join();

    	$(this).find("input[name=answer]").val(answer);
	});
</script>
@stop