@extends('layouts.app')

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="confirmationModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Dynamic Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      @if(session()->get("type")=="teacher")
        <div class="modal-body">
          <h6 style="color: red;">This feature is for admin only</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Okay</button>
        </div>
        @else
        <div class="modal-body">
          <p id="alertMsg">Dynamic Text</p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <a type="button" id="myAnchor" class="btn btn-danger dltBtn btn-sm" href="">Okay</a>
      </div>
      </form>
      @endif
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
            <td><button type="button" id="editBtn" class="btn btn-danger dltBtn btn-sm" value="{{$student->id}}">EDIT</button></td>
            <td><button type="button" id="dltBtn" class="btn btn-danger dltBtn btn-sm" value="{{$student->id}}">Delete</button></td>
        </tr>
        @endforeach
    </table>




@endsection


 @section('scriptList')


<script>  
$(document).ready(function () {
  $(document).on('click', '#dltBtn', function(){
    var sid = $(this).val();
    $('#deleteModal').modal('show');
    document.getElementById("modalTitle").innerHTML="Delete Confirmation !";
    document.getElementById("myAnchor").innerHTML="Yes Delete";
    document.getElementById("alertMsg").innerHTML="Are You Sure?<br>Once Deleted, can not be reversed.";
    document.getElementById("myAnchor").href ="/studentDelete/"+sid;
    
  });
  $(document).on('click', '#editBtn', function(){
    var sid = $(this).val();
    $('#deleteModal').modal('show');
    document.getElementById("myAnchor").href ="/studentEdit/"+sid;
    document.getElementById("modalTitle").innerHTML="Edit Confirmation !";
    document.getElementById("alertMsg").innerHTML="Are You sure to edit?";
    document.getElementById("myAnchor").innerHTML="Yes Edit";
    
  });
});
  
 </script>
 @endsection