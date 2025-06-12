@extends('backend.layout.dashboard_master')
@section('panel','Tag')
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
                            @foreach($records as $tag)
                            <tr>
                            <td>{{ $tag->title }}</td>
                            <td>{{ $tag->slug }}</td>
                            <td>{{ $tag->description }}</td>
                            <td>{{ $tag->status ? 'Active' : 'Inactive' }}</td>
                            <!-- <td><img src="{{ asset('storage/'.$tag->image) }}" alt="{{ $tag->title }}" width="50"></td>
                            <td><img src="{{ asset('storage/'.$tag->icon) }}" alt="{{ $tag->title }}" width="50"></td> -->
                            <td>
                                <form action="{{ route('backend.tag.restoreTrash', $tag->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-success">Restore</button>
                                </form>
                                <form action="{{ route('backend.tag.deleteTrash', $tag->id) }}" method="POST" style="display:inline;">
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