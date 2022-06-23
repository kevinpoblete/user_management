@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="{{ route('admin.role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="roleHelp" placeholder="Enter role">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <label for="guard_name">Guard Name</label>
                            <input type="text" name="guard_name" class="form-control" id="guard_name" aria-describedby="roleHelp" placeholder="guard name">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        
                        <div class="form-group">
                            <label for="departments">Departments</label>
                            <select class="custom-select" name="department_id">
                                <option selected>Open this select menu</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                                
                            </select>
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                          <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
