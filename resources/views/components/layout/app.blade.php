<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/player.js')
    <title>{{ $title ?? 'Stylus Streaming' }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<x-app.navbar/>
<section class="flex flex-col justify-center">
    <main class="w-full h-90 flex">
        <x-app.sidebar>
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-sm btn-circle btn-primary"><span class="material-symbols-outlined">
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
        <div class="m-7 overflow-y-auto w-screen">
            {{ $slot }}
        </div>
    </main>
    @persist('player')
    <x-music-player/>
    @endpersist
</section>
@if(session()->has('success'))
    <x-flash/>
@endif
<script>
    const musicContainer = document.getElementById('music-container');
    const playBtn = document.getElementById('play');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');

    const audio = document.getElementById('player');
    const progress = document.getElementById('progress');
    const progressContainer = document.getElementById('progress-container');
    const title = document.getElementById('title');
    const artist = document.getElementById('artist');
    const cover = document.getElementById('cover');
    const currTime = document.querySelector('#currTime');
    const durTime = document.querySelector('#durTime');


    let isPlaying = false;

    // Keep track of song
    let songIndex = 0;

    // Update song details
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

    // Play song
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

    // Previous song
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

    // Update progress bar
    function updateProgress(e) {
        const { duration, currentTime } = e.srcElement;
        const progressPercent = (currentTime / duration) * 100;
        progress.style.width = `${progressPercent}%`;
    }

    // Set progress bar
    function setProgress(e) {

        const width = this.clientWidth;
        const clickX = e.offsetX;

        if(audio && !isNaN(audio.duration)) {
            console.log(clickX, width);
            const duration = audio.duration;
            const switchTime = (clickX / width) * duration;
            audio.currentTime = switchTime;
            console.log(audio.currentTime, switchTime);
        } else {
            console.error("Audio element or duration is not available.");
        }
    }

    //get duration & currentTime for Time of song
    function DurTime (e) {
        const {duration,currentTime} = e.srcElement;
        let sec;
        let sec_d;

        // define minutes currentTime
        let min = (currentTime==null)? 0:
            Math.floor(currentTime/60);
        min = min <10 ? '0'+min:min;

        // define seconds currentTime
        function get_sec (x) {
            if(Math.floor(x) >= 60){

                for (var i = 1; i<=60; i++){
                    if(Math.floor(x)>=(60*i) && Math.floor(x)<(60*(i+1))) {
                        sec = Math.floor(x) - (60*i);
                        sec = sec <10 ? '0'+sec:sec;
                    }
                }
            }else{
                sec = Math.floor(x);
                sec = sec <10 ? '0'+sec:sec;
            }
        }

        get_sec (currentTime,sec);

        // change currentTime DOM
        currTime.innerHTML = min +':'+ sec;

        // define minutes duration
        let min_d = (isNaN(duration) === true)? '0':
            Math.floor(duration/60);
        min_d = min_d <10 ? '0'+min_d:min_d;


        function get_sec_d (x) {
            if(Math.floor(x) >= 60){

                for (var i = 1; i<=60; i++){
                    if(Math.floor(x)>=(60*i) && Math.floor(x)<(60*(i+1))) {
                        sec_d = Math.floor(x) - (60*i);
                        sec_d = sec_d <10 ? '0'+sec_d:sec_d;
                    }
                }
            }else{
                sec_d = (isNaN(duration) === true)? '0':
                    Math.floor(x);
                sec_d = sec_d <10 ? '0'+sec_d:sec_d;
            }
        }

        // define seconds duration

        get_sec_d (duration);

        // change duration DOM
        durTime.innerHTML = min_d +':'+ sec_d;

    };

    // Event listeners
    playBtn.addEventListener('click', () => {
        if (isPlaying) {
            pauseSong();
        } else {
            playSong();
        }
    });

    // Change song
    prevBtn.addEventListener('click', prevSong);
    nextBtn.addEventListener('click', nextSong);

    // Time/song update
    audio.addEventListener('timeupdate', updateProgress);

    // Click on progress bar
    progressContainer.addEventListener('click', setProgress);

    // Song ends
    audio.addEventListener('ended', nextSong);

    // Time of song
    audio.addEventListener('timeupdate',DurTime);

</script>
</body>
</html>
