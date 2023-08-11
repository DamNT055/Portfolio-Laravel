@extends('admin.layout')
@section('admin_content')
<!-- Content Header (Page header) -->
<style>
    .dataTables_wrapper.dt-bootstrap4.no-footer {
        position: static;
    }

</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>What doing</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">What doing</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ol class="breadcrumb float-sm-right" style="background-color: transparent; margin: 0; padding:0;z-index:100;">
                            <li class="breadcrumb-item">
                                <button type="button" class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#modal-default" onclick="addPost()">
                                    <i class="fa fa-plus" style="font-size: 0.7rem;"></i> Add</button>
                            </li>
                        </ol>
                        <table id="tb_all_id" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Icon</th>
                                    <th>Content</th>
                                    <th>Create At</th>
                                    <th>Upadate At</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal_title_id" class="modal-title">Add Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-0">
                <form id="form_post_id">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title_id">Title</label>
                        <input name="title" type="text" class="form-control" id="title_id" placeholder="Enter title" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Icon</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label id="file_label" class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content_id">Content</label>
                        <textarea name="content" class="form-control" name="" id="content_id" rows="4" placeholder="Enter content" value=""></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="button_submit" type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endsection
@section('script_admin')
<script>
    var table = false;
    var tbdata = [];
    var url_ajax = "{{URL::to('/save-what-doing')}}";
    toastr.options.timeOut = 2000;
    $(document).ready(function() {
        var image_content = "";
        $('#exampleInputFile').on('change', async function() {
            const [file] = $(this).prop("files");
            if (file) {
                const read_img = new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onload = () => {
                        const data = reader.result;
                        resolve(data);
                    };
                    reader.readAsDataURL(file);
                })
                $("#file_label").html(file.name);
                image_content = await read_img;
                return true;
            }
            $("#file_label").html("Choose file");
            return false;
        });
        $("#button_submit").on('click', function(e) {
            e.preventDefault();
            let dataSend = $("#form_post_id").serializeArray();
            dataSend.push({
                name: "img_file"
                , value: image_content
            });
            $.ajax({
                url: url_ajax
                , data: dataSend
                , mimeType: "multipart/form-data"
                , dataType: 'json'
                , type: "post"
                , success: function(json) {
                    if (!json.error) {
                        toastr.success(json.msg);
                        setTimeout(() => {
                            window.location.href = "/td-admin/what-doing";
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
        });
        table = $("#tb_all_id").DataTable({
            searching: false
            , autoWidth: false
            , ajax: "{{URL::to('get_all_doing')}}"
            , scrollX: true
            , order: [
                [0, 'desc']
            ]
            , columns: [{
                data: 'val_id'
            }, {
                data: 'title'
            }, {
                data: 'icon'
                , render: function(data) {
                    return '<div class="text-truncate" style="width: 100px">' + data + '</div>'
                }
            }, {
                width: "30%"
                , data: 'content'
                , render: function(data) {
                    let length = 50;
                    if (typeof data === 'string' || data instanceof String) {
                        if (data.length > length) return data.substring(0, Math.min(length, data.length)) + "...";
                    }
                    return data;
                }
            , }, {
                data: 'created_at'
            }, {
                data: 'updated_at'
            }, {
                data: 'val_id'
                , render: function(data, type, row) {
                    tbdata[data] = row;
                    return '<button onclick="editPost('+data+')" data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-xs btn-info btn-flat" style="margin-right: 5px"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>' +
                        '<button class="btn btn-xs btn-danger btn-flat" onclick="deletePost(' + data + ')"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>'
                }
            }]
        });
    })
    function addPost() {
        url_ajax = "{{URL::to('/save-what-doing')}}";
    }
    function editPost(id) {
        let curr = tbdata[id];
        $("#modal_title_id").html('Edit Modal');
        $("#title_id").val(curr.title);
        $("#content_id").val(curr.content)
        $("#file_label").html(curr.icon);
        url_ajax = "{{URL::to('/edit-what-doing')}}" +'/'+ id;
    }

    function deletePost(id) {
        if (!confirm('Chắc chắn xóa')) return false;
        url = "{{URL::to('delete_doing')}}" + '/' + id;
        $.getJSON(url, function(json) {
            if (!json.error) {
                toastr.success(json.msg);
                table.ajax.reload();
            } else {
                toastr.error(json.msg)
            }
            return true;
        })
    }

</script>
@endsection
