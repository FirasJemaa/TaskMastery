import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css','resources/js/app.js',
              'resources/css/accueil.css',
               'resources/css/identification.css',
                'resources/js/dashboard.js',
                'resources/js/test.js',
                'resources/js.tache.js',
                'resources/js.tache.css'
            ],
            refresh: true,
        }),
    ],
});
