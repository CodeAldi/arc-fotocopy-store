<nav class="main-nav">
    <!-- ***** Logo Start ***** -->
    <a href="index.html" class="logo">
        <img src="landing-assets/images/logo.png">
    </a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav">
        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
        <li class="scroll-to-section"><a href="#men">ATK dan lain lain</a></li>
        <li class="scroll-to-section"><a href="#women">Jasa</a></li>
        <li class="scroll-to-section"><a href="#about">tentang kami</a></li>
        @if (auth()->check())
        <li class="scroll-to-section"><a href="#"><i class="fa fa-shopping-cart"></i>0</a></li>
        <li class="scroll-to-section border rounded-pill border-success"><a href="#"><i class="fa fa-user"></i>Saya</a></li>
        <li class="scroll-to-section border rounded-pill border-secondary ml-2">
            <form action="{{ route('logout.aksi') }}" method="post">
                @csrf
                <button class="btn" type="submit">Logout</button>
            </form>
        </li>
        <li class=""><a href="#"></a></li>
            
        @else
        <li class="scroll-to-section rounded-pill bg-success"><a href="{{ route('login') }}">Login</a></li>
        <li class=""><a href="#"></a></li>
            
        @endif
    </ul>
    <a class='menu-trigger'>
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
</nav>