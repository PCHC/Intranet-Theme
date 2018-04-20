@extends('layouts.app')

@section('announcements')

  <div class="announcements">
    <div class="container-fluid">
      <div class="section-title section-title__red row no-gutters">
        <h4 class="section-title--content col">Latest News</h4>
        <div class="section-title--more col-2 text-right">
          <a href="#">More news <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
      <div class="row">
        <?php
          query_posts( array(
            'category_name' => 'announcements',
            'showposts' => 7,
          ) );
          $c = 0;
        ?>
        @if( have_posts() )
          @while( have_posts() ) @php(the_post())
            @if($c == 0)
              <div class="col-8 announcements--hero">
                @include('partials.content-hero')
              </div>{{-- /end hero announcement --}}
              {{-- start other announcements --}}
              <div class="col-4 announcements--more postcolumn">
            @else
              @include('partials.content-'.get_post_type())
            @endif
            @php($c++)
          @endwhile
        </div>{{-- end other announcements --}}
        @endif
      </div>{{-- /.row --}}
    </div>{{-- /.container --}}
  </div>{{-- /.announcements --}}
  @php( wp_reset_query() )
@endsection

@section('content')
  <div class="row">
    <div class="col section--leadership postcolumn">
      <div class="section-title section-title__red row no-gutters">
        <h4 class="section-title--content col">Leadership Reports</h4>
        <div class="section-title--more col-2 text-right">
          <a href="#">More <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php
        query_posts( array(
          'category_name' => 'leadership',
          'showposts' => 10,
        ) );
      ?>
      @if( have_posts() )
        @while( have_posts() ) @php(the_post())
          @include('partials.content-'.get_post_type())
        @endwhile
      @endif

      @php( wp_reset_query() )
    </div>

    <div class="col section--around postcolumn">
      <div class="section-title section-title__red row no-gutters">
        <h4 class="section-title--content col">Around the Organization</h4>
        <div class="section-title--more col-2 text-right">
          <a href="#">More <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php
        query_posts( array(
          'category_name' => 'around-the-org',
          'showposts' => 10,
        ) );
      ?>
      @if( have_posts() )
        @while( have_posts() ) @php(the_post())
          @include('partials.content-'.get_post_type())
        @endwhile
      @endif

      @php( wp_reset_query() )
    </div>
  </div>
@endsection