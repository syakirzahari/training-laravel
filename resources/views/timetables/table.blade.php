@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Timetable</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('timetables.create') }}"> Add New Timetable</a>
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
            <th>Day</th>
            <th>Subject</th>
            <th>Hall</th>
            <th>Time From</th>
            <th>Time To</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($table as $t)
        <tr>
            <td>{{ $t->id }}</td>
            <td>{{ $t->days->name }}</td>
            <td>{{ $t->subjects->subject_code }} - {{ $t->subjects->name }}</td>
            <td>{{ $t->halls->name }} <br>
            {{ $t->halls->place }}</td>
            <td>{{ $t->time_from }}</td>
            <td>{{ $t->time_to }}</td>
            <td>
                <form action="{{ route('timetables.destroy',$t->id) }}" method="POST">
   
                    <!-- <a class="btn btn-info" href="{{ route('timetables.show',$t->id) }}">Show</a> -->
    
                    <a class="btn btn-primary" href="{{ route('timetables.edit',$t->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
        
@endsection