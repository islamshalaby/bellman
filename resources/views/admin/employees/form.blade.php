
<div class="card-body">
    @php
        $input = 'firstName';
    @endphp
    <div class="form-group">
        <label for="name">{{trans('messages.firstName')}}</label>
        <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{isset($row) ? $row->firstName : ''}}" id="name" placeholder="Enter First Name">
        @error($input)
        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>
    @php
        $input = 'lastName';
    @endphp
    <div class="form-group">
        <label for="name">{{trans('messages.lastName')}}</label>
        <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{isset($row) ? $row->lastName : ''}}" id="name" placeholder="Enter Last Name">
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
        $input = 'phone';
    @endphp
    <div class="form-group">
        <label for="website">{{trans('messages.phone')}}</label>
        <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"  value="{{isset($row) ? $row->phone : ''}}" id="website" name="{{$input}}" placeholder="Website">
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @php
        $input = 'company';
    @endphp

    <div class="form-group">
        <label>{{trans('messages.company')}}</label>
        <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}">
            @foreach($companies as $company)
            <option {{isset($row) && $row->company == $company->id ? 'selected' : ''}} value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<!-- /.card-body -->
