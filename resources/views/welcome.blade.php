<x-layout.home>
    <div class="text-center flex flex-col justify-center">
        <h1 class="text-7xl font-extrabold">Welcome to Stylus Streaming.</h1>
        <br>
        <p>Our main goal is to create a service where both artists and listeners are treated fairly.</p>
        <div class="mt-8 justify-center flex items-center">
            @guest
                <a wire:navigate href="/register" class="btn btn-lg drop-shadow-2xl btn-primary mx-3">
                    Register Now
                </a>
            @else
                <a wire:navigate href="/app" class="btn btn-primary btn-outline rounded-full mx-3" data-theme="light">
                    Open Player
                </a>
            @endguest
        </div>
        <br>
    </div>
    <div class="justify-center items-center flex flex-col">
        <div class="flex items-center w-home">
            <div class="half m-3">
                <h1 class="text-3xl font-bold">We're different from other streaming services.</h1>
            </div>
            <div class="half m-3">
                While other streaming services practically steal from artists with exorbitant rates, our main goal is to keep rates as minimal as possible for server upkeep costs. Your music, your money.
            </div>
        </div>
        <br>
        <div class="flex items-center w-home">
            <div class="half m-3">
                Our best-in-class tools and beautiful sleek UI are available for all artists for a seamless experience with uploading and managing your music.
            </div>
            <div class="half m-3">
                <h1 class="text-3xl font-bold">Power to the artist.</h1>
            </div>
        </div>
        <br>
        <div class="flex items-center w-home">
            <div class="half m-3">
                <h1 class="text-3xl font-bold">Your music, your voice.</h1>
            </div>
            <div class="half m-3">
                Tired of algorithms dictating what you listen to? At our platform, we prioritize human curation, giving listeners access to a diverse range of music handpicked by passionate experts.
            </div>
        </div>
        <br>
        <div class="flex items-center w-home">
            <div class="half m-3">
                Beyond just streaming, we foster genuine connections between artists and listeners. Our platform hosts live events, Q&A sessions, and virtual meet-and-greets, allowing artists to engage directly with their fanbase.
            </div>
            <div class="half m-3">
                <h1 class="text-3xl font-bold">Connecting through beats.</h1>
            </div>
        </div>
        <br>
        <h1 class="text-5xl">Our values</h1>
        <div class="flex items-center w-home">
            <div class="half m-3">
                We value transparency and fairness. Unlike other platforms, we ensure that artists receive clear and detailed reports on their earnings, empowering them to make informed decisions about their music careers.
            </div>
            <div class="half m-3">
                Our commitment to supporting independent artists goes beyond just streaming. We provide resources and guidance to help them thrive in an industry that often favors the mainstream.
            </div>
        </div>
    </div>
</x-layout.home>
