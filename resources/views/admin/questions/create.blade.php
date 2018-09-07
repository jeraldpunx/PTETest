@extends('admin.layouts.default')

@section('breadcrumbs', Breadcrumbs::render('questions.create'))


@section('content')
{!! Form::open(array('route' => 'admin.questions.store','method'=>'POST')) !!}

<div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Questions</span>
          		@if (count($errors) > 0)
			        <div class="card-panel teal white-text errorbox">
			            <b>Whoops!</b> There were some problems with your input.
			            <ul>
			                @foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
			                @endforeach
			            </ul>
			        </div>
			    @endif

				<div class="row">
				  <div class="col s12">
			  		<select name="type">
						<option value="" disabled selected>Choose your option</option>
						<option value="single_answer">Single Answer</option>
						<option value="multiple_answer">Multiple Answer</option>
						<option value="reorder_answer">Reorder Answer</option>
						<option value="dropdown_fill_in_the_blank">Dropdown</option>
						<option value="drag_fill_in_the_blank">Fill in the blank</option>
					</select>
				    <label>Question Type</label>
				  </div>
				 </div>

				 <div id="response"></div>
        </div>
        <div class="card-action">
        	<button class="btn waves-effect waves-light" type="submit" name="action">Submit
			    <i class="material-icons right">send</i>
			</button>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}
@stop


@section('script')
	$('select').formSelect();

	$('select').on('change', function() {
	  $.get("{{ route('admin.questions.create_partials') }}", {type: this.value}, function(response) { 
	        $('#response').html(response);
	    });
	});
@endsection