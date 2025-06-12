// gulpfile.mjs
import gulp from 'gulp';
import dartSass from 'gulp-dart-sass';
import cleanCSS from 'gulp-clean-css';
import autoprefixer from 'gulp-autoprefixer';
import browserSyncLib from 'browser-sync';

const browserSync = browserSyncLib.create();

function style() {
  return gulp.src('./scss/**/*.scss')
    .pipe(dartSass().on('error', dartSass.logError))
    .pipe(autoprefixer({
      overrideBrowserslist: ['last 2 versions'],
      cascade: false
    }))
    .pipe(gulp.dest('./css'))
    .pipe(browserSync.stream());
}

function minify() {
  return gulp.src('./css/main.css')
    .pipe(cleanCSS({ level: { 1: { specialComments: false } } }))
    .pipe(gulp.dest('./css/dist'));
}

function serve() {
  browserSync.init({
    proxy: "http://fictional-university.local", 
    notify: false
  });

  gulp.watch('./scss/**/*.scss', gulp.series(style, minify));
  gulp.watch('./**/*.php').on('change', browserSync.reload);
}

export default gulp.series(style, minify, serve);