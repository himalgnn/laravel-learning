@extends('backend.layout.dashboard_master')
@section('panel','Category')
@section('title', $panel . ' Trash')
@section('main-content')

    <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Accordion-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Trash {{$panel}}
                      <a href="{{ route('backend.category.create') }}" class="btn btn-primary">Create {{ $panel }}</a>
                      <a href="{{ route('backend.category.index') }}" class="btn btn-success">List {{ $panel }}</a>

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
                            <th>Rank</th>
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
                            <td>{{ $category->rank }}</td>
                            <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                            <!-- <td><img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->title }}" width="50"></td>
                            <td><img src="{{ asset('storage/'.$category->icon) }}" alt="{{ $category->title }}" width="50"></td> -->
                            <td>
                                <form action="{{ route('backend.category.restoreTrash', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-success">Restore</button>
                                </form>
                                <form action="{{ route('backend.category.deleteTrash', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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