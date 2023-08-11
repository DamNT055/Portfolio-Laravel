@extends('admin.layout')
@section('admin_content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Blog Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">All Blog Post</li>
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
                        <table id="tb_all_id" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Cover Image</th>
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
@endsection
@section('script_admin')
<script>
    var table = false;
    toastr.options.timeOut = 2000;
    $(document).ready(function() {
        table = $("#tb_all_id").DataTable({
            searching: false
            , scrollX: true
            , ajax: "{{URL::to('get_all_blog')}}"
            , order: [
                [0, 'desc']
            ]
            , columns: [{
                data: 'id'
            }, {
                data: 'title'
            }, {
                data: 'slug'
            }, { 
                width: '150px'
                , data: 'description'
                , render: function(data) {
                    let length = 100;
                    if (typeof data === 'string' || data instanceof String) {
                        if (data.length > length) return data.substring(0, Math.min(length, data.length)) + "...";
                    }
                    return data;
                }
            }, {
                width: "50px"
                ,data: 'cover_img'
                , render: function(data) {
                    let length = 20;
                    if (typeof data === 'string' || data instanceof String) {
                        if (data.length > length) return data.substring(0, Math.min(length, data.length)) + "...";
                    }
                    return data;
                }
            }, {
                width: '200px'
                ,data: 'content'
                , render: function(data) {
                    let length = 50;
                    if (typeof data === 'string' || data instanceof String) {
                        if (data.length > length) return data.substring(0, Math.min(length, data.length)) + "...";
                    }
                    return data;
                }
            }, {
                width: '100px'
                , data: 'created_at'
            }, {
                data: 'updated_at'
            }, {
                data: 'id'
                , render: function(data) {
                    return '<a href="{{URL::to("td-admin/edit-blog")}}/' + data + '" type="button" class="btn btn-xs btn-info btn-flat" style="margin-right: 5px"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>' +
                        '<button class="btn btn-xs btn-danger btn-flat" onclick="deletePost(' + data + ')"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>'
                }
            }]
        });
    })

    function deletePost(id) {
        if (!confirm('Chắc chắn xóa')) return false;
        url = "{{URL::to('delete_post')}}" + '/' + id;
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
