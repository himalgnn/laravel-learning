@extends('backend.layout.dashboard_master')
@section('panel','Category')
@section('title','Edit Category')
@section('main-content')

    <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Accordion-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Edit {{$panel}}

                  <a href="{{ route('backend.category.index') }}" class="btn btn-success">List {{ $panel }}</a>
                  
                  </div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">
                    @include('backend.includes.flash_message')  
                    <form enctype="multipart/form-data" action="{{ route('backend.category.update', $record->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        @include('backend.includes.input_field',['name' => 'title','title' => 'Category Title', 'value'=>$record->title])
                        @include('backend.includes.input_field',['name' => 'slug','title' => 'Slug', 'value'=>$record->slug])
                        @include('backend.includes.input_field',['name' => 'description','title' => 'Description', 'value'=>$record->description])
                        @include('backend.includes.input_field',['name' => 'rank','title' => 'Rank', 'value'=>$record->rank])
                       
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
                            @if($record->status == 1)
                                <input type="hidden" name="status" value="1">
                                <input type="radio" name="status" value="1" checked>Active
                                <input type="radio" name="status" value="0">Inactive
                                @else
                                <input type="hidden" name="status" value="0">
                                <input type="radio" name="status" value="1">Active
                                <input type="radio" name="status" value="0" checked>Inactive
                            @endif
                                
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