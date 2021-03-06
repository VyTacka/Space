var gulp = require('gulp');
var bower = require('gulp-bower');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var js = [
    'app/Resources/lib/jquery/jquery.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/affix.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/alert.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/button.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/carousel.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/collapse.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/dropdown.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/tab.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/transition.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/scrollspy.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/modal.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/tooltip.js',
    'app/Resources/lib/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/popover.js',
    'app/Resources/js/wow.min.js',
    'app/Resources/js/main.js'
];

gulp.task('init', function () {
    bower()
        .pipe(gulp.dest('app/Resources/lib/'))
});

gulp.task('default', function () {
    gulp.src('app/Resources/scss/main_style.scss')
        .pipe(sass())
        .pipe(concat('main.css'))
        .pipe(gulp.dest('web/css'));

    gulp.src('app/Resources/scss/admin_style.scss')
        .pipe(sass())
        .pipe(concat('admin.css'))
        .pipe(gulp.dest('web/css'));

    gulp.src(js)
        .pipe(concat('all.js'))
        .pipe(gulp.dest('web/js'));

    gulp.src('app/Resources/lib/bootstrap-sass-official/vendor/assets/fonts/bootstrap/*')
        .pipe(gulp.dest('web/fonts'));

    gulp.src('app/Resources/lib/font-awesome/fonts/*')
        .pipe(gulp.dest('web/fonts'));
});
