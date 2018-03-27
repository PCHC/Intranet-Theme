<div class="entry-categories">
  @foreach( get_the_category() as $category )
    <a class="badge badge-light" href="{{ get_category_link( $category->term_id ) }}"><i class="fa fa-folder-open-o"></i> {{ $category->name }}</a>
  @endforeach
</div>
