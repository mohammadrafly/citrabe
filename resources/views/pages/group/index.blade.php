@extends('layouts.main')

@section('breadcrumb')
    @php echo breadcrumb([ ['title' => 'Master'], ['url' => url('/group'), 'title' => 'Group'] ]) @endphp
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Table</h6>
        <p class="card-description">All group name in this application.</p>
        <a class="btn btn-primary btn-sm mb-3 text-white" href="{{ route('group.create') }}"><i data-feather="plus"></i> Add Group</a>
        <div class="table-responsive">
          <table id="tb-group" class="table" style="width:100%">
            <thead class="bg-primary ">
              <tr>
                <th class="text-white">GroupId</th>
                <th class="text-white">Group Name</th>
                <th class="text-white">Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
      </div>
    </div>
  </div>
</div>

@endsection

@push('css')

<link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

@endpush

@push('scripts')

<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#tb-group').DataTable({
      "processing": true,
      "serverSide": false,
      "destroy": true,
      "ajax": "{{ url('group') }}",
      "columns": [
          { "data": "usergroupid" },
          { "data": "usergroupname" },
          { "data": "btn_actions" },
      ],
      "drawCallback": function( settings ) {
          feather.replace();
      }
    })
  })

</script>
@endpush