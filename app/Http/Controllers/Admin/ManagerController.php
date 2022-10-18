<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StaffNewRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StaffUpdateRequest;
use Illuminate\Validation\Rules\Password;
// use App\Http\Requests\StaffUpdateRequest;


class ManagerController extends Controller
{
    public function showStaff()
    {

        if(request('blocked')==true)
        {
            $users=Staff::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        } else {
            $users= Staff::all()
            ->whereNotIn('id', 1)
            ->sortBy('name');
        }

        // avem codul pus in if

        // $users= Staff::all()
        // ->whereNotIn('id', 1)
        // ->sortBy('name');


        // $blocked=Staff::onlyTrashed()->get();

        return view('admin.personal.staff-view')
            ->with('users', $users)
            ->with('blocked_members', request('blocked'));
    }

    public function newStaff()
    {
        return view('admin.personal.staff-new');
    }

    public function createStaff(StaffNewRequest $request)
    {
        $staff = new Staff;

        //upload image
        if($request->hasFile('photo'))
        {
            //we get the extension
            $extension=$request->file('photo')->getClientOriginalExtension();
            $photo_name=str_replace(' ', '', $request->name) . '_' .time() . '.' . $extension;
            //create name photo (name_83476385634.jpg)

            //moving the file
            $request->file('photo')->move('admin/images/staff', $photo_name);

            //save name images
            $staff->photo=$photo_name;

        }

        //save name
        $staff->name=$request->name;
        $staff->email=$request->email;
        $staff->phone=$request->phone;
        $staff->type=$request->type;

        $staff->password=bcrypt($request->password);

        $staff->save();

        return redirect(route('show.staff'))->with('success', 'a new user has been created ' . $request->name);
    }

    public function editStaff($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.personal.staff-edit')->with('user', $staff);
    }

    public function updateStaff(StaffUpdateRequest $request, $id)
    {
        $staff = Staff::findOrFail($id);

        // we check if the picture has been modified
        if($request->hasFile('photo'))
        {
            // we delete the old image
            if(!($staff->photo == 'staff.jpg'))
            {
                File::delete($staff->photoPath());
            }

              //we get the extension
              $extension=$request->file('photo')->getClientOriginalExtension();
              $photo_name=str_replace(' ', '', $request->name) . '_' .time() . '.' . $extension;
              //create name photo (name_83476385634.jpg)

              //moving the file
              $request->file('photo')->move('admin/images/staff', $photo_name);

              //save name images
              $staff->photo=$photo_name;
        }

         //update rows
         $staff->name = $request->name;
         $staff->email = $request->email;
         $staff->phone = $request->phone;
         $staff->type = $request->type;

        $staff->save();

        $mess = 'Staff member data' . $staff->name . ' have been successfully updated!';
        Alert::success('Successful update', $mess)->persistent(true, false);

        return back()->with('success', $mess);
    }

    public function updatePassword(Request $request, $id){

        $request->validate([
            'password' => [
                'required', 'confirmed', Password::min(8)
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],

        ],
        [
            'password.required' => 'You must enter a password',
            'password.confirmed' => 'You must confirm the correct password',
            'password.numbers' => 'The password must have at least one digit'
        ]
        );

        $staff = Staff::findOrFail($id);

        $staff->password=bcrypt($request->password);
        $staff->save();

        $mess = 'Staff member password' . $staff->name . ' have been successfully updated!';
        Alert::success('Successful update', $mess)->persistent(true, false);

        return back()->with('success', $mess);

    }

    public function blockStaff($id)
    {
        $staff = Staff::findOrFail($id);

        $staff->delete();

        return back()->with('success', 'Staff member' . $staff->name . ' was blocked');
    }

    public function restoreStaff($id)
    {
        $staff=Staff::onlyTrashed()->where('id', $id)->first();
        $staff->restore();
        return redirect(route('show.staff'))->with('success', 'Staff member ' . $staff->name . ' has been unlocked');
    }

    public function removeStaff($id)
    {
        $staff=Staff::onlyTrashed()->where('id', $id)->first();

        $staff->forceDelete();

        return redirect(route('show.staff'))->with('success', 'Staff member ' . $staff->name . ' has been permanent delete');

    }
}
