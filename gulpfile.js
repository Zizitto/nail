var gulp = require('gulp'),
    concatJs = require('gulp-concat'),
    minifyJs = require('gulp-uglify'),
    less = require('gulp-less'),
    clean = require('gulp-clean'),
    stripJS = require('gulp-strip-comments'),
    stripCSS = require('gulp-strip-css-comments'),
    minifyCSS = require('gulp-clean-css');


gulp.task('base-less', function() {
    return gulp.src([
        'web-src/less/base.less'
    ])
        .pipe(less({compress: true}))
        .pipe(minifyCSS())
        .pipe(stripCSS({preserve:false}))
        .pipe(gulp.dest('web/css/'));
});

gulp.task('less', function() {
    return gulp.src(['web-src/less/*/**/*.less'])
        .pipe(less({compress: true}))
        .pipe(minifyCSS())
        .pipe(stripCSS({preserve:false}))
        .pipe(gulp.dest('web/css/'));
});

gulp.task('base-js', function() {
    return gulp.src([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'web-src/js/base.js'
    ])
        .pipe(concatJs('base.js'))
        .pipe(minifyJs())
        //.pipe(stripJS())
        .pipe(gulp.dest('web/js/'));
});

gulp.task('js', function() {
    return gulp.src([
        'web-src/js/*/**/*.js'
    ])
        .pipe(minifyJs())
        //.pipe(stripJS())
        .pipe(gulp.dest('web/js/'));
});

gulp.task('fonts', function () {
    return gulp.src([
        'bower_components/bootstrap/fonts/*',
        'bower_components/components-font-awesome/fonts/*',
        'web-src/fonts/*'
    ])
        .pipe(gulp.dest('web/css/fonts/')).pipe(gulp.dest('web/fonts/'))
});

gulp.task('clean', function () {
    return gulp.src(['web/css/*', 'web/js/*', 'web/fonts/*'])
        .pipe(clean());
});

gulp.task('default', ['clean'], function () {
    var tasks = ['less', 'love-js', 'pages-js', 'fonts' ];

    tasks.forEach(function (val) {
        gulp.start(val);
    });
});

gulp.task('watch', function () {
    var less = gulp.watch('web-src/less/*.less', ['less']),
        css = gulp.watch('web-src/css/*.css', ['less']),
        js = gulp.watch('web-src/js/**/*.js', ['pages-js']);
});
