const musicContainer = document.getElementById('music-container');
const playBtn = document.getElementById('play');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');

const audio = document.getElementById('player');
const progress = document.getElementById('progress');
const progressContainer = document.getElementById('progress-container');
const title = document.getElementById('title');
const cover = document.getElementById('cover');
const currTime = document.querySelector('#currTime');
const durTime = document.querySelector('#durTime');

// Song titles
const queue = ['test1', 'test2'];

let isPlaying = false;

// Keep track of song
let songIndex = 0;

// Initially load song details into DOM
loadSong(queue[songIndex]);

// Update song details
function loadSong(song) {
    title.innerText = song;
    audio.src = `testsong/${song}.mp3`;
    cover.src = `images/${song}.png`;
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
