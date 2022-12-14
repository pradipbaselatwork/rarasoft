@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banner Slider</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if(Session::has('error_message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('error_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    
    @error('url')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @enderror 
    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">{{ $title}}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <form
        @if(!empty($allbannerdata['id'])) action="{{route('admin.add.edit.allbanner',$allbannerdata['id'])}}" @else action="{{route('admin.add.edit.allbanner')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title"
                  @if(!empty($allbannerdata['title']))
                  value= "{{$allbannerdata['title']}}"
                  @else value="{{old('title')}}"
                  @endif>
                </div>

                <div class="form-group">
                    <label for="image">Service Banner</label>
                    <input type="file" class="form-control" id="image" name="image" @if(!empty($allbannerdata['image']))
                  value= "{{$allbannerdata['image']}}"
                  @else value="{{old('image')}}"
                  @endif><br>
                  @if(!empty($allbannerdata['image']))
                  <img src="{{asset($allbannerdata['image'])}}" width="100" height="100" alt="" srcset=""><a href="">&nbsp;&nbsp;</a> 
                @endif
                </div>    

                <div class="form-group">
                    <label for="image_1">Project Banner</label>
                    <input type="file" class="form-control" id="image_1" name="image_1" @if(!empty($allbannerdata['image_1']))
                  value= "{{$allbannerdata['image_1']}}"
                  @else value="{{old('image_1')}}"
                  @endif><br>
                  @if(!empty($allbannerdata['image_1']))
                  <img src="{{asset($allbannerdata['image_1'])}}" width="100" height="100" alt="" srcset=""><a href="">&nbsp;&nbsp;</a> 
                @endif
                </div>  

               
                <div class="form-group">
                    <label for="image_2">Contact Banner</label>
                    <input type="file" class="form-control" id="image_2" name="image_2" @if(!empty($allbannerdata['image_2']))
                  value= "{{$allbannerdata['image_2']}}"
                  @else value="{{old('image_2')}}"
                  @endif><br>
                  @if(!empty($allbannerdata['image_2']))
                  <img src="{{asset($allbannerdata['image_2'])}}" width="100" height="100" alt="" srcset=""><a href="">&nbsp;&nbsp;</a> 
                @endif
                </div> 

                <div class="form-group">
                  <label for="image_3">About Banner</label>
                  <input type="file" class="form-control" id="image_3" name="image_3" @if(!empty($allbannerdata['image_3']))
                value= "{{$allbannerdata['image_3']}}"
                @else value="{{old('image_3')}}"
                @endif><br>
                @if(!empty($allbannerdata['image_3']))
                <img src="{{asset($allbannerdata['image_3'])}}" width="100" height="100" alt="" srcset=""><a href="">&nbsp;&nbsp;</a> 
              @endif
              </div> 

              <div class="form-group">
                <label for="image_4">OurTeam Banner</label>
                <input type="file" class="form-control" id="image_4" name="image_4" @if(!empty($allbannerdata['image_4']))
              value= "{{$allbannerdata['image_4']}}"
              @else value="{{old('image_4')}}"
              @endif><br>
              @if(!empty($allbannerdata['image_4']))
              <img src="{{asset($allbannerdata['image_4'])}}" width="100" height="100" alt="" srcset=""><a href="">&nbsp;&nbsp;</a> 
            @endif
            </div> 
                    
            </div>
          </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{$button}}</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

