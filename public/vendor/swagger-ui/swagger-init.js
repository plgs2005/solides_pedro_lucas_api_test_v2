// public/vendor/swagger-ui/swagger-init.js

window.onload = function () {
    const ui = SwaggerUIBundle({
        url: "/path/to/your/api-docs.json",
        dom_id: '#swagger-ui',
        deepLinking: true,
        presets: [
            SwaggerUIBundle.presets.apis,
            SwaggerUIStandalonePreset
        ],
        plugins: [
            SwaggerUIBundle.plugins.DownloadUrl
        ],
        layout: "StandaloneLayout"
    });

    window.ui = ui;
};
