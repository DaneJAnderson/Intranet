@extends('layouts.master')

@section('title', 'Upload Me');
@section('content')

<div n1g-controller="homeController">
        <!--content-->
        
        <div class="inner_sec_info_wthree_agile" style="padding-top: 100px; padding-bottom: 100px;">
<div class="container">

        {{-- ALert Data Successfully inserted in Database Toast --}}
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


   <h1 class="text-center"> Uploads Documents</h1> <br/> <br/>


    
<div class="container " style="width:80%">
   <form action="http://<?php echo Config::get('constants.BASE_URL'); ?>/uploads/post" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    @if(!empty($id))
    {{ method_field('PUT') }}
    @endif

    {{-- Select File to upload --}}
<input type="file" onchange="addName(this.files)" value="" name="file" id="fileToUpload" required><br/><br/>

    {{-- Document Name --}}
        <div class="form-group">
          <label for="Document Name"> Document Name </label>
          <input type="text" class="form-control" id="docUpName" name="name" 
          placeholder="Document Name" minlength="3" required>        
        </div><br/>

    {{-- Document (file) Uri  file uri and extention --}}
    <div class="form-group">
            <label for="Documents Url"> Documents Url </label>
            <input type="text" class="form-control" id="docUpUrl" name="url" 
            placeholder="Documents Url" minlength="3" required>        
        </div><br/>

        {{-- Documents Format word|pdf|png --}}
        <div class="form-group">
                <label for="Document Format">Document Format</label>
                <select class="form-control" id="selectFormat" minlength=1 onchange="addUrLPrefix()" name="format"  required>
                    <option value="">Select Format</option>
                    <option value="1" >PDF</option>
                    <option value="2">Word</option>
                    <option value="3">Excel</option>
                    <option value="4">Link</option>
                    <option value="5">Folder</option>
                </select>
                </div><br/>
              

        {{-- Document Type Member|Credit|MIS|HR|Policy --}}
        <div class="form-group">
                <label for="Documents Type">Documents Type</label>
                <select class="form-control" id="" name="type" minlength="1" required>
                  <option value="">Select Document Type</option>
                  <option value="1" >Member</option>
                  <option value="2">Credit</option>
                  <option value="3">Operation Procedures</option>
                  <option value="4">MIS</option>
                  <option value="5">DMU</option>
                  <option value="6">HR & Learning</option>
                  <option value="7">Other</option>
                  <option value="8">Policy</option>
                  <option value="9">Risk & Compliance</option>
                </select>
              </div><br/>

        {{-- Document Status active|inactive --}}
        <div class="form-group">
          <label for="Document Status "> Document Status </label>
          <input type="text" class="form-control" id="" value="1" name="status" 
          placeholder="Document Status" required>        
        </div><br/>

        {{-- Document Main_category --}}
        <div class="form-group">
          <label for="Document Main Category "> Document Main Category  </label>
          <input type="text" class="form-control" value="1" name="main_cat" id="" 
          placeholder="Document Main Category " required>
        </div>

        {{-- Document CreatedBy  --}}
        <div class="form-group">
          <label for=" Document Created_by "> Document Created_by  </label>
          <input type="text" class="form-control" id="" value="1" name="createdby" placeholder="CreatedBy" required>        
        </div><br/>

        {{-- Document UpdatedBy --}}
        <div class="form-group">
          <label for="Document UpdatedBy">Document UpdatedBy   </label>
          <input type="text" class="form-control" id="" value="1" name="updatedby" placeholder="Document UpdatedBy" required>
        </div><br/>      


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>     

</div>
        </div>
</div>


<script>

    // Create Url and File Name from File Object
    function addName(val){
        var name = document.getElementById("docUpName");
        var uri = document.getElementById("docUpUrl");
        var n1 = val[0].name.split('.').slice(0, -1).join('.');
        n1 = n1.replace(/_\d*$/g,""); // Remove Numbers at the End of the string
        name.value = n1.replace(/_/g,' '); // Remove UnderScore
        uri.value = val[0].name;
    }

        // Add File format to beginning of file URL
    function addUrLPrefix(){
        var selectFormat = document.getElementById("selectFormat");
        var selectedValue = selectFormat.options[selectFormat.selectedIndex].value;
        if(selectedValue == 1){
        var uri = document.getElementById("docUpUrl");
        uri.value = "PDF/"+uri.value ;
        }
    }



</script>

@endsection