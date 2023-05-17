@extends('template.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin strecth-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                Create Task
                            </div>
                            <form action="{{ route('task.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="task_name">Name</label>
                                    <input type="text" class="form-control" name="task_name" id="task_name">
                                </div>
                                <div class="form-group">
                                    <label for="assigned_to">Assigned to</label>
                                    <input type="text" class="form-control" name="assigned_to" id="assigned_to">
                                </div>
                                <div class="form-group">
                                    <label for="due_date">Due Date</label>
                                    <input type="date" class="form-control" name="due_date" id="due_date">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                                </div>
                                <button class="btn btn-primary mr-2">Submit</button>
                            </form>
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
