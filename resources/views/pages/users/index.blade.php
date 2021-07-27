@extends('layouts.main')

@section('breadcrumb')
    @php echo breadcrumb([ ['title' => 'Master'], ['url' => url('/users'), 'title' => 'Users'] ]) @endphp
@endsection


@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Table</h6>
        <p class="card-description">All users can acces this application.</p>
        <a class="btn btn-primary btn-sm mb-3 text-white" href="{{ route('users.create') }}"><i data-feather="plus"></i> Add Users</a>
        <div class="table-responsive">
          <table id="tb-users" class="table" style="width:100%">
            <thead class="bg-primary ">
              <tr>
                <th class="text-white">UserId</th>
                <th class="text-white">Username</th>
                <th class="text-white">Group</th>
                <th class="text-white">Status</th>
                <th class="text-white">Actions</th>
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
    $('#tb-users').DataTable({
      "processing": true,
      "serverSide": false,
      "destroy": true,
      "ajax": "{{ url('users') }}",
      "columns": [
          { "data": "userid" },
          { "data": "username" },
          { "data": "usergroupid" },
          { "data": "aktif_label" },
          { "data": "btn_actions" },
      ],
      "drawCallback": function( settings ) {
          feather.replace();
      }
    })
  })

</script>
@endpush