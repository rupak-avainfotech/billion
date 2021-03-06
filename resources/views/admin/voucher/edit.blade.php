@extends('layouts.admin')
@section('content')

    <section class="content-header">
        <h1>
    {{__('Coupon Brand')}}
    <small></small>
    </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
            <li class="active">{{__('Edit Coupon Brand')}}</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">    
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Edit Coupon Brand')}}</h3> 
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="cat-form" method="POST" action="{{route('vouchers.update',$voucher->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                       @csrf
                        <div class="box-body">
                            <div class="form-group">
                          
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{__('Name')}}</label>
                                    <div class="input text">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$voucher->name}}" placeholder="Name" required>
                                       @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{__('Description')}}</label>
                                    <div class="input text">
                                    <textarea id="description" class="form-control textarea" name="description" placeholder="Description here...">{!! $voucher->description !!}</textarea>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{__('Image')}}</label>
                                    <div class="input file">
                                        <input type="file" name="image" id="image" class="form-control">
                                     </div>  
                                </div>
                                 <img src="{{App\Helper::catImg($voucher->image)}}" class="previewHolderImage" style="width: 135px;"/>
                            
                            </div>
                            <!-- /.box-body --> 

                            <div class="box-footer">
                                <button class="btn btn-info" type="submit">{{__('Submit')}}</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $().ready(function() {
            $("#cat-form").validate({
                rules: {
                    name: "required",
                },
                messages: {
                    name: "Please enter name",
                }
            });
               
            
        });

        $(function () {
            //Initialize Select2 Elements
         $('.select2').select2()
        })

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('.previewHolder').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
        }

        $("#profilePic").change(function() {
        readURL(this);
        });
        
        $(function () {
         CKEDITOR.replace('description')
        })
    </script>
@endsection
