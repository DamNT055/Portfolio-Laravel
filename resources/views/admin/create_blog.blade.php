@extends('admin.layout')
@section('admin_content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Blog</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Blog</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <form id="form_post_id" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title_id">Title</label>
                            <input name="title" type="text" class="form-control" id="title_id" placeholder="Enter title" value="">
                        </div>
                        <div class="form-group">
                            <label for="slug_id">Slug</label>
                            <div class="input-group input-group-sm">
                                <input name="slug" type="text" class="form-control" id="slug_id" placeholder="Enter slug" value=""> <span class="input-group-append">
                                    <button type="button" class="btn btn-info btn-flat" style="padding:0 2rem">Edit</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="des_id">Description</label>
                            <input name="description" type="text" class="form-control" id="des_id" placeholder="Enter Description" value="">
                        </div>
                        <div class="form-group">
                            <label for="summernote_id">Content</label>
                            <textarea name="content" rows="10" id="summernote_id">
                                    Place <em>some</em> <u>text</u> <strong>here</strong>            
                            </textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-md-3">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-image"></i>
                        Background Image</h3>
                </div>
                <div class="card-body">
                    <div class="input-group justify-content-center">
                        <input type="file" class="custom-file-input" id="upload_background" hidden accept="image/png, image/jpeg, image/jpg, image/gif">
                        <label for="upload_background" class="btn btn-outline-success">
                            <i class="fas fa-upload"></i> Upload</label>
                        <img id="img-preview" src="{{asset('backend/img/img_alt.svg')}}" style="width: 100%; height:auto;" />
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button id="button_submit" type="button" class="btn btn-primary" style="flex-grow: 1;">Submit</button>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script_admin')
<script>
    $(function() {
        toastr.options.timeOut = 2000;
        var image_content = "";
        $('#summernote_id').summernote({
            height: 150
        })
        $('#upload_background').on('change', async function() {
            const [file] = $(this).prop("files");
            if (file) {
                $("#img-preview").attr('src', URL.createObjectURL(file));
                const read_img = new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onload = () => {
                        const data = reader.result;
                        resolve(data);
                    };
                    reader.readAsDataURL(file);
                })
                image_content = await read_img;
                return true;
            }
            $("#img-preview").attr('src', "{{asset('backend/img/img_alt.svg')}}");
            return false;
        })
        $("#button_submit").on('click', function(e) {
            e.preventDefault();

            let dataSend = $("#form_post_id").serializeArray();
            dataSend.push({
                name: "img_file"
                , value: image_content
            });
            $.ajax({
                url: "{{URL::to('/create-post')}}"
                , data: dataSend
                , mimeType: "multipart/form-data"
                , dataType: 'json'
                , type: "post"
                , success: function(json) {
                    if (!json.error) {
                        toastr.success(json.msg);
                        setTimeout(() => {
                            window.location.href = "/td-admin/all-blog";
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
