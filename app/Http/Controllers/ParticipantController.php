<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\participant;
use PDF;
use Auth;
use DB;
use App\Library\Common;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Storage;

class ParticipantController extends Controller
{
    public function index()
    {
        $userid = Auth::id();
        $participants = DB::table('participants')->where([['user_id', '=', $userid]])->get();
        //$today = Carbon::today();
        return view('index', compact('participants','userid'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'firstname' => 'required','lastname' => 'required','gender' => 'required','dob' =>'required','relation' => 'required','avatar' => 'required'
        ]);
        
        $model = participant::create($request->all());

        if ($request->file('avatar')) {
            $file = new Common;
            $name =$file->uploadFile($request->file('avatar'),'participant');
            $model->update(['avatar' => $name]);
        }
       
        return redirect('/index')->with('message','Successfully Registered.');
        //return response('çreated',201);
      
    }

    public function show(participant $participant)
    {    
    }

    public function edit($id)
    {
        $participant = participant::find($id);   
        return view('participate.edit',compact('participant'));
    }

    public function updateCanditate(Request $request,$id)
    {   
        
        if($request->hasFile('image')){ 
            $name = new Common;
			$file = $name->uploadFile($request->file('image'),'participant');
		}else{
			$file = $request->oldImage;
        }
        
        $candidateId = $id;
        $this->validate($request, [
            'firstname' => 'required','lastname' => 'required','gender' => 'required','dob' => 'required','relation' => 'required']
        );
        $condition = array('avatar' => $file,'gender'=> ($request->gender),'dob'=> ($request->dob),'relation' => ($request->relation),'firstname' => ($request->firstname),'middlename' => ($request->middlename),'lastname' => ($request->lastname));
       
        DB::table('participants')->where('id',$candidateId)->update($condition); 
        session()->flash('success','Record Updated Successfully');
       // return View::make('participate/edit');
        return redirect()->back()->with("success","Data Updated successfully !");
    }

    public function destroy($id)
    {
       // participant::destroy($id);
       $candidate = participant::find($id);
       $candidate2 = participant::where(array('id'=>$id))->delete();
       $candidate->delete();
       session()->flash('success','Record Deleted Successfully');
       return redirect()->back()->with("success","Data has been Deleted successfully !");
        //return view('participate.edit')->with("success","Data has been Deleted successfully !");
    }

    public function downloadPDF($id)
    {
        $participants = participant::find($id); 
        $img="http://127.0.0.1:8000/public".$participants->avatar;
        $pdf =  PDF::setOptions([
            'images' => true
        ])->loadView('pdf', compact('participants','img'))->setPaper('a4', 'portrait');
      //  $pdf = PDF::loadView('pdf', compact('participants','img'));
        return $pdf->download('invoice.pdf');  
    }

    public function upload(Request $request,$id)
    {         
        $userid = Auth::id(); 
        if($request->hasFile('drawing_sheet')){ 
            $name = new Common;
            $file = $name->uploadFile($request->file('drawing_sheet'),'participant/drawing/'.$userid);
        }else{
            $file = "No Drawing";
        }
    
        $condition = array('drawing_sheet' => $file);
        DB::table('participants')->where('id',$id)->update($condition); 
        session()->flash('success','Record Updated Successfully');
        return redirect()->back()->with("success","Drawing Uploaded successfully !"); 
   
        // if( $request->hasFile('drawing_sheet'))
        // {
        //     $file=Storage::putFile('public',$request->file('drawing_sheet'));
        // }else{
        //     $file = "No Drawing";
        // }
        // $condition = array('drawing_sheet' => $file);
        // return $id;
        // DB::table('participants')->where('id',$id)->update($condition); 
        // session()->flash('success','Record Updated Successfully');
        // return redirect()->back()->with("success","Drawing Uploaded successfully !");
         // $url = Storage::url('cat.png');
        // return "<img src ='".$url."' />";  //to show image from storage path
    }

    public function form()
    {
       return view('multiform'); 
    }
}
