@extends('admin.layout.main')


@section('container')
<form action="{{ url('admin/ala_carte') }}" method="POST" enctype="multipart/form-data">
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
@endsection