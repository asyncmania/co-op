@section('page-breadcrumbs')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="{{route("admin.$module.index")}}"
       class="kt-subheader__breadcrumbs-link">@Lang($module . '::global.name')</a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
        @if(empty($id))
            @Lang($module . '::global.new')
        @else
            @Lang($module . '::global.edit')
        @endif
    </a>
@stop
{!! form_start($form,['class'=>'']) !!}
@include('core::admin._buttons-form',['top'=>true])
<div class="form-body">
    <ul class="nav nav-tabs nav-tabs-line-2x nav-tabs-line nav-tabs-line-primary">
        <li class="nav-item">
            <a href="#tab_1" data-toggle="tab" class="nav-link active">
                Basic </a>
        </li>
        <li class="nav-item">
            <a href="#tab_2" data-toggle="tab" class="nav-link">Roles </a>
        </li>
        <li class="nav-item">
            <a href="#tab_3" data-toggle="tab" class="nav-link">
                Permissions </a>
        </li>
        @if(isset($id))
            <li class="nav-item">
                <a href="#tab_4" data-toggle="tab" class="nav-link">
                    New Password </a>
            </li>
        @endif
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="row">
                <div class="col-md-6">
                    {!! form_row($form->first_name) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->last_name) !!}
                </div>
                <div class="col-md-12">
                    {!! form_row($form->email) !!}
                </div>
            </div>
            @if(isset($id))
                <div class="row kt-margin-b-15">
                    <div class="col-md-3">
                        <div class="checkbox{{ $errors->has('activated') ? ' has-error' : '' }}">
                            <input type="hidden" value="{{ $model->id === $currentUser->id ? '1' : '0' }}"
                                   name="activated"/>
                            <?php $oldValue = (bool) $model->isActivated() ? 'checked' : ''; ?>
                            <label for="activated">
                                <input id="activated"
                                       name="activated"
                                       type="checkbox"
                                       class="flat-blue"
                                       {{ $model->id === $currentUser->id ? 'disabled' : '' }}
                                       {{ Request::old('activated', $oldValue) }}
                                       value="1"/>
                                {{ trans('users::global.activated') }}
                                {!! $errors->first('activated', '<span class="help-block">:message</span>') !!}
                            </label>
                        </div>
                    </div>
                </div>
            @endif
            @if(!isset($id))
                <div class="row">
                    <div class="col-md-6">
                        {!! form_row($form->password) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->confirm_password) !!}
                    </div>
                </div>
            @endif
        </div>
        <div class="tab-pane" id="tab_2">
            <div class="form-group">
                <label>Select one or more roles</label>
                @if(!isset($id))
                    <select multiple="" class="form-control" name="roles[]">
                        <?php foreach ($roles as $role): ?>
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        <?php endforeach; ?>
                    </select>
                @else
                    <select multiple="" class="form-control" name="roles[]">
                        <?php foreach ($roles as $role): ?>
                        <option value="{{ $role->id }}" <?php echo $model->hasRoleId($role->id) ? 'selected' : '' ?>>{{ $role->name }}</option>
                        <?php endforeach; ?>
                    </select>
                @endif
            </div>
        </div>
        <div class="tab-pane" id="tab_3">
            @if(!isset($id))
                @include('users::admin._permissions_create')
            @else
                @include('users::admin._permissions', ['model' => $model])
            @endif
        </div>
        @if(isset($id))
            <div class="tab-pane" id="tab_4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input class="form-control required" value="" name="password" type="password"
                                   id="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->confirm_password) !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}