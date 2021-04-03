@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Students</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Add New Student</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Group</th>
            <th>Joined On</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $s)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ $s->email }}</td>
            <td>{{ $s->group->name }}</td>
            <td>{{ $s->created_at }}</td>
            <td>
                <form action="{{ route('students.destroy',$s->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('students.show',$s->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('students.edit',$s->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $students->links() !!}
      
@endsection