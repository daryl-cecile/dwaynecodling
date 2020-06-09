<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latest Post</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?= \Nano\ViewHelper::getPartialContent("nav") ?>
<section>
    <div class="container">
        <div class="post-heading__wrapper">
            <h2 class="post-heading"><strong>Latest</strong>postings</h2>
            <a class="post-link" href="/posts.html">
                <p class="post-link__text">View all post</p>
                <svg class="post-link__arrow" width="18" height="14" xmlns="http://www.w3.org/2000/svg">
                    <g transform="rotate(90 8 9)" fill="none">
                        <rect fill="#FFF" x="5" y="1" width="2" height="16" rx="1"/>
                        <path stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6L6 0 0 6"/>
                    </g>
                </svg>
            </a>
        </div>
        <article class="grid grid--card-list">
            <article class="grid__card-item">
                <div class="card">
                    <picture class="card__img-container">
                        <img class="card__img"
                             src="https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2250&amp;q=80"
                             alt="Snowy Mountains">
                    </picture>
                    <div class="card__content">
                        <time datetime="2019-09-05" class="card__date">5th Sep, 2019</time>
                        <h3 class="card__header">A starry night</h3>
                        <p class="card__text">Look up at the night sky, and find yourself
                            <strong>immersed</strong> in
                            the
                            amazing mountain range of Aspen. </p>

                    </div>
                    <time  datetime="PT4M" class="card__read-time">
                        4 min read
                    </time>
                </div>
            </article>
            <article class="grid__card-item">
                <div class="card">   <picture class="card__img-container">
                        <img class="card__img"
                             src="https://images.unsplash.com/photo-1485160497022-3e09382fb310?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2250&amp;q=80"
                             alt="Desert">
                    </picture>
                    <div class="card__content">
                        <time datetime="2019-09-05" class="card__date">5th Sep, 2019</time>
                        <h3 class="card__header">Misty mornings</h3>
                        <p class="card__text">Capture the stunning <strong>essence</strong> of the early morning
                            sunrise
                            in
                            the Californian wilderness.</p>
                    </div>

                    <time datetime="PT4M" class="card__read-time">
                        4 min read
                    </time>
                </div>
            </article>
            <article class="grid__card-item">
                <div class="card">
                    <picture class="card__img-container">
                        <img class="card__img"
                             src="https://images.unsplash.com/photo-1506318164473-2dfd3ede3623?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=3300&amp;q=80"
                             alt="Canyons">
                    </picture>
                    <div class="card__content">
                        <time datetime="2019-09-05" class="card__date">5th Sep, 2019</time>
                        <h3 class="card__header">Utah sunsets</h3>
                        <p class="card__text">Sunsets over the <strong>stunning</strong> Utah Canyonlands, is
                            truly
                            something much more than incredible.</p>
                    </div>
                    <time datetime="PT4M" class="card__read-time">
                        4 min read
                    </time>
                </div>
            </article>
        </article>
    </div>
</section>

<?= \Nano\ViewHelper::getPartialContent("footer") ?>
</body>
</html>