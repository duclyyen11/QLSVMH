@include('header')
@include('menu')
<div class="container">
    <div class="row my-5">
        <div class="col-md-4 text-body">
            <b>Danh sách sinh viên</b>
        </div>
        <div class="col-md-2">
            <a href="{{route('student.create')}}" class="btn btn-primary">add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @foreach($students as $student)
                <div class="row">
                    <div class="col-md-4 border-bottom">{{$sv->name}}</div>
                    <div class="col-md-1">
                        <form action="{{route('student.edit',['student_id'=>$student->id])}}" method="POST">
                            @method('GET')
                            @csrf
                            <button type="submit" class="btn btn-dark">edit</button>
                        </form>
                    </div>
                    <div class="col-md-1">
                        <form action="{{route('student.destroy',['student_id'=>$student->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-light">delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('footer')
