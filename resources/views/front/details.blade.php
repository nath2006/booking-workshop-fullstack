@extends('layouts.app')
@section('title')
Details {{$workshop->name}}
@endsection
@section('content')
<div class="h-[112px]">
    <x-nav/>
</div>
<div id="background" class="relative w-full">
    <div class="absolute w-full h-[300px] bg-[linear-gradient(0deg,#4EB6F5_0%,#5B8CE9_100%)] -z-10"></div>
</div>
<section id="Category" class="w-full max-w-[1280px] mx-auto px-[52px] mt-16 mb-[100px]">
    <div class="flex flex-col gap-16">
        <div class="flex flex-col items-center gap-1">
            <p class="font-bold text-[32px] leading-[48px] capitalize text-white">Workshop Details</p>
            <div class="flex items-center gap-2 text-white">
                <a class="last:font-semibold">Homepage</a>
                <span>></span>
                <a class="last:font-semibold">Workshop Details</a>
            </div>
        </div>
        <main class="flex gap-8">
            <section id="Details" class="flex flex-col w-[724px] rounded-2xl gap-8 p-8 bg-white">
                <div id="Thumbnail" class="relative flex w-full h-[369px] rounded-2xl overflow-hidden bg-[#D9D9D9]">
                    <img src="{{asset('assets/images/thumbnails/thumbnail1.png')}}" class="w-full h-full object-cover" alt="thumbnail">
                    @if ($workshop->is_open)
                        @if($workshop->has_started)
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
                            <img src="{{assets('assets/images/icons/sand-timer.svg')}}" class="w-6 h-6" alt="icon">
                            <span class="font-semibold">CLOSED</span>
                        </div>
                    @endif
                </div>
                <section id="Header" class="flex flex-col gap-6">
                    <div id="Rating" class="flex items-center gap-4">
                        <div class="flex items-center rounded-md border border-aktiv-green py-2 px-3 gap-[5px] bg-aktiv-green/[9%]">
                            <img src="{{asset('assets/images/icons/format-circle.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                            <p class="font-medium text-aktiv-green capitalize">{{$workshop->category->name}}</p>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="flex items-center">
                                <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[4px] w-6 h-6" alt="star">
                                <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[4px] w-6 h-6" alt="star">
                                <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[4px] w-6 h-6" alt="star">
                                <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[4px] w-6 h-6" alt="star">
                                <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="p-[4px] w-6 h-6" alt="star">
                            </div>
                            <p class="font-semibold text-lg leading-[27px]">4.5 <span class="font-medium text-aktiv-grey">(3250 Reviews)</span></p>
                        </div>
                    </div>
                    <div id="Title" class="flex flex-col gap-3">
                        <h1 class="font-Neue-Plak-bold text-2xl leading-[33.6px] capitalize">
                            {{$workshop->name}}
                        </h1>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="flex items-center justify-between rounded-2xl border border-[#E6E7EB] p-5 gap-4 bg-white">
                                <div class="flex flex-col gap-2">
                                    <p class="font-medium text-aktiv-grey">Start from</p>
                                    <p class="font-semibold text-lg leading-[27px]">
                                        {{$workshop->time_at->format('h:i A')}}
                                    </p>
                                </div>
                                <img src="{{asset('assets/images/icons/Duration.png')}}" class="w-16 h-16 flex shrink-0" alt="icon">
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-[#E6E7EB] p-5 gap-4 bg-white">
                                <div class="flex flex-col gap-2">
                                    <p class="font-medium text-aktiv-grey">Kick off date</p>
                                    <p class="font-semibold text-lg leading-[27px]">
                                        {{$workshop->started_at->format('M d, Y')}}
                                    </p>
                                </div>
                                <img src="{{asset('assets/images/icons/Kick off date.png')}}" class="w-16 h-16 flex shrink-0" alt="icon">
                            </div>
                        </div>
                    </div>
                </section>
                <div id="Descriptions" class="flex flex-col gap-4">
                    <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Descriptions</h2>
                    <p class="group relative font-medium leading-[28.8px] text-aktiv-grey">
                        <span class="line-clamp-4 group-has-[:checked]:line-clamp-none">
                            {{$workshop->about}}
                        </span>
                        <label class="group absolute bottom-0 right-0 z-10 bg-white has-[:checked]:relative">
                            <input type="checkbox" class="peer hidden">
                            <span class="pr-52 before:content-['..._'] after:font-semibold after:text-aktiv-blue after:content-['Read_More...'] group-has-[:checked]:pr-0 group-has-[:checked]:after:content-['See_Less'] group-has-[:checked]:before:content-['']"></span>
                        </label>
                    </p>
                </div>
                <div id="Location" class="flex flex-col gap-4">
                    <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Location Details</h2>
                    <div class="relative flex w-full h-[360px] rounded-2xl overflow-hidden bg-[#D9D9D9]">
                        <div class="absolute left-5 top-1/2 transform -translate-y-1/2 flex flex-col w-[260px] h-fit max-h-[320px] gap-4 rounded-2xl p-5 bg-white">
                            <div class="flex w-full h-[124px] rounded-xl overflow-hidden">
                                <img src="{{Storage::url($workshop->venue_thumbnail)}}" class="w-full h-full object-cover" alt="location">
                            </div>
                            <div class="flex flex-col gap-3 justify-between">
                                <p class="font-medium leading-[25.6px] text-aktiv-grey line-clamp-4">{{$workshop->address}}</p>
                                <a href="https://www.google.com/maps/place/{{$workshop->address}}" class="font-semibold text-aktiv-orange">View in Google Maps</a>
                            </div>
                        </div>
                        <img src="{{Storage::url($workshop->bg_map)}}" class="w-full h-full object-cover" alt="maps">
                    </div>
                </div>
            </section>
            <section id="Sidebar" class="flex flex-col w-[420px] gap-8">
                <div class="flex flex-col rounded-3xl p-8 gap-4 bg-white">
                    <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Instructor Details</h2>
                    <div class="flex items-center gap-3">
                        <div class="flex w-16 h-16 shrink-0 rounded-full overflow-hidden bg-[#D9D9D9]">
                            <img src="{{Storage::url($workshop->instructor->avatar)}}" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div class="flex flex-col gap-[2px] flex-1">
                            <p class="font-semibold text-lg leading-[27px]">
                                {{$workshop->instructor->name}}
                            </p>
                            <p class="font-medium text-aktiv-grey">
                                {{$workshop->instructor->occupation}}
                            </p>
                        </div>
                        <img src="{{asset('assets/images/icons/verify.svg')}}" class="flex w-[62px] h-[62px] shrink-0" alt="icon">
                    </div>
                </div>
                <div class="flex flex-col rounded-3xl pt-8 gap-6 bg-white">
                    <div class="flex flex-col mx-8 gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Workshop Price</h2>
                        <div class="flex items-center gap-[6px]">
                            <p class="font-bold text-[32px] leading-[48px] text-aktiv-red">
                                Rp {{ number_format($workshop->price, 0, ',', '.') }}
                            </p>
                            <p class="font-semibold text-aktiv-grey">/person</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mx-8 rounded-2xl border border-r-2 border-b-2 border-[#E6E7EB] py-4 px-6 gap-2">
                        <div class="flex flex-col gap-1">
                            <p class="font-medium text-aktiv-grey">Total Attendants:</p>
                            <p class="font-semibold text-lg leading-[27px]"> {{$workshop->participants->count()}} Has People Joined</p>
                        </div>
                        <img src="{{asset('assets/images/icons/user-2.svg')}}" class="w-[56px] h-[56px]" alt="icon">
                    </div>
                    <div class="flex flex-col mx-8 gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">This workshop will teach</h2>
                        <div class="flex flex-col gap-6">
                            @forelse ( $workshop->benefits as $workshopBenefit )
                            <div class="flex items-center gap-2">
                                <img src="{{asset('assets/images/icons/tick-circle.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                                <p class="font-semibold text-lg leading-[27px]">{{$workshopBenefit->name}}</p>
                            </div>
                                @empty
                                Data Benefit Workshop is not yet Available
                            @endforelse
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <a href="booking.html" class="flex items-center justify-center mx-8 h-16 rounded-xl px-6 gap-[10px] bg-aktiv-orange font-semibold text-lg leading-[27px] text-white mb-8">Join Workshop</a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</section>
@endsection
