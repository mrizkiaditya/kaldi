@extends('admin.layout.main')


@section('container')
    

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Coffee</h1>
                    </div>
                    <!-- Content Row -->
                    <a class="btn btn-primary mb-2" href="/admin/coffee/create">Tambah Data</a>
                    <div class="row">
                        <table class="table table-bordered">
                            <tr>
                                <th>NO</th>
                                <th>aksi</th>
                                <th>img</th>
                                <th>title</th>
                                <th>description</th>
                            </tr>
                            <?php $i = 1; ?>
                            @foreach ($main as $item)
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                        <a class="btn btn-warning mb-2" id="btn-admin" href="{{ url('admin/coffee'.$item->id.'/edit') }}">update</a>
                                        <form action="{{ url('admin/coffee'.$item->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            
                                            <button class="btn btn-danger" type="submit">delete</button>
                                        </form>
                                        
                                    </td>
                                    <td><img src="{{ asset($item->image) }}" width="150" height="150"></td>
                                    <td>
                                        <h4>{{ $item->title }}</h4>
                                    </td>
                                    <td>
                                        <p>{{ $item->description }}</p>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            @endsection


            