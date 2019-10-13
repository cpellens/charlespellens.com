// require("dotenv").config();

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

gulp.task("sass", function () {
    return gulp.src(sass.src)
        .pipe(sass.plugin({
            outputStyle: "compressed"
        }))
        .pipe(gulp.dest(sass.dest));
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

gulp.task("default", gulp.series("sass", "images"));
