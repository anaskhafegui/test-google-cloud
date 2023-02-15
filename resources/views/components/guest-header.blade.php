<header id="header">
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="{{ route('index') }}">
                    <img src="{{ url('images/logo.png') }}"></img>
                </a>
                <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="toggleNavbar('example-collapse-navbar')">
                    <i class="text-white fas fa-bars"></i>
                </button>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden lg:rounded-none rounded-lg" id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto sm:py-6 sm:text-lg px-10">
                    <li class="flex items-center">
                        <a class="lg:text-white lg:px-10 py-2 text-shadow-custom-1" href="{{ route('index') }}"><span class="">Heim</span></a>
                    </li>
                    <li class="flex items-center">
                        <button onclick="toggleDropDown('dropdownNavbar')" id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 font-medium lg:text-white md:p-0 md:w-auto lg:px-10 text-shadow-custom-1">
                            Þjónusta
                            <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden absolute lg:top-28 top-64 bg-white divide-y divide-gray-100 rounded shadow w-44">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('carpetCleaning') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mottuhreinsun</a>
                                </li>
                                <li>
                                    <a href="{{ route('teppahreinsun') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Teppahreinsun</a>
                                </li>
                                <li>
                                    <a href="{{ route('deepCleaning') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Djúphreinsun</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:px-10 py-2 text-shadow-custom-1" href="{{ route('machineRental') }}"><span class="">Vélaleiga</span></a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:px-10 py-2 text-shadow-custom-1" href="{{ route('contact') }}"><span class="">Um Castus</span></a>
                    </li>
                </ul>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden" id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <!-- <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="#pablo"><i class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "></i><span class="lg:hidden inline-block ml-2">Share</span></a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="#pablo"><i class="lg:text-gray-300 text-gray-500 fab fa-twitter text-lg leading-lg "></i><span class="lg:hidden inline-block ml-2">Tweet</span></a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="#pablo"><i class="lg:text-gray-300 text-gray-500 fab fa-github text-lg leading-lg "></i><span class="lg:hidden inline-block ml-2">Star</span></a>
                    </li> -->
                    <li class="flex items-center">
                        <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="#">
                            <img src="{{ url('images/large.png') }}"></img>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }

    function toggleDropDown(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
</script>