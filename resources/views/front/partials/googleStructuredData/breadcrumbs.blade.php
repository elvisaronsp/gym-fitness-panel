<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
  @foreach ($breadcrumbs as $position => $breadcrumb)
    @if (!$breadcrumb->first)
    {
    "@type": "ListItem",
    "position": {{ $position }},
    "item": {
      "@id": "{{ $breadcrumb->url }}",
      "name": "{{ $breadcrumb->title }}"
    }
    }
    @endif
  @if (!$breadcrumb->first && !$breadcrumb->last),@endif
  @endforeach
  ]
}
</script>