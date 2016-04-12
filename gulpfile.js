// =======================================
// modules
// =======================================
var gulp           = require('gulp'),
    plumber        = require('gulp-plumber'),
    browserSync    = require('browser-sync'),
    reload         = browserSync.reload,
    autoprefixer   = require('gulp-autoprefixer'),
    sourcemaps     = require('gulp-sourcemaps'),
    sass           = require('gulp-sass'),
    connect        = require('gulp-connect-php');

//=================================================

/*================================
=            php task            =
================================*/




gulp.task('php-connect-sync', function() {
  connect.server({}, function (){
   browserSync.init({
        proxy: "127.0.0.1:8888",
        host:'localhost'
    });
  });

  gulp.watch('**/*.php').on('change', function () {
    browserSync.reload();
  });
});

/*========================================
=            SASS STYLES TASK            =
========================================*/





gulp.task('styles', function(){
  gulp.src('src/**/*.scss')
      .pipe(plumber())
      .pipe(sourcemaps.init())
      .pipe(sass({
        outputStyle: 'expanded'
      }))
      .pipe(autoprefixer('last 2 versions'))
      .pipe(sourcemaps.write())
      .pipe(gulp.dest('dist/style'))
      .pipe(reload({stream: true}));

});

gulp.task('watch', function(){
  // gulp.watch('js/**/*.js', ['scripts']);
  gulp.watch('src/**/*.scss', ['styles']);
  //  gulp.watch('**/*.php').on('change', function () {
  //   browserSync.reload();
  // });
});



gulp.task('default', ['styles', 'php-connect-sync', 'watch']);