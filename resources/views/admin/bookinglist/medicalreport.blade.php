@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Appointment Details</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('completed.index') }}" class="breadcrumb-item">Completed Appointment List </a>
                    <span class="breadcrumb-item active">Appointment Details</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">History</label>
                    <input type="text" name="history" id="history" class="summernote form-control" cols="30" rows="8">
                </div>
                <div class="form-group">
                    <label for="">Examination</label>
                    <input type="text" id="examination" class="summernote form-control" cols="30" rows="8">
                </div>
                <div class="form-group">
                    <label for="">Treatment</label>
                    <input type="text" name="treatment" id="treatment" class="summernote form-control" cols="30" rows="8">
                </div>
                <div class="form-group">
                    <label for="">Progress</label>
                    <input type="text" name="progress" id="progress" class="summernote form-control" cols="30" rows="8">
                </div>
                <div class="form-group">
                    <label for="">Follow Up Date</label>
                    <input type="date" name="followUpDate">
                </div>
                <div class="form-group">
                    <label for="">Related File or Image</label>
                    <input type="file" name="image">
                </div>
            </div>
            <div class="form-group">  
                <div id="autoSave"></div>  
           </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
    <!-- Summernote -->
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
    </script>

<script>  
    $(document).ready(function(){  
         function autoSave()  
         {  
              var id = $('#id').val();
              var booking_id = $('#booking_id').val(); 
              var history = $('#history').val(); 
              var examination = $('#examination').val();  
              var treatment = $('#treatment').val();
              var progress = $('#progress').val();  
              if( id != '' && booking_id != '' && history != '' && examination != '' && treatment != '' && progress != '')  
              {  
                   $.ajax({  
                        url:"{{ route('scheduled.completed', $item->id) }}",
                        method:"post",  
                        data:{id:id, bookingId:booking_id, history:history, examination:examination, treatment:treatment, progress:progress},  
                        dataType:"text",  
                        success:function(data)  
                        {  
                             if(data != '')  
                             {  
                                  $('#booking_id').val(data);  
                             }  
                             $('#autoSave').text("Post save as draft");  
                             setInterval(function(){  
                                  $('#autoSave').text('');  
                             }, 5000);  
                        }  
                   });  
              }            
         }  
         setInterval(function(){   
              autoSave();   
              }, 1000);  
    });  
    </script>
@endsection