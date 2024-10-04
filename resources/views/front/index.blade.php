@extends('layouts.app')
@section('content')
<div class="h-[112px]">
    <x-nav/>
</div>
<header class="flex flex-col w-full max-h-[1210px] bg-[linear-gradient(0deg,_#5B8CE9_0%,_#4EB6F5_100%)] -mb-[128px]">
    <div class="flex flex-col items-center gap-6 mt-20">
        <div class="flex items-center w-fit rounded-full p-1 pr-4 gap-[10px] bg-[#DFEFFF]">
            <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 bg-aktiv-blue overflow-hidden">
                <img src="{{asset('assets/images/icons/medal-star.svg')}}" class="w-6 h-6" alt="icon">
            </div>
            <p class="font-semibold text-lg leading-[27px] text-aktiv-blue">#1 Best Workshop in Indonesia</p>
        </div>
        <h1 class="w-[800px] text-center text-[42px] leading-[58.8px] text-white font-['Neue_Plak_bold'] capitalize">Revitalize your daily routine with<br> powerful productivity 💪</h1>
        <div class="flex w-fit rounded-full p-4 bg-[#FFFFFF17]">
            <a href="#" class="flex items-center rounded-full px-9 h-[56px] gap-[10px] bg-aktiv-orange">
                <span class="font-semibold text-white">Get Started ></span>
            </a>
        </div>
    </div>
    <div class="flex w-full overflow-hidden">
        <img src="{{asset('assets/images/backgrounds/wadedan_A_cheerful_workshop_scene_showing_a_man_presenting_his__f 1.png')}}" class="w-full h-full object-cover object-top" alt="">
    </div>
</header>
<section id="Goals" class="w-full max-w-[1280px] mx-auto px-[52px] z-10">
    <div class="bg-[linear-gradient(0deg,rgba(230,231,235,0)_0%,#E6E7EB_100%)] rounded-3xl p-[1px]">
        <div class="grid grid-cols-4 items-center gap-6 rounded-3xl p-[32px_52px] bg-white">
            <div class="flex flex-col gap-3">
                <h2 class="font-['Neue_Plak_bold'] text-[32px] leading-[41.6px]">What awaits you <br>after you join 🧐 </h2>
                <p class="font-medium text-aktiv-grey">Our programs are designed to <br> develop any ages 😉 </p>
            </div>
            <div class="flex flex-col items-center rounded-2xl border border-[#E6E7EB] p-[18px] gap-3 text-center">
                <img src="{{asset('assets/images/icons/More Creativity.svg')}}" class="w-[64px]" alt="icon">
                <h3 class="font-semibold text-lg leading-[27px]">More Creativity</h3>
                <p class="font-medium text-aktiv-grey">Lorem Ipsum itu adalah sebusah text contoh</p>
            </div>
            <div class="flex flex-col items-center rounded-2xl border border-[#E6E7EB] p-[18px] gap-3 text-center">
                <img src="{{asset('assets/images/icons/Career Planning.svg')}}" class="w-[64px]" alt="icon">
                <h3 class="font-semibold text-lg leading-[27px]">Career Planning</h3>
                <p class="font-medium text-aktiv-grey">Lorem Ipsum itu adalah sebusah text contoh</p>
            </div>
            <div class="flex flex-col items-center rounded-2xl border border-[#E6E7EB] p-[18px] gap-3 text-center">
                <img src="{{asset('assets/images/icons/Good Communication.svg')}}" class="w-[64px]" alt="icon">
                <h3 class="font-semibold text-lg leading-[27px]">Good Communication</h3>
                <p class="font-medium text-aktiv-grey">Lorem Ipsum itu adalah sebusah text contoh</p>
            </div>
        </div>
    </div>
</section>
<section id="Categories" class="w-full max-w-[1280px] mx-auto px-[52px] mt-[100px]">
    <div class="flex flex-col gap-8">
        <div class="flex items-center justify-between">
            <h2 class="font-Neue-Plak-bold text-[32px] leading-[44.54px] capitalize">We have several 🌟 <br> workshop categories</h2>
            <a href="#" class="flex items-center rounded-full py-4 px-6 h-[56px] gap-3 bg-aktiv-orange">
                <span class="font-semibold text-white">See All</span>
                <span class="w-6 h-6 rounded-full bg-white text-center align-middle text-aktiv-orange font-bold">></span>
            </a>
        </div>
        <div class="grid grid-cols-4 gap-6">
            @forelse ( $categories as $itemCategory )
                <a href="{{route('front.category', $itemCategory->slung)}}" class="card">
                    <div class="flex items-center h-full rounded-3xl p-5 pr-1 gap-3 bg-white">
                        <img src="{{Storage::url($itemCategory->icon)}}" class="w-[56px] h-[56px] flex shrink-0" alt="icon">
                        <div class="flex flex-col gap-[2px] overflow-hidden">
                            <h3 class="font-semibold text-lg leading-[27px] break-words">
                                {{$itemCategory->name}}
                            </h3>
                            <p class="font-medium text-aktiv-grey">
                                {{$itemCategory->tagline}}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <p>
                    Data Is Empty
                </p>
            @endforelse
        </div>
    </div>
</section>
<section id="Trending" class="w-full max-w-[1280px] mx-auto px-[52px] mt-[100px]">
    <div class="flex flex-col gap-8">
        <div class="flex items-center justify-between">
            <h2 class="font-Neue-Plak-bold text-[32px] leading-[44.54px] capitalize">Highly sought-after 🔥<br>workshops are trending </h2>
            <a href="#" class="flex items-center rounded-full py-4 px-6 h-[56px] gap-3 bg-aktiv-orange">
                <span class="font-semibold text-white">See All</span>
                <span class="w-6 h-6 rounded-full bg-white text-center align-middle text-aktiv-orange font-bold">></span>
            </a>
        </div>
        <div class="grid grid-cols-3 gap-6">
            @forelse ( $newWorkshops as $itemNewWorkshop )
            <a href="{{route('front.details', $itemNewWorkshop->slung)}}" class="card">
                <div class="flex flex-col h-full justify-between rounded-3xl p-6 gap-9 bg-white">
                    <div class="flex flex-col gap-[18px]">
                        <div class="flex items-center gap-3">
                            <div class="w-16 h-16 rounded-full flex shrink-0 overflow-hidden">
                                <img src="{{Storage::url($itemNewWorkshop->instructor->avatar)}}" class="w-full h-full object-cover" alt="avatar">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <p class="font-semibold text-lg leading-[27px]">
                                    {{$itemNewWorkshop->instructor->name}}
                                </p>
                                <p class="font-medium text-aktiv-grey">
                                    {{$itemNewWorkshop->instructor->occupation}}
                                </p>
                            </div>
                        </div>
                        <div class="thumbnail-container relative h-[200px] rounded-xl bg-[#D9D9D9] overflow-hidden">
                            <img src="{{Storage::url($itemNewWorkshop->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                                @if($itemNewWorkshop->is_open)
                                    @if($itemNewWorkshop->has_started)
                                        <div class="absolute top-3 left-3 flex items-center rounded-full py-3 px-5 gap-1 bg-aktiv-orange text-white z-10">
                                            <img src="{{asset('assets/images/icons/timer-start.svg')}}" class="w-6 h-6" alt="icon">
                                            <span class="font-semibold">STARTED</span>
                                        </div>
                                    @else
                                        <div class="absolute top-3 left-3 flex items-center rounded-full py-3 px-5 gap-1 bg-aktiv-green text-white z-10">
                                            <img src="{{asset('assets/images/icons/medal-star.svg')}}" class="w-6 h-6" alt="icon">
                                            <span class="font-semibold">OPEN</span>
                                        </div>
                                    @endif
                                @else
                                    <div class="absolute top-3 left-3 flex items-center rounded-full py-3 px-5 gap-1 bg-aktiv-red text-white z-10">
                                        <img src="{{asset('assets/images/icons/sand-timer.svg')}}" class="w-6 h-6" alt="icon">
                                        <span class="font-semibold">CLOSED</span>
                                    </div>
                                @endif
                        </div>
                        <div class="card-detail flex flex-col gap-2">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <img src="{{asset('assets/images/icons/calendar-2.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                                    <span class="font-medium text-aktiv-grey">
                                        {{$itemNewWorkshop->started_at->format('M','d','Y')}}
                                    </span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <img src="{{asset('assets/images/icons/timer.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                                    <span class="font-medium text-aktiv-grey">
                                        {{$itemNewWorkshop->time_at->format('h:i A')}}
                                    </span>
                                </div>
                            </div>
                            <h3 class="title min-h-[56px] font-semibold text-xl line-clamp-2 hover:line-clamp-none">
                                {{$itemNewWorkshop->name}}
                            </h3>
                            <p class="font-medium text-aktiv-grey">
                                {{$itemNewWorkshop->category->name}}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-[6px]">
                            <p class="font-semibold text-2xl leading-8 text-aktiv-red">
                                Rp {{ number_format($itemNewWorkshop->price, 0, ',', '.') }}
                            </p>
                            <p class="font-medium text-aktiv-grey">/person</p>
                        </div>
                        <img src="{{asset('assets/images/icons/arrow-right.svg')}}" class="w-12 h-12 flex shrink-0" alt="icon">
                    </div>
                </div>
            </a>
            @empty
                <p>Workshop Data is Empty</p>
            @endforelse
        </div>
    </div>
</section>
<div class="w-full py-[52px] bg-white mt-[100px]">
    <section id="Testimony">
        <div class="flex flex-col gap-8">
            <div class="flex w-full max-w-[1280px] mx-auto items-center justify-between px-[52px]">
                <h2 class="font-Neue-Plak-bold text-[32px] leading-[44.54px] capitalize">Let’s Hear what people 💗  <br>say about our workshop</h2>
                <a href="#" class="flex items-center rounded-full py-4 px-6 h-[56px] gap-3 bg-aktiv-orange">
                    <span class="font-semibold text-white">See All</span>
                    <span class="w-6 h-6 rounded-full bg-white text-center align-middle text-aktiv-orange font-bold">></span>
                </a>
            </div>
            <div class="swiper w-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimony-card w-full max-w-[1176px] h-[413px] mx-auto flex items-center rounded-2xl overflow-hidden">
                            <div class="flex h-full w-[436px] shrink-0 bg-aktiv-orange overflow-hidden">
                                <img src="{{asset('assets/images/photos/testimony1.png')}}" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <div class="h-full w-full flex flex-col justify-between p-[42px] bg-[linear-gradient(280.42deg,#5B8CE9_-42.59%,#4EB6F5_50.66%,#5B8CE9_143.91%)]">
                                <p class="font-['Times_New_Roman'] font-bold text-[38px] leading-[60.8px] text-white">
                                    "The support from the behind-the-scenes team is noteworthy. They are responsive, helpful, and genuinely invested in their members ❤️ ."
                                </p>
                                <div class="flex justify-between items-center">
                                    <div class="flex flex-col gap-1">
                                        <p class="font-semibold text-lg leading-[27px] text-white">Otter</p>
                                        <p class="font-medium text-white">Mother of Tenz</p>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                    </div>
                                </div
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimony-card w-full max-w-[1176px] h-[413px] mx-auto flex items-center rounded-2xl overflow-hidden">
                            <div class="flex h-full w-[436px] shrink-0 bg-aktiv-orange overflow-hidden">
                                <img src="{{asset('assets/images/photos/testimony1.png')}}" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <div class="h-full w-full flex flex-col justify-between p-[42px] bg-[linear-gradient(280.42deg,#5B8CE9_-42.59%,#4EB6F5_50.66%,#5B8CE9_143.91%)]">
                                <p class="font-['Times_New_Roman'] font-bold text-[38px] leading-[60.8px] text-white">
                                    "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit sint sunt incidunt obcaecati assumenda error ❤️ ."
                                </p>
                                <div class="flex justify-between items-center">
                                    <div class="flex flex-col gap-1">
                                        <p class="font-semibold text-lg leading-[27px] text-white">Otter</p>
                                        <p class="font-medium text-white">Mother of Tenz</p>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[5px] w-8 h-8" alt="star">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute w-full max-w-[1244px] mx-auto left-1/2 top-1/2 transform -translate-x-1/2 z-10">
                    <div class="swiper-button-prev !w-12 !h-12 rounded-full after:hidden">
                        <img src="{{asset('assets/images/icons/arrow-left.svg')}}" class="w-full h-full" alt="icon">
                    </div>
                    <div class="swiper-button-next !w-12 !h-12 rounded-full after:hidden">
                        <img src="{{asset('assets/images/icons/arrow-left.svg')}}" class="w-full h-full rotate-180" alt="icon">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Benefits" class="w-full max-w-[1280px] mx-auto px-[52px] mt-[100px]">
        <div class="flex flex-col gap-8">
            <div class="flex items-center justify-center">
                <h2 class="font-Neue-Plak-bold text-[32px] leading-[44.54px] capitalize text-center">Get acquainted with us! 🙌🏻</h2>
            </div>
            <div class="grid grid-cols-3 gap-6">
                <div class="flex flex-col h-full justify-between rounded-3xl border border-[#E6E7EB] p-6 gap-3 bg-white">
                    <div class="flex items-center gap-3">
                        <img src="{{asset('assets/images/icons/In-Depth Learning from Experts Instructor.png')}}" class="flex w-[56px] h-[56px] shrink-0" alt="icon">
                        <h3 class="font-semibold text-lg leading-[27px]">In-Depth Learning from Experts Instructor</h3>
                    </div>
                    <p class="font-medium leading-[25.6px] text-aktiv-grey">We feature instructors with strong field-specific expertise.</p>
                </div>
                <div class="flex flex-col h-full justify-between rounded-3xl border border-[#E6E7EB] p-6 gap-3 bg-white">
                    <div class="flex items-center gap-3">
                        <img src="{{asset('assets/images/icons/Tangible Results.png')}}" class="flex w-[56px] h-[56px] shrink-0" alt="icon">
                        <h3 class="font-semibold text-lg leading-[27px]">Tangible Results</h3>
                    </div>
                    <p class="font-medium leading-[25.6px] text-aktiv-grey">Our students are highly engaged and supportive of our community.</p>
                </div>
                <div class="flex flex-col h-full justify-between rounded-3xl border border-[#E6E7EB] p-6 gap-3 bg-white">
                    <div class="flex items-center gap-3">
                        <img src="{{asset('assets/images/icons/Supportive Learning Environment.png')}}" class="flex w-[56px] h-[56px] shrink-0" alt="icon">
                        <h3 class="font-semibold text-lg leading-[27px]">Supportive Learning Environment</h3>
                    </div>
                    <p class="font-medium leading-[25.6px] text-aktiv-grey">We feature instructors with strong field-specific expertise.</p>
                </div>
                <div class="flex flex-col h-full justify-between rounded-3xl border border-[#E6E7EB] p-6 gap-3 bg-white">
                    <div class="flex items-center gap-3">
                        <img src="{{asset('assets/images/icons/community support.png')}}" class="flex w-[56px] h-[56px] shrink-0" alt="icon">
                        <h3 class="font-semibold text-lg leading-[27px]">Community Support</h3>
                    </div>
                    <p class="font-medium leading-[25.6px] text-aktiv-grey">We feature instructors with strong field-specific expertise.</p>
                </div>
                <div class="flex flex-col h-full justify-between rounded-3xl border border-[#E6E7EB] p-6 gap-3 bg-white">
                    <div class="flex items-center gap-3">
                        <img src="{{asset('assets/images/icons/Networking Opportunities With Other.png')}}" class="flex w-[56px] h-[56px] shrink-0" alt="icon">
                        <h3 class="font-semibold text-lg leading-[27px]">Networking Opportunities With Other</h3>
                    </div>
                    <p class="font-medium leading-[25.6px] text-aktiv-grey">We feature instructors with strong field-specific expertise.</p>
                </div>
                <div class="flex flex-col h-full justify-between rounded-3xl border border-[#E6E7EB] p-6 gap-3 bg-white">
                    <div class="flex items-center gap-3">
                        <img src="{{asset('assets/images/icons/Learning Flexibility.png')}}" class="flex w-[56px] h-[56px] shrink-0" alt="icon">
                        <h3 class="font-semibold text-lg leading-[27px]">Learning Flexibility</h3>
                    </div>
                    <p class="font-medium leading-[25.6px] text-aktiv-grey">We offer a variety of workshops that you can learn from every day.</p>
                </div>
            </div>
            <a href="#" class="flex items-center rounded-full py-4 px-6 h-[56px] gap-3 bg-aktiv-orange mx-auto">
                <span class="font-semibold text-white">Learn More</span>
                <span class="w-6 h-6 rounded-full bg-white text-center align-middle text-aktiv-orange font-bold">></span>
            </a>
        </div>
    </section>
</div>
<div id="Join-Now" class="relative w-full overflow-hidden">
    <img src="{{asset('assets/images/backgrounds/lines.svg')}}" class="w-full h-full object-cover absolute" alt="backgrounds">
    <div class="relative flex items-center w-full max-w-[1176px] mx-auto my-[52px] h-[464px] rounded-2xl bg-[linear-gradient(280.42deg,#5B8CE9_-42.59%,#4EB6F5_50.66%,#5B8CE9_143.91%)] overflow-hidden z-10">
        <div class="flex flex-col justify-center p-[90px] pr-[60px] gap-8">
            <p class="rounded-full w-fit py-3 px-8 font-semibold text-aktiv-blue bg-[#DFEFFF]">What are you waiting for? Join now 🔥 </p>
            <p class="font-bold text-[32px] leading-[48px] text-white">Study more purposefully and fill your day with productivity</p>
            <a href="#" class="flex items-center w-fit rounded-full px-9 h-[56px] gap-[10px] bg-aktiv-orange">
                <span class="font-semibold text-white">Join Now ></span>
            </a>
        </div>
        <div class="flex w-[496px] h-full shrink-0 overflow-hidden">
            <img src="{{asset('assets/images/photos/join-now.png')}}" class="w-full h-full object-contain" alt="photo">
        </div>
    </div>
</div>
<footer class="w-full p-[52px] bg-white">
    <div class="flex flex-col w-full max-w-[1176px] mx-auto gap-8">
        <div class="flex flex-col items-center gap-4">
            <img src="{{asset('assets/images/logos/Logo-blue.svg')}}" class="h-10" alt="logo">
            <p class="font-medium text-aktiv-grey">Ipsum is a company engaged in offline education.</p>
        </div>
        <hr class="border-[#E6E7EB]">
        <div class="grid grid-cols-3 items-center">
            <p class="flex font-medium text-aktiv-grey">© 2024 Workflow Copyright</p>
            <ul class="flex items-center justify-center gap-6">
                <li class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Workshop</a>
                </li>
                <li class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Community</a>
                </li>
                <li class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Testimony</a>
                </li>
                <li class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">About Us</a>
                </li>
            </ul>
            <ul class="flex items-center justify-end gap-6">
                <li class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Instagram</a>
                </li>
                <li class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Twitter</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
@endsection

@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
@endpush
