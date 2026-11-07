import "./bootstrap";

import Alpine from "alpinejs";
import { Howl, Howler } from "howler";

window.Alpine = Alpine;
window.Howl = Howl;
window.Howler = Howler;

// Audio Player Component
Alpine.data("audioPlayer", (src) => ({
    sound: null,
    playing: false,
    loading: true,
    current: 0,
    duration: 0,
    rate: 1,
    error: null,
    timer: null,

    init() {
        console.log("Audio URL:", src);

        if (!src) {
            this.error = "URL audio tidak ditemukan";
            this.loading = false;
            return;
        }

        this.sound = new Howl({
            src: [src],
            html5: true,
            preload: true,

            onload: () => {
                this.duration = this.sound.duration();
                this.loading = false;
                console.log("Audio berhasil dimuat");
            },

            onloaderror: (id, error) => {
                this.error = "Gagal memuat audio";
                this.loading = false;
                console.error("Howler Load Error:", error);
            },

            onplay: () => {
                this.playing = true;
            },

            onpause: () => {
                this.playing = false;
            },

            onend: () => {
                this.playing = false;
                this.current = 0;
            },

            onplayerror: (id, error) => {
                console.error("Howler Play Error:", error);
            },
        });

        this.timer = setInterval(() => {
            if (this.sound && this.playing) {
                this.current = this.sound.seek() || 0;
            }
        }, 500);
    },

    toggle() {
        if (!this.sound || this.loading) return;

        if (this.sound.playing()) {
            this.sound.pause();
        } else {
            this.sound.play();
        }
    },

    skip(seconds) {
        if (!this.sound) return;

        const position = this.sound.seek() || 0;
        const nextPosition = Math.max(
            0,
            Math.min(position + seconds, this.duration),
        );

        this.sound.seek(nextPosition);
        this.current = nextPosition;
    },

    seek(value) {
        if (!this.sound) return;

        const position = Math.max(0, Math.min(Number(value), this.duration));

        this.sound.seek(position);
        this.current = position;
    },

    changeRate(value) {
        if (!this.sound) return;

        this.rate = Number(value);
        this.sound.rate(this.rate);
    },

    formatTime(seconds) {
        seconds = Math.floor(seconds || 0);

        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;

        return (
            String(minutes).padStart(2, "0") +
            ":" +
            String(remainingSeconds).padStart(2, "0")
        );
    },

    destroy() {
        if (this.timer) {
            clearInterval(this.timer);
        }

        if (this.sound) {
            this.sound.unload();
            this.sound = null;
        }
    },
}));

Alpine.start();
