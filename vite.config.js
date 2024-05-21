import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/materialize.css', 'resources/js/materialize.js'],
            refresh: true,
        }),
    ],
});
