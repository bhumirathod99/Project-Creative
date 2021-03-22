<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionFreelancer extends Model
{
    protected $fillable = [
    	'competition_id',
    	'freelancer_id',
    	'isAssinged',
    ];
}
