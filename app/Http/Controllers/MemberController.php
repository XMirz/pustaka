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
        $member = $this->getMemberUpdate($request);
        $member = Member::create($member);

        return redirect()->route("members.index")->with('type', 'success')->with('message', '\'' . $member->name . '\' berhasil tambahkan!');
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
        $memberUpdate = $this->getMemberUpdate($request);
        $member->update($memberUpdate);
        return redirect()->route("members.index")->with('type', 'success')->with('message', 'Data \'' . $member->name . '\' berhasil perbarui!');
    }

    public function destroy(Member $member)
    {
        if ($member->borrowing()->where('status', '=', 'NOT_RETURNED')->doesntExist()) {
            $member->delete();
            $response["status"] = "ok";
        } else {
            $response["status"] = "failed";
        };
        return $response;
    }

    /**
     * @param MemberRequest $request
     * @return array
     */
    public function getMemberUpdate(MemberRequest $request): array
    {
        $memberUpdate = $request->validated();
        if ($request->get('role') == "Siswa") {
            $memberUpdate["nisn"] = $memberUpdate["code"];
        } else if ($request->get('role') == "Guru") {
            $memberUpdate["nip"] = $memberUpdate["code"];
        }
        unset($memberUpdate["code"]);
        return $memberUpdate;
    }
}
