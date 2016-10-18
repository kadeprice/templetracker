<?php

namespace App\Http\Controllers;

use App\Auxiliary;
use App\Member;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;

class MemberController extends Controller
{

    /**
     * @var Auxiliary
     */
    private $auxiliary;
    /**
     * @var Member
     */
    private $member;

    /**
     * MemberController constructor.
     * @param Auxiliary $auxiliary
     * @param Member $member
     */
    public function __construct(Auxiliary $auxiliary, Member $member) {
        $this->auxiliary = $auxiliary;
        $this->member = $member;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dropdown = $this->auxiliary->getDropdown();

        return view('addMember', ['auxiliaries' => $dropdown]);
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
            'name' => 'required',
            'auxiliary' => 'required'
        ]);

        try {
            $this->member->create([
                'name'         => $request->name,
                'auxiliary_id' => $request->auxiliary
            ]);
        }catch (\Exception $e){
            return redirect()->back()->withInput()->withErrors(['This member must already be in the system.']);
        }

        $request->session()->flash('status', "$request->name has been added!");
        return redirect()->route('member.create');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
