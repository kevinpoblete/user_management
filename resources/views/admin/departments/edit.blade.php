@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Department</div>

                <div class="card-body">
                    <form action="{{ route('admin.department.update', [$department->id]) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="department" aria-describedby="departmentHelp" value="{{ $department->name }}" placeholder="Enter department">
                            @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          </div>
                          
                          <button type="submit" class="btn btn-warning">Save</button>
                    </form>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
