@extends('layouts.default')

@section('content')
<style type="text/css">
	div.blanks {
		display:inline-block;
		min-width:50px;
		border-bottom: 2px solid #000000;
		color:#000000;
	}

	div.blanks.ui-droppable-active {
		min-height:20px;
	}

	span.answers > b {
		border-bottom: 2px solid #000000;
	}

	span.given {
		margin: 5px;
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
		<p><b><i>In the text below some words are missing. Drag words from the box below to the appropriate place in the text. To undo an answer choice, drag the word back to the box below the text.</i></b></p>

		<div class="row">
			<p class="given">
				{!! $questions[$page_num-1]->question !!}
			</p>
		</div>

		<div class="divider"></div>
		<br>
		<section>
			<div class="card blue lighten-3">
				<div class="card-content white-text">
					<div class="row">
						<div class="col s12">
							@foreach($questions[$page_num-1]->choices as $choice)
								<span class="given btn-flat white-text red lighten-2" rel="{!! $choice->id !!}">{!! $choice->given !!}</span>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
	</form>
</div>
@stop

@section('script')
<script type="text/javascript">

	var given = $('p.given').text();

	var new_given = given.replace(/blank/g, '  <div class="blanks"></div>  ');
	$('p.given').html(new_given);

	function updateDroppables(){
		$("div.blanks").droppable({

			accept: "span.given",
			classes: {
				"ui-droppable-hover": "ui-state-hover"
			},
			drop: function(event, ui) {
				var dragedElement = ui.draggable.text();
				var dropped = ui.draggable;  
				// console.log(dragedElement);
				dropped.hide();
				$(this).replaceWith(" <span class='answers'><b class='blue-text' rel='"+ui.draggable.attr("rel")+"'>" + dragedElement + "</b> <a href='#' class='material-icons cancel md-16'>highlight_off</a></span> ");
			}
		});
	}

	updateDroppables();

	$("span.given").draggable({
		helper: "clone",
		revert: "invalid"
	});

	$(document).on("click", "a.cancel", function(e) {
		e.preventDefault();

	   
	    $(this)
	      .parent()
	      .replaceWith("<div class='blanks'></div>");

	    updateDroppables();

		var rel = $(this).prev().attr('rel');
	    $('.btn-flat[rel='+rel+']').show();
	});

	$("form").submit(function(e) {
		var answer = $('.answers > b').map( function(){
			return $(this).attr('rel');
		}).get().join();

    	$(this).find("input[name=answer]").val(answer);
	});
</script>
@stop