@if(has_access('balances.show'))
    {!! edit_btn(route('admin.balances.show',$id)) !!}
@endif
@if(has_access('balances.edit'))
    {!! edit_btn(route('admin.balances.edit',$id)) !!}
@endif
@if(has_access('balances.destroy'))
    {!! delete_btn(route('admin.balances.destroy',$id)) !!}
@endif