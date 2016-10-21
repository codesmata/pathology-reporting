@extends('layouts.app')

@section('content')
    <a class="btn btn-success" href="{{ URL::previous() }}">Go Back</a>
    <h3> Available Reports</h3>

    <a style="margin: 5px;" href="{{ url('/operator/reports/create')}}" class="pull-right btn btn-warning btn-md">Create a New Patient</a>

    @if (count($reports) > 0)
            <!-- INLINE FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    {{--<h4><i class="fa fa-angle-right"></i> Advanced Table</h4>
                    <hr>--}}
                    <thead>
                    <tr>
                        <th> Date</th>
                        <th> User Id</th>
                        <th><i class="fa fa-user"></i> Name</th>
                        <th> Summary</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td>{{$report->created_at->diffForHumans()}}</td>
                            <td>{{$report->user->patient_id }}</td>
                            <td>{{$report->user->name }}</td>
                            <td>{{$report->summary}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ url('/operator/reports/'.$report->id) }}"><i class="fa fa-btn fa-eye"></i>View</a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ url('/operator/reports/'.$report->id.'/edit') }}"><i class="fa fa-btn fa-eye"></i>Edit</a>
                            </td>
                            <td>
                            <td>
                                <form action="{{ url('operator/reports/'.$report->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button id="delete_button" type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->
    @else
        <div class="alert alert-danger">There are no reports available.</div>
    @endif
    <script type="text/javascript">
/*        $(document).ready(function(){
            var deleteButton = document.getElementById("delete_button");
            deleteButton.addEventListener('click', function(event){
                event.preventDefault();
                var areYouSure = confirm("Are you sure you want to delete this patient?");
                if(areYouSure === true) {
                    document.delete_form.submit();
                } else {
                    document.delete_form.onsubmit = function (event) {
                        event.preventDefault();
                        return false;
                    }
                }
            });
        });*/
    </script>
@endsection