<?php

namespace App\Http\Controllers;

use App\Member;
use App\TempleCount;
use Illuminate\Http\Request;

use App\Http\Requests;

class TempleCountController extends Controller
{

    /**
     * @var Member
     */
    private $member;
    /**
     * @var TempleCount
     */
    private $templeCount;

    /**
     * TempleCountController constructor.
     * @param Member $member
     * @param TempleCount $templeCount
     */
    public function __construct(Member $member, TempleCount $templeCount) {
        $this->member = $member;
        $this->templeCount = $templeCount;
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
        $member = $this->member->getDropdown();
        return view('addCard', ['members' => $member]);
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
            'member' => 'required',
            'sex' => 'required',
            'count' => 'required|numeric'
        ]);
        $member = $this->member->find($request->member);

        $this->templeCount->create([
            'count' => $request->count,
            'member_id' => $request->member,
            'auxiliary_id' => $member->auxiliary_id,
            'sex' => $request->sex
        ]);

        $request->session()->flash('status', "$request->count cards have been added for $member->name!");
        return redirect()->route('temple-count.create');
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
