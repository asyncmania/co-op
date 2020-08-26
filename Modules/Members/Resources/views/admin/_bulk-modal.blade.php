<div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{Form::open(['route'=>'','files'=>true])}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bulk Member Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Upload Template</label>
                    {{Form::file('file',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    <a href="{{asset('uploads/templates/bulk_member_upload.xlsx')}}" target="_blank" class="text-success">
                        <i class="fa fa-download"></i> <strong>Click to Download Sample Template</strong>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Upload</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
