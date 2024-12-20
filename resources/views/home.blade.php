<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Danh sách bài viết</h1>
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-header">
                    <h5>{{ $post->title }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
