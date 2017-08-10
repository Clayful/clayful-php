"use strict";

const _ = require('lodash');
const gulp = require('gulp');
const rename = require('gulp-rename');
const clean = require('gulp-clean');
const mustache = require('gulp-mustache');
const models = require('clayful-lib-spec/data/spec.json');

const ext = '.php';

gulp.task('clean', () => {

	return gulp.src(['./clayful-php/src/Models/*'], { read: false })
		.pipe(clean());

});

gulp.task('models', ['clean'], () => {

	_.forEach(models, model => {

		gulp.src('./build/model.mustache')
			.pipe(mustache(model))
			.pipe(rename(path => {
				path.basename = model.className; // php filename convention
				path.extname = ext;
			}))
			.pipe(gulp.dest(`./clayful-php/src/Models`));

	});

});

gulp.task('readme', () => {

	gulp.src('./clayful-php/README.md')
		.pipe(gulp.dest('./'));

});

gulp.task('default', ['models', 'readme']);