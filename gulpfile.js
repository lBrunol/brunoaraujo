const { src, dest, parallel, watch } = require('gulp');
const sass = require('gulp-sass');
const minifyCSS = require('gulp-csso');
const concat = require('gulp-concat');

sass.compiler = require('node-sass');

function css(){
  return src('assets/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCSS())
        .pipe(concat('style.css'))
        .pipe(dest('build/css', { sourcemaps: true}))
}

exports.css = css;
exports.default = () => {
  watch('assets/sass/**/*.scss', css);
};