/**
 * Note for developer the already comment outs is for Twig template engine
 * just remove it to add the support
 */


const gulp = require('gulp');
const browserSync = require('browser-sync').create();
// const twig = require('gulp-twig');

const paths = {
    html: 'views/**/*.html',
    php: 'controllers/**/*.php',
    css: 'dist/css/*.css',
    // twig: 'views/templates/**/*.twig',
    dist: 'dist/'
};

// function compileTwig() {
//     return gulp.src(paths.twig)
//         .pipe(twig())
//         .pipe(gulp.dest(paths.dist));
// }

function serve() {
    browserSync.init({
        proxy: {
            target: 'http://localhost/SUPERHERO-SYSTEM',
            middleware: function (req, res, next) {
                if (req.url.includes('/SUPERHERO-SYSTEM')) {
                    // Rewrite URL to redirect to the root
                    req.url = req.url.replace('/SUPERHERO-SYSTEM', '');
                }
                next();
            }
        }
    });

    gulp.watch(paths.html).on('change', browserSync.reload);
    gulp.watch(paths.php).on('change', browserSync.reload);
    gulp.watch(paths.css).on('change', browserSync.reload);
    // gulp.watch(paths.twig, compileTwig).on('change', browserSync.reload);
}

// gulp.task('default', gulp.series(compileTwig, serve));
gulp.task('default', serve);