<div class="row">
  	<div class="input-field col s12">
  		<textarea id="question" class="materialize-textarea" class="validate" name="question"></textarea>
          <label for="question">Question / Description</label>
	  </div>
 </div>

 <div class="row">
    <table class="highlight responsive-table">
		<thead>
			<th>
				Options
			</th>
			<th>
				Select Correct Answer
			</th>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
<div class="row">
	<div class="input-field col s6">
      <input id="new" type="text" class="validate">
      <label for="new">Add New Option</label>
      <span class="helper-text" data-error="Option Already Exist"></span>
    </div>

    <div class="input-field col s2">
      <a id="new_option" class="waves-effect waves-light btn" ><i class="material-icons left">add</i>Add</a>
    </div>
 </div>


 <script type="text/javascript">
 	var options;

	$('#new_option').click(function()
	{ 
		options = $("input[name='options[]']").map(function(){return $(this).val();}).get();

		var option = $("#new").val();

		if($.inArray(option, options) === -1) {
			new_row(option); 
			$("#new").val("");
		}

		return false;
	});

	function new_row(option)
	{
		var question_type = $("select[name='type']").val();

		var answer = '<td><label><input class="with-gap" value="'+option+'" name="answer[]" type="checkbox" /><span></span></label></td>';

		$('table > tbody').append('<tr><td>'+option+'<input type="hidden" name="options[]" class="options" value="'+option+'"></td>'+answer+'</tr>');
	}
 </script>