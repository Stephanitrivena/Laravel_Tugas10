@extends('layouts.app')

@section('title', 'Groups')

@section('content')
  <a href="/groups/create" class="card-link btn-primary">Tambah group</a>
  @foreach ($groups as $group)

    <div class="card my-3 " style="width: 15rem;">
      <div class="card-body ">
        <a class="text-decoration-none" href="/groups/{{ $group['id'] }}">
          <h5 class="card-title">{{ $group['name'] }}</h5>
          <p class="card-text">{{ $group['description'] }}</p>
            <hr>
              <a href="/groups/addmember/{{$group['id']}}" class="card-link btn-primary">Tambah anggota teman</a>
              <div class="mt-3">
                <ul class="list-group ">
                  @foreach ($group->friends as $friend)
                  <li class="list-group-item border-dark d-flex justify-content-between align-items-center" style="border-radius: 10px;">
                    {{-- menampilkan nama memeber dari groups --}}
                    <h5>{{$friend->nama}}</h5>
                    <span class="">
                      <form action="/groups/deletemember/{{$friend->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-danger border-0 d-flex " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Are you sure?')">x</button>
                      </form>
                    </span>
                  </li>
                  @endforeach
                </ul>
                
              </div>  
            <hr>
          <a href="/groups/{{ $group['id'] }}/edit" class="card-link btn-warning">Edit group</a>
          <form action="/groups/{{$group['id']}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="card-link btn-danger">Delete group</button>
          </form>
        </div>
      </div>
    </div>

      
  @endforeach
  <div>
    {{ $groups->links() }}
  </div>
@endsection