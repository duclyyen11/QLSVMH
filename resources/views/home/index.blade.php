@include('header')
@include('menu')
<div class="container">
    <div class="row my-5">
        <div class="col-md-3 text-body">
            <b>Tên sinh viên</b>
        </div>
        <div class="col-md-6 text-body">
            <b>Danh sách môn học</b>
        </div>
    </div>
    <div class="row">
       <div class="col-md-9">
           @foreach($students as $student)
          <div class="row border-bottom">
              <div class="col-md-4">{{$student->name}}</div>
              <div class="col-md-8">
                  @foreach($student->subjects as $subject)
                      <div class="row">
                          <div class="col-md-8">{{$subject->name}}</div>
                          <div class="col-md-4">
                              <form action="{{route('ql.destroy',['student_id'=>$student->id,'subject_id'=>$subject->id])}}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-light">delete</button>
                              </form>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
           @endforeach
       </div>
        <div class="col-md-3">
            <form action="{{route('home.store')}}" method="POST">
                @csrf
                <select name="sv">
                    @foreach($students as $student)
                        <option value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach
                </select>
                <select name="mh">
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-dark">Thêm môn học cho sinh viên</button>
            </form>
        </div>
    </div>
</div>
@include('footer')
