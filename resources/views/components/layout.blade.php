@include('components.header')

    <div class="flex">
        <!-- Navigation Sidebar -->
        <div class="navbar-container lay-left">
           @include('components.navbar')
        </div>


        <!-- Content Here -->
        <div class="content-container {{ Route::currentRouteName() === 'profile' ? 'profile-content' : '' }}">
            {{ $slot }}
        </div>
    </div>

@include('components.footer')