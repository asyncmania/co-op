@if(has_access('contributions.show'))
    {!! edit_btn(route('admin.contributions.show',$id)) !!}
@endif
@if(has_access('contributions.edit'))
    {!! edit_btn(route('admin.contributions.edit',$id)) !!}
@endif
@if(has_access('contributions.destroy'))
    {!! delete_btn(route('admin.contributions.destroy',$id)) !!}
@endif