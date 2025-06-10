<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <input id="{{ $name }}" type="text" name="{{ $name }}"
        class="form-control" placeholder="Enter {{ $title }}" 
        value="@if(isset($value)) {{ $value }} @else {{old($name)}} @endif" />
    @error($name)
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>