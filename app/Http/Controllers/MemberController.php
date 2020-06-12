<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('members.create');
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
        $this->validate($request,[
            'f_name' => 'required',
            'division' => 'required',
            'l_name' => 'required',
            'birthday' => 'required',
            'summery' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $add_member = new Members();
            $add_member->first_name = $request->input('f_name');
            $add_member->ds_division = $request->input('division');
            $add_member->last_name = $request->input('l_name');
            $add_member->dob = $request->input('birthday');
            $add_member->summery = $request->input('summery');

            $add_member->save();
            DB::commit();

            return redirect()->route('home')
                ->with('success','Member Added added successfully');
        }
        catch (\Exception $e){
            DB::rollback();

            return redirect()->route('home')
                ->with('error','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Members::find($id);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//        Update function for member update
        $this->validate($request, [
            'f_name' => 'required',
            'division' => 'required',
            'l_name' => 'required',
            'birthday' => 'required',
            'summery' => 'required',
        ]);
        try {
            DB::beginTransaction();

            $update_member = Members::find($id);

            $update_member->first_name = $request->input('f_name');
            $update_member->ds_division = $request->input('division');
            $update_member->last_name = $request->input('l_name');
            $update_member->dob = $request->input('birthday');
            $update_member->summery = $request->input('summery');

            $update_member->save();

            DB::commit();

            return redirect()->route('home')
                ->with('success', ' Updated successfully');
        }
        catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('home')
                ->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try{
            $member = Members::find($id);

            $member->delete();

            return redirect()->route('home')
                ->with('success', ' Deleted successfully');
        }catch(\Exception $e){
            return redirect()->route('home')
                ->with('error', 'Something went wrong');
        }
    }
}
