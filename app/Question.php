<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $dateFormat = 'Y-m-d H:i';

	public $fillable = ['type','question', 'answer'];
}