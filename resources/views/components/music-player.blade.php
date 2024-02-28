<div class="fixed min-w-full bg-base-300 p-5 flex justify-between items-center bottom-0 align-middle music-container">
    <div class="flex items-center">
        <img id="cover" src="/images/logoonly.png" alt="Song Cover" class="mr-3 pfp" width="80" height="16">
        <div class="music-info w-36">
            <p id="title" class="song-name">Song name</p>
            <p id="artist" class="song-artist">Artist</p>
            <span id="currTime"></span>/<span id="durTime"></span>
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
            <div id="progress-container" class="progress-container self-center mt-3">
                <div id="progress" class="flex flex-wrap content-center player-progress z-10 justify-end bg-primary"><button class="btn m-0.25 btn-xs btn-circle btn-primary"></button></div>
            </div>
        </div>
    </div>

    <div>
        <img src="/images/logoonly.png" alt="Song Cover" class="mr-3" width="80" height="16">
    </div>
    <audio id="player" src="/testsong/testsong.mp3"></audio>
</div>



