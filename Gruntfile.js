module.exports = function(grunt) {
	"use strict";

	grunt.initConfig({
		"pkg": grunt.file.readJSON("package.json"),
		"less": {
			"build": {
				"files": {
					"style.css": "less/style.less",
					"editor-style.css": "less/editor-style.less",
				},
				"options": {
					"strictMath": true,
					"sourceMap": true,
					"sourceMapFileInline": true,
				},
			},
		},
		"postcss": {
			"build": {
				"src": ["*.css"],
			},
			"options": {
				"map": true,
				"processors": [
					require("autoprefixer-core")({browsers: ["last 3 versions"]}),
				],
			},
		},
		"gitadd": {
			"build": {
				"files": {
					"src": ["."],
				},
				"options": {
					"all": true
				}
			},
		},
		"gitcommit": {
			"build": {
				"files": {
					"src": ["."],
				},
				"options": {
					"message": "Grunt commit.",
					"allowEmpty": true,
				},
			},
		},
		"gitpush": {
			"build": {
				"options": {
					"upstream": true,
				},
			},
		},
		"watch": {
			"less": {
				"files": "less/**/*.less",
				"tasks": ["less", "postcss"]
			},
			"livereload": {
				"options": {
					"livereload": true
				},
				"files": ["**/*.php", "**/*.js", "style.css", "!lib/acf/**/*.*", "!node_modules/**/*.*"]
			}
		}
	});

	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

	grunt.registerTask("default", ["less", "postcss"]);
	grunt.registerTask("deploy", ["less","postcss", "gitadd", "gitcommit", "gitpush"]);
}