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
                <select name="" id="" onchange="getexamwise(this.value)">
                    <option value="all" selected>All</option>
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
                        <th>Exam Name</th>
                        <th>Candidate Name</th>
                        <th>Phone No</th>
                        <th>Email-ID</th>
                        <th>Address</th>
                        <th>Dated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($candidates as $c)
                    <tr>
                        <td>{{ $c->exam_name }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->phoneno }}</td>
                        <td>{{ $c->emailid }}</td>
                        <td>{{ $c->address }}</td>
                        <td>{{ date('F jS', strtotime($c->created_at)) }}</td>
                        <td>
                            @if($c->status !== 'deactive')
                            <button type="button" onclick="activeme('{{ $c->id }}', '{{ $c->exam_id }}', 'deactive')" class="btn btn-success">Active</button>
                            @else
                            <button type="button" onclick="activeme('{{ $c->id }}', '{{ $c->exam_id }}', 'active')" class="btn btn-warning">Deactive</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<script id="customecode">
    $(document).ready(function(){
        $('#customecode').hide();
    });
    //active deactive candidate profile
    function activeme(id, examid, status)
    {
        $.get('catidate-change-status/'+id+'/'+examid+'/'+status, function(data){
            window.location.reload();
        });
    }
    //get candidate exam wsie
    function getexamwise(examid)
    {
        let tdsrt;
        $('#dataTable').find('tbody').html('');
        $.get('get-exam-wise/'+examid, function(data) {
            console.log(data);
            console.log(data.length);
            for(let i = 0;i < data.length;i++)
            {
                // let active = activeme(data[i].id, data[i].exam_id, 'deactive');
                // let deactive = activeme(data[i].id, data[i].exam_id, 'active');
                tdsrt = '<tr><td>'+data[i].exam_name+'</td><td>'+data[i].name+'</td><td>'+data[i].phoneno+'</td>';
                tdsrt += '<td>'+data[i].emailid+'</td><td>'+data[i].address+'</td><td>'+data[i].updated_at+'</td><td>';
                // if(data[i].status !== 'deactive')
                //     tdsrt += '<button type="button" onclick="'+activeme+'" class="btn btn-success">Active</button>';
                // else
                //     tdsrt += '<button type="button" onclick="'+deactive+'" class="btn btn-warning">Deactive</button>';
                tdsrt += '</td></tr>';
                $('#dataTable').find('tbody').append(tdsrt);
            }
        });
    }
</script>
<!-- /.container-fluid -->
<script src="{{ asset('adminassets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminassets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminassets/js/demo/datatables-demo.js') }}"></script>
@endsection