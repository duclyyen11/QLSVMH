@include('header')
@include('menu')
<div class="container">
    <div class="row mt-5">
        <form action="{{route('subject.store')}}" method="POST" class="w-100">
            @csrf
            <div class="form-group col-md-4">
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <button type="submit" name="add" class="btn btn-primary form-control">Add</button>
            </div>
        </form>
    </div>
</div>
@include('footer')
