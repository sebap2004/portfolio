<div class="min-w-full col-span-7 bg-base-300 p-5 flex justify-between items-center z-50 bottom-0 align-middle music-container">
    <div class="flex items-center w-20p">
        <img id="cover" src="/images/placeholder.png" alt="Song Cover" class="mr-3 pfp" width="80" height="16">
        <div class="music-info w-36">
            <p id="title" class="text-left song-name"></p>
            <p id="artist" class="song-artist text-sm text-left"></p>
        </div>
    </div>

    <div class="player-navigation flex flex-col w-60p items-center">
        <div>
            <button id="shuffle" class="btn btn-sm btn-circle btn-ghost rounded-full mx-2"><span
                    class="material-symbols-outlined">
shuffle
</span></button>
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
            <button id="repeat" class="btn btn-sm btn-ghost btn-circle rounded-full mx-2"><span
                    class="material-symbols-outlined">
repeat
</span></button>
        </div>
        <div class="player-div mt-2 flex flex-row align-middle">
            <span id="currTime" class="w-16 mx-2 text-center">00:00</span>
            <div id="progress-container" class="progress-container">
                <input id="progress" type="range" value="0" class="range range-accent">
            </div>
            <span id="durTime" class="w-16 mx-2 text-center">00:00</span>
        </div>
    </div>

    <div class="w-20p flex justify-end items-center">
        <button id="volumeClick" class="btn btn-ghost btn-circle material-symbols-outlined mr-3">
volume_up
</button>
        <input id="volume" type="range" class="range w-36 range-xs">
    </div>
    <audio id="player"></audio>
</div>



