@extends('layouts.master')
@section('title')
    Menu Management
@endsection
@section('page-title')
    Menu Management
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Menu Table</h4>
                        <div class="text-end">
                            <button data-bs-toggle="modal" data-bs-target="#menuCreate" class="btn btn-sm btn-info">Create
                                New</button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- Here place table --}}
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Group Name</th>
                                    <th>Menu Name</th>
                                    <th>Menu Path</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->menu_group }}</td>
                                        <td>{{ $data->menu_name }}</td>
                                        <td>{{ $data->menu_path }}</td>
                                        <td class="d-flex">
                                            <button data-bs-toggle="modal" data-bs-target="#menuEdit"
                                                data-id="{{ $data->id }}" class="btn btn-sm btn-info edit me-3"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                            <form action="{{ route('menu.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50" class="text-center text-warning">No data found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Create modal content -->
                    <div id="menuCreate" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
                        data-bs-scroll="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Create Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('menu.store') }}" method="POST">
                                        @csrf
                                        <label for="menu_group">Group name</label>
                                        <input type="text" class="form-control mb-3" placeholder="Group name"
                                            name="menu_group" value="{{ old('menu_group') }}">
                                        <label for="menu_group">Menu icon</label>
                                        <input type="text" class="form-control mb-3" placeholder="Menu Icon"
                                            name="menu_icon" value="{{ old('menu_icon') }}">

                                        <label for="menu_group">Choose Group</label>
                                        <select name="menu_perent" class="form-control">
                                            <option value="0">Select One</option>
                                            @foreach ($perents as $perent)
                                            <option value="{{$perent->id}}"> {{$perent->menu_group}} </option>
                                            @endforeach
                                        </select>

                                        <label for="menu_group">Menu name</label>
                                        <input type="text" class="form-control mb-3" placeholder="Menu name"
                                            name="menu_name" value="{{ old('menu_name') }}">
                                        <label for="menu_group">Menu path</label>
                                        <input type="text" class="form-control mb-3" placeholder="Menu path"
                                            name="menu_path" value="{{ old('menu_path') }}">
                                        <button type="submit" class="btn btn-sm btn-info mt-3">Submit</button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <!-- Edit modal content -->
                    <div id="menuEdit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
                        data-bs-scroll="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Update Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body"id="editSection">
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>


        <script>
            //edit modal show and after submit
            $('body').on('click', '.edit', function() {
                var id = $(this).data('id'); //i or 2 categoryid
                $.get("menu/" + id + "/edit",
                    function(data) {
                        $('#editSection').html(data);
                    })
            });
        </script>
    @endsection
