module.exports = function(grunt) {
	//require('load-grunt-tasks')(grunt);
	grunt.initConfig({
		//pkg: grunt.file.readJSON('package.json'),
		
		config:{
        	themeName: 'infocamere',
        	themePath: 'public/assets',
        	assetsPath: 'resources',
            bowerPath: 'bower_components'
        },
        
		sass: {
			dev: {
				files: {
					'<%= config.themePath %>/css/app.css': '<%= config.assetsPath %>/sass/app.scss'
				}
			},
			dist:{
				options:{
					style:"compressed"
				},
				files:{
					'<%= config.themePath %>/css/app.css': '<%= config.assetsPath %>/sass/app.scss'
				}
			}
		},
		uglify: {
			dev : {
				options: {
			    	mangle: false,
			    	compress: false,
			    	wrap: false,
			    	sourceMap: false
			    },
			    files: {
					'<%= config.themePath %>/js/app.min.js': ['<%= config.themePath %>/js/app.js'],
			    }
			},
			dist: {
				options: {
					mangle: false,
				    compress: true,
				    wrap: true,
				    sourceMap: false
			    },
				files:{
					'<%= config.themePath %>/js/app.min.js': ['<%= config.themePath %>/js/app.js'],
				}
			}
		},
		cssmin: {
			dev : {
			  options: {
			  },
			  
		  	  files: {
		    	'<%= config.themePath %>/css/app.min.css': ['<%= config.themePath %>/css/app.css'],
			   
		  	  }
			  
			},
			dist: {
				options: {
			    mergeIntoShorthands: false,
			    roundingPrecision: -1,
			     
			  },
			  
			  	files:{
			    	'<%= config.themePath %>/css/app.min.css': ['<%= config.themePath %>/css/app.css'],
				  
			  	}
			  
			}	
		}
	});
	
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	
	
}


