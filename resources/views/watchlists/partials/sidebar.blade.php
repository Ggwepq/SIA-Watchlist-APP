    <div class="w-30 bg-neutral">
        <div class="p-4 text-center">
            <a href="{{ url('/watchlist') }}" class="text-4xl font-bold"><i class="ti ti-shareplay"></i></a>
        </div>
        <ul class="menu p-2">
            <li><a href="{{ route('watchlists.index') }}" class="btn btn-ghost text-2xl"><i
                        class="ti ti-list-details"></i></a></li>
            <li><a href="{{ route('logout') }}" class="btn btn-ghost text-2xl"><i class="ti ti-logout"></i></a></li>
        </ul>
    </div>
