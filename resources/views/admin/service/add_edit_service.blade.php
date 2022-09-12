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
              <li class="breadcrumb-item active">Service</li>
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
        @if(!empty($servicedata['id'])) action="{{route('admin.add.edit.service',$servicedata['id'])}}" @else action="{{route('admin.add.edit.service')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control" name="icon" id="icon" placeholder="Enter icon"
                  @if(!empty($servicedata['icon']))
                  value= "{{$servicedata['icon']}}"
                  @else value="{{old('icon')}}"
                  @endif>
                </div>

                <div class="form-group">
                <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter title"
                  @if(!empty($servicedata['title']))
                  value= "{{$servicedata['title']}}"
                  @else value="{{old('title')}}"
                  @endif>
                </div>

                {{-- <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" @if(!empty($servicedata['image']))
                value= "{{$servicedata['image']}}"
                @else value="{{old('image')}}"
                @endif><br>
                @if(!empty($servicedata['image']))
                <img src="{{asset($servicedata['image'])}}" width="100" height="100" alt="" srcset=""><a href="{{ route('admin.delete.project.image',$servicedata['id']) }}">&nbsp;&nbsp;Delete Image</a> 
              @endif
              </div>   --}}

                  
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" cols="20" class="form-control" rows="4"> @if(!empty($servicedata['description']))
                    {{$servicedata['description']}}
                    @else {{old('description')}}
                    @endif</textarea>
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

