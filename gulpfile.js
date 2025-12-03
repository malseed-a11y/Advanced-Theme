/* eslint-disable */

import gulp from "gulp";
import * as dartSass from "sass";
import gulpSass from "gulp-sass";
import concat from "gulp-concat";
import uglify from "gulp-uglify";
import sourcemaps from "gulp-sourcemaps";
import autoprefixer from "gulp-autoprefixer";

const { series, parallel, src, dest, task, watch } = gulp;
const sass = gulpSass(dartSass);

//****************************************************
// style css
//****************************************************
task("style", function () {
  return src("./assets/scss/style.scss")
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(concat("style.min.css"))
    .pipe(sourcemaps.write("./map"))
    .pipe(dest("./dist/css"));
});

//****************************************************
// rtl style css
//****************************************************
task("style-rtl", function () {
  return src("./assets/scss/style-rtl.scss")
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(concat("style-rtl.min.css"))
    .pipe(sourcemaps.write("./map"))
    .pipe(dest("./dist/css"));
});

//****************************************************
// Minified Bootstrap css (English)
//****************************************************
task("bootstrap", function () {
  return src("./assets/scss/bootstrap.scss")
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(concat("bootstrap.min.css"))
    .pipe(sourcemaps.write("./map"))
    .pipe(dest("./dist/css"));
});

//****************************************************
// Unminified for Bootstrap css rtl to process it with RTLCSS which lean on comments
//****************************************************
task("raw-bootstrap", function () {
  return src("./assets/scss/bootstrap.scss")
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(concat("bootstrap.css"))
    .pipe(sourcemaps.write("./map"))
    .pipe(dest("./dist/css"));
});

//****************************************************
// Compress the Generated Bootstrap rtl from rtlcss framework
// the command was: rtlcss dist\css\bootstrap.css dist\css\bootstrap-rtl.css
//****************************************************
task("bootstrap-rtl", function () {
  return src("./dist/css/bootstrap-rtl.css")
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(concat("bootstrap-rtl.min.css"))
    .pipe(sourcemaps.write("./map"))
    .pipe(dest("./dist/css"));
});

//****************************************************
// COMPONENTS CSS
//****************************************************

//****************************************************
// script.js
//****************************************************
task("main-js", function () {
  return src("./assets/js/main.js")
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(concat("main.min.js"))
    .pipe(sourcemaps.write("./map"))
    .pipe(dest("./dist/js"));
});

//****************************************************
// COMPONENTS JS
//****************************************************

//****************************************************
//task for automate all styles
//****************************************************
task("styles", parallel(["style"]));
task("styles-rtl", parallel(["style-rtl"]));
// task('components-styles', parallel(['circle-story-card-style', 'qaf-title-style', 'qaf-card-style', 'fatwa-card-style', 'poll-style', 'qaf-star-card-style','qaf-star-card-2-style', 'featured-video-card-style', 'featured-video-card-style', 'stars-slider-style', 'live-stream-style', 'fatwa-story-style', 'fatwa-term-card-style', 'zakat-css']));

//****************************************************
//task for automate all scripts
//****************************************************
task("scripts", parallel(["main-js"]));
// task('components-scripts', parallel(['circle-story-js', 'poll-js', 'featured-videos-slider-js', 'stars-slider-js', 'fatwa-story-js', 'fatwa-terms-slider-js', 'zakat-js']));

//****************************************************
//task for watching file
//****************************************************
task("watch", function () {
  watch(
    ["./assets/scss/**/*.scss", "!./assets/scss/components/**"],
    series("styles")
  );
  watch("./assets/js/**/*.js", series("scripts"));
});

//****************************************************
//task for watching file (RTL)
//****************************************************
task("watch-rtl", function () {
  watch(
    ["./assets/scss/**/*.scss", "!./assets/scss/components/**"],
    series("styles-rtl")
  );
});

//****************************************************
//task for watching components file
//****************************************************
task("watch-components", function () {
  watch("./assets/scss/components/**/*.scss", series("components-styles"));
  watch("./assets/js/**/*.js", series("components-scripts"));
});
