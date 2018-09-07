<style type="text/css">
	.sortable {
	    /*min-height: 30px;*/
	    margin: 10px;
	    /*padding:10px;*/
	    /*width:100%;*/
	    vertical-align:top;
	    display:inline-block;
	}

	li.choices {
	    margin:15px 18px;
	    padding:10px;
	    cursor:move;
	    list-style-type: none;
	}
</style>

<div class="row">
  	<div class="input-field col s12">
  		<textarea id="question" class="materialize-textarea" class="validate" name="question"></textarea>
          <label for="question">Question / Description</label>
	  </div>
 </div>

 <div class="row">
 	<div class="col">
    	<h4>Reorder</h4>
        <div id="sortable" class="sortable teal lighten-2 options"></div>
		<input type="hidden" name="options" value="">
		<input type="hidden" name="answer" value="">               
 	</div>
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
 	$('#sortable').sortable({
      connectWith: '.sortable'
    });

    $('#new_option').click(function()
    {
    	var option = $("#new").val();
	    var $li = $("<li class='choices red lighten-2 white-text'/>").text(option);
	    $("#sortable").append($li);
	    $("#sortable").sortable('refresh');

	    $("#new").val("");
    });

    $("form").submit(function(e) {
    	// e.preventDefault();
    	var options = $('.options li').map(function(){
    		return $(this).text();
    	}).get();

    	// console.log(options);
    	$(this).find("input[name=options]").val(options);
    	$(this).find("input[name=answer]").val(options);
	});


 	// var options;

	// $('#new_option').click(function()
	// { 
	// 	options = $("input[name='options[]']").map(function(){return $(this).val();}).get();

	// 	var option = $("#new").val();

	// 	if($.inArray(option, options) === -1) {
	// 		new_row(option); 
	// 		$("#new").val("");
	// 	}

	// 	return false;
	// });

	// function new_row(option)
	// {
	// 	var question_type = $("select[name='type']").val();

	// 	var answer = '<td><label><input class="with-gap" value="'+option+'" name="answer[]" type="checkbox" /><span></span></label></td>';

	// 	$('table > tbody').append('<tr><td>'+option+'<input type="hidden" name="options[]" class="options" value="'+option+'"></td>'+answer+'</tr>');
	// }
 </script>