@extends('admin.layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Exam Question Details</h1>
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
                    <th>Eaxm Name</th>
                    <th>Set Name/No</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Opt1</th>
                    <th>Opt2</th>
                    <th>Opt3</th>
                    <th>Opt1</th>
                    <th>Opt5</th>
                    <th>Marks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($questions as $q)
                <tr>
                    <td>{{ $q->exam_name }}</td>
                    <td>{{ $q->set_name }}</td>
                    <td>{{ $q->question }}</td>
                    <td>{{ $q->currect_ans }}</td>
                    <td>{{ $q->ans_a }}</td>
                    <td>{{ $q->ans_b }}</td>
                    <td>{{ $q->ans_c }}</td>
                    <td>{{ $q->ans_d }}</td>
                    <td>{{ $q->ans_d }}</td>
                    <td>{{ $q->marks }}</td>
                    <td>
                      <a href="#!" onclick="editfunc('{{ $q->id }}')" type="button"><i class="fas fa-pencil-alt"></i></a> | 
                      <a href="#!" onclick="deletefunc('{{ $q->id }}')" type="button"><i class="fas fa-trash"></i></a> 
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        </div>
    </div>
  </div>
</div>
<form action="{{ url('admin/exam-que-from') }}" method="post" enctype="multipart/form-data">
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
                <div class="col-md-6">
                  <label for="name">Exam Name</label>
                    <select name="exam_id" id="exam_id" onchange="getsetnos(this.value)">
                        <option value="null" selected disabled>Choose One--</option>
                        @foreach($exams as $e)
                            <option value="{{ $e->id }}">{{ $e->exam_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('exam_id'))
                        <div class="alert alert-warning">{{$errors->first('exam_id')}}</div>
                    @endif
                </div>
                <div class="col-md-6 examset" style="display:none;">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                  <h6>Question Info:</h6>
              </div>
              <div class="col-md-9">
                  <div class="row">
                      <div class="col-md-12">
                          <label for="question">Question</label>
                          <input type="text" name="question" id="question" class="form-control"> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <label for="question">Answer</label>
                          <input type="text" name="answer" id="answer" class="form-control" placeholder="Wright Answer"> 
                      </div>
                      <div class="col-md-6">
                          <label for="question">Marks</label>
                          <input type="text" name="mark" id="mark" class="form-control" placeholder="Question Marks"> 
                      </div>
                  </div>
              </div>
          </div>
          <hr />
          <div class="row">
              <div class="col-md-3">
                  <h6>Options Info:</h6>
              </div>
              <div class="col-md-9">
                  <div class="row">
                      <div class="col-md-3">
                          <!-- <label for="opt1">Option One</label> -->
                          <input type="text" name="opt1" id="opt1" class="form-control" placeholder="One"> 
                      </div>
                      <div class="col-md-3">
                          <!-- <label for="question">Option Two</label> -->
                          <input type="text" name="opt2" id="opt2" class="form-control" placeholder="Two"> 
                      </div>
                      <div class="col-md-3">
                          <!-- <label for="question">Option Three</label> -->
                          <input type="text" name="opt3" id="opt3" class="form-control" placeholder="Three"> 
                      </div>
                      <div class="col-md-3">
                          <!-- <label for="question">Option Four</label> -->
                          <input type="text" name="opt4" id="opt4" class="form-control" placeholder="Four"> 
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
<script id="customcode">
  $(document).ready(function(){
    $('#customcode').hide();
  });
  function getsetnos(examid)
  {
    let optionstr;
    $.get('get-setnos/'+examid, function(data){
      $('.examset').html('');
      if(data.length > 0){
        $('.examset').removeAttr('style');
        optionstr = '<option value="null" selected disabled>Choose One--</option>'
        for(let i = 0;i < data.length;i++)
        {
          optionstr += '<option value="'+data[i]["id"]+'" data-examid="'+data[i]["exam_id"]+'" data-setname="'+data[i]["set_name"]+'">';
          optionstr += data[i]['set_name'];
          optionstr += '</option>';
        }
        $('.examset').append('<label for="name" id="labelsetno">Set No.</label>');
        $('.examset').append('<select name="setno" id="setno">'+optionstr+'</select>');
      }else{
        alert("Something Went Wrong!!");
      }
    });
  }
  //delete function 
  function deletefunc(id)
  {
    $.get('question-delete/'+id, function(data){
      location.reload();
    });
  }
</script>
<!-- /.container-fluid -->
@endsection