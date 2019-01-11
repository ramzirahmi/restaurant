@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
   <div class="panel panel-default">
     <h1>Add new Menu</h1>

    <form action="{{url('menu')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
    <label for="">title</label>
    <input type="text" class="form-control" placeholder="your title" name="title">
    </div>
   </div>
    <div class="col-md-4">
    <div class="form-group">
    <label for="">type</label>
    <select  class="form-control" name="type">
      <option>Hot Drinks</option>
      <option>Cold Drinks</option>
    </select>
  </div>
   </div>
     <div class="col-md-4">
   <div class="form-group">
    <label for="">status</label>
    <select  class="form-control" name="status">
      <option>active</option>
      <option>Inactive</option>
    </select>
  </div>
   </div>
     <div class="col-md-12">
     <div class="form-group">
    
    <textarea  class="form-control" name="descrption" rows="3"></textarea>
     </div>
     <div class="row">
     <div class="col-md-4">
    <div class="form-group">
    <label for="">image</label>
    <input class="form-control" type="file" name="image">
    </div>
    </div>
     <div class="col-md-4">
         <div class="form-group">
     <input type="submit"  class="form-control btn btn-primary" value="enregistrer">
   </div>
  </div>
     </div>
     </div>
     </div>
    </form>

   <div class="panel-heading">Menus</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>title</th>
                                <th>type</th>
                                <th>description</th>
                                <th>status</th>
                                <th>image</th>
                                <th>created by</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
           @foreach($menu as $Menu)
                    <tr>
                <td>{{$Menu->title}}</td>
                <td>{{$Menu->type}}</td>
                <td>{{$Menu->description}}</td>
                 <td>{{$Menu->status}}</td>
                 <td class="menuthumb"><img class="img-responsive" src="{{$menu->image}}"></td>
                <td>{{$Menu->user->name}}</td>
                <td>{{$Menu->id}}
                {{!!
            form::open(['method'=>'DELETE','route'=>['menu.destroy',$menu->id]])
                !!}}
                {{!! form::submit('delete',['class'=>'btn btn-danger'])!!}}

                {{!! form::close()!!}}

                </td>
                <td>
    <a href="menu/{{$Men->id}}/edit"> <span class="glyphicon glyphicon-edit"></span></a>
                </td>
            </tr>
        @endforeach
            </tbody>
             </table>
              </div>
               </div>
      </div>      
  </div>
 </div>



@endsection
