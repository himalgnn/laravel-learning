@extends('backend.layout.dashboard_master')
@section('panel','Category')
@section('title','Create Category')
@section('main-content')

    <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Accordion-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Create {{$panel}}

                  <a href="{{ route('backend.category.index') }}" class="btn btn-success">List {{ $panel }}</a>
                  
                  </div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">
                    @include('backend.includes.flash_message')  
                    <form enctype="multipart/form-data" action="{{ route('backend.category.store') }}" method="post">
                        @csrf
                        @include('backend.includes.input_field',['name' => 'title','title' => 'Category Title'])
                        @include('backend.includes.input_field',['name' => 'slug','title' => 'Slug'])
                        @include('backend.includes.input_field',['name' => 'description','title' => 'Description'])
                        @include('backend.includes.input_field',['name' => 'rank','title' => 'Rank'])
                       
                        <div class="form-group">
                            <label for="image">Category Image</label>
                            <input id="image" type="file" name="image_file"
                                class="form-control"  />
                            @error('image_file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="icon">Category Icon</label>
                            <input id="icon" type="file" name="icon_file"
                                class="form-control"  />
                            @error('icon_file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            
                            <input type="radio" name="status" value="1" checked>Active
                            <input type="radio" name="status" value="0">Inactive
                                
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="submit"
                                class="btn btn-success" />
                                 <input type="reset" name="clear"
                                class="btn btn-danger"  value="Clear"/>
                        </div>
                    </form>
                  </div>
                  <!--end::Body-->
                </div>
                <!--end::Accordion-->
               
              </div>
            
@endsection