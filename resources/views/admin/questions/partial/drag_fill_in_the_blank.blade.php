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

<div class="row">
  	<div class="input-field col s12">
  		<textarea id="question" class="materialize-textarea" class="validate" name="question"></textarea>
          <label for="question">Question / Description</label>

          <a id="new_blank" class="waves-effect waves-light btn" onclick="newBlank()"><i class="material-icons left">add</i>[blank]</a>
	  </div>
 </div>


 <div class="divider"></div>

<div class="row">
	<div class="col">
		<div class="col s5" style="">
        	<h4>Source</h4>
            <div class="sortable blue lighten-3 given">
                <li class="choices red lighten-2 white-text"></li>
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
 	var blank = 0;
 	function newBlank()
 	{
	    document.getElementById("question").value += " [blank]";
 	}
 	// $('#new_blank').click(function()
 	// {
 	// 	$("#question").append("[blank]");

 	// 	console.log($("#question").text());

 	// 	return false;
 	// });




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
		var sel = $('<select>');
		sel.append($("<option>").attr('disabled', 'disabled')
								.attr('selected','selected')
								.text("Choose your option"));
		$([1,2,3]).each(function(element) {
			console.log(element);
			sel.append($("<option>").attr('value',element).text(element));
		});



		// var answer = '<td>' + sel + '</td>';

		$('table > tbody').append('<tr><td>'+option+'<input type="hidden" name="options[]" class="options" value="'+option+'"></td>'+answer+'</tr>').append(sel);
		$('select').formSelect();	
	}
 </script>