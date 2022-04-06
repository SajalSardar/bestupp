@if ($message = Session::get('success'))
<div class="toast" style="background:#fff; position: absolute; top: 70px; right: 25px; z-index: 9999; min-width:300px;" data-delay="10000">
    <div class="toast-header bg-success">
        <h3 class="pl-2 text-white">{{ config('app.name') }}</h3>
        <button type="button" class="ml-2 mb-1 close mr-3" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body p-2">
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="toast" style="background:#fff; position: absolute; top: 70px; right: 25px; z-index: 9999" data-delay="10000">
    <div class="toast-header bg-danger">
        <h3 class="pl-2 text-white">{{ config('app.name') }}</h3>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body p-2">
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="toast" style="background:#fff; position: absolute; top: 70px; right: 25px; z-index: 9999" data-delay="10000">
    <div class="toast-header bg-warning">
        <h3 class="pl-2 text-white">{{ config('app.name') }}</h3>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body p-2">
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('info'))
<div class="toast" style="background:#fff; position: absolute; top: 70px; right: 25px; z-index: 9999" data-delay="10000">
    <div class="toast-header bg-info">
        <h3 class="pl-2 text-white">{{ config('app.name') }}</h3>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body p-2">
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