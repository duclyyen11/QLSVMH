@include('header')
@include('menu')
<div class="container">
    <div class="row mt-5">
        <form action="{{route('student.update',['id'=>$student->id])}}" method="POST" class="w-100">
            @method('PUT')
            @csrf
            <div class="form-group col-md-4">
                <input type="text" name="name" class="form-control" value="{{$student->name}}">
            </div>
            <div class="form-group col-md-2">
                <button type="submit" name="edit" class="btn btn-primary form-control">Edit</button>
            </div>
        </form>
    </div>
</div>
@include('footer')
