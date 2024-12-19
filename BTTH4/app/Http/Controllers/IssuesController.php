<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computers;
use App\Models\Issues;

class IssuesController extends Controller
{
    public function index()
    {
        $issues = Issues::with('computer')->paginate(10);

        // Truyền dữ liệu phân trang tới view
        return view('Issues.index', compact('issues'));
    }

    public function create()
    {
        $data = Computers::all();
        return view('Issues.create', compact('data'));
    }

    public function store(Request $request)
    {
        //dd($request);
        // Validate dữ liệu
        $validatedData = $request->validate([
            'computer_id' => 'required',
            'reporter_by' => 'required',
            'reporter_date' => 'required',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ], [
            'computer_id.required' => 'Vui lòng chọn name.',
            'reporter_by.required' => 'Vui lòng nhập Reporter_by.',
            'reporter_date.required' => 'Vui lòng nhập Reporter_date.',
            'description.required' => 'Vui lòng nhập Description.',
            'urgency.required' => 'Vui lòng chọn urgency.',
            'status.required' => 'Vui lòng chọn status.',
        ]);
        Issues::create([
            'computer_id' => $request->computer_id,
            'reporter_by' => $request->reporter_by,
            'reporter_date' => $request->reporter_date,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);
        return redirect()->route('Issues.index')->with('success', 'Thêm
bài viết thành công!')
        ;
    }

    public function edit($id)
    {
        $Issue = Issues::with('computer')->findOrFail($id);
        $Computer = Computers::all();
        return view('Issues.edit', compact('Issue', 'Computer'));
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $validatedData = $request->validate([
            'computer_id' => 'required',
            'reporter_by' => 'required',
            'reporter_date' => 'required',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ],[
            'computer_id.required' => 'Vui lòng chọn name.',
            'reporter_by.required' => 'Vui lòng nhập Reporter_by.',
            'reporter_date.required' => 'Vui lòng nhập Reporter_date.',
            'description.required' => 'Vui lòng nhập Description.',
            'urgency.required' => 'Vui lòng chọn urgency.',
            'status.required' => 'Vui lòng chọn status.',
        ]);
        $Issue = Issues::find($id);

        $Issue->update([
            'computer_id' => $request->computer_id,
            'reporter_by' => $request->reporter_by,
            'reporter_date' => $request->reporter_date,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);
        return redirect()->route('Issues.index')->with('success', 'Cập
nhật thành công.');
    }

    public function destroy($id)
    {
        $Issue = Issues::find($id);
        $Issue->delete();
        return redirect()->route('Issues.index')->with('success', 'Xoá thành công');
    }
}
