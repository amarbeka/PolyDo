<?php
namespace App\Traits;
use App\Models\Project;
Use Carbon\Carbon;

trait ProjectTrait
{
    public function insertNewProject( $request ) {
        
    Project::create( $request->all() );
}
    public function updatedProject( $request,$id ) {
      
    Project::findOrFail($id)->update($request->all());
    }

    public function massDeleteProject( $request ) {
        Project::whereIn('id', $request->ids)->delete(); //For permanently  use => forceDelete(); 
    }

    public function deleteProject($id) {
        Project::findOrFail($id)->delete();
    }

    public function completeProject($id) {
        $project = Project::findOrFail($id);
        if($project->finish_at == null){
            $project->finish_at = Carbon::now();
        }else{
            $project->finish_at = null;
        }
        
        $project->save();
    }
    }