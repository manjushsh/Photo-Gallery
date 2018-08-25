 var gulp = require("gulp");  /* require is node function for finding gulp.. like import in java */
 var connect = require("gulp-connect");


 var connectFn=function(){
     connect.server({
         root:'app/',
         port:8080
     });
 }

 gulp.task('connect',connectFn);

// // gulp
// var gulp = require('gulp');

// // plugins
// var connect = require('gulp-connect');


// gulp.task('connect', function () {
//   connect.server({
//     root: 'app/',
//     port: 8080
//   });
// });