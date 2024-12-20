<td>
    <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning btn-sm">Sửa</a>
    <!-- Form xóa vấn đề với xác nhận -->
    <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
    </form>
</td>
