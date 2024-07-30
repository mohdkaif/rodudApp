@extends('layout.admin.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Activity Log</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Activity Logs</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="log_list" class="table table-hover mb-0">
                        <thead>
                            <th>Tenent Name</th>
                            <th>User Name</th>
                            <th>Event Performed</th>
                            <th>Time</th>
                            <!-- <th>Actions</th> -->
                        </thead>
                        <tbody>
                            @if(!empty($object))
                            @foreach($object as $log)
                            <tr>
                                <td>{{$log['data']['organization_name']}}</td>
                                <td>{{$log['data']['username']}}</td>
                                <td>{{$log['event']}}</td>
                                <td>{{$log['time']}}</td>
                                <!-- <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn btn-icon" href="{{url('/admin/logs/1')}}" data-toggle="tooltip" data-placement="bottom" title="View Log">
                                            <i class="fas fa-eye text-secondary"></i> 
                                        </a>
                                    </div>
                                </td> -->
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
        $('#log_list').DataTable({
            "dom": 'lrtip',
            "iDisplayLength": 100,
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "language": {
                search: ""
            }
        });
    });
    $("#example-select-all").click(function() {
        $('.checkSingle').not(this).prop('checked', this.checked);
    });
</script>
@endpush