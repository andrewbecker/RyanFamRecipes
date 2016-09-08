module.exports = function(grunt) {
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.initConfig({
		compass: {
			dev: {
				options: {
					config: 'config.rb'
				}//options
			}//dev
		},//compass
		watch: {
			options: { livereload: true },
			scripts: {
				files: ['_/components/js/*.js']
			}, //scripts
			html: {
				files:['*.html']
			},
			php: {
				files:['*.php']
			},
			css: {
				files:['_/components/css/*.css']
			},
			sass: {
				files: ['_/components/sass/*.scss'],
				tasks: ['compass:dev']
			} //sass
		} //watch
	}) //initConfig
	grunt.registerTask('default', 'watch');
} //exports