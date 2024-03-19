import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/assets/css/style.bundle.css",
                "resources/css/app.scss",
                "resources/js/app.js",
                "resources/assets/plugins/global/plugins.bundle.css",
            ],
            refresh: true,
        }),
    ]
});

