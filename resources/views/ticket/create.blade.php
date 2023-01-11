@extends('layouts.app')
@section('content')
<div class="container">
<div class="float-container">
    @include('includes.flash')

  <div class="float-child">
    <div class="left">

      <form class="form-horizontal" role="form" method="POST" action="{{ route('ticket.store') }}"  enctype="multipart/form-data" >
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                    <label for="brand" class="col-md-10 control-label">Brand</label>

                    <div class="col-md-10">
                            <select id="brand" type="brand" class="form-control" name="brand">

                        <option value="">--- Select --- </option>
                        <option value="avita">AVITA</option>
                        <option value="nexstgo">NEXSTGO</option>
                        <option value="vaio">VAIO</option>

                        </select>


                        @if ($errors->has('brand'))
                            <span class="help-block">
                            <strong><span class="error">Brand Name Can Not Be Empty</span></strong>
                            </span>
                        @endif
                    </div>
                    </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                    <label for="country" class="col-md-10 control-label">Country</label>

                    <div class="col-md-10">
                        <select id="country" type="country" class="form-control" name="country">

                        <option value="">--- Select --- </option>
                        <option value="india">INDIA</option>
                        <option value="bangladesh">BANGLADESH</option>
                        <option value="mauritius">MAURITIUS</option>
                        <option value="srilanka">SRI LANKA</option>
                        <option value="nepal">NEPAL</option>

                        </select>
                        @if ($errors->has('country'))
                            <span class="help-block">
                            <strong><span class="error">Country Name Can Not Be Empty</span></strong>
                            </span>
                        @endif
                    </div>
                    </div>

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-10 control-label">Project Title</label>
                    <div class="col-md-10">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                        @if ($errors->has('title'))
                            <span class="help-block">
                            <strong><span class="error">Project Title Can Not Be Empty</span></strong>
                            </span>
                        @endif
                    </div>
                    </div>

                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category" class="col-md-10 control-label">Category</label>

                    <div class="col-md-10">
                        <select id="category" type="category" class="form-control" name="category">
                            <option value="">--- Select ---</option>
                            @foreach ($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('category'))
                            <span class="help-block">
                            <strong><span class="error">Category Field Can Not Be Empty</span></strong>
                            </span>
                        @endif
                     </div>
                    </div>


                    <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                    <label for="summary" class="col-md-10 control-label">Summary / Creative Brief</label>

                    <div class="col-md-10">
                        <textarea rows="4" id="summary" class="form-control" name="summary"></textarea>

                        @if ($errors->has('summary'))
                            <span class="help-block">
                            <strong><span class="error">Summary / Creative Brief Field Can Not Be Empty</span></strong>
                            </span>
                        @endif
                    </div>
                    </div>
             </div>
  </div>
  
  <div class="float-child">
    <div class="right">
    
    <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                    <label for="priority" class="col-md-10 control-label">Priority</label>
                    <div class="col-md-10">
                        <select id="priority" type="" class="form-control" name="priority">
                            <option value="">--- Select ---</option>
                            <option value="low">Low </option>
                            <option value="medium">Medium </option>
                            <option value="high">High </option>
                        </select>

                        @if ($errors->has('priority'))
                            <span class="help-block">
                            <strong><span class="error">Priority Field Can Not Be Empty</span></strong>
                            </span>
                        @endif
                    </div>
                    </div>

                    <div class="form-group{{ $errors->has('objective') ? ' has-error' : '' }}">
                    <label for="objective" class="col-md-10 control-label">Key Objective</label>

                    <div class="col-md-10">
                        <input id="objective" type="text" class="form-control" name="objective" value="{{ old('objective') }}">

                        @if ($errors->has('objective'))
                            <span class="help-block">
                                <strong><span class="error">Objective Field Can Not Be Empty</span></strong>
                            </span>
                        @endif
                    </div>
                    </div>

                    <div class="form-group{{ $errors->has('reference') ? ' has-error' : '' }}">
                    <label for="reference" class="col-md-10 control-label">Reference File Upload</label>
                    <div class="col-md-10">
                        <input id="reference" type="file" class="form-control" name="reference[]" multiple="" value="{{ old('reference') }}">
                        <p class="small">*Supported file format: doc, docx, jpg, jpeg, png, pdf, xlsx, xlx, ppt, pptx, csv, zip<br/>*Multiple files should have the same extension or in a zip file.</p>    
                        @if ($errors->has('reference'))
                            <span class="help-block">
                            <strong><span class="error">{{ $errors->first('reference') }}</span></strong>
                            </span>
                        @endif
                        
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('otherinfo') ? ' has-error' : '' }}">
                    <label for="otherinfo" class="col-md-10 control-label">Other Important Information</label>
                    <div class="col-md-10">
                    <textarea rows="4" id="otherinfo" class="form-control" name="otherinfo"></textarea>

                        @if ($errors->has('otherinfo'))
                            <span class="help-block">
                            <strong><span class="error">Other Information can not be too long</span></strong>
                            </span>
                        @endif
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="col-md-10 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-ticket"></i> Submit
                        </button>
                    </div>
                    </div>
                    </form>
                    
                    </div>
  </div>
  
</div>
</div>
@endsection