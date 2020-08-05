@if(has_access('companies.show'))
    {!! edit_btn(route('admin.companies.show',$id)) !!}
@endif
@if(has_access('companies.edit'))
    {!! edit_btn(route('admin.companies.edit',$id)) !!}
@endif
@if(has_access('companies.destroy'))
    {!! delete_btn(route('admin.companies.destroy',$id)) !!}
@endif