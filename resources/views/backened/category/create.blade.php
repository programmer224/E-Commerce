@extends('backened.layouts.master')


@section('content')



<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Category</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row clearfix">


            <div class="col-md-12">
                @if ($errors->any())

                <div class="alert alert-danger">

                    <ul>
                        @foreach ($errors->all() as $error)


                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Basic</strong> Information <small>Description text here...</small> </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">

<form action="{{route('category.store')}}" method="post">

    @csrf

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Title" value="{{old('title')}}" name="title">
                                </div>
                            </div>
                        </div>




                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Summary<span class="text-danger">*</span></label>
                                    <textarea class="form-control" placeholder="Summary" value="{{old('summary')}}" name="summary"></textarea>
                                </div>
                            </div>
                        </div>



                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Is parent<span class="text-danger">*</span></label>
                                    <input id="is_parent" type="checkbox" name="is_parent" value="1" checked>Yes
                                </div>
                            </div>
                        </div>




                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 d-none" id="parent_cat_div">
                                <label for="parent_id">Parent Category</label>
                                <select name="parent_id" class="form-control show-tick" id="">
                                    <option value="">-- Parent Category --</option>
                                </select>
                            </div>
                        </div>




                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                            <label for="">Photo<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo">
                          </div>
                          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                    </div>




                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <label for="">Status<span class="text-danger">*</span></label>
                            <select name="status" class="form-control show-tick">
                                <option value="">-- Status --</option>
                                <option value="active" {{old('status')=='active'?'selected':''}}>Active</option>
                                <option value="inactive" {{old('status')=='inactive'?'selected':''}}>Inactive</option>
                            </select>
                        </div>
                    </div>






                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                        </div>


</form>




    </div>
</div>


<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


<script>

        $('#lfm').filemanager('image');


</script>


<script>
    $('#is_parent').change(function(e){
        e.preventDefault();
        var is_checked=$('#is_parent').prop('checked');
        // alert(is_checked);
        if(is_checked)
        {
              $('#parent_cat_div').addClass('d-none');
              $('#parent_cat_div').val('');

        }else{
            $('#parent_cat_div').removeClass('d-none');
        }

    })
</script>



@endsection






