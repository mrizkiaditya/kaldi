<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>upload</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
</head>
<body>
    <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            @foreach ($main as $item)
                <a href="/mainCourse">
                    <div class="icon-box" role="button" aria-pressed="true">
                        <img style="width: 50px;" src="{{ asset($item->image) }}" alt="">
                        <span class="iconify" data-icon="emojione:shallow-pan-of-food" data-width="80" data-height="80"></span>
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <ul>
            <li>
                <label for="image">Image :</label>
                <input type="file" name="image" id="image" required value="">
            </li>
            <li>
                <label for="title">title :</label>
                <input type="text" name="title" id="title" required>
            </li>
            <li>
                <label for="description">description :</label>
                <input type="text" name="description" id="description" required>
            </li>
            <li>
                <button type="submit" name="Upload">Add</button>
            </li>
        </ul>
    </form>
</body>
</html>