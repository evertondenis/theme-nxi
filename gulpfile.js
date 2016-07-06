/* gulp packages */
var gulp 		= require('gulp');
var	gutil 		= require('gulp-util');
var	clean 		= require('gulp-clean');
var	sass 		= require('gulp-sass');
var watch 		= require('gulp-watch');
var	htmlmin 	= require('gulp-htmlmin');
var	runSequence = require('run-sequence');


/* task */
gulp.task('clean', function() {
	return gulp.src('css/')
		.pipe(clean());
});

gulp.task('build-css', function() {
	return gulp.src('scss/nextidea.scss')
		.pipe(sass({outputStyle: 'expanded'}).on('erros', sass.logError))
		.pipe(gulp.dest('assets/css'));
});

// gulp.task('htmlmin', function() {
// 	return gulp.src('src/*.html')
// 		.pipe(htmlmin({collapseWhitespace: true}))
// 		.pipe(gulp.dest('dist/'))
// });

gulp.task('watch', function() {
	gulp.watch('scss/**/*.scss', ['build-css']);
	// gulp.watch('src/*.html', ['htmlmin']);
});

gulp.task('default', function(cb) {
	return runSequence('clean', ['watch', 'build-css'], cb)
});