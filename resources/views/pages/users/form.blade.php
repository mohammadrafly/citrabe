@extends('layouts.main')

@section('breadcrumb')
    @php 
        if(isset($user)) {
            $caption = 'Edit User';
        }else{
            $caption = 'Add User';
        }
    @endphp
    @php echo breadcrumb([ ['title' => 'Master'], ['url' => url('/users'), 'title' => 'Users'], ['title' => $caption  ] ]) @endphp
@endsection

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h6 class="card-title">@if(isset($user)) Edit @else Add @endif User</h6>
            <form id="form-user" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Group *</label>
                    @if($errors->has('usergroupid'))
                        <small class="d-block mt-2 text-danger">{{ $errors->first('usergroupid') }}</small>
                    @endif
                    <select name="usergroupid" class="form-control" required >
                        <option value="">~Select one~</option>
                        @foreach($group as $g)
                            <option value="{{ $g->usergroupid }}" @if(isset($user) && $user->usergroupid == $g->usergroupid) selected @endif >{{ $g->usergroupname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>UserId *</label>
                    @if($errors->has('userid'))
                        <small class="d-block mt-2 text-danger">{{ $errors->first('userid') }}</small>
                    @endif
                    <input type="text" name="userid" class="form-control" autocomplete="off" value="@isset($user) {{ $user->userid }} @else {{ old('userid') }} @endisset" @isset($user) readonly @endisset  required />
                </div>
                <div class="form-group">
                    <label>Username *</label>
                    @if($errors->has('username'))
                        <small class="d-block mt-2 text-danger">{{ $errors->first('username') }}</small>
                    @endif
                    <input type="text" name="username" class="form-control" autocomplete="off" value="@isset($user) {{ $user->username }} @else {{ old('username') }} @endisset" @isset($user) readonly @endisset required />
                </div>
                @if(!isset($user))
                <div class="form-group">
                    <label>Password *</label>
                    @if($errors->has('userpassword'))
                        <small class="d-block mt-2 text-danger">{{ $errors->first('userpassword') }}</small>
                    @endif
                    <input type="password" name="userpassword" class="form-control" autocomplete="off" required />
                </div>
                @endisset
                <div class="form-group">
                    <label class="d-block">Status Active*</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="aktif" id="aktif" value="1" @if(isset($user) && $user->aktif == '1') checked @endif  />
                            Yes
                        </label>
                    </div>
                </div>

                @php 
                    if(isset($user) ){
                        $state = 'update' ;
                    }else{
                        $state = 'insert' ;
                    }
                @endphp
                <input name="state" type="hidden" value="{{ $state }}"/>
                <button class="btn btn-primary" type="submit"><i data-feather="save"></i> Save</button>
                <a class="btn btn-light" href="{{ route('users.index') }}"><i data-feather="arrow-left"></i> Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('vendors/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<script>

    $(document).ready(function(e) {
        $('.max-input').maxlength({
            warningClass: "badge mt-1 badge-success",
            limitReachedClass: "badge mt-1 badge-danger"
        });

        $("#form-user").validate({
            errorPlacement: function(label, element) {
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            },
            highlight: function(element, errorClass) {
                $(element).parent().addClass('has-danger')
                $(element).addClass('form-control-danger')
            }
        });
    })
</script>
@endpush