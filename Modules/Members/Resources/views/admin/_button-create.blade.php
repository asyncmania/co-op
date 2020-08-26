<a href="{{route('admin.'.$module. '.create')}}" class="btn btn-brand btn-sm">
    <i class="fa fa-pen"></i>
    Add a Member
</a>

<a href="{{route('admin.'.$module. '.create')}}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalLong">
    <i class="fa fa-pen"></i>
    Bulk Members Upload
</a>

@include('members::admin._bulk-modal')