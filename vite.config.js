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
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
        viteStaticCopy({
            targets: [
              {
                src: normalizePath(path.resolve(__dirname, 'vendor', 'tinymce', 'tinymce')),
                dest: normalizePath(path.resolve(__dirname, 'public'))
              },
            ]
          }),
    ],
});
