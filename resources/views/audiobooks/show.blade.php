<x-layout>

   <div class="grid lg:grid-cols-3 grid-cols-1">
    <div class="p-4 border rounded">
        <h2 class="text-xl font-bold mb-2">{{ $audiobook->title }}</h2>
        <p class="text-gray-600 mb-4">Oleh: {{ $audiobook->speaker->name }}</p>
        @if ($audiobook->cover)
            <img src="{{ asset('storage/' . $audiobook->cover) }}" alt="Cover of {{ $audiobook->title }}" class="h-46 mb-4 rounded-md">
        @endif
        <p>{{ $audiobook->description }}</p>

        <!-- Audio Player Custom -->
        <div class="audio-player w-full mt-2 bg-gray-100 p-4 rounded-lg ">
            <div class="flex justify-around">
            <button id="rewind-10" class="bg-gray-300 text-gray-700 p-2 rounded-lg">-10s</button>
            <button id="play-pause" class="play bg-blue-500 text-white p-2 rounded-lg px-5">Play</button>
            <button id="forward-10" class="bg-gray-300 text-gray-700 p-2 rounded-lg">+10s</button>
        </div>



            <!-- Progress Bar -->
            <input type="range" id="progress-bar" value="0" min="0" max="100" class="w-full mt-2">
            <div class="flex justify-center">
            <span id="current-time" class="text-gray-600">00:00</span> / <span id="duration" class="text-gray-600">00:00</span>

            <!-- Speed Control -->
            <label for="speed" class="text-gray-600 ml-4">Speed:</label>
            <select id="speed" class="text-gray-600 p-1 rounded">
                <option value="1">Normal</option>
                <option value="1.5">1.5x</option>
                <option value="2">2x</option>
            </select>
        </div>
            <div class="flex justify-center">
            <p>Volume : </p>
            <!-- Volume Control -->
            <input type="range" id="volume" min="0" max="1" step="0.1" value="1" class="ml-4 w-1/3">
        </div>
        </div>

        <!-- Hidden Audio Element -->
        <audio id="audio" class="hidden">
            <source src="{{ asset('storage/' . $audiobook->file_path) }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>

    <!-- JavaScript for Custom Controls -->
    <script>
        const audio = document.getElementById('audio');
        const playPauseButton = document.getElementById('play-pause');
        const rewindButton = document.getElementById('rewind-10');
        const forwardButton = document.getElementById('forward-10');
        const progressBar = document.getElementById('progress-bar');
        const currentTime = document.getElementById('current-time');
        const duration = document.getElementById('duration');
        const speedControl = document.getElementById('speed');
        const volumeControl = document.getElementById('volume');

        // Toggle Play/Pause
        playPauseButton.addEventListener('click', () => {
            if (audio.paused) {
                audio.play();
                playPauseButton.textContent = 'Pause';
                playPauseButton.classList.remove('bg-blue-500');
                playPauseButton.classList.add('bg-red-500');
            } else {
                audio.pause();
                playPauseButton.textContent = 'Play';
                playPauseButton.classList.remove('bg-red-500');
                playPauseButton.classList.add('bg-blue-500');
            }
        });

        // Rewind 10 Seconds
        rewindButton.addEventListener('click', () => {
            audio.currentTime = Math.max(0, audio.currentTime - 10);
        });

        // Forward 10 Seconds
        forwardButton.addEventListener('click', () => {
            audio.currentTime = Math.min(audio.duration, audio.currentTime + 10);
        });

        // Update Current Time and Duration
        audio.addEventListener('loadedmetadata', () => {
            duration.textContent = formatTime(audio.duration);
            progressBar.max = Math.floor(audio.duration);
        });

        audio.addEventListener('timeupdate', () => {
            currentTime.textContent = formatTime(audio.currentTime);
            progressBar.value = Math.floor(audio.currentTime);
        });

        // Update Progress Bar
        progressBar.addEventListener('input', () => {
            audio.currentTime = progressBar.value;
        });

        // Speed Control
        speedControl.addEventListener('change', () => {
            audio.playbackRate = speedControl.value;
        });

        // Volume Control
        volumeControl.addEventListener('input', () => {
            audio.volume = volumeControl.value;
        });

        // Helper function to format time in MM:SS
        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secondsLeft = Math.floor(seconds % 60);
            return `${minutes}:${secondsLeft < 10 ? '0' : ''}${secondsLeft}`;
        }
    </script>

</div>
</x-layout>
