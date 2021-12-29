<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index()
    {
        $members = Member::all();
        $totalMembers = $members->count();
        return view('members.index', compact('members', 'totalMembers'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(MemberRequest $request)
    {
        $member = $request->validated();
        if ($request->get('role') == "Siswa") {
            $member["nisn"] = $member["code"];
        } else if ($request->get('role') == "Siswa") {
            $member["nip"] = $member["code"];
        }
        unset($member["code"]);
        Member::create($member);

        return redirect()->route("members.index");
    }


    public function show(Member $member)
    {
        //
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(MemberRequest $request, Member $member)
    {
        $memberUpdate = $request->validated();
        if ($request->get('role') == "Siswa") {
            $memberUpdate["nisn"] = $memberUpdate["code"];
        } else if ($request->get('role') == "Siswa") {
            $memberUpdate["nip"] = $memberUpdate["code"];
        }
        unset($memberUpdate["code"]);
        $member->update($memberUpdate);
        return redirect()->route("members.index");
    }

    public function destroy(Member $member)
    {
        //
    }
}
