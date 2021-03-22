<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCompetition extends Model
{
    protected $fillable = [
    	'user_id',
    	'project_id',
    	'name',
    	'registration_last_date',
    	'model_submission_last_date'
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function participants()
    {
        return $this->hasMany(CompetitionFreelancer::class,'competition_id','project_competition_id');
    }
}
