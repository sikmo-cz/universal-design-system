import gulp from 'gulp';
import chalk from 'chalk';
import webpack from 'webpack-stream';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import sourcemaps from 'gulp-sourcemaps';
import livereload from 'gulp-livereload';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';
import path from 'path';
import * as glob from 'glob';
import postcss from 'gulp-postcss';
import concat from 'gulp-concat';
import gulpSass from 'gulp-sass';
import * as sass from 'sass';
import plumber from 'gulp-plumber';  // Add plumber

// Assign Dart Sass as the compiler
const sassCompiler = gulpSass(sass);

function notify( message ) {
    console.log( chalk.blue( message ) );
}

// Let's create single style.css file
function globalSCSS() {
    return gulp.src(['./sass/style.scss'])
        .pipe(sourcemaps.init())
        .pipe(sassCompiler({  // Use sassCompiler here, not sass()
            outputStyle: 'expanded'
        }))
        .pipe(postcss([
            autoprefixer(),
            cssnano()
        ]))
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write('../dist/maps'))
        .pipe(gulp.dest('../dist/'))
        .pipe(livereload())
}

// SCSS task for each folder with a /css/ directory
function componentsSCSS() {
    const scssFiles = glob.sync( '../components/**/css/*.scss' ); // Find all SCSS files in /css/ folders
    return gulp.src( scssFiles )
        .pipe( sourcemaps.init() )
        .pipe( sass( {
            outputStyle: 'expanded'
        } ).on( 'error', sassCompiler.logError ) )
        .pipe( postcss( [
            autoprefixer(),
            cssnano()
        ] ) )
        .pipe( sourcemaps.write( '.' ) ) // Write map in the same folder
        .pipe( gulp.dest( function( file ) {
            return path.dirname( file.path ); // Output to the same folder
        } ) )
        .pipe( livereload() )
}

// Minify theme.js file
function globalJS() {
    return gulp.src( './js/script.js' )
        .pipe( webpack( {
            mode: 'production',
            devtool: 'source-map',
            output: {
                filename: 'theme.js',
                sourceMapFilename: '../maps/theme.js.map'
            },
            module: {
                rules: [ {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            "presets": [
                                '@babel/preset-env'
                            ],
                            "plugins": [
                                "@babel/plugin-proposal-class-properties"
                            ]
                        }
                    }
                } ]
            },
            stats: 'errors-only'
        } ) )
        .pipe( gulp.dest( '../dist/js/' ) )
        .pipe( livereload() )
};


// JS task for each folder with a /js/ directory
function componentsJS() {
    const jsFiles = glob.sync( '../components/**/js/*.js', {
        ignore: [ '**/*.min.js' ] // Exclude .min.js files
    });

    return gulp.src( jsFiles )
        .pipe( sourcemaps.init() )
        .pipe( uglify() ) // Minify JS
        // .pipe( rename( { suffix: '-min' } ) ) // Add -min suffix
        .pipe( sourcemaps.write( '.' ) ) // Write map in the same folder
        .pipe( gulp.dest( function( file ) {
            return path.dirname( file.path ); // Output to the same folder
        } ) )
        .pipe( livereload() )
}

// Minify theme.js file
function updateBrowser() {
    return gulp.src( './' )
        .pipe( livereload() )
};

// Watcher function to monitor file changes
function watchFiles() {
    livereload.listen({ port: 1122 });  // Start livereload server on port 1122

    gulp.watch( 'src/sass/**/*.scss', globalSCSS );
    gulp.watch( 'src/js/**/*.js', globalJS );
    gulp.watch( 'components/**/css/**/*.scss', componentsSCSS );
    gulp.watch( 'components/**/js/**/*.js', componentsJS );
	 // gulp.watch( [ './**/*.php' ], gulp.series( updateBrowser ) );
}


// Export the default task with the watcher
export default gulp.series( globalSCSS, globalJS, componentsSCSS, componentsJS, watchFiles );