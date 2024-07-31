import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        {
            name: 'copy-swagger-theme',
            buildStart() {
                const themePath = path.resolve(__dirname, 'node_modules/swagger-ui-themes/themes/3.x/theme-newspaper.css');
                const destDir = path.resolve(__dirname, 'public/vendor/swagger-ui');
                const destPath = path.join(destDir, 'theme-newspaper.css');

                console.log(`Copying theme from ${themePath} to ${destPath}`);

                if (!fs.existsSync(destDir)) {
                    fs.mkdirSync(destDir, { recursive: true });
                }

                if (fs.existsSync(themePath)) {
                    fs.copyFileSync(themePath, destPath);
                } else {
                    this.error(`File not found: ${themePath}`);
                }
            }
        }
    ],
});
