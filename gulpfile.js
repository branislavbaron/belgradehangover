var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var rename = require("gulp-rename");
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync').create();
var php = require('gulp-connect-php');



// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("wp-content/themes/belgradehangover/scss/style.scss")
        .pipe(sass())
        .pipe(gulp.dest("wp-content/themes/belgradehangover"))
        .pipe(browserSync.stream());
});

// Minify compiled CSS
gulp.task('minify-css', ['sass'], function() {
    return gulp.src('wp-content/themes/belgradehangover/style.css')
        .pipe(cleanCSS({debug: true}, function(details) {
            console.log(details.name + ': ' + details.stats.originalSize);
            console.log(details.name + ': ' + details.stats.minifiedSize);
        }))
        .pipe(gulp.dest('wp-content/themes/belgradehangover'))
        .pipe(browserSync.reload({
            stream: true
        }));
});


// Minify JS
gulp.task('minify-js', function() {
    return gulp.src('wp-content/themes/belgradehangover/js/main.js')
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('wp-content/themes/belgradehangover/js'))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('php', function() {
    php.server({ base: '/wp-content/themes/belgradehangover', port: 8010, keepalive: true,});
});

gulp.task('browser-sync',['php'], function() {
    browserSync.init({
        proxy: 'localhost/belgradehangover',
        port: 8080,
        open: true,
        notify: false
    });
});

gulp.task('serve', ['sass', 'minify-css', 'minify-js', 'browser-sync'], function() {


    gulp.watch('wp-content/themes/belgradehangover/scss/**/*.scss', ['sass']);
    gulp.watch('wp-content/themes/belgradehangover/style.css', ['minify-css']);
    gulp.watch('wp-content/themes/belgradehangover/js/*.js', ['minify-js']);
    gulp.watch('wp-content/themes/belgradehangover/js/*.js').on('change', browserSync.reload);
    gulp.watch('wp-content/themes/belgradehangover/**/*.php').on('change', function () {
      browserSync.reload();
    });
});

gulp.task('default', ['serve']);

