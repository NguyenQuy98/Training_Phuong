@extends('layout.admin') 
@section('content')
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="admin.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Edit New Product</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Edit :  {{$products->name}}</h5>
                    </div>
                    <div class="widget-content nopadding">

                        <!-- BEGIN USER FORM -->

                        <form action="{{route('admin.getEditProduct',['id' => $products->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="control-group">
                                <label class="control-label">Choose a product type:</label>
                                <div class="controls">
                                    <select name="category_edit">
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    

                                    </select> *
                                </div>
                            </div>
                            <div class="control-group">
                               
                                <div class="control-group">
                                    <label class="control-label">Name :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$products->name}}" class="span11" placeholder="Product name" name="itemName" /> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose an image :</label>
                                    <div class="controls">
                                        <img src="{{ URL::asset('images/'.$products->main_image)}}" width="200px">
                                        <input type="file" name="image" id="fileupload">
                                        
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    
                                    <label class="control-label"  >Description</label>
                                    <div class="controls">
                                        
                                        <textarea class="span11" placeholder="Description" name = "description">{{$products->description}}</textarea>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Price :</label>
                                        <div class="controls">
                                            <input type="text" value="{{$products->price}}" class="span11" placeholder="price" name = "price" /> *
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Amount :</label>
                                        <div class="controls">
                                            <input type="text" value="{{$products->amount}}" class="span11" placeholder="amount" name = "amount" /> *
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">datetime :</label>
                                        <div class="controls">
                                            <input type="date" value="{{$products->expired_time}}" class="span11" name = "datetime" /> *
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="addItem" class="btn btn-success">Edit</button>
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