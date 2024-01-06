import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/accueil.css',
                'resources/css/identification.css',
                'resources/css/attribution.css',
                'resources/js/app.js',
                'resources/js/dashboard.js',
                'resources/js/test.js',
                'resources/js.tache.js',
                'resources/js.tache.css',
                'resources/js/attribution.js'
            ],
            refresh: true,
        }),
    ],
});
