/*import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});*/

import { defineConfig } from 'vite';
import laravel from 'vite-plugin-laravel';

export default defineConfig({
  plugins: [
    laravel(),
  ],
  server: {
    host: '127.0.0.1', // Confirme que o host está configurado corretamente
    port: 5173, // Porta padrão do Vite
  },
});



