<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\user;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;

class profilecontroller extends Controller
{
  function profileedit(){
      return view('admin.profile.index');
  }
  function namechange(Request $request){
      $user_id=Auth::id();
      User::find($user_id)->update([
          'name'=>$request->name,
      ]);
      return back()->with('success','Name Updated Successfully!');
  }
  function passchange(Request $request){

       $request->validate([

           'old_password' => 'required',
           'password' => 'required',
           'password' => 'confirmed',
       ]);

      $upper=preg_match('@[A-Z]@',$request->password);
      $lowre=preg_match('@[a-z]@',$request->password);
      $number=preg_match('@[0-9]@',$request->password);
      $spsl=preg_match('@[#,$,%,*,?]@',$request->password);

        $strong=$upper.$lowre.$number.$spsl;
      if($strong==1111){
            echo "strong yes";
      }
      else{
          echo 'durbol';
      }
      die();


      if(Hash::check($request->old_password, Auth::user()->password)){
            $user_id = Auth::id();
            User::find($user_id)->update([
                'password' => bcrypt($request->password)
            ]);
            return back()->with('success_password', 'password Updated Successfully!');
      }else{
         return back()->with('wrong_pass','Old password wrong');
      }



  }
  function photochange(Request $request){
      $request->validate([
       'profile_photo'=>'image',
       'profile_photo'=>'file|size:512',
      ]);
      return back();
  }
}
