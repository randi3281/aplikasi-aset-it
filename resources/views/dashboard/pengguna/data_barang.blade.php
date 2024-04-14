<div class="row">
    <div class="col-md-4">
        @if(session('edit') == 'iya')
            @include('dashboard.admin.user_manajemen.edit')
        @else
            @include('dashboard.admin.user_manajemen.input')
        @endif
    </div>
</div>
