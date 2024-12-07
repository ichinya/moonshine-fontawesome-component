import {defineConfig} from 'vite';
export default defineConfig({
    base: '/vendor/moonshine-fontawesome/',
    build: {
        emptyOutDir: false,
        manifest: true,
        rollupOptions: {

            input: ['resources/js/app.js', 'resources/css/all.min.css'],
            output: {
                entryFileNames: `js/moonshine-fontawesome.js`,
                assetFileNames: file => {
                    let ext = file.name.split('.').pop()
                    if (file.name === 'all.min.css') {
                        return 'css/all.min.css'
                    }
                    if (ext === 'css') {
                        return 'css/moonshine-fontawesome.css'
                    }

                    if (ext === 'woff2' || ext === 'woff' || ext === 'ttf') {
                        return 'webfonts/[name].[ext]'
                    }

                    return 'assets/[name].[ext]'
                }
            }
        },
        outDir: 'public',
        publicDir: '/vendor/moonshine-fontawesome/',
        assetsDir: 'assets',

    },
});
