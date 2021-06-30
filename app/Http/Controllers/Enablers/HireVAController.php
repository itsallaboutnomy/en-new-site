<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Skill;
use App\Models\Enablers\VirtualAssistant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HireVAController extends Controller
{
    protected $skill, $assistant;

    public function __construct(VirtualAssistant $virtualAssistant,Skill $skill)
    {
        $this->skill = $skill;
        $this->assistant = $virtualAssistant;
    }

    public function index(Request $request)
    {
        $skills = $this->skill->enabled()->get();

        $skill = strtolower($request->get('skill'));
        $experience = strtolower($request->get('experience'));

        $assistants = $this->assistant->with('skills')->enabled();

        if($experience){
            $assistants = $assistants->where('experience_level',$experience);
        }

        if($skill){
            $assistants = $assistants->whereHas('skills', function ($query) use ($skill){
                $query->where('skill_id',$skill);
            });
        }

        $assistants = $assistants->orderBy('name','ASC')->paginate(12);

        return view('enablers.app.hire-va', compact('assistants','skills'));
    }

}
