// Require Plugins
// ---------------------------------------------------------------------------
var gulp = require('gulp'),
	babel = require("gulp-babel"),
	bulkSass = require('gulp-sass-bulk-import'),
	cleanCSS = require('gulp-clean-css'),
	imagemin = require('gulp-imagemin'),
	mozjpeg = require('imagemin-mozjpeg'),
	newer = require('gulp-newer'),
	pngquant = require('imagemin-pngquant'),
	rename = require('gulp-rename'),
	sass = require('gulp-sass'),
	uglify = require('gulp-uglify'),
	watch = require("gulp-watch"),
	changed = require("gulp-changed"),
	webpackStream = require("webpack-stream"),
	webpack = require("webpack"),
	webpackConfig = require("./webpack.config");


// Common Settings
// ---------------------------------------------------------------------------
var srcDir = 'src/',
	distDir = 'public/dist/',
	cssDir = distDir + 'css/',
	gulpRanInThisFolder = process.cwd(),
	res = gulpRanInThisFolder.split("/"),
	projectName = res[res.length - 1],
	projectUrl = projectName + ".test";

// --------------------- SCSS ---------------------------
gulp.task('runCompileScss', () => {
	return gulp.src([
		srcDir + 'scss/page/*.scss',
		srcDir + 'scss/**/*.scss'
	])
		.pipe(bulkSass())
		.pipe(sass({
			errLogToConsole: false,
			includePaths: srcDir,
		}))
		.pipe(gulp.dest(cssDir))
		.pipe(cleanCSS())
		.pipe(rename({ suffix: '.min' }))
		.pipe(changed(distDir))
		.pipe(gulp.dest(cssDir))
});
// --------------------- SCSS ---------------------------

// --------------------- PHP ---------------------------
gulp.task('runCompilePhp', () => {
	return gulp.src([
		srcDir + '*.php',
		srcDir + '**/*.php',
	])
		.pipe(changed(distDir))
		.pipe(gulp.dest(distDir));
});
// --------------------- PHP ---------------------------

// ---------------------  Images  ---------------------------
gulp.task('imageCompress', () => {
	var imageDir = distDir + 'images/';
	console.log(imageDir);
	return gulp.src([
		srcDir + 'images/**/*'
	])
		.pipe(newer(imageDir))
		.pipe(imagemin([
			pngquant({
				quality: [.7, .85],
				speed: 1,
				floyd: 0
			}),
			mozjpeg({
				quality: 85,
				progressive: true
			}),
			imagemin.svgo(),
			imagemin.optipng(),
			imagemin.gifsicle()
		]))
		.pipe(changed(distDir))
		.pipe(gulp.dest(imageDir));
});
// ---------------------  Images  ---------------------------


// ---------------------  JS  ---------------------------
gulp.task('runCompileJs', () => {
	var jsDir = distDir + 'js/';

	return gulp.src([
		srcDir + 'js/*',
		srcDir + 'js/**/*.js'
	])
		.pipe(babel({
			"presets": ["@babel/preset-env"]
		}))
		.pipe(uglify())
		.on('error', function (e) {
			console.log(e);
		})
		.pipe(rename({ suffix: '.min' }))
		.pipe(changed(distDir))
		.pipe(gulp.dest(jsDir));
});
// ---------------------  JS  ---------------------------


// ---------------------  WEBPACK  ---------------------------
gulp.task("webpack", function (done) {
	webpackStream(webpackConfig, webpack)
		.pipe(gulp.dest(distDir + '/js'));
	done();
});
// ---------------------  WEBPACK  ---------------------------


// watch
gulp.task('watch', () => {
	console.log("start watch!");
	gulp.watch(srcDir + 'scss/**/*', gulp.task('runCompileScss'));
	gulp.watch(srcDir + '**/*.php', gulp.task('runCompilePhp'));
	gulp.watch(srcDir + 'js/**/*', gulp.task('runCompileJs'));
	gulp.watch(srcDir + 'js/**/*', gulp.task('webpack'));
	gulp.watch(srcDir + 'images/**/*', gulp.task('imageCompress'));
});

// browser-sync
// gulp.task('browser-sync', () => {
// 	return browserSync.init({
// 		server: {
// 			baseDir: distDir
// 		},
// 		reloadOnRestart: true,
// 		open: 'external',
// 		host: projectUrl
// 	});
// });

// ---------------------  Run default  ---------------------------
gulp.task(
	'default',
	gulp.parallel(
		'watch',
		'webpack'
		// 'browser-sync'
	)
);
// ---------------------  Run default  ---------------------------
