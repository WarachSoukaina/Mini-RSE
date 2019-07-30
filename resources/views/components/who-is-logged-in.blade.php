@if(Auth::guard('web')->check())
    <p class="text-success">
        You are logged in as <strong>User</strong>
        {{Auth::user()->name}}
    </p>
    @else
   
@endif

@if(Auth::guard('admin')->check())
    <p class="text-success">
        You are logged in as <strong>Admin</strong>
    </p>
@else
   
@endif

