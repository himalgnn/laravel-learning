@extends('backend.layout.dashboard_master')
@section('panel','Tag')
@section('title','List '. $panel)
@section('main-content')

    <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Accordion-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">List {{$panel}}
                      <a href="{{ route('backend.tag.create') }}" class="btn btn-primary">Create {{ $panel }}</a>
                      <a href="{{ route('backend.tag.trash') }}" class="btn btn-danger">{{ $panel }} Trash</a>

                  </div>
                </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">
                    @include('backend.includes.flash_message')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                           
                            <th>Status</th>
                            <!-- <th>Image</th>
                            <th>Icon</th> -->
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $category)
                            <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->description }}</td>
                            
                            <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                            <!-- <td><img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->title }}" width="50"></td>
                            <td><img src="{{ asset('storage/'.$category->icon) }}" alt="{{ $category->title }}" width="50"></td> -->
                            <td>
                                <a href="{{ route('backend.tag.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('backend.tag.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Trash</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!--end::Body-->
                </div>
                <!--end::Accordion-->
               
              </div>
            
@endsection