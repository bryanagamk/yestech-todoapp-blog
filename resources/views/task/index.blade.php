@extends('template.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin strecth-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="d-flex justify-content-between align-items-center">
                                    Task List
                                    <a href="{{ route('task.create') }}" class="btn btn-primary">Add Task</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Task Name</td>
                                            <td>Assigned To</td>
                                            <td>Due Date</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td><a href="{{ route('task.show', [$item->id]) }}">{{ $item->name }}</a>
                                                </td>
                                                <td>{{ $item->assigned_to }}</td>
                                                <td>{{ $item->due_date }}</td>
                                                <td>
                                                    <a class="mr-2" href="{{ route('task.edit', [$item->id]) }}">Edit</a>
                                                    <a class="mr-2" href="{{ route('task.delete', [$item->id]) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                    Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                        template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                    with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
