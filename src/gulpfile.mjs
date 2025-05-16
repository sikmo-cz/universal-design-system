import gulp from 'gulp';
import sourcemaps from 'gulp-sourcemaps';
import livereload from 'gulp-livereload';
import gulpSass from 'gulp-sass';
import * as sass from 'sass';
import * as glob from 'glob';
import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import path from 'path';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename'; // Přidání gulp-rename
import { fileURLToPath } from 'url';
import { dirname } from 'path';
import fs from 'fs';



// Vypočítání __dirname pro ES6 moduly
const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

// console.log( "=========================================");
// console.log( "=========================================");
// console.log( "=========================================");
const variablesPath = './sass/variables.scss'; // Opravená cesta

// //const variablesPath = './src/sass/variables.scss'; // Cesta k souboru s proměnnými
// console.log('Current working directory:', process.cwd());
// console.log( "=========================================");
// console.log( "=========================================");
// console.log( "=========================================");


// Assign Dart Sass as the compiler
const sassCompiler = gulpSass(sass);

function componentsSCSS() {
    const scssFiles = glob.sync('../components/**/**/scss/style.scss'); // Find specific SCSS files

    // console.log('Found SCSS files:', scssFiles); // Log found SCSS files
    // console.log('Variables path:', variablesPath); // Debugging line

    if (scssFiles.length === 0) {
        console.error('No SCSS files found. Please check your glob pattern.');
        return Promise.resolve(); // Return a resolved promise to avoid breaking the Gulp pipeline
    }

    const variablesContent = fs.readFileSync(variablesPath, 'utf8');
    console.log( variablesContent)
    
    return gulp.src(scssFiles)
        .pipe(sourcemaps.init())
        .pipe(sassCompiler({
            importer: (url) => {
                if (url === 'variables') { // Ověř, zda se jedná o import proměnných
                    console.log('Using variables file content');
                    return {
                        contents: variablesContent // Přidá obsah proměnných
                    };
                }
            }
        }).on('error', sassCompiler.logError))
        .pipe(postcss([
            autoprefixer(),
            cssnano()
        ]))
        .pipe(gulp.dest(file => {
            const componentDir = path.dirname(file.path);
            return path.join(componentDir, '../dist');
        }))
        .pipe(livereload());
}


function globalSCSS() {
    return gulp.src(['./sass/style.scss'])
        .pipe(sourcemaps.init())
        .pipe(sassCompiler({
            outputStyle: 'expanded'
        }))
        .pipe(postcss([
            autoprefixer(),
            cssnano()
        ]))
        .pipe(sourcemaps.write('../dist/maps'))
        .pipe(gulp.dest('../dist/'))
        .pipe(livereload());
}



// Minify and bundle global JavaScript file
function globalJS() {
    return gulp.src('./js/script.js')
        .pipe(sourcemaps.init())
        .pipe(webpack({
            mode: 'production',
            devtool: 'source-map',
            output: {
                filename: 'theme.js',
                sourceMapFilename: '../maps/theme.js.map'
            },
            module: {
                rules: [{
                    test: /\.js$/,
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env']
                        }
                    }
                }]
            },
            stats: 'errors-only'
        }))
        .pipe(gulp.dest('../dist/')) // Save JS directly in the dist folder
        .pipe(livereload());
}

// JS task for each folder with a /js/ directory
function componentsJS() {
    const jsFiles = glob.sync('../components/**/js/*.js', {
        ignore: ['**/*.min.js'] // Exclude .min.js files
    });

    console.log('Found JS files:', jsFiles); // Log found JS files

    if (jsFiles.length === 0) {
        console.error('No JS files found. Please check your glob pattern.');
        return Promise.resolve(); // Return a resolved promise to avoid breaking the Gulp pipeline
    }

    return gulp.src(jsFiles)
        .pipe(sourcemaps.init())
        .pipe(uglify()) // Minify JS
        .pipe(rename((path) => {
            // Only rename if the file doesn't already have .min
            if (!path.basename.endsWith('.min')) {
                path.basename += '.min'; // Přidání suffixu .min
            }
        }))
        .pipe(sourcemaps.write('.')) // Write map in the same folder
        .pipe(gulp.dest((file) => {
            // Save generated JS in the dist folder of the component
            return path.join(path.dirname(file.path), '../dist'); // Change the output to the component's dist folder
        }))
        .pipe(livereload());
}

// Watcher function to monitor file changes
function watchFiles() {
    livereload.listen({ port: 1122 });  // Start livereload server on port 1122

    gulp.watch('./sass/**/*.scss', globalSCSS);
    gulp.watch('../components/**/**/scss/style.scss', componentsSCSS); // Sledování SCSS v komponentách
    gulp.watch('./js/**/*.js', globalJS);
    gulp.watch('../components/**/js/**/*.js', componentsJS); // Sledování JS v komponentách
}

// Export the default task with the watcher
export default gulp.series(globalSCSS, componentsSCSS, globalJS, componentsJS, watchFiles);