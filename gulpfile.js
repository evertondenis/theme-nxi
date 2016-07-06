var gulp 		= require('gulp');
var	clean 		= require('gulp-clean');
var	sass 		= require('gulp-sass');
var sourcemaps	= require('gulp-sourcemaps');
var watch 		= require('gulp-watch');
var	runSequence = require('run-sequence');

gulp.task('clean', function() {
	return gulp.src('css/')
		.pipe(clean());
});

gulp.task('sass', function() {
	return gulp.src('scss/nextidea.scss')
		.pipe(sourcemaps.init())
	    .pipe(sass().on('error', sass.logError))
	    .pipe(sass({outputStyle: 'extended'}))
	    .pipe(sourcemaps.write())
	    .pipe(gulp.dest('assets/css'));
});

gulp.task('watch', function() {
	gulp.watch('scss/**/*.scss', ['sass']);
});

gulp.task('default', function(cb) {
	return runSequence('clean', ['watch', 'sass'], cb)
});