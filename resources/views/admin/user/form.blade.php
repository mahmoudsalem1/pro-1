<div class="col-md-6">

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label>{{ trans('admin.name', ['name' => trans('admin.user')]) }}</label>

                    {!! Form::text("name", null, [
                    'class' => 'form-control',
                    'placeholder' => trans('admin.name', ['name' => trans('admin.user')]),
                    'required'
                    ]) !!}
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div><!-- /.form-group -->

                   @if(!isset($user))
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label>{{ trans('admin.password') }}</label>
                    {!! Form::password("password", [
                    'class' => 'form-control',
                    'placeholder' => trans('admin.password'),
                    'required'
                    ]) !!}
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                    </span>
                    @endif      
                  </div><!-- /.form-group -->

                  @else
                  <div class="form-group">
                    <div class="col-md-6">
                       <label>{{ trans('admin.password') }}</label><br />
                    <a href="#" onclick="changePass();">{{ trans('admin.changePass') }}</a><br /><br /><br /><br />
                    </div>
                  </div>
                  @endif

                </div><!-- /.col -->


                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>{{ trans('admin.email') }}</label>
                    {!! Form::email("email", null, [
                    'class' => 'form-control',
                    'placeholder' => trans('admin.email'),
                    'required'
                    ]) !!}
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                    </span>
                    @endif        
                  </div><!-- /.form-group -->
                 

                </div><!-- /.col -->

                <div class="col-md-6 ">
                    <div class="form-group{{ $errors->has('isAdmin') ? ' has-error' : '' }}">
                    <label>{{ trans('admin.role') }}</label>
                    {!! Form::select("isAdmin", admin_roles(), null, [
                    'class' => 'form-control',
                    'id'    => 'isAdmin',
                    'onchange' => 'getRoles(this.value);'
                    ]) !!}
                    @if ($errors->has('isAdmin'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('isAdmin') }}</strong>
                    </span>
                    @endif
                  </div><!-- /.form-group -->
                </div><!-- /.col -->

                 <div class="col-md-12 role-group" style="display: none">
                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                    <label>{{ trans('admin.roles') }}</label>
                    {!! Form::select("role_id", $roles, null, [
                    'class' => 'form-control',
                    ]) !!}
                    @if ($errors->has('role_id'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('role_id') }}</strong>
                    </span>
                    @endif
                  </div><!-- /.form-group -->
                </div><!-- /.col -->

                    <!--<div class="col-md-12">
                      <label>{{ trans('admin.status') }}</label>

                    <input type="checkbox" class="checkbtnC" name="state" @if(isset($user)) @if($user->state == 1) checked="checked" @endif @else checked="checked"  @endif />
                   </div> -->              
                 
                  
                <div class="col-md-12">
                  <hr>
                  <div class="clear">
                  <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> {{ trans('admin.save') }}
                  </button>
                  <a href="{{ route('users.index') }}" class="btn btn-danger">
                    <i class="fa fa-times"></i> {{ trans('admin.cancel') }}
                  </a>
                </div>
                </div>

                 
<div class="modal fade changePass" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ trans('admin.changePass') }}</h4>
      </div>
      <div class="modal-body">
        <span>{{ trans('admin.password') }}</span>
        <input type="password" id="password" placeholder="{{ trans('admin.password') }}" class="form-control">
        <br />
        <div class="errors" style="display: none"></div>
        <div class="load" style=""></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.cancel') }}</button>
        @php $word = trans('admin.updated', ['name' => trans('admin.password')]) @endphp
        <button type="button" class="btn btn-primary" data-url="{{route('admin.changePass.ajax') }}" onclick="updatePassRequest(this, '{{ $word }}')">{{ trans('admin.save') }}</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->