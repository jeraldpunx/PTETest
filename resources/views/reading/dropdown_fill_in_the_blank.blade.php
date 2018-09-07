@extends('layouts.default')

@section('content')
<style type="text/css">
	input.select-dropdown {
		height: 2rem !important;
	}

	/* added p styles below for consistent line height with inline select menus */
	p.inline {
	  line-height: 40px; 
	}
	p .input-field.inline {
	  margin-top: 0;
	  margin-bottom: 0;
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
	</form>

	<div class="divider"></div>
	<p><b><i>Below is a text with blanks. Click on each blank, a list of choices will appear. Select the appropriate answer choice for each blank. </i></b></p>

	<div class="row" id="platformRating">
		<p class="light given">
			{!! $questions[$page_num-1]->question !!}
		</p>
	</div>
</div>


@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		var given = $('p.given').text();

		<?php 
			$js_array = json_encode($questions[$page_num-1]->choices);
			echo "var javascript_array = ". $js_array . ";\n";
		?>

		console.log(javascript_array);
		$.each( javascript_array, function(i, e) {
				// console.log(i);

			var input_inline = $('<span>', {"class": "input-field inline"});	
			var sel = $('<select>');
			sel.append($("<option>").attr('disabled', 'disabled')
									.attr('selected','selected')
									.text("Choose your option"));
			$(e).each(function(index, element) {
				$.each(element, function(index, el) {
					sel.append($("<option>").attr('value',index).text(el));
				});
			});
			input_inline.append(sel);
			given = given.replace('@['+i+']', input_inline.prop('outerHTML'));
		});

		$('p.given').html(given);
	    $('select').formSelect();	
	});

	$("form").submit(function(e) {
		console.log($('.input-field option:selected'));
    	var answer = $('.input-field option:selected').map(function(){
    		return $(this).val();
    	}).get().join();

    	$(this).find("input[name=answer]").val(answer);
	});
</script>
@stop