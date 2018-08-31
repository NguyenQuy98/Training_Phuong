@extends('layout.admin') 
@section('content')
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="admin.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Add New Product</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Product Detail</h5>
                    </div>
                    <div class="widget-content nopadding">

                        <!-- BEGIN USER FORM -->

                        <form action="{{route('admin.getEditType',['id' => $categorys->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="control-group">
                               
                                <div class="control-group">
                                    <label class="control-label">Name :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$categorys->name}}" class="span11" placeholder="Product name" name="Name" /> *
                                    </div>
                                </div>                        
                                
                                <div class="control-group">
                                    <label class="control-label"  >Slug :</label>
                                    <div class="controls">
                                        <textarea class="span11" placeholder="Slug" name = "Slug">{{$categorys->slug}}</textarea>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Perent :</label>
                                        <div class="controls">
                                            <select name="Perent">
                                            @if($categorys->id == 0)
                                                <option value="0"> 0 </option>
                                                <option value="1"> 1 </option>
                                            @else if($categorys->id == 1)
                                                <option value="1"> 1 </option>
                                                <option value="0"> 0 </option>
                                                @endif
                                            </select> *
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Status :</label>
                                        <div class="controls">
                                            <select name="Status">
                                            @if($categorys->id == 0)
                                                <option value="0"> Sale </option>
                                                <option value="1"> New </option>
                                            @else if($categorys->id == 1)
                                             <option value="1"> New </option>
                                                <option value="1"> Sale </option>
                                            @endif
                                            </select> *
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="addItem" class="btn btn-success">Edit </button>
                                    </div>
                                </div>

                        </form>
                        <!-- END USER FORM -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection