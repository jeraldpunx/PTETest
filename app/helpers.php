<?php

	function Differences ($Arg1, $Arg2)
	{
	    $Arg1 = explode (',', $Arg1);
	    $Arg2 = explode (',', $Arg2);

	    $Difference_1 = array_diff($Arg1, $Arg2);
	    $Difference_2 = array_diff($Arg2, $Arg1);
	    $Diff = array_merge($Difference_1, $Difference_2);
	    $Difference = implode(',', $Diff);

	    return $Difference;
	}

	function set_active($path, $active = 'active') 
	{
	    return call_user_func_array('Request::is', (array)$path) ? $active : '';
	}

	function modify_text($str) 
	{
	    return ucwords(str_replace("_", " ", $str));
	}