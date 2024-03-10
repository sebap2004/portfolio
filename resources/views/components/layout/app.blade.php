<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/player.js')
    <title>{{ $title ?? 'Stylus Streaming' }}</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
</head>
<body>
<main class="h-screen grid grid-cols-7 grid-rows-8">
    <x-app.navbar/>
    <x-app.sidebar>
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-sm btn-circle btn-primary"><span
                    class="material-symbols-outlined">
add
</span></div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-300 rounded-box w-52">
                <li><a href="/app/upload" wire:navigate>New Song</a></li>
                <li><a>New Playlist</a></li>
                <li><a>New Album</a></li>
            </ul>
        </div>
        <h1 class="text-2xl pb-3">Playlists</h1>
        <a class="btn btn-block bg-base-300">Playlist 1</a>
    </x-app.sidebar>
    <div class="m-7 mb-0 mt-0 py-8 col-span-6 row-span-7 overflow-auto">
        {{ $slot }}
    </div>
    <div class="col-span-7">
        @persist('player')
            <x-music-player/>
        @endpersist
    </div>
    @if(session()->has('success'))
        <x-flash/>
    @endif
</main>
<script>
    const playBtn = document.getElementById('play');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    const audio = document.getElementById('player');
    const progress = document.getElementById('progress');
    const currTime = document.querySelector('#currTime');
    const durTime = document.querySelector('#durTime');
    let isPlaying = false;

    // Keep track of song
    let songIndex = 0;

    let isDragging = false; // Variable to track dragging state

    function playSong() {
        playBtn.innerHTML = '<span class="material-symbols-outlined">pause</span>'
        audio.play();
        isPlaying = true;
    }

    // Pause song
    function pauseSong() {
        playBtn.innerHTML = '<span class="material-symbols-outlined">play_arrow</span>'
        audio.pause();
        isPlaying = false;
    }

    function prevSong() {
        songIndex--;

        if (songIndex < 0) {
            songIndex = queue.length - 1;
        }

        loadSong(queue[songIndex]);

        playSong();
    }

    // Next song
    function nextSong() {
        songIndex++;

        if (songIndex > queue.length - 1) {
            songIndex = 0;
        }

        loadSong(queue[songIndex]);

        playSong();
    }

    // Function to load a song
    function loadSong(songID) {
        fetch('/api/song/' + songID)
            .then(response => {
                if (!response.ok) {
                    title.innerText = '';
                    artist.innerText = '';
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                title.innerText = data.song_name;
                artist.innerText = data.artist_name;
                audio.src = data.song_directory;
                cover.src = data.cover_directory;
                audio.currentTime = 0;
                playSong();
            })
            .catch(error => {
                console.error('Error fetching song:', error);
            });
    }

    function updateTime()
    {
        const { currentTime, duration } = audio;
        const progressPercent = (currentTime / duration) * 100;
        progress.value = progressPercent;
    }


    playBtn.addEventListener('click', () => {
        if (isPlaying) {
            pauseSong();
        } else {
            playSong();
        }
    });

    // Add an event listener for mouseup event on the progress input
    progress.addEventListener('mouseup', function() {
        // Set the current time of the audio to the value of the progress input
        audio.currentTime = progress.value;
        isDragging = false; // Update dragging state
    });

    // Add event listeners for mousedown and mousemove events on the progress input
    progress.addEventListener('mousedown', function() {
        isDragging = true; // Update dragging state
    });

    // Update the current time and duration of the audio
    audio.addEventListener('loadedmetadata', function() {
        const minutes = Math.floor(audio.duration / 60);
        const seconds = Math.floor(audio.duration % 60);
        durTime.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    });

    audio.addEventListener('timeupdate', function() {
        // Update current time regardless of dragging
        if (!isDragging)
        {
            updateTime();
        }
        const minutes = Math.floor(audio.currentTime / 60);
        const seconds = Math.floor(audio.currentTime % 60);
        currTime.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    });

    prevBtn.addEventListener('click', prevSong);
    nextBtn.addEventListener('click', nextSong);
    audio.addEventListener('ended', nextSong);
</script>


</body>
</html>
