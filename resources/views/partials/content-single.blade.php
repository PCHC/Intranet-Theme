<article @php(post_class())>
  @include('partials.post-navigation')
  <header>
    <h1 class="post--title">{{ get_the_title() }}</h1>
    <div class="row post--meta">
      <div class="col">
        <time class="post--published" datetime="{{ get_post_time('c', true) }}">
          Posted {{ get_the_date('F j, Y \a\t g:i a') }}</time>
        <span class="byline author vcard post--author">
          by <?php
          $anonymousAuthor = get_post_meta( $post->ID, 'ap_author_name', true );
          if( !empty( $anonymousAuthor ) ) { ?>
            <span rel="author" class="fn">{{ $anonymousAuthor }}</a>
          <?php } else { ?>
            <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">{{ get_the_author() }}</a>
          <?php } ?>
        </span>
      </div>
      <div class="col text-right">
        @include('partials.entry-categories')
      </div>
    </div>
    @if( has_post_thumbnail() )
      <div class="post--image">
        {{ the_post_thumbnail('large') }}
      </div>
    @endif
  </header>
  <div class="post--content">
    @php(the_content())
  </div>
  <footer>
    @include('partials.post-navigation')
  </footer>
</article>
