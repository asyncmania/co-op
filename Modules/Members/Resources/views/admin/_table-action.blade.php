@if(has_access('members.show'))
    {!! edit_btn(route('admin.members.show',$id)) !!}
@endif
@if(has_access('members.edit'))
    {!! edit_btn(route('admin.members.edit',$id)) !!}
@endif
@if(has_access('members.destroy'))
    {!! delete_btn(route('admin.members.destroy',$id)) !!}
@endif