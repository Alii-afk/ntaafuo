<x-app-layout>
    <x-slot name="header">
        <div class="text-green pt-8 headsect">
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>
            <div class="refine-cs flex justify-center pt-8 txt-mar sm:justify-center sm:pt-0">
                <span class="tag-line">Ghana’s Favourite Apartment-Share</span>
            </div>
            <div class="refine-cs  flex justify-center sm:justify-center sm:pt-0 mb-4 mt-8">
                <span class="tag-3-line">Refine your search</span>
            </div>
             @php
            if (isset($_GET['type'])) 
            {
                $type = $_GET['type'];
            }
            else
            {
                $type = "";
            }
            @endphp
            
            <div class="refine-cs flex justify-center pt-8 sm:justify-center sm:pt-0">
                <div class="searchMainDiv">
                    <div class="searchsubDiv">
                        <form action="" class="form-css">
                            <select class="select-with-right-border" name="city" id="city" required autocomplete >
                                <option value="" selected>City</option>
                                <option value="Accra">Accra</option>
                                <option value="Kumasi">Kumasi</option>
                            </select>
                            <select class="select-with-right-border" name="town" id="town" required autocomplete >
                                <option value="" selected>Town</option>
                            </select> 
                            <select class="select-with-no-border" name="type" id="type" required  autocomplete >
                                <!--<option value="" selected>Want A ?</option>-->
                                @if ($type === 'room')
                                <option value="lessor" selected>Want A Room</option>
                                <option value="lessee">Want A Roomie</option>
                                @elseif ($type === 'roomie')
                                <option value="lessor" >Want A Room</option>
                                <option value="lessee" selected>Want A Roomie</option>
                                @else
                                <option value="lessor" selected>Want A Room</option>
                                <option value="lessee" >Want A Roomie</option>
                                @endif
                            </select>
                            <button type="button" id="search" class="searchbt"><i class="fa-solid fa-magnifying-glass white-icon fa-lg"></i></button>
                        </form>
                    </div>
                </div>
            </div>
           
            
            <div class="refine-cs flex justify-center pt-8 sm:justify-center sm:pt-0 mt-4">
                <span class="tag-3-line">Find a Room / Roomie</span>
            </div>

            <div class="refine-cs flex justify-center pt-8 sm:justify-center sm:pt-0 mt-2">
                <span class="tag-5-line">Good luck</span>
            </div>
        </div>

    </x-slot>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include Bootstrap JS and Popper.js (jQuery is not required for Bootstrap 4) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    @if ($type === 'room')
        <div class="empty "></div>
        <div class="container mainCont">
            @php $k = 1;  @endphp
            @foreach ($users as $user)
            <div class="small-cs">
                <div id="carouselExampleIndicators{{$k}}" class="carousel class-cour-1" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators{{$k}}" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators{{$k}}" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators{{$k}}" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner cor-size class-cour-1 class-cour-2" >
                        <div class="carousel-item active class-cour-1 class-cour-2" >
                            <img class="d-block class-cour-3 class-cour-2"  src="{{ asset('images/' . $user->imageData1) }}" alt="First slide">
                        </div>
                        <div class="carousel-item class-cour-1 class-cour-2" >
                            <img class="d-block class-cour-3 class-cour-2"  src="{{ asset('images/' . $user->imageData2) }}" alt="Second slide">
                        </div>
                        <div class="carousel-item class-cour-1 class-cour-2" >
                            <img class="d-block class-cour-3 class-cour-2" src="{{ asset('images/' . $user->imageData3) }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators{{$k}}" role="button" data-slide="prev" >
                        <span  aria-hidden="true" class="class-cour-4">❮</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators{{$k}}" role="button" data-slide="next" >
                        <span  aria-hidden="true" class="class-cour-4">❯</span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="class-cour-8">
                    <a href="/detail/{{ $user->email }}" class="class-cour-5" >
                    <p  class="class-cour-6">{{ $user->firstName }}</p>
                    <p class="class-cour-7">{{ $user->tagOne }}, {{ $user->tagTwo }} & {{ $user->tagThree }}</p>
                   Location: {{ $user->town }}</a>
                </div>
            </div>
            @php $k++; @endphp 
            @endforeach
        </div>
    @elseif ($type === 'roomie')
        <div class="  container"></div>
        <div class="container mainCont">
            @foreach ($users as $user)
            <div class="card roomie-1" >
                <div class="roomie-2">
                    <img src="{{ asset('images/' . $user->profilePicture) }}" alt="Person" class="roomie-3">
                </div>
                <div class="roomie-4">
                    <a href="/detail/{{ $user->email }}"  class="roomie-5">
                    <p class="roomie-6" >{{ $user->firstName }}</p>
                    <p class="roomie-7" >{{ $user->tagOne }}, {{ $user->tagTwo }} & {{ $user->tagThree }}</p>
                   Location: {{ $user->town }}</a>
                </div>
            </div>
            @endforeach
        </div>
    @else
        @if ($userType === 'lessor')
        <div class="empty "></div>
        <div class="container mainCont">
            @foreach ($users as $user)
            <div class="card roomie-1" >
                <div class="roomie-2">
                    <img src="{{ asset('images/' . $user->profilePicture) }}" alt="Person" class="roomie-3">
                </div>
                <div class="roomie-4">
                    <a href="/detail/{{ $user->email }}"  class="roomie-5">
                    <p class="roomie-6" >{{ $user->firstName }}</p>
                    <p class="roomie-7" >{{ $user->tagOne }}, {{ $user->tagTwo }} & {{ $user->tagThree }}</p>
                   Location: {{ $user->town }}</a>
                </div>
            </div>
            @endforeach
        </div>
    
        @else
        <div class="empty "></div>
        <div class="container mainCont">
            @php $k = 1;  @endphp
            @foreach ($users as $user)
            <div>
                <div id="carouselExampleIndicators{{$k}}" class="carousel class-cour-1" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators{{$k}}" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators{{$k}}" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators{{$k}}" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner cor-size class-cour-1 class-cour-2" >
                        <div class="carousel-item active class-cour-1 class-cour-2" >
                            <img class="d-block class-cour-3 class-cour-2"  src="{{ asset('images/' . $user->imageData1) }}" alt="First slide">
                        </div>
                        <div class="carousel-item class-cour-1 class-cour-2" >
                            <img class="d-block class-cour-3 class-cour-2"  src="{{ asset('images/' . $user->imageData2) }}" alt="Second slide">
                        </div>
                        <div class="carousel-item class-cour-1 class-cour-2" >
                            <img class="d-block class-cour-3 class-cour-2" src="{{ asset('images/' . $user->imageData3) }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators{{$k}}" role="button" data-slide="prev" >
                        <span  aria-hidden="true" class="class-cour-4">❮</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators{{$k}}" role="button" data-slide="next" >
                        <span  aria-hidden="true" class="class-cour-4">❯</span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="class-cour-8">
                    <a href="/detail/{{ $user->email }}" class="class-cour-5" >
                    <p  class="class-cour-6">{{ $user->firstName }}</p>
                    <p class="class-cour-7">{{ $user->tagOne }}, {{ $user->tagTwo }} & {{ $user->tagThree }}</p>
                   Location: {{ $user->town }}</a>
                </div>
            </div>
            @php $k++; @endphp 
            @endforeach
        </div>
        @endif
    @endif

    </div>



</x-app-layout>