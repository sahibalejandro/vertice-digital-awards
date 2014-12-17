/**
 * Created by sahib on 12/1/14.
 */
var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var livereload = require('gulp-livereload');

/* ------------------------------------------------------------
 * Task site.concat.js
 *
 * Concatenate site scripts into public directory.
 */
gulp.task('site.concat.js', function ()
{
    return gulp.src([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'app/assets/js/site/**/*.js'
    ]).pipe(concat('site.min.js'))
        .pipe(gulp.dest('public/js'));
}); // site.concat.js

/* ------------------------------------------------------------
 * Task site.concat.css
 *
 * Concatenate site styles into public directory.
 */
gulp.task('site.concat.css', ['site.sass.compile'], function ()
{
    return gulp.src([
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'app/assets/sass/site/site.css'
    ])
        .pipe(autoprefixer())
        .pipe(concat('site.min.css'))
        .pipe(gulp.dest('public/css'));
}); // site.concat.css

/* ------------------------------------------------------------
 * Task site.sass.compile
 *
 * Compile sass files into assets directory.
 */
gulp.task('site.sass.compile', function ()
{
    return gulp.src(['app/assets/sass/site/site.scss'])
        .pipe(sass())
        .pipe(gulp.dest('app/assets/sass/site'));
}); // site.sass.compile

/* ------------------------------------------------------------
 * Task copy.bootstrap.fonts
 *
 * Copy bootstrap fonts to public directory.
 */
gulp.task('copy.bootstrap.fonts', function ()
{
    return gulp.src('bower_components/bootstrap/dist/fonts/*')
        .pipe(gulp.dest('public/fonts'));
}); // copy.bootstrap.fonts

/* ------------------------------------------------------------
 * Task uglify
 *
 * Uglify javascript in public directory.
 */
gulp.task('uglify', ['site.concat.js'], function ()
{
    return gulp.src(['public/js/site.min.js'])
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));
}); // uglify

/* ------------------------------------------------------------
 * Task minify-css
 *
 * Minify CSS in public directory.
 */
gulp.task('minify-css', ['site.concat.css'], function ()
{
    return gulp.src(['public/css/site.min.css'])
        .pipe(minifyCss({keepSpecialComments: 0}))
        .pipe(gulp.dest('public/css'));
}); // minify-css

/* ------------------------------------------------------------
 * Task live
 *
 * Watch files and livereload.
 */
gulp.task('live', function ()
{
    livereload.listen();

    gulp.watch('app/assets/js/site/**/*', ['site.concat.js']);
    gulp.watch('app/assets/sass/site/**/*', ['site.concat.css']);

    gulp.watch([
        'app/**/*.php',
        'public/css/**/*',
        'public/js/**/*'
    ]).on('change', livereload.changed);

}); // live

/* ------------------------------------------------------------
 * Task copy.all
 *
 * Run all copy tasks.
 */
gulp.task('copy.all', ['copy.bootstrap.fonts']);

/* ------------------------------------------------------------
 * Task default
 *
 * Run tasks for live development.
 */
gulp.task('default', [
    'copy.all',
    'site.concat.js',
    'site.concat.css',
    'live'
]);

/* ------------------------------------------------------------
 * Task prod
 *
 * Run tasks to compile all for production.
 */
gulp.task('prod', ['copy.all', 'uglify', 'minify-css']);
