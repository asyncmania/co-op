@if(has_access('ledgers.show'))
    {!! edit_btn(route('admin.ledgers.show',$id)) !!}
@endif
@if(has_access('ledgers.edit'))
    {!! edit_btn(route('admin.ledgers.edit',$id)) !!}
@endif
@if(has_access('ledgers.destroy'))
    {!! delete_btn(route('admin.ledgers.destroy',$id)) !!}
@endif