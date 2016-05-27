var gulp = require('gulp'),
    gutil = require('gulp-util'),
    browserify = require('gulp-browserify'),
    compass = require('gulp-compass'),
    connect = require('gulp-connect'),
    gulpif = require('gulp-if'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    path = require('path');
//breakpoint = require('breakpoint');

var env,
    jsSources,
    sassSources,
    sassSourcesLay,
    outputDir,
    sassStyle;

jsSources = [
    'development/devjs/script.js',
    'development/devjs/map.js'
];

sassSources = ['sass/style.scss'];
sassSourcesLay = ['sass/sidebar-content.scss'];


// JS Task
gulp.task('js', function(){
    gulp.src(jsSources)
        .pipe(concat('script.js'))
        //.pipe(browserify())
        .on('error', gutil.log)
        .pipe(uglify())
        .pipe(gulp.dest('js'))
        .pipe(connect.reload())
});


// SASS DEV Task
gulp.task('sassdev', function(){
    gulp.src(sassSources)
        .pipe(compass({
            sass: 'sass',
            css: 'prodcss',
            image: 'images',
            style: 'compressed',
            comments: true,
            require: ['susy', 'breakpoint']
        }) //pipe(compass)
            .on('error', gutil.log))
        .pipe(gulp.dest('prodcss'))
        .pipe(connect.reload())
}); //gulp.task('sassdev')

// SASS PROD Task
gulp.task('sassprod', function(){
    gulp.src(sassSources)
        .pipe(compass({
            sass: 'sass',
            css: '',
            image: 'images',
            style: 'expanded',
            comments: true,
            require: ['susy', 'breakpoint']
        }) //pipe(compass)
            .on('error', gutil.log))
        .pipe(gulp.dest(''))
        .pipe(connect.reload())
}); //gulp.task('sassprod')

// SASS LAYOUT SIDEBAR Task
gulp.task('sasslayout', function(){
    gulp.src(sassSourcesLay)
        .pipe(compass({
            sass: 'sass',
            css: 'layouts/',
            image: 'images',
            style: 'compressed',
            comments: true,
            require: ['susy', 'breakpoint']
        }) //pipe(compass)
            .on('error', gutil.log))
        .pipe(gulp.dest('layouts/'))
        .pipe(connect.reload())
}); //gulp.task('sassprod')


// WATCH Task
gulp.task('watch', function(){
    gulp.watch(jsSources, ['js']);
    gulp.watch(['sass/**/*.scss', 'sass/*.scss'], ['sassdev']);
    gulp.watch(['sass/**/*.scss', 'sass/*.scss'], ['sassprod']);
    gulp.watch(['sass/layout/_sidebar-content.scss'], ['sasslayout']);

}); //WATCH

// DEFAULT
gulp.task('default', ['js', 'sassprod', 'sassdev', 'sasslayout', 'watch']);




