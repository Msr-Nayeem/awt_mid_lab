@extends('layouts.app')

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p">Are You Sure?<br>
        Once Deleted, can not be reverted.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <a type="button" id="myAnchor" class="btn btn-danger dltBtn btn-sm" href="">Yes Delete</a>
      </div>
      </form>
    </div>
  </div>
</div>

    <br><br>
    @if($errors->any())
        <div class="alert alert-success">
        <h6 style="color: red;">{{$errors->first()}}</h6>
        </div>
    @endif
    <table class="table table-bordered">
        <tr style="cursor:default;">
            <th style="text-align: left">Name</th>
            <th>Student ID</th>
            <th colspan="2">Action</th>
            
        </tr>
        @foreach($students as $student)
        <tr>
            <td><a href="/details/{{$student->id}}">{{$student->name}}</a></td>
            <td style="cursor:default;">{{$student->student_id}}</td>
            <td><a href="/studentEdit/{{$student->id}}">Edit</a></td>
            <td><a href="/studentDelete/{{$student->id}}">Delete</a></td>
            <td><button type="button" id="dltBtn" class="btn btn-danger dltBtn btn-sm" value="{{$student->id}}">Delete</button></td>
        </tr>
        @endforeach
    </table>




@endsection


 @section('scriptList')


<script>  
$(document).ready(function () {
  $(document).on('click', '.dltBtn', function(){
    var sid = $(this).val();
    //alert(sid);
    $('#deleteModal').modal('show');
    $('#inputId').val(sid);
    document.getElementById("myAnchor").href = "/studentDelete/sid";
  });
});
  
 </script>
 @endsection