@extends('layouts.app')
@section('title')
Booking {{$workshop->name}}
@endsection
@section('content')
<div class="h-[112px]">
    <x-nav/>
</div>
<div id="background" class="relative w-full">
    <div class="absolute w-full h-[300px] bg-[linear-gradient(0deg,#4EB6F5_0%,#5B8CE9_100%)] -z-10"></div>
</div>
<section id="Content" class="w-full max-w-[1280px] mx-auto px-[52px] mt-16 mb-[100px]">
    <div class="flex flex-col gap-16">
        <div class="flex flex-col items-center gap-1">
            <p class="font-bold text-[32px] leading-[48px] capitalize text-white">Booking Workshop</p>
            <div class="flex items-center gap-2 text-white">
                <a class="last:font-semibold">Homepage</a>
                <span>></span>
                <a class="last:font-semibold">Workshop Details</a>
                <span>></span>
                <a class="last:font-semibold">Booking Workshop</a>
            </div>
        </div>
        <main class="flex gap-8">
            <section id="Sidebar" class="group flex flex-col w-[420px] h-fit rounded-3xl p-8 bg-white">
                <div class="flex flex-col gap-4">
                    <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Workshop Details</h2>
                    <div class="thumbnail-container relative h-[240px] rounded-xl bg-[#D9D9D9] overflow-hidden">
                        <img src="assets/images/thumbnails/thumbnail1.png" class="w-full h-full object-cover" alt="thumbnail">
                    </div>
                    <div class="card-detail flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            <div class="flex items-center gap-1">
                                <img src="assets/images/icons/calendar-2.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                                <span class="font-medium text-aktiv-grey">Tue, 30 May 2024</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="assets/images/icons/timer.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                                <span class="font-medium text-aktiv-grey">09:30 AM - Finish</span>
                            </div>
                        </div>
                        <h3 class="font-Neue-Plak-bold text-xl">Mastering the Art of Public Speaking: Practical Tips and Powerful Techniques</h3>
                    </div>
                </div>
                <div id="closes-section" class="accordion flex flex-col gap-8 transition-all duration-300 mt-8 group-has-[:checked]:mt-0 group-has-[:checked]:!h-0 overflow-hidden">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Instructor Details</h2>
                        <div class="flex items-center gap-3 rounded-xl border border-[#E6E7EB] p-4">
                            <div class="flex w-16 h-16 shrink-0 rounded-full overflow-hidden bg-[#D9D9D9]">
                                <img src="assets/images/photos/photo3.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <div class="flex flex-col gap-[2px] flex-1">
                                <p class="font-semibold text-lg leading-[27px]">Megamore S Qie</p>
                                <p class="font-medium text-aktiv-grey">Motivator Intructor</p>
                            </div>
                            <img src="assets/images/icons/verify.svg" class="flex w-[62px] h-[62px] shrink-0" alt="icon">
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">This workshop will teach</h2>
                        <div class="flex flex-col gap-6">
                            <div class="flex items-center gap-2">
                                <img src="assets/images/icons/tick-circle.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                                <p class="font-semibold text-lg leading-[27px]">Crafting Compelling Messages</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="assets/images/icons/tick-circle.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                                <p class="font-semibold text-lg leading-[27px]">Enhancing Delivery Skills</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="assets/images/icons/tick-circle.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                                <p class="font-semibold text-lg leading-[27px]">Engaging Your Audience</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="assets/images/icons/tick-circle.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                                <p class="font-semibold text-lg leading-[27px]">Practical Exercises</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="assets/images/icons/tick-circle.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                                <p class="font-semibold text-lg leading-[27px]">Personal Development Plan</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Location Details</h2>
                        <div class="flex flex-col gap-4 rounded-xl border border-[#E6E7EB] p-5 pb-[21px]">
                            <div class="flex w-full h-[180px] rounded-xl overflow-hidden">
                                <img src="assets/images/thumbnails/location.png" class="w-full h-full object-cover" alt="location">
                            </div>
                            <div class="flex flex-col gap-3">
                                <p class="font-medium leading-[25.6px] text-aktiv-grey">101 Cendrawasih Road, Melati, Bandung Wetan, Bandung, West Java, 40116, Indonesia</p>
                                <a href="#" class="font-semibold text-aktiv-orange">View in Google Maps</a>
                            </div>
                        </div>
                    </div>
                </div>
                <label class="group mt-8">
                    <input type="checkbox" class="hidden">
                    <p class="before:content-['Show_Less'] group-has-[:checked]:before:content-['Show_More'] before:font-semibold before:text-lg before:leading-[27px] flex items-center justify-center gap-[6px]">
                        <img src="assets/images/icons/arrow-up.svg" class="w-6 h-6 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
                    </p>
                </label>
            </section>
            <form id="Form" action="confirm-payment.html" class="flex flex-col w-[724px] gap-8">
                <div class="flex items-center rounded-3xl p-8 gap-4 bg-white">
                    <img src="assets/images/icons/shield-tick.svg" class="w-[62px] h-[62px] flex shrink-0" alt="icon">
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-semibold text-lg leading-[27px]">Safe Security Pro Max+</p>
                        <p class="font-medium text-aktiv-grey">Don’t worry, Your data will be kept private and protected.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-3xl p-8 gap-4 bg-white">
                    <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Personal Informations</h2>
                    <div class="flex flex-col gap-6">
                        <p class="w-full border-l-[5px] border-aktiv-red py-4 px-3 bg-[linear-gradient(270deg,rgba(235,87,87,0)_0%,rgba(235,87,87,0.09)_100%)] font-semibold text-aktiv-red">Please enter data correctly. We will send the order receipt to your email.</p>
                        <label class="flex flex-col gap-4">
                            <p class="font-medium text-aktiv-grey">Full Name</p>
                            <div class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                <img src="assets/images/icons/profile-circle.svg" class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden" alt="icon">
                                <img src="assets/images/icons/profile-circle-black.svg" class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex" alt="icon">
                                <input type="text" name="name" id="name" class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey" placeholder="Write your complete name" required>
                            </div>
                        </label>
                        <label class="flex flex-col gap-4">
                            <p class="font-medium text-aktiv-grey">Phone no.</p>
                            <div class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                <img src="assets/images/icons/call.svg" class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden" alt="icon">
                                <img src="assets/images/icons/call-black.svg" class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex" alt="icon">
                                <input type="tel" name="phone" id="phone" class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey" placeholder="Give us your phone number" required>
                            </div>
                        </label>
                        <label class="flex flex-col gap-4">
                            <p class="font-medium text-aktiv-grey">Email Address</p>
                            <div class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                <img src="assets/images/icons/sms.svg" class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden" alt="icon">
                                <img src="assets/images/icons/sms-black.svg" class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex" alt="icon">
                                <input type="email" name="email" id="email" class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey" placeholder="Write your email address" required>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col rounded-3xl p-8 gap-8 bg-white">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Workshop Price</h2>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-[6px]">
                                <p class="font-bold text-[32px] leading-[48px] text-aktiv-red">Rp160.000</p>
                                <p class="font-semibold text-aktiv-grey">/person</p>
                            </div>
                            <div class="counter relative flex items-center w-fit rounded-lg border border-[#E6E7EB] p-3 gap-3">
                                <button type="button" id="decrement" class="w-6 h-6">
                                    <img src="assets/images/icons/minus.svg" alt="icon">
                                </button>
                                <p id="quantity" class="font-semibold text-xl leading-[30px] w-fit">1</p>
                                <input type="number" name="quantity" id="quantity_input" class="absolute top-0 left-1/2 opacity-0 -z-10" value="1">
                                <button type="button" id="increment" class="increment w-6 h-6">
                                    <img src="assets/images/icons/add.svg" alt="icon">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Attendants Details</h2>
                        <div id="Attendants-Section" class="flex flex-col gap-6">
                            <div class="attendant-wrapper flex flex-col gap-[10px]">
                                <div id="Attendant-1" class="group/accordion peer flex flex-col rounded-2xl border border-[#E6E7EB] p-6 has-[.invalid]:text-aktiv-black has-[.invalid]:has-[:checked]:border-aktiv-red has-[.invalid]:border-aktiv-grey has-[.invalid]:has-[:checked]:text-aktiv-red transition-all duration-300">
                                    <label class="relative flex items-center justify-between">
                                        <p class="font-semibold text-lg leading-[27px]">Attendants 1</p>
                                        <input type="checkbox" name="accodion" class="hidden">
                                        <img src="assets/images/icons/arrow-square-up.svg" class="absolute right-0 top-1/2 transform -translate-y-1/2 w-6 h-6 transition-all duration-300 opacity-100 group-has-[:checked]/accordion:rotate-180 group-has-[.invalid]/accordion:group-has-[:checked]/accordion:opacity-0" alt="icon">
                                        <img src="assets/images/icons/arrow-square-down-red.svg" class="absolute right-0 top-1/2 transform -translate-y-1/2 w-6 h-6 transition-all duration-300 opacity-0 group-has-[.invalid]/accordion:group-has-[:checked]/accordion:opacity-100" alt="icon">
                                    </label>
                                    <div class="accordion flex flex-col gap-6 mt-6 transition-all duration-300 group-has-[:checked]/accordion:!h-0 group-has-[:checked]/accordion:mt-0 overflow-y-hidden">
                                        <hr class="border-[#E6E7EB]">
                                        <label class="flex flex-col gap-4">
                                            <p class="font-medium text-aktiv-grey">Full Name</p>
                                            <div class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                                <img src="assets/images/icons/profile-circle.svg" class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden" alt="icon">
                                                <img src="assets/images/icons/profile-circle-black.svg" class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex" alt="icon">
                                                <input type="text" name="participants[0][name]" class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey" placeholder="Write your complete name" required>
                                            </div>
                                        </label>
                                        <label class="flex flex-col gap-4">
                                            <p class="font-medium text-aktiv-grey">Occupation</p>
                                            <div class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                                <img src="assets/images/icons/briefcase.svg" class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden" alt="icon">
                                                <img src="assets/images/icons/briefcase-black.svg" class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex" alt="icon">
                                                <input type="text" name="participants[0][occupation]" class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey" placeholder="Attendant Status" required>
                                            </div>
                                        </label>
                                        <label class="flex flex-col gap-4">
                                            <p class="font-medium text-aktiv-grey">Email Address</p>
                                            <div class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                                <img src="assets/images/icons/sms.svg" class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden" alt="icon">
                                                <img src="assets/images/icons/sms-black.svg" class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex" alt="icon">
                                                <input type="email" name="participants[0][email]" class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey" placeholder="Attendant Email Address" required>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <span class="hidden font-medium text-aktiv-red peer-has-[.invalid]:block">Please fill in the attendant’s data before proceeding.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col rounded-3xl p-8 gap-8 bg-white">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Payments Details</h2>
                        <div class="flex flex-col rounded-xl border border-[#E6E7EB] p-6 gap-4">
                            <div class="flex items-center justify-between">
                                <p class="font-medium text-aktiv-grey">Quantity</p>
                                <p id="display_quantity" class="font-semibold text-lg leading-[27px] text-right"></p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="font-medium text-aktiv-grey">Price</p>
                                <p id="sub_total" class="font-semibold text-lg leading-[27px] text-right"></p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="font-medium text-aktiv-grey">PPN 11%</p>
                                <p id="tax" class="font-semibold text-lg leading-[27px] text-right"></p>
                            </div>
                            <hr class="border-[#E6E7EB]">
                            <div class="flex items-center justify-between">
                                <p class="font-medium text-aktiv-grey">Total Price</p>
                                <p id="total_amount" class="font-semibold text-lg leading-[27px] text-right text-aktiv-red"></p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full rounded-xl h-16 px-6 text-center bg-aktiv-orange font-semibold text-lg leading-[27px] text-white">Pay Now</button>
                </div>
            </form>
        </main>
    </div>
</section>
@endsection
@push('after-scripts')
@endpush
