@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 personal-info">
            <h3>Personal info</h3>    
            <form class="form-horizontal profile" method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
                 {{ csrf_field() }}
                 @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif


                            <div class="single-input color-2 mb-10">
                                <label class="control-label" for="fname">Full Name:</label> 
                                <input type="text" name="full_name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required value="{{@$profile->full_name}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label control-label-left">Gender:</label>
                                <div class="controls">
                                    <label class="custom-control custom-radio">
                                      <input id="radio1" name="gender" type="radio" value="0" {{ @$profile->gender == 0 ? 'checked': '' }} class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">Male</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                      <input id="radio2" name="gender" type="radio" value="1" {{ @$profile->gender == 1 ? 'checked': '' }} class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">Female</span>
                                    </label>   
                                </div>
                            </div>
                            <div class="single-input color-1 mb-10">
                                <label class="control-label" for="avatar">Avatar:</label>                                
                                <input type="file" name="avatar">
                            </div>
                            <div class="single-input color-1 mb-10">
                                <label class="control-label" for="place_of_birth">Place of Birth:</label>                                
                                <input type="text" value="{{@$profile->place_of_birth}}" name="place_of_birth" placeholder="Place of Birth" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Place of Birth'" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label control-label-left" for="marital_status">Marital Status</label>
                                <select id="marital_status" name="marital_status" class="form-control" data-role="select">
                                  <option value="0" {{ @$profile->marital_status == 0 ? 'selected': '' }}>Single</option>
                                  <option value="1" {{ @$profile->marital_status == 1 ? 'selected': '' }}>Married</option>
                                </select>
                            </div>

                            <div class="single-input color-1 mb-10">
                                <label class="control-label" for="address">Address:</label>                                 
                                <textarea name="address" placeholder="Type your address here..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type your message here...'" required> {{@$profile->address}} </textarea>
                            </div>

                            <div class="d-flex justify-content-start">
                            <button type="submit" class="mt-10 primary-btn d-inline-flex text-uppercase align-items-center">Save Profile<span class="lnr lnr-arrow-right"></span>

                            </button></div>

      

            </form>
        </div>
        <div class="col-md-4">    
            <img src="{{ asset('img/thumbnail_images/'.@$profile->avatar) }}" class="rounded-circle mx-auto d-block"/>
        </div>   
    </div>
</div>



@endsection


