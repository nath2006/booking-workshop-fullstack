<nav class="fixed top-0 flex items-center w-full justify-between p-8 bg-white z-30">
    <a href="{{route('front.index')}}">
        <img src="{{asset('assets/images/logos/Logo.svg')}}" class="flex shrink-0" alt="logo">
    </a>
    <ul class="flex items-center justify-center gap-8">
        <li class="font-medium text-aktiv-grey hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
            <a href="{{route('front.check_booking')}}">View My Booking</a>
        </li>
        <li class="font-medium text-aktiv-grey hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
            <a href="">Workshop</a>
        </li>
        <li class="font-medium text-aktiv-grey hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
            <a href="">Community</a>
        </li>
        <li class="font-medium text-aktiv-grey hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
            <a href="">Testimony</a>
        </li>
    </ul>
    <a href="#" class="flex items-center rounded-full h-12 px-6 gap-[10px] w-fit shrink-0 bg-aktiv-green">
        <span class="font-semibold text-white">Contact CS</span>
        <img src="{{asset('assets/images/icons/whatsapp.svg')}}" class="w-6 h-6" alt="icon">
    </a>
</nav>
