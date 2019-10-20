var gulp = require("gulp");
var browserSync = require("browser-sync");
var changed = require("gulp-changed");
var sass = {
    src: "resources/sass/**/*.scss",
    dest: "public/css",
    plugin: require("gulp-sass")
};
var images = {
    src: [
        "resources/images/**/*.jpg",
        "resources/images/**/*.png"
    ],
    dest: "public/images",
    plugin: require("gulp-imagemin")
};
var scripts = {
    src: "resources/js/**/*.js",
    dest: "public/js",
    plugin: {
        concat: require("gulp-concat"),
        uglify: require("gulp-uglify"),
        babel: require("gulp-babel"),
        webpack: require('webpack-stream')
    }
}

gulp.task("sass", function () {
    return gulp.src(sass.src)
        .pipe(sass.plugin({
            outputStyle: "compressed"
        }))
        .pipe(gulp.dest(sass.dest));
});

gulp.task("scripts", function() {
    return gulp.src(scripts.src)
        .pipe(scripts.plugin.webpack({
            mode: 'development'
        }))
        .pipe(scripts.plugin.concat('app.js'))
        .pipe(scripts.plugin.uglify())
        .pipe(gulp.dest(scripts.dest));
});

gulp.task("reload", function (callback) {
    browserSync.reload();
    return callback();
});

gulp.task("watch", function () {
    browserSync.init({
        proxy: "charlespellens.com.test"
    });

    return gulp.watch(sass.src, gulp.series("sass", "images", "reload"));
});

gulp.task("images", function() {
    return gulp.src(images.src)
        .pipe(changed(images.dest))
        .pipe(images.plugin({
            progressive: true,
            interlaced: true
        }))
        .pipe(gulp.dest(images.dest));
});

gulp.task("default", gulp.series("sass", "scripts", "images"));
