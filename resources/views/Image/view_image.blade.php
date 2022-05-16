@extends('master')  
@section('content') 


<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">


<div class="container">
    <h3>View all image</h3><hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Image id</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody>

        @foreach($imageData as $data)
        <tr>
          <td>{{$data->id}}</td>

          <td>
	     <img src="{{ url('public/Image/'.$data->image) }}" style="height: 100px; width: 150px;">
       <form method="POST" action="{{ route('images.delete') }}">

        <input type="hidden" name="iddd" value="{{$data->id}}"></input>
        <button type="submit" class="btn btn-danger">Delete</button>
        {{method_field('DELETE')}} 
        {!! csrf_field() !!}
      </form>

          @foreach($imagecomment as $commented)

            @if($commented->image_id == $data->id)
              <div style='font-family: "Comic Sans MS", "Comic Sans", cursive;'><p>{{$commented->comment}} {{$commented->created_at}}</p></div> 
              <form method="POST" action="{{ route('comments.delete') }}">

                <input type="hidden" name="idd" value="{{$commented->id}}"></input>
                <button type="submit" class="btn btn-danger">Delete</button>
                {{method_field('DELETE')}} 
                {!! csrf_field() !!}
              </form>
            @endif
          @endforeach

        <form method="post" action="{{ route('comments.store') }}" 
          enctype="multipart/form-data">
          @csrf
          <div class="image">
            <label><h4>Add Comment</h4></label>
            <input type="text" name="comment" value=""><br></p>
            <input type="hidden" id="custId" name="image_id" value="{{$data->id}}">
          </div>

          <div class="comment_button">
            <button type="submit" class="btn btn-success">Add</button>
          </div>
      </form>
        
	  </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="container">
  <form method="post" action="{{ route('images.store') }}" 
		enctype="multipart/form-data">
    @csrf
    <div class="image">
      <label><h4>Add image</h4></label>
      <input type="file" class="form-control" required name="image">
    </div>

    <div class="post_button">
      <button type="submit" class="btn btn-success">Add</button>
    </div>
  </form>
</div>


@stop