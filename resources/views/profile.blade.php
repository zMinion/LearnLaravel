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
                                <input type="text" name="full_name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label control-label-left">Gender:</label>
                                <div class="controls">
                                    <label class="custom-control custom-radio">
                                      <input id="radio1" name="gender" type="radio" value="0" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">Male</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                      <input id="radio2" name="gender" type="radio" value="1" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">Female</span>
                                    </label>   
                                </div>
                            </div>

                            <div class="single-input color-1 mb-10">
                                <label class="control-label" for="place_of_birth">Place of Birth:</label>                                
                                <input type="text" value="{{@$profile->place_of_birth}}" name="place_of_birth" placeholder="Place of Birth" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Place of Birth'" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label control-label-left" for="field9">Marital Status</label>
                                <select id="field9" name="marital_status" class="form-control" data-role="select">
                                  <option value="0">Single</option>
                                  <option value="1">Married</option>
                                </select>
                            </div>

                            <div class="single-input color-1 mb-10">
                                <label class="control-label" for="place_of_birth">Address:</label>                                 
                                <textarea name="message" placeholder="Type your address here..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type your message here...'" required></textarea>
                            </div>

                            <div class="d-flex justify-content-start">
                            <button type="submit" class="mt-10 primary-btn d-inline-flex text-uppercase align-items-center">Save Profile<span class="lnr lnr-arrow-right"></span>

                            </button></div>
                            <div class="alert"></div>
      

            </form>
        </div>
    </div>
</div>



@endsection


