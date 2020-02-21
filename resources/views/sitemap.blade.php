<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php($time = \Carbon\Carbon::now())

    @if($sitemap_settings->homepage_included)
        <url>
            <loc>{{ url('/') }}</loc>
            <lastmod>{{ $time->format('c') }}</lastmod>
            <changefreq>{{ $sitemap_settings->homepage_freq }}</changefreq>
            <priority>{{ $sitemap_settings->homepage_priority }}</priority>
        </url>
    @endif

    @if($sitemap_settings->posts_included)
        @foreach ($posts as $post)
            <url>
                <loc>{{ $post->url() }}</loc>
                <lastmod>{{ $post->updated_at->format('c') }}</lastmod>
                <changefreq>{{ $sitemap_settings->posts_freq }}</changefreq>
                <priority>{{ $sitemap_settings->posts_priority }}</priority>
            </url>
        @endforeach
    @endif

    @if($sitemap_settings->cats_included)
        @foreach ($categories as $category)
            <url>
                <loc>{{ $category->url() }}</loc>
                <lastmod>{{ $category->updated_at->format('c') }}</lastmod>
                <changefreq>{{ $sitemap_settings->cats_freq }}</changefreq>
                <priority>{{ $sitemap_settings->cats_priority }}</priority>
            </url>
        @endforeach
    @endif

    @if($sitemap_settings->tags_included)
        @foreach ($tags as $tag)
            <url>
                <loc>{{ $tag->url() }}</loc>
                <lastmod>{{ $tag->updated_at->format('c') }}</lastmod>
                <changefreq>{{ $sitemap_settings->tags_freq }}</changefreq>
                <priority>{{ $sitemap_settings->tags_priority }}</priority>
            </url>
        @endforeach
    @endif

    @if($sitemap_settings->authors_included)
        @foreach ($authors as $author)
            <url>
                <loc>{{ $author->url() }}</loc>
                <lastmod>{{ $author->updated_at->format('c') }}</lastmod>
                <changefreq>{{ $sitemap_settings->authors_freq }}</changefreq>
                <priority>{{ $sitemap_settings->authors_priority }}</priority>
            </url>
        @endforeach
    @endif



</urlset>
