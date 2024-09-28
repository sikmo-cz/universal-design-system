import gulp from 'gulp';
const { src, dest, watch, series, parallel } = gulp;
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);
import autoprefixer from 'gulp-autoprefixer';
import cssnano from 'gulp-cssnano';
import babel from 'gulp-babel';
import uglify from 'gulp-uglify';
import sourcemaps from 'gulp-sourcemaps';
import * as browserSync from 'browser-sync';
import { deleteAsync } from 'del';
import path from 'path';

// File paths
const srcDir = './';
const distDir = '../dist';
const files = {
    scssPath: path.join(srcDir, 'sass/**/*.scss'),
    jsPath: path.join(srcDir, 'js/**/*.js')
}

// Sass task
function scssTask() {
    return src(files.scssPath)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cssnano())
        .pipe(sourcemaps.write('.'))
        .pipe(dest(path.join(distDir, 'css')))
        .pipe(browserSync.stream());
}

// JS task
function jsTask() {
    return src(files.jsPath)
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(dest(path.join(distDir, 'js')))
        .pipe(browserSync.stream());
}

// Clean task
async function clean() {
    await deleteAsync([distDir], { force: true });
}

// Watch task
function watchTask() {
    browserSync.init({
        server: {
            baseDir: distDir
        }
    });
    watch(
        [files.scssPath, files.jsPath],
        series(parallel(scssTask, jsTask))
    ).on('change', browserSync.reload);
}

// Default task
export default series(
    clean,
    parallel(scssTask, jsTask),
    watchTask
);