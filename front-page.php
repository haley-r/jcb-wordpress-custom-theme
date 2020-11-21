<?php get_header(); ?>
<main id="content">
    <script type="text/template" id="splashInsert">
    </script>
    <script type="text/javascript">
        //this is probably extremely unelegant, but it works
        let now = Date.now();
        let lastVisited = Number(localStorage.getItem("last-visited"));
        let timeElapsedInSeconds = (now - lastVisited) / 1000;
        let splashDiv = document.createElement('DIV');
        let splashSubtitle = document.createElement('SPAN');
        let splashSubtitleText = document.createTextNode('Experimental Multimedia Artist');
        splashDiv.appendChild(splashSubtitleText);
        let splashHeader = document.createElement('H1');
        let splashHeaderText = document.createTextNode('Jonah Castañeda Barry');
        splashSubtitle.appendChild(splashSubtitleText);
        splashSubtitle.classList.add('splash-subtitle');
        splashHeader.appendChild(splashHeaderText);
        splashHeader.appendChild(splashSubtitle);
        splashHeader.classList.add('splash-title');
        splashDiv.appendChild(splashHeader);
        splashDiv.classList.add('splash-div');
        // if you've recently visited the site, don't even display the splash, just log the time
        if (localStorage.getItem('last-visited') && timeElapsedInSeconds < 10) {
            localStorage.setItem("last-visited", Date.now());
        }
        //  but if youve never visited, or if its been a while, insert splash into DOM
        else {
            localStorage.setItem("last-visited", Date.now());
            document.querySelector("body").appendChild(splashDiv);
        }
    </script>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header">
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                </header>
                <section class="main-content">
                    <?php the_content(); ?>
                </section>
            </article>
    <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>