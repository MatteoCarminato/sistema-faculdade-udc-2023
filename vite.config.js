import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'public/assets/plugins/bootstrap/css/bootstrap.min.css',
                'public/assets/css/style.css',
                'public/assets/css/plugins.css'
            ],
            refresh: true,
        }),
    ],
});
