@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Thêm Vấn Đề Mới</h2>
    
    <div class="card shadow-lg rounded-3">
        <div class="card-body">
            <form action="{{ route('issues.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="computer_id" class="form-label fs-5">Máy tính</label>
                    <select name="computer_id" id="computer_id" class="form-select @error('computer_id') is-invalid @enderror">
                        <option value="">Chọn máy tính</option>
                        @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}" {{ old('computer_id') == $computer->id ? 'selected' : '' }}>
                                {{ $computer->computer_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('computer_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="reported_by" class="form-label fs-5">Người báo cáo</label>
                    <input type="text" name="reported_by" id="reported_by" class="form-control @error('reported_by') is-invalid @enderror" value="{{ old('reported_by') }}" placeholder="Nhập tên người báo cáo">
                    @error('reported_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="reported_date" class="form-label fs-5">Thời gian báo cáo</label>
                    <input type="datetime-local" name="reported_date" id="reported_date" class="form-control @error('reported_date') is-invalid @enderror" value="{{ old('reported_date') }}">
                    @error('reported_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fs-5">Mô tả</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Nhập mô tả vấn đề">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="urgency" class="form-label fs-5">Mức độ</label>
                    <select name="urgency" id="urgency" class="form-select @error('urgency') is-invalid @enderror">
                        <option value="Low" {{ old('urgency') == 'Low' ? 'selected' : '' }}>Low</option>
                        <option value="Medium" {{ old('urgency') == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="High" {{ old('urgency') == 'High' ? 'selected' : '' }}>High</option>
                    </select>
                    @error('urgency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label fs-5">Trạng thái</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="Open" {{ old('status') == 'Open' ? 'selected' : '' }}>Open</option>
                        <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Resolved" {{ old('status') == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg px-4 py-2">Thêm Vấn Đề</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
