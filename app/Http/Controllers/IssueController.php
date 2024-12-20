<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Hiển thị danh sách vấn đề với phân trang
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10); // Lấy 10 bản ghi/trang
        return view('issues.index', compact('issues'));
    }

    // Hiển thị form thêm vấn đề mới
    public function create()
    {
        $computers = Computer::all(); // Lấy danh sách máy tính
        return view('issues.create', compact('computers'));
    }

    // Lưu vấn đề mới vào cơ sở dữ liệu
    public function store(Request $request)
{
    // Kiểm tra xác thực
    $request->validate([
        'computer_id' => 'required|exists:computers,id', // Kiểm tra có giá trị hợp lệ
        'reported_by' => 'required|string|max:50',
        'reported_date' => 'required|date',
        'description' => 'required|string',
        'urgency' => 'required|in:Low,Medium,High',
        'status' => 'required|in:Open,In Progress,Resolved',
    ]);

    // Tạo mới vấn đề
    Issue::create($request->all());
    
    // Chuyển hướng với thông báo thành công
    return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm.');
}


    // Hiển thị form chỉnh sửa vấn đề
    public function edit(Issue $issue)
    {
        if (!$issue) {
            return redirect()->route('issues.index')->with('error', 'Vấn đề không tồn tại.');
        }

        $computers = Computer::all(); // Lấy danh sách máy tính
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Cập nhật thông tin vấn đề
    public function update(Request $request, Issue $issue)
{
    // Validation
    $request->validate([
        'computer_id' => 'required|exists:computers,id',
        'reported_by' => 'required|string|max:50',
        'reported_date' => 'required|date',
        'description' => 'required|string',
        'urgency' => 'required|in:Low,Medium,High',
        'status' => 'required|in:Open,In Progress,Resolved',
    ]);

    // Cập nhật dữ liệu vấn đề
    $issue->update([
        'computer_id' => $request->computer_id,
        'reported_by' => $request->reported_by,
        'reported_date' => $request->reported_date,
        'description' => $request->description,
        'urgency' => $request->urgency,
        'status' => $request->status,
    ]);

    // Redirect về trang danh sách vấn đề với thông báo thành công
    return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật.');
}


public function destroy(Issue $issue)
{
    // Xóa vấn đề
    $issue->delete();

    // Redirect về trang danh sách vấn đề với thông báo thành công
    return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa.');
}

}
