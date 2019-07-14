"use strict";

var gulp = require("gulp");
var del = require("del");
var rename = require("gulp-rename");
var plumber = require("gulp-plumber");
var run = require("run-sequence");
var server = require("browser-sync").create();
var php = require("gulp-connect-php");
var wait = require("gulp-wait");
var gutil = require("gulp-util");
var pump = require("pump");

var posthtml = require("gulp-posthtml");
var include = require("posthtml-include");
// const bem = require('posthtml-bem');

var sass = require("gulp-sass");
var postcss = require("gulp-postcss");
var autoprefixer = require("autoprefixer");
var minify = require("gulp-csso");

// var webp = require("gulp-webp");
var imagemin = require("gulp-imagemin");
var svgstore = require("gulp-svgstore");

var uglify = require("gulp-uglify");
var concat = require("gulp-concat");
const babel = require("gulp-babel");

// Config
const config = require("./config.json");
const srcPath = config.dev;
const publicPath = config.build;
const fonts = config.fonts;
const syntax = config.syntax;
var dev = false;

const babelPlugins = {
	plugins: [
		"@babel/plugin-transform-template-literals",
		"transform-es2015-arrow-functions",
		"transform-es2015-block-scoped-functions",
		"transform-es2015-block-scoping",
		"transform-es2015-shorthand-properties"
	]
};



// Server
gulp.task("serve", function() {
	server.init({
		proxy: config.proxy.status
			? { target: config.proxy.target, ws: true }
			: false,
		server: config.proxy.status ? false : publicPath,
		notify: false,
		open: true,
		cors: true,
		ui: false
	});

	// gulp.watch(srcPath + "/**/*", function(event) {
	// 	console.log(event);
	// 	if (event.type === "added" || event.type === "renamed") {
	// 		gulp.start("dev");
	// 	}
	// });

	gulp.watch(srcPath + "/img/*.{png,jpg,svg,mp4}", ["images"]);
	gulp.watch(srcPath + "/img/**/*.{png,jpg,svg,mp4}", ["images"]);
	gulp.watch(srcPath + "/scss/**/**/*.{scss,sass,css}", ["style"]);
	gulp.watch(srcPath + "/scss/**/*.{scss,sass,css}", ["style"]);
	gulp.watch(srcPath + "/scss/*.{scss,sass,css}", ["style"]);
	gulp.watch(srcPath + "/js/plugins/*.js", ["js-plugins"]);
	gulp.watch(srcPath + "/js/libs/*.js", ["js-libs"]);
	gulp.watch(srcPath + "/js/components/*.js", ["js-components"]);
	gulp.watch(srcPath + "/js/separate/*.js", ["js-copy"]);
	gulp.watch(srcPath + "/php/**/*.php", ["php"]);
	gulp.watch(srcPath + "/php/*.php", ["php"]);
});

// Styles
gulp.task("style", function() {
	return gulp
		.src(srcPath + "/scss/style.scss")
		.pipe(wait(1500))
		.pipe(plumber())
		.pipe(sass())
		.pipe(postcss([autoprefixer()]))
		.pipe(gulp.dest(publicPath))
		.pipe(minify())
		.pipe(rename("/style.min.css"))
		.pipe(gulp.dest(publicPath))
		.pipe(server.stream());
});

// Images
gulp.task("images", function() {
	return gulp
		.src([
			publicPath + "/img/*.{png,jpg,svg,mp4}",
			publicPath + "/img/temp/*.{png,jpg,svg}"
		])
		.pipe(
			imagemin([
				imagemin.optipng({ optimizationLevel: 3 }),
				imagemin.jpegtran({ progressive: true }),
				imagemin.svgo()
			])
		)
		.pipe(gulp.dest(publicPath + "/img"));
});

gulp.task("sprite-svg", function() {
	return gulp
		.src(srcPath + "/img/svg/*.svg")
		.pipe(
			svgstore({
				inlineSvg: true
			})
		)
		.pipe(rename("sprite.svg"))
		.pipe(gulp.dest(publicPath + "/img"));
});

// gulp.task("webp", function() {
// 	return gulp
// 		.src([srcPath + "/img/**/*.{png,jpg}"])
// 		.pipe(webp({ quality: 80 }))
// 		.pipe(gulp.dest(publicPath + "/img"));
// });

gulp.task("js-copy", function() {
	return gulp
		.src(srcPath + "/js/separate/*.js")
		.pipe(plumber())
		.pipe(babel(babelPlugins))
		.pipe(gulp.dest(publicPath + "/js"))
		.pipe(server.stream());
});

gulp.task("js-libs", function() {
	return gulp
		.src(srcPath + "/js/libs/*.js")
		.pipe(plumber())
		.pipe(concat("libs.js"))
		.pipe(babel(babelPlugins))
		.pipe(gulp.dest(publicPath + "/js"))
		.pipe(uglify())
		.pipe(rename("libs.min.js"))
		.pipe(gulp.dest(publicPath + "/js"))
		.pipe(server.stream());
});

gulp.task("js-plugins", function() {
	return gulp
		.src(srcPath + "/js/plugins/*.js")
		.pipe(plumber())
		.pipe(concat("plugins.js"))
		.pipe(babel(babelPlugins))
		.pipe(gulp.dest(publicPath + "/js"))
		.pipe(uglify())
		.pipe(rename("plugins.min.js"))
		.pipe(gulp.dest(publicPath + "/js"))
		.pipe(server.stream());
});

gulp.task("js-components", function() {
	return gulp
		.src(srcPath + "/js/components/*.js")
		.pipe(plumber())
		.pipe(babel(babelPlugins))
		.pipe(concat("main.js"))
		.pipe(gulp.dest(publicPath + "/js"))
		.pipe(uglify())
		.pipe(rename("main.min.js"))
		.pipe(gulp.dest(publicPath + "/js"))
		.pipe(server.stream());
});

gulp.task("js", function(done) {
	run("js-copy", "js-libs", "js-plugins", "js-components", done);
	server.stream();
});

gulp.task("html", function() {
  return gulp.src(srcPath + "/*.{html,php}")
    // .pipe(posthtml([
    //   include()
    // ]))
    .pipe(gulp.dest(publicPath));
});

gulp.task("php", function() {
	return gulp
		.src(srcPath + "/php/**/*")
		.pipe(plumber())
		.pipe(gulp.dest(publicPath))
		.pipe(server.stream());
});

gulp.task("copy", function() {
	gulp
		.src(["src/fonts/**/*", "src/img/**"], { base: "src" })
		.pipe(gulp.dest(publicPath));
});

gulp.task("clean", function() {
	return del(publicPath);
});

// gulp.task("build", function(done) {
// 	run("clean", "copy", "webp", "images", "style", "sprite", "js", done);
// });

gulp.task("build", function(done) {
	dev = false;
	run(
		"clean",
		"copy",
		// "webp",
		"images",
		"style",
		// "sprite-svg",
		"js",
		"php",
		"html",
		done
	);
});

gulp.task("dev", function(done) {
	run(
		"clean", 
		"copy", 
		// "webp", 
		"images",
		"style", 
		"js", 
		"php", 
		"html",
		done
	);
});
