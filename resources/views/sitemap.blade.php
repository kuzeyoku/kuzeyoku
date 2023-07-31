<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($pages as $page)
        <url>
            <loc>{{ url(route('page.show', [$page, $page->slug])) }}/</loc>
            <lastmod>{{ $page->updated_at->format('Y-m-d') }}</lastmod>
            <changefreq>{{ config('setting.sitemap.static_pages_changefreq') }}</changefreq>
            <priority>{{ config('setting.sitemap.static_pages_priority') }}</priority>
        </url>
    @endforeach
    <url>
        <loc>{{ url(route('blog.index')) }}/</loc>
        <changefreq>{{ config('setting.sitemap.blog_changefreq') }}</changefreq>
        <priority>{{ config('setting.sitemap.blog_priority') }}</priority>
    </url>
    @foreach ($posts as $post)
        <url>
            <loc>{{ url(route('post.show', [$post, $post->slug])) }}/</loc>
            <lastmod>{{ $post->updated_at->format('Y-m-d') }}</lastmod>
            <changefreq>{{ config('setting.sitemap.blog_post_changefreq') }}</changefreq>
            <priority>{{ config('setting.sitemap.blog_post_priority') }}</priority>
        </url>
    @endforeach
</urlset>
