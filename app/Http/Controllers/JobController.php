<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Job;
use App\Models\JobTypes;
use App\Models\division;
use App\Models\Qualification;
use Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class JobController extends Controller
{
    public function viewjobtype(){
        $sidebarCheck= 'job';
        $languages = Language::all();
        $types = JobTypes::all();

        return view('jobs.jobs_viewjobtype',compact('sidebarCheck', 'languages', 'types'));
    }
    public function addjobtype(){
        $sidebarCheck= 'job';
        $languages = Language::all();

        return view('jobs.jobs_addjobtype',compact('sidebarCheck', 'languages'));
    }
    public function storeJobType(Request $req){
        $sidebarCheck= 'job';

        $rules = [
            'title' => 'required | max:100',
        ];

        $msg = [
            "title.required" => "You haven't entered any type. Please enter a title of job type.",
            "title.max" => "Your job type's title must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = new JobTypes();
        $crud->title = $req->title;
        $crud->save();

        Session::flash('scc', 'New job type created successfully.');

        return redirect('/add-job-type');
    }
    public function addjobs(){
        $sidebarCheck= 'job';
        $jTypes = JobTypes::all();
        $languages = Language::all();
        $divisions = division::all();
        $qualifications = Qualification::orderBy('id', 'DESC')->get();

        return view('jobs.jobs_addNew',compact('sidebarCheck', 'jTypes', 'languages', 'divisions', 'qualifications'));
    }
    public function newJob(Request $req){
        $crud = new Job();

        $crud->title = $req->title;
        $crud->company = $req->company;
        $crud->type = $req->type;
        $crud->role = $req->role;
        $crud->employer = $req->publisher;
        $crud->phone = $req->phone;
        $crud->email = $req->email;
        $crud->division = $req->division;
        $crud->map = $req->map;
        if($req->hasFile('imglogo')){
            $file = $req->file('imglogo');
            $ext = $file->getClientOriginalExtension();
            $filename = "Title".$req->title.rand().".".$ext;
            $file->move('uploads/jobs/', $filename);
            $crud->imglogo = $filename;
        }
        $crud->experience = $req->exp;
        $crud->qualification = json_encode($req->qualification);
        $crud->result = json_encode($req->result);
        $crud->salary = $req->salary;
        $crud->website = $req->website;
        $crud->deadline = $req->deadline;
        $crud->description = $req->descriptions;
       
        $crud->save();

        Session::flash('scc', 'Job published successfully.');

        return redirect('/add-new-job');
    }
    public function allJobs(){
        $sidebarCheck= 'job';
        $languages = Language::all();
        $jobs = Job::all();
        if($jobs == null){
            Session::flash('scc', 'No jobs found. Publish a job.');
            return redirect('jobs.jobs_addNew');
        }
        else{
            return view('jobs.jobs_allJobs', compact('sidebarCheck', 'languages', 'jobs'));
        }
    }
    public function viewJob(Request $req){
        $sidebarCheck= 'job';
        $languages = Language::all();
        $jID = $req->jobID;

        $thejob = DB::select('select * from jobs where id = ?', [$jID]);
        return view('jobs.jobs_viewTheJob', compact('sidebarCheck', 'languages', 'thejob'));
    }

    public function delJob($id=null){
        $job = Job::find($id);

        $image_path = "uploads/jobs/".$job->imglogo;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $job->delete();

        Session::flash('scc', 'Job deleted successfully.');

        return redirect('all-jobs');
    }
    public function editjob($id=null){
        $job = DB::select('select * from jobs where id = ?', [$id]);
        $jTypes = JobTypes::all();
        $languages = Language::all();
        $divisions = division::all();
        $sidebarCheck= 'job';

        return view('jobs.jobs_editJob', compact('job', 'jTypes', 'languages', 'sidebarCheck', 'divisions'));
    }
    public function updateJob(Request $req, $id){
        $rules = [
            "title" => "required | max:200",
        ];

        $msg = [
            "title.required" => "Job title field cannot be empty.",
            "title.max" => "Your entered job title is more than 200 characters long.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = Job::find($id);

        $crud->title = $req->title;
        $crud->company = $req->company;
        $crud->type = $req->type;
        $crud->role = $req->role;
        $crud->employer = $req->publisher;
        $crud->phone = $req->phone;
        $crud->email = $req->email;
        $crud->division = $req->division;
        $crud->map = $req->map;
        $crud->website = $req->website;
        $crud->deadline = $req->deadline;
        $crud->experience = $req->exp;
        $crud->salary = $req->salary;
        $crud->description = $req->descriptions;
       
        $crud->save();

        Session::flash('scc', 'Job updated successfully.');

        return redirect('all-jobs');
    }

    public function editJobType($id=null){
        $thetype = JobTypes::find($id);;
        $jTypes = JobTypes::all();
        $languages = Language::all();
        $sidebarCheck= 'job';

        return view('jobs.jobs_editJobType', compact('thetype', 'jTypes', 'languages', 'sidebarCheck'));
    }
    public function updateJobType(Request $req, $id){
        $rules = [
            "title" => "required | max:200",
        ];

        $msg = [
            "title.required" => "Job type field cannot be empty.",
            "title.max" => "Your entered job type is more than 200 characters long.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = JobTypes::find($id);
        $crud->title = $req->title;
       
        $crud->save();

        Session::flash('scc', 'Job type updated successfully.');

        return redirect('view-job-type');
    }

    public function delJobType($id=null){
        $types = JobTypes::find($id);
        $types->delete();

        Session::flash('scc', 'Job type deleted successfully.');

        return redirect('view-job-type');
    }

    public function viewDivisions(){
        $sidebarCheck= 'job';
        $languages = Language::all();
        $divisions = division::all();

        return view('jobs.jobs_viewDivisions',compact('sidebarCheck', 'languages', 'divisions'));
    }
    public function addDivision(){
        $sidebarCheck= 'job';
        $languages = Language::all();

        return view('jobs.jobs_addDivision',compact('sidebarCheck', 'languages'));
    }
    public function storeDivision(Request $req){
        $sidebarCheck= 'job';

        $rules = [
            'name' => 'required | max:100',
        ];

        $msg = [
            "name.required" => "You haven't entered any division name. Please enter the name of a division.",
            "name.max" => "Your division's name must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = new division();
        $crud->name = $req->name;
        $crud->save();

        Session::flash('scc', 'Division added successfully.');

        return redirect('/add-division');
    }
    public function editDivision($id=null){
        $thedivision = division::find($id);;
        $languages = Language::all();
        $sidebarCheck= 'job';

        return view('jobs.jobs_editDivision', compact('thedivision', 'languages', 'sidebarCheck'));
    }
    public function updateDivision(Request $req, $id){
        $rules = [
            "name" => "required | max:200",
        ];

        $msg = [
            "name.required" => "Division name cannot be empty.",
            "name.max" => "Division name cannot exceed 200 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = division::find($id);
        $crud->name = $req->name;
       
        $crud->save();

        Session::flash('scc', 'Division name changed successfully.');

        return redirect('view-divisions');
    }
    public function delDivision($id=null){
        $divsion = division::find($id);
        $divsion->delete();

        Session::flash('scc', 'Diviosn deleted successfully.');

        return redirect('view-divisions');
    }

    public function viewQua(){
        $sidebarCheck= 'job';
        $languages = Language::all();
        $qua = Qualification::all();

        return view('jobs.jobs_viewQua',compact('sidebarCheck', 'languages', 'qua'));
    }
    public function addQua(){
        $sidebarCheck= 'job';
        $languages = Language::all();

        return view('jobs.jobs_addQua',compact('sidebarCheck', 'languages'));
    }
    public function storeQua(Request $req){
        $sidebarCheck= 'job';

        $rules = [
            'qua' => 'required | max:50',
        ];

        $msg = [
            "qua.required" => "You haven't entered any qualification. Please enter a qualification.",
            "qua.max" => "Your entered qualification must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = new Qualification();
        $crud->qua = $req->qua;
        $crud->save();

        Session::flash('scc', 'Qualification added successfully.');

        return redirect('/add-qua');
    }
    public function editQua($id=null){
        $thequa = Qualification::find($id);;
        $languages = Language::all();
        $sidebarCheck= 'job';

        return view('jobs.jobs_editQua', compact('thequa', 'languages', 'sidebarCheck'));
    }
    public function updateQua(Request $req, $id){
        $rules = [
            "qua" => "required | max:200",
        ];

        $msg = [
            "qua.required" => "You haven't entered any qualification. Please enter a qualification.",
            "qua.max" => "Your entered qualification must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = Qualification::find($id);
        $crud->qua = $req->qua;
       
        $crud->save();

        Session::flash('scc', 'Qualification changed successfully.');

        return redirect('view-qua');
    }
    public function delQua($id=null){
        $qualification = Qualification::find($id);
        $qualification->delete();

        Session::flash('scc', 'Qualification successfully.');

        return redirect('view-qua');
    }
}
