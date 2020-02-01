@php
    $input = 'name';
@endphp
<div class="card-body">
    <div class="form-group">
        <label for="name">{{trans('messages.name')}}</label>
        <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{isset($row) ? $row->name : ''}}" id="name" placeholder="Enter Name">
        @error($input)
        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>
    @php
        $input = 'email';
    @endphp
    <div class="form-group">
        <label for="email">{{trans('messages.email')}}</label>
        <input type="email" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"  value="{{isset($row) ? $row->email : ''}}" id="email" name="{{$input}}" placeholder="Email">
        @error($input)
        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>
    @php
        $input = 'website';
    @endphp
    <div class="form-group">
        <label for="website">{{trans('messages.website')}}</label>
        <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"  value="{{isset($row) ? $row->website : ''}}" id="website" name="{{$input}}" placeholder="Website">
        @error($input)
        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>
    @php
        $input = 'logo';
    @endphp
    <div class="form-group">
        <label for="exampleInputFile">{{trans('messages.logo')}}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error($input) is-invalid @enderror" name="{{$input}}" id="exampleInputFile">
                @error($input)
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
