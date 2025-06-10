@extends('backend.layout.dashboard_master')
@section('panel','Setting')
@section('title','Edit Setting')
@section('main-content')

    <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Accordion-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Edit Setting</div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">
                    @include('backend.includes.flash_message')  
                    <form enctype="multipart/form-data" action="{{ route('backend.setting.update', $setting->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        @include('backend.includes.input_field',['name' => 'website_title','title' => 'Website Title', 'value'=>$setting->website_title])
                        @include('backend.includes.input_field',['name' => 'slogan','title' => 'Slogan', 'value'=>$setting->slogan])
                        @include('backend.includes.input_field',['name' => 'address','title' => 'Address', 'value'=>$setting->address])
                        @include('backend.includes.input_field',['name' => 'phone','title' => 'Phone', 'value'=>$setting->phone])
                        @include('backend.includes.input_field',['name' => 'email','title' => 'Email', 'value'=>$setting->email])
                        @include('backend.includes.input_field',['name' => 'twitter','title' => 'Twitter', 'value'=>$setting->twitter])
                        @include('backend.includes.input_field',['name' => 'instagram','title' => 'Instagram', 'value'=>$setting->instagram])
                        @include('backend.includes.input_field',['name' => 'facebook','title' => 'Facebook', 'value'=>$setting->facebook])
                        @include('backend.includes.input_field',['name' => 'linkedin','title' => 'Linkedin', 'value'=>$setting->linkedin])
                        @include('backend.includes.input_field',['name' => 'google_map','title' => 'Google Map', 'value'=>$setting->google_map])
                        @include('backend.includes.input_field',['name' => 'youtube','title' => 'Youtube', 'value'=>$setting->youtube])
                        <div class="form-group">
                            <label for="logo_top">Logo(top)</label>
                            <input id="logo_top" type="file" name="logo_top_file"
                                class="form-control"  />
                            @error('logo_top_file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="logo_bottom">Logo(bottom)</label>
                            <input id="logo_bottom" type="file" name="logo_bottom_file"
                                class="form-control"  />
                            @error('logo_bottom_file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input id="favicon" type="file" name="favicon_file"
                                class="form-control"  />
                            @error('favicon_file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="submit"
                                class="btn btn-success" value="Update" />
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