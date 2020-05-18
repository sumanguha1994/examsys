@extends('admin.layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Exam Details</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-clock"></i> {{ date('F jS') }}</a>
  </div>
</div>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i></button></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Banner</th>
                    <th>Created date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($exams as $e)
                <tr>
                    <td>{{ $e->exam_name }}</td>
                    <td></td>
                    <td>{{ date('F jS, Y H:i:s a', strtotime($e->created_at)) }}</td>
                    <td>
                      <a href="#!" onclick="editfunc('{{ $e->id }}')" type="button"><i class="fas fa-pencil-alt"></i></a> | 
                      <a href="#!" onclick="deletefunc('{{ $e->id }}')" type="button"><i class="fas fa-trash"></i></a> 
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        </div>
    </div>
  </div>
</div>
<form action="{{ url('admin/exam-from') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Exam Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <h6>Exam Info:</h6>
            </div>
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-12">
                  <label for="name">Name</label>
                  <input type="text" name="exam_name" id="exam_name" class="form-control" placeholder="Exam Name: WBSC">
                  @if($errors->has('email'))
										<div class="alert alert-warning">{{$errors->first('exam_name')}}</div>
									@endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="name">Banner</label>
                  <input type="file" name="exam_banner" id="exam_banner" class="form-control" style="border:none;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- /.container-fluid -->
@endsection