@extends('backened.layouts.master')


@section('content')



<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Banner
                       </h2>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ul>

                    <p class="float-right">
                        Total Banners: {{ \App\Models\Banner::count() }}
                        <h1><a href="{{ route('banner.create') }}" class="btn btn-xs btn-primary ml-2">Create Banner</a></h1>
                    </p>

                </div>

            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">


                <div class="col-lg-12">

                    @include('backened.layouts.notification')

                </div>

                <div class="card">
                    <div class="header">
                        <h2><strong>Banner</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Condition</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0
                                    @endphp
                                    @foreach ($banner as $banner)

                                    @php
                                        $i=$i+1;
                                    @endphp

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$banner->title}}</td>
                                        <td>{{$banner->description}}</td>
                                        <td> <img src="{{$banner->photo}}" alt="banner image" style="max-height: 90px;max-width:120px"> </td>
                                        <td>
                                            @if ($banner->condition=='banner')
                                                <span class="badge badge-success">{{$banner->condition}}</span>
                                            @else
                                                <span class="badge badge-primary">{{$banner->condition}}</span>
                                            @endif
                                        </td>
                                        <td><input type="checkbox" name="toggle" value="{{$banner->id}}" data-toggle="switchbutton" {{$banner->status=='active'?'checked':''}} data-onlabel="active" data-offlabel="inactive" data-onstyle="success" data-offstyle="danger">
                                        </td>
                                        <td>

                                            <a href="{{route('banner.edit',$banner->id)}}" data-toggle="tooltip" title="edit" data-placement="bottom" class="float-left btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>


                                            <form class="float-left" action="{{route('banner.destroy',$banner->id)}}" method="post">

                                                @csrf
                                                @method('delete')
                                                <a href="" data-toggle="tooltip" title="delete" data-placement="bottom" class="dltBtn btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                            </form>




                                        </td>
                                    </tr>

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection

@section('script')

<script>

$('input[name="toggle"]').change(function() {
    var mode = $(this).prop('checked');
    var id = $(this).val();
    $.ajax({
        url: "{{ route('banner.status') }}",
        type: "POST",
        data: {
            _token: '{{ csrf_token() }}', // Corrected syntax
            mode: mode,
            id: id,
        },
        success: function(response) {
            if(response.status){
                alert(response.msg);
            }else{
                alert('Please try again!');
            }
        }
    });
});


</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>


    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.dltBtn').click(function(e){
    var form=$(this).closest('form');
    var dataID=$(this).data('id');
    e.preventDefault();
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    form.submit();
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
})
</script>



@endsection
