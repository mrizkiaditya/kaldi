@extends('admin.layout.main')


@section('container')
<form action="{{ url('admin/pasta'.$model->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <ul>
        <li>
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" required value="{{ $model->image }}">
        </li>
        <li>
            <label for="title">title :</label>
            <input type="text" name="title" id="title" required value="{{ $model->title }}">
        </li>
        <li>
            <label for="description">description :</label>
            <input type="text" name="description" id="description" required value="{{$model->description}}">
        </li>
        <li>
            <button type="submit" name="Upload">Add</button>
        </li>
    </ul>
</form>
@endsection
