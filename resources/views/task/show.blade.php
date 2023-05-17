@extends('template.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin strecth-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                Detail Task
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <p>Name:</p>
                                <h6>{{ $task->name }}</h6>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <p>Assigned to:</p>
                                <h6>{{ $task->assigned_to }}</h6>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <p>Due Date:</p>
                                <h6>{{ $task->due_date }}</h6>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <p>Description:</p>
                                <h6>{{ $task->description }}</h6>
                            </div>
                            <a class="btn btn-primary" href="{{route('task.index')}}">Back</a>
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
