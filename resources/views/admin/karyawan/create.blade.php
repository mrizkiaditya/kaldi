@extends('admin.layout.main')


@section('container')
<form action="{{ url('admin/karyawan') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <ul>
        <li>
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" required value="">
        </li>
        <li>
            <label for="title">Nama :</label>
            <input type="text" name="nama" id="nama" required>
        </li>
        <li>
            <label for="description">Description :</label>
            <input type="text" name="description" id="description" required>
        </li>
        <li>
            <button type="submit" name="Upload">Add</button>
        </li>
    </ul>
</form>
@endsection