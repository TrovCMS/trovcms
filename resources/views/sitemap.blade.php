<?xml version="1.0" encoding="UTF-8"?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if ($links)
        @foreach ($links as $link)
            <sitemap>
                <loc>
                    <![CDATA[{{ trailing_slash_it($link->metaable->getPublicUrl()) }}]]>
                </loc>
                <lastmod>
                    <![CDATA[{{ $link->metaable->updated_at->tz('UTC')->toAtomString() }}]]>
                </lastmod>
            </sitemap>
        @endforeach
    @endif
</sitemapindex>
