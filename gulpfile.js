const gulp = require('gulp');
const sass = require('gulp-sass');
const minify = require('gulp-image');

gulp.task('js', () =>{
  return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/popper.js/dist/umd/popper.min.js', 'src/js/*.js'])
    .pipe(gulp.dest('public/js'));
});

gulp.task('sass', () => {
  return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'])
    .pipe(sass())
    .pipe(gulp.dest('public/css'));
});

gulp.task('php', () =>{
  return gulp.src(['src/*.php'])
    .pipe(gulp.dest('public'));
});

gulp.task('includes', () =>{
  return gulp.src(['src/includes/*.php'])
    .pipe(gulp.dest('public/includes'));
});

gulp.task('image', () =>{
  return gulp.src(['src/assets/*.png', 'src/assets/*.jpg', 'src/assets/*.svg'])
    .pipe(minify())
    .pipe(gulp.dest('public'));
});

gulp.task('serve', ['sass'], () => {
  gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'], ['sass']);
  gulp.watch(['src/js/*.js'], ['js']);
  gulp.watch(['src/js/*'], ['image']);
  gulp.watch(['src/*.php'], ['php']);
  gulp.watch(['src/includes/*.php'], ['includes']);
});

gulp.task('default', ['sass', 'js', 'php', 'includes','image', 'serve']);