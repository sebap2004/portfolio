<div class="min-w-full col-span-7 bg-base-300 p-5 flex justify-between items-center z-50 bottom-0 align-middle music-container">
    <div class="flex items-center">
        <img id="cover" src="/images/logoonly.png" alt="Song Cover" class="mr-3 pfp" width="80" height="16">
        <div class="music-info w-36">
            <p id="title" class="song-name">Song name</p>
            <p id="artist" class="song-artist">Artist</p>
        </div>
    </div>

    <div class="player-navigation flex flex-col items-center">
        <div>
            <button id="prev" class="btn btn-sm btn-circle btn-primary rounded-full mx-2"><span
                    class="material-symbols-outlined">
skip_previous
</span></button>
            <button id="play" class="btn btn-lg btn-primary btn-circle  rounded-full mx-2"><span
                    class="material-symbols-outlined">
play_arrow
</span></button>
            <button id="next" class="btn btn-sm btn-circle btn-primary rounded-full mx-2"><span
                    class="material-symbols-outlined">
skip_next
</span></button>
        </div>
        <div class="player-div mt-1 flex flex-row align-middle">
            <span id="currTime" class="w-16 text-center">00:00</span>
            <div id="progress-container" class="progress-container self-center">
                <div id="progress" class="flex flex-wrap content-center player-progress z-10 justify-end bg-primary"></div>
            </div>
            <span id="durTime" class="w-16 text-center">00:00</span>
        </div>
    </div>

    <div>
        <img src="/images/logoonly.png" alt="Song Cover" class="mr-3" width="80" height="16">
    </div>
    <audio id="player" src="/testsong/testsong.mp3"></audio>
</div>



