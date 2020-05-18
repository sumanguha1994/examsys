@extends('admin.layout')
@section('content')
<link href="{{ asset('adminassets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Candidates Listing</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-clock"></i> {{ date('F jS') }}</a>
  </div>
</div>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <select name="" id="">
                    <option value="all">All</option>
                    @foreach($exams as $e)
                    <option value="{{ $e->id }}">{{ $e->exam_name }}</option>
                    @endforeach 
                </select>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script src="{{ asset('adminassets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminassets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminassets/js/demo/datatables-demo.js') }}"></script>
@endsection