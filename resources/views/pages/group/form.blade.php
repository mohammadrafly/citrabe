@extends('layouts.main')

@section('breadcrumb')
    @php 
        if(isset($group)) {
            $caption = 'Edit User Group';
        }else{
            $caption = 'Add User Group';
        }
    @endphp
    @php echo breadcrumb([ ['title' => 'Master'], ['url' => url('/group'), 'title' => 'Group'], ['title' => $caption] ]) @endphp
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h6 class="card-title">@if(isset($group)) Edit @else Add @endif Group</h6>
            <form id="form-user" action="{{ route('group.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>UserGroupId *</label>
                    @if($errors->has('usergroupid'))
                        <small class="d-block mt-2 text-danger">{{ $errors->first('usergroupid') }}</small>
                    @endif
                    <input type="text" name="usergroupid" class="form-control" autocomplete="off" value="@isset($group) {{ $group->usergroupid }} @else {{ old('usergroupid') }} @endisset" @isset($group) readonly @endisset  required />
                </div>
                <div class="form-group">
                    <label>UserGroupName *</label>
                    @if($errors->has('usergroupname'))
                        <small class="d-block mt-2 text-danger">{{ $errors->first('usergroupname') }}</small>
                    @endif
                    <input type="text" name="username" class="form-control" autocomplete="off" value="@isset($group) {{ $group->usergroupname }} @else {{ old('usergroupname') }} @endisset" required />
                </div>
                
                @php 
                    if(isset($group) ){
                        $state = 'update' ;
                    }else{
                        $state = 'insert' ;
                    }
                @endphp
                <input name="state" type="hidden" value="{{ $state }}"/>
                <button class="btn btn-primary" type="submit"><i data-feather="save"></i> Save</button>
                <a class="btn btn-light" href="{{ route('group.index') }}"><i data-feather="arrow-left"></i> Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection