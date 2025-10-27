import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

import { viteStaticCopy } from 'vite-plugin-static-copy';

import { normalizePath } from 'vite';
import path from 'node:path';

export default defineConfig({
    server: {
        host: 'starter.test',
        https: false,
        hmr: {
            host: 'starter.test',
        },
        watch: {
            usePolling: true,
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/theme-styles.scss',
            ],
            refresh: true,
        }),
    ],

    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler'
            }
        }
    }
});
