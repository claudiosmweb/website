/* jshint node:true */
module.exports = function( grunt ){
	'use strict';

	var path = require( 'path' );
	var ontopic_path = path.resolve( __dirname, '../ontopic/' );

	grunt.initConfig({
		// setting folder templates
		dirs: {
			css: 'assets/css',
			fonts: 'assets/fonts',
			images: 'assets/images',
			js: 'assets/js'
		},

		// javascript linting with jshint
		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'Gruntfile.js',
				'<%= dirs.js %>/theme-scripts.js'
			]
		},

		// Minify .js files.
		uglify: {
			main: {
				files: {
					'<%= dirs.js %>/theme-scripts.min.js': [
						'<%= dirs.js %>/libs/*.js',
						'<%= dirs.js %>/theme-scripts.js'
					],
					'<%= dirs.js %>/jquery.fitvids.min.js': '<%= dirs.js %>/jquery.fitvids.js'
				}
			}
		},

		// Watch changes for assets
		watch: {
			js: {
				files: [
					'<%= dirs.js %>/*js',
					'!<%= dirs.js %>/*.min.js'
				],
				tasks: ['jshint', 'uglify']
			}
		},

		makepot: {
			dist: {
				options: {
					cwd: '../',
					type: 'wp-theme',
					potFilename: 'theme.pot',
					mainFile: 'claudiosanches/style.css',
					domainPath: 'claudiosanches/',
					include: [
						'claudiosanches/.*',
						'ontopic/.*'
					],
					exclude: [
						'claudiosanches/node_modules/.*'
					]
				}
			}
		}
	});

	// Load NPM tasks to be used here
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	// Register tasks
	grunt.registerTask( 'default', [
		'jshint',
		'uglify'
	]);

};