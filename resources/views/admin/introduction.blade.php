@extends('admin.layout')
@section('admin_content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Introduction</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Introduction</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <form id="form_post_id" method="POST">
                        {{ csrf_field() }}  
                        <div class="form-group">
                            <label for="summernote_id">Content</label>
                            <textarea name="content" rows="10" id="summernote_id">{{$data->content}}</textarea>
                        </div>
                        <button id="button_submit" type="button" class="btn btn-primary" style="flex-grow: 1;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
</section>
@endsection
@section('script_admin')
<script>
    $(function() {
        toastr.options.timeOut = 2000;
        $('#summernote_id').summernote({
            height: 150
        })
        $("#button_submit").on('click', function(e) {
            e.preventDefault();
            let dataSend = $("#form_post_id").serializeArray();
            $.ajax({
                url: "{{URL::to('/change-introduction')}}"
                , data: dataSend
                , mimeType: "multipart/form-data"
                , dataType: 'json'
                , type: "post"
                , success: function(json) {
                    if (!json.error) {
                        toastr.success(json.msg);
                        setTimeout(() => {
                            window.location.reload();
                        }, 300);
                    } else {
                        toastr.error(json.msg)
                    }
                    return true;
                }
                , error: function(e) {
                    console.log(e)
                }
            })
            return true;
        })

    })

</script>
@endsection
