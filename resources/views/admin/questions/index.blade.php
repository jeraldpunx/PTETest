@extends('admin.layouts.default')

@section('breadcrumbs', Breadcrumbs::render('questions'))

@section('content')
<div class="row">
	<div class="col s12">
		<h2 class="section-title">Questions</h2>
	    @if ($message = Session::get('success'))
			<div class="card-panel teal white-text errorbox">
            	<p>{{ $message }}</p>
        	</div>
	    @endif
		<div class="card">
			<table>
				<thead class="text-primary">
					<th>
						ID
					</th>
					<th>
						Type
					</th>
					<th>
						Question
					</th>
					<th>
					</th>
				</thead>
				<tbody>
					@foreach($questions as $question)
					<tr>
						<td>
							{{ ++$i }}
						</td>
						<td>
							{{ modify_text($question->type) }}
						</td>
						<td>
							{{ $question->question }}
						</td>
						<td style="width:13%;">
                          <button type="button" rel="tooltip" title="Edit Question" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                    	</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop

@section('script')
    $('table').DataTable({
	    pagingType:"full",
	    bLengthChange: false,
	    language:{
			search:"",
			searchPlaceholder:"Enter search term"
		},
		<!-- "sDom": '<"H"lfr>t<"F"<"testbuttonarea">ip>', -->
		"sDom": '<<"testbuttonarea">lfr>t<"F"ip>'
	});

	$( "div.testbuttonarea" ).replace_html('<a href="{{ route('admin.questions.create') }}" class="create waves-effect waves-teal btn pull-left text-white "><i class="material-icons">open_in_new</i> Create</a>');
@endsection