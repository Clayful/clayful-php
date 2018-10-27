"use strict";

const _ = require('lodash');
const gulp = require('gulp');
const rename = require('gulp-rename');
const clean = require('gulp-clean');
const mustache = require('gulp-mustache');
const models = require('clayful-lib-spec');

const ext = '.php';

models.forEach(model => {

	model.apis = [
		...model.apis,
		// list -> query
		...model.apis
			.filter(api => api.method.indexOf('list') >= 0)
			.map(api => {

				const cloned = _.cloneDeep(api);

				cloned.module = cloned.module.replace('list', 'query');
				cloned.method = cloned.method.replace('list', 'query');

				return cloned;
			}),
		// empty -> clear
		...model.apis
			.filter(api => api.method.indexOf('empty') >= 0)
			.map(api => {

				const cloned = _.cloneDeep(api);

				cloned.module = cloned.module.replace('empty', 'clear');
				cloned.method = cloned.method.replace('empty', 'clear');

				return cloned;
			})
	];

});

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