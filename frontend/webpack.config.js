const path = require('path');
const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('../backend/public/build/')
    .setPublicPath('/build')
    .addEntry('app', path.resolve(__dirname, 'assets/app.js'))
    .enableStimulusBridge(path.resolve(__dirname, 'assets/controllers/index.json'))
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction());

    const config = Encore.getWebpackConfig();

    config.watchOptions = {
        poll: 1000,
        ignored: /node_modules/
    };
    
module.exports = Encore.getWebpackConfig();