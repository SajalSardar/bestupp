@if ($message = Session::get('success'))
<div class="toast" style="position: absolute; top: 70px; right: 25px; z-index: 9999" data-delay="10000">
    <div class="toast-header bg-success">
        <img src="{{asset('backend/images/logo.png')}}" style="margin-right: 10px" alt="{{ config('app.name') }}">
        <strong class="mr-auto">{{ config('app.name') }}</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="toast" style="position: absolute; top: 70px; right: 25px; z-index: 9999" data-delay="10000">
    <div class="toast-header bg-danger">
        <img src="{{asset('backend/images/logopng.png')}}" style="height: 15px; margin-right: 10px" alt="ProHRM">
        <strong class="mr-auto">ProHRM</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="toast" style="position: absolute; top: 70px; right: 25px; z-index: 9999" data-delay="10000">
    <div class="toast-header bg-warning">
        <img src="{{asset('backend/images/logopng.png')}}" style="height: 15px; margin-right: 10px" alt="ProHRM">
        <strong class="mr-auto">ProHRM</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('info'))
<div class="toast" style="position: absolute; top: 70px; right: 25px; z-index: 9999" data-delay="10000">
    <div class="toast-header bg-info">
        <img src="{{asset('backend/images/logopng.png')}}" style="height: 15px; margin-right: 10px" alt="ProHRM">
        <strong class="mr-auto">ProHRM</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ $message }}
    </div>
</div>
@endif


{{-- @if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Please check the form below for errors
</div>
@endif --}}