@extends('layouts.app')

@section('title', 'Groups')

@section('content')

<section id="add" class="about">
  <div class="container">

    <div class="section-title mx-3">
      <h3 >New <span class="text-primary">Member</span></h3>
      
    </div>
    <div class="row content">
      <div class="d-flex flex-wrap justify-content-start">
          <div class="card m-3" style="width: 20rem; border-radius: 20px;">
            <div class="card-body">
              <form action="/groups/addmember/{{$group->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group ">
                  <label for="name" class="form-label">Name</label>
                  <select class="form-select border-primary" aria-label="Default select example" id="name" name="friend_id">
                    <option selected>- Pilihan -</option>
                    @foreach ($friends as $item)
                      <option value="{{$item->id}}">
                        {{$item->nama}}
                      </option> 
                    @endforeach
                  
                  </select>
                </div>
                
                <div class="btn-group mt-5 d-flex flex-wrap justify-content-end">
                  <button type="submit" class="btn btn-primary me-2" style="border-radius: 10px;">Add to Group</button>
                  <a class="btn btn-outline-danger" href="/groups" style="border-radius: 10px;" role="button">Cancle</a>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
  </div>
</section> 

  

@endsection