        <!-- Hero -->
        <section
            class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
        >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('images/laravel-logo.png')"
            ></div>

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                    Lara<span class="text-black">Jobs</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Find or post Laravel jobs & projects
                </p>
                <div>
                    @auth
                        <a
                            href="/manage"
                            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                            >Hey <b>{{auth()->user()->name}}</b> manage your listings here</a
                        >
                    @else
                        <a
                            href="/login"
                            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                            >Login or Sign Up to post a Job</a
                        >
                    @endauth
                </div>
            </div>
        </section>